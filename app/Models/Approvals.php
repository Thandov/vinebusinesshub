<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvals extends Model
{
    use HasFactory;
    protected $table = 'approvals';
    protected $fillable = [
        'id',
         'who_id',
         'uid',
         'the_content',
        ];

}
