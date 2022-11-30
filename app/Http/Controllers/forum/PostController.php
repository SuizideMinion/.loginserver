<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Threads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function auth;
use function dd;
use function redirect;
use function request;
use function view;

class PostController extends Controller
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
        dd($_POST);
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
            'threadid' => 'required',
        ]);

        Posts::create([
            'message' => $request->message,
            'threadid' => $request->threadid,
            'userid' => auth()->user()->forum_user_id,
            'username' => auth()->user()->forum_nick,
            'posttime' => time(),
            'ipaddress' => request()->ip(),
            'visible' => 1
        ]);

        Threads::where('threadid', $request->threadid)->update([
            'lastposttime' => time(),
            'lastposterid' => auth()->user()->forum_user_id,
            'lastposter' => auth()->user()->forum_nick
        ]);

        return redirect('post/' . $request->threadid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Thread = Threads::where('threadid', $id)
            ->with('posts')
            ->first();

        $FirstPost = Posts::where('threadid', $id)
            ->orderBy('posttime', 'ASC')
            ->with('user', 'thread')
            ->first();

        if (Auth::check() && Auth::user()->role >= 10)
        {
            $Posts = Posts::where('threadid', $id)
                ->where('reindex', '0')
                ->whereNotIn('postid', [$FirstPost->postid])
                ->with('user')
                ->orderBy('posttime', 'DESC')
                ->get();
        }
        else
        {
            if ($Thread->visible == 0)
            {
                return redirect('forum/');
            }

            if ( in_array($Thread->boardid, [161,3,30,37,85,66,4,113,114,115,116,120,119,117,118,172,112,130,128]))
            {
                return redirect('forum/');
            }
            $Posts = Posts::where('threadid', $id)
//                ->where('reindex', '0')
                ->where('visible', '1')
                ->whereNotIn('postid', [$FirstPost->postid])
                ->with('user')
                ->orderBy('posttime', 'DESC')
                ->get();
        }
//        dd($Posts);
        return view('forum.show', compact('Thread', 'Posts', 'FirstPost'));
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
            $Post = Posts::where('postid', $id)->orderBy('posttime', 'DESC')->first();
            $Thread = Threads::where('lastposttime', $Post->posttime)
                            ->where('lastposterid', $Post->userid)
                            ->first();

            if($Thread) {
                $PostLast = Posts::where('postid', '!=', $id)->where('visible', 1)->where('threadid', $Post->threadid)->orderBy('posttime', 'DESC')->first();

                Threads::where('threadid', $Post->threadid)->update([
                    'lastposttime' => $PostLast->posttime,
                    'lastposterid' => $PostLast->userid,
                    'lastposter' => $PostLast->username
                ]);
            }
            Posts::where('postid', $id)
                ->update([
                    'visible' => 0
                ]);
        }

        return Redirect::back()->withErrors(['msg' => 'Gelöscht']);
    }
}
