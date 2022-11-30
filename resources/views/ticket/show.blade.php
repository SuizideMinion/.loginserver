@extends('layout.layout')

@section('content')
    <div class="p-2 px-3">
        <img class="avatar" src="/public/images/{{ getAvatar($Thread->user->id ?? null) }}"
             style="max-width: 40px;max-height: 40px" class="rounded-image"
             style="float: left">
        <span class="font-weight-bold"
              style="float: left; padding-left: 10px; font-weight: 600">{{$FirstPost->poster}} </span>
        <div class="flex-row mt-1 ellipsis" style="float: right">
            <small class="mr-2">{{ date('H:i:s d.m.Y', $FirstPost->created) }}</small>

            @if(Auth::check() && Auth::user()->role >= 10)
                <span style="float:right">
                    <form action="{{ route('tickets.destroy', $Thread->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        @if($Thread->status == 0)
                            <input type="submit" class="btn btn-danger" value="x"/>
                        @else
                            <input type="submit" class="btn btn-success" value="v"/>
                        @endif
                    </form>
                </span>
            @endif
        </div>
    </div>
    <div class="p-2">
        <p class="text-justify">Topic: <b>{{$Thread->thema}}</b><br>in: {{$Thread->board->title}}<br><br>{!! showBBcodes($FirstPost->message) !!}</p>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row icons d-flex align-items-center">
                <button class="btn btn-sm d-flex" type="button" data-bs-toggle="collapse"
                        data-bs-target="#ReplyButton" aria-expanded="false" aria-controls="ReplyButton">
                    <i class="bi bi-chat-left-text"></i>
                    <p class="mb-0" style="margin-left: 10px">Antworten</p>
                </button>
                <i class="fa fa-smile-o ml-2"></i>
            </div>
            <div class="d-flex flex-row muted-color">
                <span>{{App\Models\TicketPosts::where('ticket_id', $Thread->id)->count() - 1}} Antworten</span>
            </div>
        </div>
        <hr>

        <div class="collapse" id="ReplyButton">
            <div class="comments">
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                    <form method="POST" action="/tpost">
                        @csrf
                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="/public/images/{{ getAvatar(auth()->user()->id ?? null) }}"
                                 alt="avatar" style="max-width: 40px;max-height: 40px"/>
                            <div class="form-outline w-100">
                                <input type="hidden" id="id" name="id" value="{{ $Thread->id }}">
                                <textarea class="form-control"
                                          id="ReplyButton"
                                          name="message"
                                          rows="4"
                                          style="background: #fff;"></textarea>
                                <label class="form-label" for="ReplyButton"></label>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Antworten
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach($Posts as $Post)
            <div class="d-flex flex-row mb-2" style="background-color: lightgray;width: 100%;border-radius: 10px;">

                <div class="d-flex flex-column ml-2 w-100" style="padding-left: 10px">
                    <div>
                        <span class="name" style="font-weight: 600">{{$Post->poster}}</span>
                        @if(Auth::user()->role >= 10) <span style="float:right">Gelesen am: {{ ( $Post->read != null ? date('H:i:s d.m.Y', $Post->read) : 'nie') }}</span> @endif
                    </div>
                    <small class="comment-text">{!! showBBcodes($Post->message) !!}</small>
                    <div class="d-flex flex-row align-items-center status">
                        {{--                                        <small>Like</small>--}}
                        {{--                                        <small>Reply</small>--}}
                        {{--                                        <small>Translate</small>--}}
                        <small>{{ date('H:i:s d.m.Y', $Post->created) }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
