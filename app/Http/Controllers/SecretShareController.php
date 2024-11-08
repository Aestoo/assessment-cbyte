<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;

class SecretShareController extends Controller
{
    public function index(): View
    {
        return view('share-secret');
    }

    public function show(Secret $secret): View|Factory|Application
    {
        if ($secret->expiresAt && Carbon::parse($secret->expiresAt)->setTimezone('UTC')->isPast()) {
            abort(404, 'This secret has expired.');
        }

        $secret->usageAmount--;
        $secret->save();

        if ($secret->usageAmount < 0) {
            $secret->delete();
            abort(403, 'This secret has expired or has no more uses left.');
        }

        return view('show-secret', compact('secret'));
    }

    public function created(): View|Factory|Application
    {;
        $message = session('message');
        $signedUrl = session('signedUrl');
        $usageAmount = session('usageAmount');
        $expiresAt = session('expiresAt');

        session()->forget(['message', 'signedUrl', 'usageAmount', 'expiresAt']);
        return view('created-secret', compact('message', 'signedUrl', 'usageAmount', 'expiresAt'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'secret' => 'required|string|max:49000',
            'amountOfUsages' => 'nullable|integer|min:1|max:2147483647',
            'validForHours' => 'nullable|integer|min:0',
            'validForMinutes' => 'nullable|integer|min:0|max:59',
        ]);

        $expiresAt = null;
        if ((int)$validatedData['validForHours'] > 0 || (int)$validatedData['validForMinutes'] > 0) {
            $expiresAt = Carbon::now('UTC')
                ->addHours((int)$validatedData['validForHours'] ?? 0)
                ->addMinutes((int)$validatedData['validForMinutes'] ?? 0);

            $maxDate = Carbon::now('UTC')->addYears(100);
            if ($expiresAt > $maxDate) {
                return redirect()->back()->withErrors(['validForHours' => 'The expiration date is too far in the future. Please choose a shorter duration.']);
            }
        }

        try {
            $secret = Secret::create([
                'secret' => $validatedData['secret'],
                'usageAmount' => $validatedData['amountOfUsages'],
                'expiresAt' => $expiresAt,
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() == 1406) {
                return redirect()->back()->withErrors(['secret' => 'The secret is too large to be stored. Please shorten it.']);
            }
            return redirect()->back()->withErrors(['sqlError' => 'An error occurred while storing the secret.']);
        }

        if ($expiresAt) {
            $signedUrl = URL::temporarySignedRoute(
                'secrets.show',
                $expiresAt,
                ['secret' => $secret->id]
            );
        } else {
            $signedUrl = URL::signedRoute('secrets.show', ['secret' => $secret->id]);
        }
        session([
            'signedUrl' => $signedUrl,
            'usageAmount' => $secret->usageAmount,
            'expiresAt' => $expiresAt?->toDateTimeString(),
        ]);

        return redirect()->route('created.secret');
    }
}
