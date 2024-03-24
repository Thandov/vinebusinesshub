<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'businesses';

    protected $fillable = [
    'id',
     'company_rep',
     'business_name',
     'business_number',
     'business_bio',
     'email',
     'provinceId',
     'districtId',
     'municipalityId',
     'town',
     'address',
     'company_reg',
     'website',
     'industryId',
     'facebook',
     'twitter',
     'instagram',
     'logo',
     'marketingpic',
     'activation_status',
    ];

}