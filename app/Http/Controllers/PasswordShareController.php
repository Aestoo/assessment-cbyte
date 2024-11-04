<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PasswordShareController extends Controller
{
    public function index(): View
    {
        return view('share-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'password' => 'required|string',
            'confirmPassword' => 'required|string|same:password',
            'amountOfUsages' => 'required|integer|min:1',
            'validForHours' => 'nullable|integer|min:0',
            'validForMinutes' => 'nullable|integer|min:0|max:59',
        ]);

        return redirect()->route('success.route')->with('message', 'Success.');
    }
}
