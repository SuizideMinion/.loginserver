<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class getSite extends Model
{
    use HasFactory;
    protected $table = 'getsite';
    public $timestamps = false;

    protected $fillable = [
        'text',
        'iframe',
        'hash'
    ];
}
