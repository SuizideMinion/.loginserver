@extends('user.template')

@section('setting')
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5 mt-5">
        <form class="row" action="{{ route('useremail.update', 0) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aemail" class="col-md-4 col-form-label text-md-right">Aktuelle Email Adresse</label>

                    <div class="col-md-12">
                        <input id="aemail" type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Neue Email Adresse</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="custom-control custom-checkbox d-block"></div>
                    <button class="btn btn-style-1 btn-primary" type="submit">Email Adresse ändern</button>
                </div>
            </div>
        </form>
    </div>
@endsection
