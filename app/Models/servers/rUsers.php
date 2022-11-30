<?php

namespace App\Models\servers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rUsers extends Model
{
    use HasFactory;
    protected $table = 'users';
//    public $timestamps = false;

    protected $fillable = [
            'id',
            'name',
            'token',
            'token_created_at'
    ];

    protected $connection = 'custom';
}
