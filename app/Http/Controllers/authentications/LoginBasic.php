<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }

  public function login(Request $request)
  {
    $data = $request->validate([
      'email' => 'required',
      'password' => 'required|min:8',
    ]);

    if (Auth::attempt($data)) {
      $request->session()->regenerate();
      return redirect()->intended(route('learning-management'))->with('success', 'Successfully Login');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.'
    ]);
  }
}
