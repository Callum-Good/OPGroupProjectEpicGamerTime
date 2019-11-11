<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->votes_to_ban >= 2) {
            auth()->logout();
                
            session()->flash('alert-success', "Two people have voted to ban you, and subsequently your account has been blocked.");

            return redirect()->route('home')->with('status', 'Two people have voted to ban you, and subsequently your account has been blocked.');
        }

        return $next($request);
    }
}
