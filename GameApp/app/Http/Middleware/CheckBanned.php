<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Your account has been suspended.';
            } else {
                $message = 'Your account has been suspended for '.$banned_days.' '.str_plural('day', $banned_days).'.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
