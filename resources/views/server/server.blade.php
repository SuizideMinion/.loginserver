@extends('layout.server')

@section('serverInfo')
    bDE {{$loginkey}}
@endsection

@section('content')

{{--    <form action="https://bde.bgam.es/index.php?loginkey={{$loginkey}}" target="GameServer" name="theForm" method="post">--}}
{{--        <input type="hidden" name="nic" value="{{ $DeLogin->nic }}">--}}
{{--        <input type="hidden" name="pass" value="{{ $DeLogin->pass }}">--}}
{{--        <input type="submit" value="post">--}}
{{--    </form>--}}
{{--    <script>document.theForm.submit();</script>--}}
{{--<frame src="https://whinox.com/home" name="GameServer" style="width: 100%;height: calc(100vh - 12px);margin: 0px;padding: 0px;">--}}
    <iframe src="https://bde.bgam.es/dm.php?loginkey={{$loginkey}}" name="GameServer" style="width: 100%;height: calc(100vh - 12px);margin: 0px;padding: 0px;">

@endsection
