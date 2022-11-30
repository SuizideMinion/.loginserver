@extends('layout.layout')

@section('content')
    <div class="p-2 px-3">
        @if( $getSite->iframe != null)
            <iframe src="{{ $getSite->iframe }}" style="width: 100%; height: 500px"></iframe>
        @else
        {!! nl2br($getSite->text) !!}
        @endif
    </div>
@endsection
