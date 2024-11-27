<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;

class CheckUserRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response|string|null
  {

    if (Auth::check() && Auth::user()->role !== UserRoleEnum::EMPLOYEE->value) {
      Auth::logout();
      session()->invalidate();
      session()->regenerate();

      throw ValidationException::withMessages([
        'data.email' => __('You must be an employee to access the ESS Portal.')
      ]);
    }

    return $next($request);
  }
}
