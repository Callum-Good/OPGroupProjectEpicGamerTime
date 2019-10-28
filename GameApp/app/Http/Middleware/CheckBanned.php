<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->votes_to_ban >= 2) {
            auth()->logout();
                
            $bannedMessage = 'Your account has been suspended.';

            return redirect()->route('users.index')->with($bannedMessage);
        }

        return $next($request);
    }
}
