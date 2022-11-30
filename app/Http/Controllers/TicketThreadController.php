<?php

namespace App\Http\Controllers;

use App\Models\TicketBoards;
use App\Models\TicketPosts;
use App\Models\TicketThreads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $Boards = TicketBoards::where('visible', '1')->get();
        if (Auth::check() && Auth::user()->role >= 10) {
            $Threads = TicketThreads::orderBy('modified', 'DESC')
                ->with('user', 'board')
                ->limit('20')
                ->get();

            return view('ticket.index', compact('Threads', 'Boards'));
        }
        else
        {
            $Threads = TicketThreads::orderBy('modified', 'DESC')
                ->where('user_id', auth()->user()->user_id)
                ->with('user', 'board')
                ->limit('20')
                ->get();

            return view('ticket.index', compact('Threads', 'Boards'));
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
//        dd($request);
        TicketThreads::create([
            'user_id' => auth()->user()->user_id,
            'board_id' => $request->boardid,
            'thema' => $request->topic,
            'created' => time(),
            'modified' => time(),
            'status' => 0,
            'supporter' => ''
        ]);
        $Threads = TicketThreads::latest('id')->first();

        TicketPosts::create([
            'message' => $request->message,
            'ticket_id' => $Threads->id,
            'poster' => auth()->user()->spielername,
            'created' => time(),
            'creator_id' => auth()->user()->user_id,
            'read' => time()
        ]);

        return redirect('tickets');

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
        $Status = TicketThreads::where('id', $id)->first()->status;
        TicketThreads::where('id', $id)->update([
            'status' => ( $Status == 1 ? 0:1),
        ]);

        return redirect('tickets');
    }
}
