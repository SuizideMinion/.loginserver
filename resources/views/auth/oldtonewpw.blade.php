@extends('layout.layout')

@section('content')

@section('content')
    <h3 class="card-header text-center">Login</h3>
    <div class="card-body">

        Hallo dein Passwort Muss Geändert werden bitte gib ein Neues Passwort ein:

        <form method="POST" action="/chanceoldpassword">
            @csrf
            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="password" class="form-control" name="password"
                       required="">
            </div>

            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="password_second" class="form-control"
                       name="password_second" required="">
            </div>


            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Passwort ändern</button>
            </div>
        </form>

    </div>
@endsection
