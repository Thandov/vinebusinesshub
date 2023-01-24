<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipalDistrict extends Model
{
    use HasFactory;
        protected $table = 'municipal_districts';

    protected $fillable = ['municipal_district', 'provinceId'];
}