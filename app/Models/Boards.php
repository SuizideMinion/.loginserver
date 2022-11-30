<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    use HasFactory;
    protected $table = 'bb1_boards';
    public $timestamps = false;

    public function parent()
    {
        return $this->hasOne(Boards::class, 'boardid', 'parentid');
    }
    public function Count()
    {
        return Threads::where('boardid', $this->boardid)->count();
    }
}
