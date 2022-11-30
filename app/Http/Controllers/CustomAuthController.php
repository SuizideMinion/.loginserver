<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (User::where('email', $request->email)->where('acc_status',2)->first())
            return redirect("login")->withErrors('Account Gesperrt! Mehr Infos im Discord oder via eMail sui@die-ewigen.com');

        //New Laravel Login
        $credentials = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
        $credentialsb = array(
            'loginname'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($credentials) OR Auth::attempt($credentialsb)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }


        // Old MD5 Login
        $user = User::where([
            'email' => $request->email,
            'pass' => md5($request->password)
        ])->first();

        if ($user) {
            Auth::loginUsingId($user->id);

            return redirect()->intended('chanceoldpassword')
                ->withSuccess('Signed in');
        }

        $user = User::where([
            'loginname' => $request->email,
            'pass' => md5($request->password)
        ])->first();

        if ($user) {
            Auth::loginUsingId($user->id);

            return redirect()->intended('chanceoldpassword')
                ->withSuccess('Signed in');
        }


        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function newPW()
    {
        return view('auth.oldtonewpw');
    }

    public function chanceoldpassword(Request $request)
    {
        $request->validate([
            'password_second' => 'required',
            'password' => 'required',
            ]);

        if ( $request->password == $request->password_second)
        {
            if ( auth()->user()->id )
            {
                User::whereId(auth()->user()->id)->update([
                    'pass' => md5($request->password),
//                    'password' => '0',
                    'password' => Hash::make($request->password)
                ]);
                return redirect()->intended('home')
                    ->withSuccess('Signed in');
            }
        }

        return redirect("chanceoldpassword")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'laravel_password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("home")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'laravel_password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
//        if(Auth::check()){
            return view('home');
//        }

//        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
