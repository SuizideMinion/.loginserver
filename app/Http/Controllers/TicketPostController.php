<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Threads;
use App\Models\TicketPosts;
use App\Models\TicketThreads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TicketPostController extends Controller
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
            'id' => 'required',
        ]);

        $Ticket = TicketThreads::where('id', $request->id)->first();

        TicketPosts::create([
            'message' => $request->message,
            'poster' => auth()->user()->spielername,
            'ticket_id' => $request->id,
            'created' => time(),
            'creator_id' => $Ticket->user_id,
            'read' => ($Ticket->user_id == auth()->user()->user_id ? time():0)
        ]);

        TicketThreads::where('id', $request->id)->update([
            'modified' => time(),
            'status' => ( Auth::user()->role >= 10 ? 1:0)
        ]);

        return redirect('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $Thread = TicketThreads::where('id', $id)
            ->with('posts')
            ->first();
        if ( $Thread->user_id == auth()->user()->user_id )
        {
            TicketThreads::where('id', $id)->update([
                'read' => time()
            ]);
            TicketPosts::where('ticket_id', $id)->where('read', 0)->update([
                'read' => time()
            ]);
        }
        $FirstPost = TicketPosts::where('ticket_id', $id)
            ->orderBy('created', 'ASC')
            ->with('user')
            ->first();

        $Posts = TicketPosts::where('ticket_id', $id)
            ->whereNotIn('id', [$FirstPost->id])
            ->with('user')
            ->orderBy('created', 'DESC')
            ->get();

        return view('ticket.show', compact('Thread', 'Posts', 'FirstPost'));
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
