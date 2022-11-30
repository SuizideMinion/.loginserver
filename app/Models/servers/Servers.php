<?php

namespace App\Models\servers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    use HasFactory;
    protected $table = 'servers';
    public $timestamps = false;

    public function getData($id = 0)
    {
            setNewDatabase($this->db_base, $this->db_name, $this->db_host, $this->db_passwort);

            $User = \App\Models\servers\rUsers::where('id', auth()->user()->id)->first();

            return $User;
    }

}
