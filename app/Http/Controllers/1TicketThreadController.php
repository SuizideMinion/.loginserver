<?php

namespace App\Http\Controllers;

use App\Models\TicketPosts;
use App\Models\TicketThreads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TicketThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role >= 10) {
            $Threads = TicketThreads::orderBy('created', 'DESC')
                ->with('user', 'posts')
                ->paginate(30);

            return view('ticket.index', compact('Threads'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|void
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'topic' => 'required',
            'boardid' => 'required'
        ]);

        TicketThreads::create([
            'boardid' => $request->boardid,
            'topic' => $request->topic,
            'starttime' => time(),
            'lastposttime' => time(),
            'starterid' => auth()->user()->forum_user_id,
            'starter' => auth()->user()->forum_nick,
            'lastposterid' => auth()->user()->forum_user_id,
            'lastposter' => auth()->user()->forum_nick,
            'visible' => 1
        ]);
        $Threads = TicketThreads::latest('threadid')->first();;
        TicketPosts::create([
            'posttopic' => $request->topic,
            'message' => $request->message,
            'threadid' => $Threads->threadid,
            'userid' => auth()->user()->forum_user_id,
            'username' => auth()->user()->spielername,
            'posttime' => time(),
            'ipaddress' => request()->ip(),
            'visible' => 1
        ]);

        return redirect('post/' . $request->threadid);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check() )
        {
            if ( auth()->user()->forum_nick == '')
            {
                return redirect('/forumcreateaccount');
            }
        }
        if (Auth::check() && Auth::user()->role >= 10)
        {
            $Boards = Boards::get();

            $Threads = TicketThreads::orderBy('lastposttime', 'DESC')
                ->where('boardid', $id)
                ->with('user', 'posts', 'board')
                ->paginate(30);
        }
        else
        {
            $Boardids = [161,3,30,37,85,66,4,113,114,115,116,120,119,117,118,172,112,130,128];
            $Boards = Boards::whereNotIn('boardid', $Boardids)->get();

            $Threads = TicketThreads::orderBy('lastposttime', 'DESC')
                ->where('boardid', $id)
                ->where('visible', 1)
                ->whereNotIn('boardid', $Boardids)
                ->with('user', 'posts', 'board')
                ->paginate(30);
        }

        return view('forum.index', compact('Threads', 'Boards'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role >= 10)
        {
            TicketThreads::where('id', $id)
                ->update([
                    'visible' => 0
                ]);
        }

        return Redirect::back()->withErrors(['msg' => 'Gelöscht']);
    }
}
