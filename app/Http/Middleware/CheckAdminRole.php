<?php
namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
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
        if (
            Auth::check() &&
            Auth::user() &&
            Auth::user()->role == UserRoleEnum::SUPER_ADMIN->value ||
            Auth::user()->role == UserRoleEnum::HR2_ADMIN->value
        ) {
            return $next($request);
        }

        return redirect()->back()->withErrors(['error' => "You must be an HR2 Admin or Super Admin to access the Admin Panel."]);
    }
}
