<?php
namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginBasic extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }

    public function login(Request $request)
    {
        $key          = 'login_attempts_' . $request->ip(); // Unique key based on IP
        $maxAttempts  = 3;                                  // Maximum login attempts
        $decaySeconds = 70;                                 // Lockout time in seconds (1 minute)

        // Check if the user is blocked
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            return back()->withErrors([
                'email' => "Too many login attempts."
            ])->with('lockout_time', RateLimiter::availableIn($key));
        }

        // Validate user input
        $data = $request->validate([
            'email'    => 'required',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($data)) {
            // Reset the rate limiter after successful login
            RateLimiter::clear($key);

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('success', 'Successfully logged in');
        }

        // Increment failed attempts
        RateLimiter::hit($key, $decaySeconds);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
