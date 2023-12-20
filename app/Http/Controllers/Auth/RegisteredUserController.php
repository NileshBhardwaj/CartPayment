<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'address'=>['required', 'string', 'max:255'],
        'dob'=>['required', 'string', 'max:255'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'address'=>$request->address,
        'dob'=>$request->dob,

    ]);
    $token = Str::random(10);

    $qr_codes=\DB::table('qr_codes')->insert([
        'token' => $token,
        'expires_at' => now()->addMinutes(1),
        'created_at' => now(),
        'user_id'=>$user->id,
    ]);


    

    // Assign 'user' role to the new user
    $user->assignRole('user');

    event(new Registered($user));

    Auth::login($user);

    // Redirect users based on their role
    if ($user->hasRole('user')) {
        return redirect('/user');
    } else {
        return redirect(RouteServiceProvider::HOME);
    }
}
}
