<?php

namespace App\Http\Middleware;

use App\Models\Logs;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
            Logs::create([
                'user_id' => auth()->user()->id,
                'link' => URL::current(),
                'previous' => url()->previous(),
                'time' => time(),
                'text' => 'click',
                'post' => json_encode($_POST)
            ]);

        return $next($request);
    }
}
