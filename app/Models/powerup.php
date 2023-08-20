<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powerup extends Model
{
    use HasFactory;
    protected $table = 'powerups';

    protected $fillable = [
        'id',
        'powerid',
        'user_id',
        'icon',
        'name'
    ];
}
