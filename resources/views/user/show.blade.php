@extends('layout.layout')

@section('style')

@endsection

@section('content')
    @if (getUserData('userProvilPublic', $User->id) == 'on' OR ( Auth::check() && Auth::user()->role >= 10 ))
    <div class="about-me container">
        <div style="text-align: center;padding-bottom: 40px;">
            <h2 style="font-size: 32px;font-weight: bold;margin-bottom: 15px;padding-bottom: 0;color: #151515;">{{ $User->spielername }}</h2>
            <p>{{ getUserData('userProvilTitel', $User->id) }}</p>
        </div>
        <div class="row">
            <div class="col-lg-4" data-aos="fade-right" >
                <img class="avatar" src="/public/images/{{ getUserData('userProvilAvatar', $User->id) ?? 'noavatar.jpg' }}" class="img-fluid" style="max-width: 350px;max-height: 350px" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                <p class="fst-italic"> {{ getUserData('userProvilDescription', $User->id) }}</p>
                <div class="row">
                    <div class="col-lg-12">
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <span style="padding-top: 7px;margin-right: 10px;">Foren Threads Gestartet:</span>
                                <strong
                                    style="padding-top: 7px;margin-right: 10px;">{{ \App\Models\Threads::where('starterid', $User->forum_user_id)->where('visible', 1)->count() }}</strong>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <span style="padding-top: 7px;margin-right: 10px;">Foren Posts:</span>
                                <strong
                                    style="padding-top: 7px;margin-right: 10px;">{{ \App\Models\Posts::where('userid', $User->forum_user_id)->where('visible', 1)->count() }}</strong>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <span
                                    style="padding-top: 7px;margin-right: 10px;">Registriert seit:</span>
                                <strong
                                    style="padding-top: 7px;margin-right: 10px;">{{ date('d.m.Y', strtotime($User->register)) }}</strong>
                            </li>
                            {{--                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>--}}
                            {{--                                    <span>www.example.com</span></li>--}}
                            {{--                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>--}}
                            {{--                                    <span>+123 456 7890</span></li>--}}
                            {{--                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong>--}}
                            {{--                                    <span>New York, USA</span></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="counts container">
        <div class="row" style="margin-top: 40px;">
            <div class="col-lg-3 col-md-6">
                <div
                    style="padding: 30px 30px 25px 30px;width: 100%;position: relative;text-align: center;background: rgba(0, 0, 0, 0.08);">
                    <i class="bi bi-emoji-smile"
                       style="position: absolute;top: -25px;left: 50%;transform: translateX(-50%);font-size: 24px;background: rgba(0, 0, 0, 0.1);padding: 12px;color: #18d26e;border-radius: 50px;line-height: 0;"></i>
                    <span data-purecounter-start="0"
                          data-purecounter-end="232"
                          data-purecounter-duration="0"
                          class="purecounter">232
                        </span>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div
                    style="padding: 30px 30px 25px 30px;width: 100%;position: relative;text-align: center;background: rgba(0, 0, 0, 0.08);">
                    <i class="bi bi-emoji-smile"
                       style="position: absolute;top: -25px;left: 50%;transform: translateX(-50%);font-size: 24px;background: rgba(0, 0, 0, 0.1);padding: 12px;color: #18d26e;border-radius: 50px;line-height: 0;"></i>
                    <span data-purecounter-start="0"
                          data-purecounter-end="232"
                          data-purecounter-duration="0"
                          class="purecounter">232
                        </span>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div
                    style="padding: 30px 30px 25px 30px;width: 100%;position: relative;text-align: center;background: rgba(0, 0, 0, 0.08);">
                    <i class="bi bi-emoji-smile"
                       style="position: absolute;top: -25px;left: 50%;transform: translateX(-50%);font-size: 24px;background: rgba(0, 0, 0, 0.1);padding: 12px;color: #18d26e;border-radius: 50px;line-height: 0;"></i>
                    <span data-purecounter-start="0"
                          data-purecounter-end="232"
                          data-purecounter-duration="0"
                          class="purecounter">232
                        </span>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div
                    style="padding: 30px 30px 25px 30px;width: 100%;position: relative;text-align: center;background: rgba(0, 0, 0, 0.08);">
                    <i class="bi bi-emoji-smile"
                       style="position: absolute;top: -25px;left: 50%;transform: translateX(-50%);font-size: 24px;background: rgba(0, 0, 0, 0.1);padding: 12px;color: #18d26e;border-radius: 50px;line-height: 0;"></i>
                    <span data-purecounter-start="0"
                          data-purecounter-end="232"
                          data-purecounter-duration="0"
                          class="purecounter">232
                        </span>
                    <p>Happy Clients</p>
                </div>
            </div>
        </div>
    </div>
    <div class="skills container" style="margin-top: 40px">
        <div class="section-title"><h2>Events</h2></div>
        <div class="row skills-content">
            Comming Soon
        </div>
    </div>
    @else
        Dieser Spieler Versteckt seine Daten
    @endif
@endsection
