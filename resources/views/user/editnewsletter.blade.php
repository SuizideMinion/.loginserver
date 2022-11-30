@extends('user.template')

@section('setting')
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5 mt-5">
        <form class="row" action="{{ route('usernewsletter.update', 0) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aemail" class="col-md-12 col-form-label text-md-right">Newsletter von BGam.es - Die Ewigen - Andalur Empfangen?</label>

                    <select class="form-select form-select-sm" name="newsletter">
                        <option value="1" {{ \App\Models\Newsletteremails::where('reg_mail', auth()->user()->email)->first() ? 'selected':'' }}>Ja</option>
                        <option value="2" {{ \App\Models\Newsletteremails::where('reg_mail', auth()->user()->email)->first() ? '':'selected' }}>nein</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="custom-control custom-checkbox d-block"></div>
                    <button class="btn btn-style-1 btn-primary" type="submit">Newsletter Ablehnen/Annehmen</button>
                </div>
            </div>
        </form>
    </div>
@endsection
