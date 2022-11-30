<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use App\Models\Boards;
use App\Models\Posts;
use App\Models\Threads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function auth;
use function redirect;
use function request;
use function sendDiscordMessage;
use function view;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $Boards = Boards::with('parent')->get();
            if ( isset($_GET['board']) ) {
                $Threads = Threads::orderBy('lastposttime', 'DESC')
                    ->where('boardid', $_GET['board'])
                    ->with('user', 'posts', 'board')
                    ->paginate(30);
            }
            else {
                $Threads = Threads::orderBy('lastposttime', 'DESC')
                    ->with('user', 'posts', 'board')
                    ->paginate(30);
            }
        }
        else
        {
            $Boardids = [161,3,30,37,85,66,4,113,114,115,116,120,119,117,118,172,112,130,128];
            $Boards = Boards::whereNotIn('boardid', $Boardids)->get();
            if ( isset($_GET['board']) ) {
                $Threads = Threads::orderBy('lastposttime', 'DESC')
                    ->where('boardid', $_GET['board'])
                    ->where('visible', 1)
                    ->whereNotIn('boardid', $Boardids)
                    ->with('user', 'posts', 'board')
                    ->paginate(30);
            }
            else {
                $Threads = Threads::orderBy('lastposttime', 'DESC')
                    ->whereNotIn('boardid', $Boardids)
                    ->where('visible', 1)
                    ->with('user', 'posts', 'board')
                    ->paginate(30);
            }
        }

        return view('forum.index', compact('Threads', 'Boards'));
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
        $request->validate([
            'message' => 'required',
            'topic' => 'required',
            'boardid' => 'required'
        ]);

        Threads::create([
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

        $Threads = Threads::latest('threadid')->first();
        if( $request->boardid == 194 ) sendDiscordMessage('news', 'Neue News aus dem Kristallpalast: '. $request->topic .' -> '. url('post/'. $Threads->threadid));

        Posts::create([
            'posttopic' => $request->topic,
            'message' => $request->message,
            'threadid' => $Threads->threadid,
            'userid' => auth()->user()->forum_user_id,
            'username' => auth()->user()->spielername,
            'posttime' => time(),
            'ipaddress' => request()->ip(),
            'visible' => 1
        ]);

        return redirect('post/'. $Threads->threadid);


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

            $Threads = Threads::orderBy('lastposttime', 'DESC')
                ->where('boardid', $id)
                ->with('user', 'posts', 'board')
                ->paginate(30);
        }
        else
        {
            $Boardids = [161,3,30,37,85,66,4,113,114,115,116,120,119,117,118,172,112,130,128];
            $Boards = Boards::whereNotIn('boardid', $Boardids)->get();

            $Threads = Threads::orderBy('lastposttime', 'DESC')
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role >= 10)
        {
            Threads::where('threadid', $id)
                ->update([
                    'visible' => 0
                ]);
        }

        return Redirect::back()->withErrors(['msg' => 'Gelöscht']);
    }
}
