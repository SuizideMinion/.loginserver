@extends('layout.layout')

@section('content')
    <div class="p-2 px-3"><a href="{{route('getsite.create')}}">Neue Seite Erstellen</a>
        <table class="table table-hover table-forum text-center">
            <thead>
            <tr>
                <th>id</th>
                <th class="text-left">text</th>
                <th>iframe</th>
                <th>hash</th>
            </tr>
            </thead>
            <tbody>
            @foreach($getSites as $getSite)
                <tr>
                    <td class="text-nowrap">
                        {{$getSite->id}}
                    </td>
                    <td class="text-start">
                        {{ $getSite->text }}
                    </td>
                    <td>
                        {{ $getSite->iframe }}
                    </td>
                    <td>
                        <a href="/getsite/{{ $getSite->hash }}">{{ $getSite->hash }}</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <!--Table body-->
        </table>

    </div>
@endsection
