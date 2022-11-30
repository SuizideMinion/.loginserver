<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletteremails extends Model
{
    use HasFactory;
    protected $table = 'de_newsletter';
    public $timestamps = false;

    protected $fillable = [
        'reg_mail'
    ];
}
