<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBoards extends Model
{
    use HasFactory;
    protected $table = 'ls_tickets_boards';
    public $timestamps = false;
}
