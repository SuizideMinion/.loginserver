@extends('layout.layout')

@section('content')
    <div class="p-2 px-3">

        <div>
            <button style="float: right" class="btn btn-secondary" type="button"
                    data-bs-toggle="collapse" data-bs-target="#NewTopic" aria-expanded="false"
                    aria-controls="NewTopic">
                Neue Supportanfrage
            </button>
        </div>

        <div class="collapse" id="NewTopic">
            <div class="comments">
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                    <form method="POST" action="{{ route('tickets.store') }}">
                        @csrf

                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="/public/images/auth()->user()->id{{ getAvatar(auth()->user()->id ?? null) }}" alt="avatar" style="max-width: 40px;max-height: 40px"
                                 height="40"/>
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
                                            value="{{ $Board->id }}">{{ $Board->title }}</option>
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
                <tr style="{{ $Thread->status == 0 ? 'background-color: limegreen':'' }}">
                    <td class="text-nowrap"></td>
                    <td class="text-start">
                        <a href="{{ route('tpost.show', $Thread->id) }}" class="font-weight-bold blue-text">

                            {{$Thread->thema}}
                        </a>
                        <div class="my-2">
                            <strong>
                                <a href="/user/{{$Thread->user->id ?? ''}}"
                                   class="blue-text">{{$Thread->user->spielername ?? ''}}</a>
                            </strong> in {{ $Thread->board->title }}
                            <span
                                style="font-size: smaller;"> am {{date('H:i:s d.m.Y', $Thread->created)}}</span>
                            <div></div>
                        </div>
                    </td>
                    <td>
                        <span>{{App\Models\TicketPosts::where('ticket_id', $Thread->id)->count() - 1}}</span>
                        <br>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <!--Table body-->
        </table>

        <!-- Table -->

    </div>
@endsection
