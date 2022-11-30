@extends('layout.layout')

@section('style')

@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <div class="author-card pb-3">
                    <div class="author-card-cover" style="background-image: url('/assets/img/hero-bg.png');">
                        <a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title=""
                           data-original-title="">
                            <i class="bi bi-coin"></i>&nbsp;{{ auth()->user()->credits }} Credits
                        </a>
                    </div>
                    <div class="author-card-profile">
                        <div class="author-card-avatar">
                            <img class="avatar"
                                 src="/public/images/{{ getUserData('userProvilAvatar', auth()->user()->id) ?? 'noavatar.jpg' }}"
                                 style="max-width: 85px;max-height: 85px" class="img-fluid" alt="">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg">{{ auth()->user()->spielername }}</h5>
                            <span
                                class="author-card-position">Joined {{ date('d.m.Y', strtotime(auth()->user()->register)) }}</span>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush ">
                        <a class="list-group-item {{ request()->is('user/*') ? 'active': ''}}"
                           href="{{ route('user.edit', auth()->user()->id) }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Profil</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item {{ request()->is('useravatar/*') ? 'active': ''}}"
                           href="{{ route('useravatar.edit', auth()->user()->id) }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Avatar</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item {{ request()->is('userpassword/*') ? 'active': ''}}"
                           href="{{ route('userpassword.edit', auth()->user()->id) }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Passwort</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item {{ request()->is('useremail/*') ? 'active': ''}}"
                           href="{{ route('useremail.edit', auth()->user()->id) }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">E-Mail</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item {{ request()->is('usernewsletter/*') ? 'active': ''}}"
                           href="{{ route('usernewsletter.edit', auth()->user()->id) }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Newsletter</div>
                                </div>
                            </div>
                        </a>
                    </nav>
                </div>
            </div>

            @yield('setting')

        </div>
    </div>
@endsection
