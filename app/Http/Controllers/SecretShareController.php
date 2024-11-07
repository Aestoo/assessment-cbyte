<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SecretShareController extends Controller
{
    public function index(): View
    {
        return view('share-secret');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'secret' => 'required|string',
            'amountOfUsages' => 'required|integer|min:1',
            'validForHours' => 'nullable|integer|min:0',
            'validForMinutes' => 'nullable|integer|min:0|max:59',
        ]);

        return redirect()->route('success.route')->with('message', 'Success.');
    }
}
