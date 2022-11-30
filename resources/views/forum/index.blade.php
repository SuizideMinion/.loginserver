@extends('layout.layout')

@section('content')
    <div class="p-2 px-3">
        <div>
            @guest
            @else
                <button style="float: right" class="btn btn-secondary" type="button"
                        data-bs-toggle="collapse" data-bs-target="#NewTopic" aria-expanded="false"
                        aria-controls="NewTopic">
                    Neuer Thread
                </button>
            @endguest
            <div class="dropdown" style="float: right; margin-right: 10px">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="selectBoard"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    Kategorie
                </a>

                <ul class="dropdown-menu" aria-labelledby="selectBoard">
                    <li><a class="dropdown-item" href="{{ route('forum.index') }}">Zeige Alle</a></li>
                    @foreach($Boards as $Board)
                        <li><a class="dropdown-item"
                               href="/forum/{{ $Board->boardid }}">{{ ($Board->parent->title ?? '') }} -> {{ $Board->title }} ({{ $Board->Count() }})</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="collapse" id="NewTopic">
            <div class="comments">
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                    <form method="POST" action="{{ route('forum.store') }}">
                        @csrf

                        <div class="d-flex flex-start w-100">
                            <img class="avatar"
                                 src="/public/images/{{ getAvatar(auth()->user()->id ?? null) }}" alt="avatar" width="40"
                                 style="max-width: 40px;max-height: 40px"/>
                            <div class="form-outline w-100">
                                <label for="topic"></label>
                                <input class="form-control" style="background: #fff;" type="text"
                                       name="topic" id="topic" placeholder="Überschrift">
                                <label for="ReplyButton"></label>
                                <textarea class="form-control"
                                          id="ReplyButton"
                                          name="message"
                                          rows="4"
                                          style="background: #fff;">

                                    </textarea>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <div class="input-group mb-3">
                                <select name="boardid" class="form-select" id="inputGroupSelect03"
                                        aria-label="Example select with button addon">
                                    <option selected>Wähle eine Kategorie</option>
                                    @foreach($Boards as $Board)
                                        <option
                                            value="{{ $Board->boardid }}">{{ ($Board->parent->title ?? '') }} -> {{ $Board->title }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">Eintragen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-hover table-forum text-center">
            <thead>
            <tr>
                <th></th>
                <th class="text-left">Topic</th>
                <th>Comments</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Threads as $Thread)
                <tr>
                    <td class="text-nowrap">
                        {{--                            <a href="#" type="button" class="btn btn-outline-dark-green btn-sm p-1 m-0 waves-effect">--}}
                        {{--                                <span class="value">0</span>--}}
                        {{--                                <i class="fas fa-thumbs-up ml-1"></i>--}}
                        {{--                            </a>--}}
                        {{--                            <a href="#" class="btn btn-outline-danger btn-sm p-1 m-0 waves-effect">--}}
                        {{--                            <span class="value">0</span>--}}
                        {{--                            <i class="fas fa-thumbs-down ml-1"></i>--}}
                        {{--                            </a>--}}
                    </td>
                    <td class="text-start">
                        <a href="/post/{{$Thread->threadid}}" class="font-weight-bold blue-text">

                            {{$Thread->visible == 1 ? '':'Gelöscht:' }}
                            {{$Thread->topic}}
                        </a>
                        <div class="my-2">
                            <strong>
                                @isset($Thread->user->forum_nick)
                                    <a href="/user/{{$Thread->user->id}}"
                                       class="blue-text">{{$Thread->user->forum_nick}}</a>
                                @else
                                    {{$Thread->starter}}
                                @endif
                            </strong> in <a
                                href="/forum/{{ $Thread->boardid }}">{{ ($Thread->board->parent->title ?? '') }} -> {{ $Thread->board->title }}</a>
                            <span
                                style="font-size: smaller;"> am {{date('H:i:s d.m.Y', $Thread->starttime)}}</span>
                            <div></div>
                        </div>
                    </td>
                    <td>
                        <span>{{App\Models\Posts::where('visible', 1)->where('threadid', $Thread->threadid)->count() - 1}}</span>
                        <br>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <!--Table body-->
        </table>

        <!-- Table -->
        {{ $Threads->links() }}

    </div>
@endsection
