<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingApproval extends Model
{
    use HasFactory;
    protected $table = 'pending_approvals';
    protected $fillable = [
        'id',
         'who_id',
         'uid',
         'the_content',
        ];
}
