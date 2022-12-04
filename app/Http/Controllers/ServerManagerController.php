<?php

namespace App\Http\Controllers;

use App\Models\servers\deLogin;
use App\Models\servers\deUsers;
use App\Models\servers\rUsers;
use App\Models\servers\Servers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServerManagerController extends Controller
{
    public function index()
    {
        $Servers = Servers::where('status', '!=', 99)->get();

        return view('server.index', compact('Servers'));
    }

    public function join($id, $version)
    {
        $Server = Servers::where('server', $id)->first();

        $loginkey = md5(time() + rand(2, 1000000));

        setNewDatabase($Server->db_base, $Server->db_name, $Server->db_host, $Server->db_passwort);

        rUsers::where('id', auth()->user()->id)->update([
            'token' => $loginkey,
            'token_created_at' => time()
        ]);

//        echo "<iframe src='". $Server->link ."/login/". $loginkey . "'>";
        header("Location: ". $Server->link ."/login/". $loginkey );
        exit();
    }

    public function getHeader()
    {
        if(isset($_GET['owner_id']) AND isset($_GET['pass']))
        {
            $User = User::where('user_id', $_GET['owner_id'])->where('pass', $_GET['pass'])->firstOrFail();
            $Servers = Servers::where('status', '!=', 99)->get();
        }
        else
        {
            abort(404);
        }
        return view('layout.server', compact('User', 'Servers'));
    }

    public function register($id)
    {
        $Server = Servers::where('server', $id)->first();

        setNewDatabase($Server->db_base, $Server->db_name, $Server->db_host, $Server->db_passwort);
//        dd(rUsers::get());
        rUsers::create([
            'id' => auth()->user()->id,
            'name' => auth()->user()->spielername,
            'token' => md5(time() * rand(1,1000000)), ////// TODO:: Token muss geprüft werden ob bereits besteht
            'token_created_at' => time()
        ]);

        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}
