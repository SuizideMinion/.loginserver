<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegmailDuplicate
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
        $Users = User::where('regmail', '=', '0')->limit(20)->get();
        if($Users->count() >= 1) {
            saveLog($Users->count() . ' Spieler die Email Adresse Geändert', 0);
            foreach ($Users as $User) {
                User::where('user_id', $User->user_id)->update([
                    'regmail' => $User->email
                ]);
            }
        }
        if( Auth::check() )
            dd('huhu');

        return $next($request);
    }
}
