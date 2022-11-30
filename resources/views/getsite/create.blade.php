@extends('layout.layout')

@section('content')
    <div class="p-2 px-3">

        <form method="POST" action="{{ route('getsite.store') }}">
            @csrf

            <div class="d-flex flex-start w-100">

                <div class="form-outline w-100">
                    <label for="iframe"></label>
                    <input class="form-control" style="" type="text"
                           name="iframe" id="iframe" placeholder="iframe?">
                    <label for="text"></label>
                    <textarea class="form-control"
                              id="text"
                              name="text"
                              rows="4"
                              style="background: #fff;"></textarea>
                    <button class="btn" type="submit">Eintragen</button>
                </div>
            </div>
        </form>
    </div>
@endsection
