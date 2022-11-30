@extends('user.template')

@section('setting')
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5 mt-5">
        <form class="row" action="{{ route('user.update', 0) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="loginname">Loginname</label>
                    <input class="form-control" type="text" value="{{ auth()->user()->loginname }}" disabled>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="spielername">Öffentlicher Name</label>
                    <input class="form-control" type="text" name="spielername" value="{{ auth()->user()->spielername }}" required="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="spielername">Titel *dieser wird durch das DET Vergeben!</label>
                    <input class="form-control" type="text" value="{{ getUserData('userProvilTitel', $User->id) }}" disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="message">Spielerbeschreibung</label>
                <textarea class="form-control" id="ReplyButton" name="message" rows="4" style="background: #fff;">{{ getUserData('userProvilDescription', $User->id) }}</textarea>
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="provilepublic" {{ getUserData('userProvilPublic', $User->id) ? 'checked':'' }}>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Öffentliches Provil Zeigen?</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="1" {{ getUserData('userProvilGender', $User->id) == 1 ? 'checked':'' }}>
                    <label class="form-check-label" for="inlineRadio1">Männlich</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="2" {{ getUserData('userProvilGender', $User->id) == 2 ? 'checked':'' }}>
                    <label class="form-check-label" for="inlineRadio2">Weiblich</label>
                </div>
            </div>
            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="custom-control custom-checkbox d-block">
                    </div>
                    <button class="btn btn-style-1 btn-primary" type="submit">Provil ändern</button>
                </div>
            </div>
        </form>
    </div>
@endsection
