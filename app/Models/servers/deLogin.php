<?php

namespace App\Models\servers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deLogin extends Model
{
    use HasFactory;
    protected $table = 'de_login';
    public $timestamps = false;

    protected $connection = 'custom';
}
