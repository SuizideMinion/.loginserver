@extends('user.template')

@section('setting')
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5 mt-5">
        <form class="row" action="{{ route('userpassword.update', 0) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="custom-control custom-checkbox d-block"></div>
                    <button class="btn btn-style-1 btn-primary" type="submit">Passwort ändern</button>
                </div>
            </div>
        </form>
    </div>
@endsection
