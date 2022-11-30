<?php

namespace App\Models\servers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deUsers extends Model
{
    use HasFactory;
    protected $table = 'de_user_data';
    public $timestamps = false;

    protected $connection = 'custom';
}
