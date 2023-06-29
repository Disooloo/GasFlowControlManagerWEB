<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        $user = Auth::user();
//
//        if ($user) {
//            if ($user->moderator == 1) {
//                return redirect('home');
//            }
//
//            if ($user->moderator == 0) {
//                return redirect('login');
//            }
//        } else {
//            return redirect('/login');
//        }
//
//        return $next($request);
    }

}
