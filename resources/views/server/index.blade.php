@extends('layout.layout')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($Servers as $Server)
            <div class="col">
                <div class="card bg-transparent"
                     style="min-height: 135px;
                         box-shadow: 5px 10px 8px #888888;
                         border: 1px solid;
                         border-radius: 3px 15px 5px 30px;
                         background-image: url('/images/{{ $Server->image }}');
                         background-size: cover;
                         margin: 30px
                         ">
                    <div class="card-body text-center">
                                    <span class="card-title text-white"
                                          style="font-weight: 900;font-size:large;text-shadow: 1px 1px black;">
                                        {{ $Server->server }}
                                    </span>
                        <p class="card-text text-white" style="margin: 0;">
                            <text
                                style="font-weight: 900;font-size: smaller;margin-bottom: 4px;color: white;text-shadow: 1px 1px black;">
                                {{ $Server->description }}
                            </text>
                        </p>
                        <a tabindex="0" class="" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Accountdaten" data-bs-html="true" data-bs-content="
                        @if( isset( $Server->getData()->name ) )
                            {{ $Server->getData()->name }}
                        @else
                            Kein Account Vorhanden
                        @endif
                        ">
                            <i class="bi bi-info-square" style="color: white"></i>
                        </a>
                        <div class="d-flex w-100 align-content-center">
                            @if( $Server['Error'] !== null )
                                {{ $Server['Error'] }}
                            @else
                                @if( isset( $Server->getData()->name ) )
                                    <a class="btn btn-black link-light"
                                       href="/accounts/{{ $Server->server }}/join/mobile">
                                        <i class="bi bi-phone"></i>
                                    </a>
                                    <a class="btn btn-black link-light"
                                       href="/accounts/{{ $Server->server }}/join/pcnew">
                                        <i class="bi bi-pc-display"></i>
                                    </a>
{{--                                    <i class="bi bi-pc"></i>--}}
                                @else
                                    <a class="btn btn-black link-light"
                                       href="/accounts/{{ $Server->server }}/register">
                                        <i class="bi bi-door-open"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
