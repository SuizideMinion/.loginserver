@extends('user.template')

@section('setting')
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5 mt-5">
        <form class="row" action="{{ route('usernotiz.update', 0) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="loginname">Notizen:</label>
                    <textarea style="width: 100%; height: 500px" name="text">{{ getUserData('notizblock', auth()->user()->id) }}</textarea>
                    <button class="btn btn-outline-secondary" type="submit">Speichern</button>
                </div>
            </div>
        </form>
    </div>
@endsection
