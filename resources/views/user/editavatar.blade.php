@extends('user.template')

@section('setting')
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5 mt-5">
        <form class="row" action="{{ route('useravatar.update', 0) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="avatar" class="col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>

                    <div class="col-md-12">
                        <input id="image" type="file" class="form-control" name="image" required>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="custom-control custom-checkbox d-block"></div>
                    <button class="btn btn-style-1 btn-primary" type="submit">Avatar ändern</button>
                </div>
            </div>
        </form>
    </div>
@endsection
