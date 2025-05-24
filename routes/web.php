<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

Route::get('/', function () {
  return view('pages.frontend.index');
});

require __DIR__.'/auth.php';

include(base_path(). '/routes/backend/__system/administrative.php');
include(base_path(). '/routes/backend/__system/application.php');
include(base_path(). '/routes/backend/__system/dashboard.php');
include(base_path(). '/routes/backend/__system/profile.php');

Route::get('/password/reset', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// Route::patch('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:4|confirmed',
//     ]);
//
//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function (User $user, string $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));
//
//             $user->save();
//
//             event(new PasswordReset($user));
//         }
//     );
//
//     return $status === Password::PasswordReset
//         ? redirect()->route('login')->with('status', __($status))
//         : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.store');
