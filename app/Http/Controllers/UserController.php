<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::where('id', $id)->first();

        return view('user.show', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $User = User::where('id', auth()->user()->id)->first();

        return view('user.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'spielername' => 'required'
        ]);

        if(!preg_match('/^[a-zA-Z0-9]{5,20}$/', $request->spielername) AND Auth::user()->role <= 10)
            return Redirect::back()->withErrors(['msg' => 'Keine Sonderzeichen, mindestens 5 bis 20 Zeichen!']);

        $Spielername = \App\Models\User::where('spielername', $request->spielername)->first();
        if( $Spielername AND $Spielername->spielername != auth()->user()->spielername )
            return Redirect::back()->withErrors(['msg' => 'Spielername bereits Vorhanden!']);

        if ( $Spielername->spielername != auth()->user()->spielername )
        {
            User::whereID(auth()->user()->id)->update(['spielername' => $request->spielername]);
        }
//        dd($request);
        saveUserData('userProvilDescription', $request->message, auth()->user()->id);
        saveUserData('userProvilPublic', $request->provilepublic, auth()->user()->id);
        saveUserData('userProvilGender', $request->gender, auth()->user()->id);

        return Redirect::back()->withErrors(['msg' => 'Gespeichert']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
