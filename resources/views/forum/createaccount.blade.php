@extends('layout.layout')

@section('content')
    <h3 class="card-header text-center">Login</h3>
    <div class="card-body">
        <form method="POST" action="{{ route('forumcreateaccount.store') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Nick im Forum" id="email" class="form-control" name="forum_nick"
                       required
                       autofocus>
                @if ($errors->has('forum_nick'))
                    <span class="text-danger">{{ $errors->first('forum_nick') }}</span>
                @endif
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Forumaccount anlegen</button>
            </div>
        </form>

    </div>
@endsection
