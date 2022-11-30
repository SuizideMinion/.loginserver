<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDatas extends Model
{
    use HasFactory;
    protected $table = 'ls_user_data';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'key',
        'value'
    ];
}
