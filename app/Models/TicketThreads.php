<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketThreads extends Model
{
    use HasFactory;
    protected $table = 'ls_tickets';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'thema',
        'created',
        'modified',
        'status',
        'supporter',
        'board_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(TicketPosts::class, 'id', 'ticket_id');
    }

    public function board()
    {
        return $this->hasOne(TicketBoards::class, 'id', 'board_id');
    }

}
