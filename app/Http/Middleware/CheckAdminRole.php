<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (Auth::check() && Auth::user() && Auth::user()->role == UserRoleEnum::SUPER_ADMIN->value) {
        return $next($request);
      }

      return redirect()->back()->withErrors(['error' => "You must be an admin to access the Admin Panel."]);
    }
}
