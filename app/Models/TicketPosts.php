<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPosts extends Model
{
    use HasFactory;
    protected $table = 'ls_tickets_posts';
    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'created',
        'poster',
        'message',
        'creator_id',
        'read'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'starter');
    }

}
