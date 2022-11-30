<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;
    protected $table = 'bb1_threads';
    public $timestamps = false;

    protected $fillable = [
        'boardid',
        'topic',
        'starttime',
        'posttime',
        'lastposttime',
        'starterid',
        'starter',
        'lastposterid',
        'lastposter',
        'visible'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'forum_user_id', 'starterid');
    }

    public function posts()
    {
        return $this->hasMany(Posts::class, 'threadid', 'threadid');
    }

    public function board()
    {
        return $this->hasOne( Boards::class, 'boardid', 'boardid');
    }
}
