<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Newsletteremails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NewsletterController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::where('id', auth()->user()->id)->first();

        return view('user.editnewsletter', compact('User'));
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
        if ( $request->newsletter == 2 )
        {
            $Newsletter = Newsletteremails::where('reg_mail', auth()->user()->email)->first();

            if($Newsletter)
            {
                Newsletteremails::where('reg_mail', auth()->user()->email)->delete();
                return Redirect::back()->withErrors(['msg' => 'Deine Email wurde von der Liste Entfernt!']);
            }
            else
            {
                return Redirect::back()->withErrors(['msg' => 'Du bist nicht auf unserer Newsletter liste!']);
            }
        }

        if ( $request->newsletter == 1 )
        {
            $Newsletter = Newsletteremails::where('reg_mail', auth()->user()->email)->first();

            if($Newsletter)
            {
                return Redirect::back()->withErrors(['msg' => 'Du bist bereits auf unserer Newsletter liste!']);
            }
            else
            {
                Newsletteremails::create([
                    'reg_mail' => auth()->user()->email
                    ]);
                return Redirect::back()->withErrors(['msg' => 'Deine Email wurde zu unserer Liste Hinzugefügt!']);
            }
        }
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
