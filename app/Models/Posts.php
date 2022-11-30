<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'bb1_posts';
    public $timestamps = false;

    protected $fillable = [
        'threadid',
        'userid',
        'username',
        'posttime',
        'ipaddress',
        'message',
        'visible'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'forum_user_id', 'userid');
    }
    public function thread()
    {
        return $this->hasOne(Threads::class, 'threadid', 'threadid');
    }
}
