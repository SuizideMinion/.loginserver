<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ForumCreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->forum_nick == '')
        {
            return view('forum.createaccount');
        }
        else
        {
            return redirect('/forum');
        }
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'forum_nick' => 'required'
        ]);

        if(!preg_match('/^[a-zA-Z0-9]{5,20}$/', $request->forum_nick)) return Redirect::back()->withErrors(['msg' => 'Keine Sonderzeichen, mindestens 5 bis 20 Zeichen!']);

        $User = User::where('forum_nick', $request->forum_nick)->first();

        if ($User)
        {
            return Redirect::back()->withErrors(['msg' => 'Accountname Bereits Vergeben']);
        }
        else
        {
            $getLastForumId = User::orderBy('forum_user_id', 'DESC')->first();
            User::where('user_id', auth()->user()->user_id)
                ->update([
                    'forum_nick' => $request->forum_nick,
                    'forum_user_id' => $getLastForumId->forum_user_id + 1
                ]);
            return redirect('/forum');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
