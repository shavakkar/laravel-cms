<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'aadhar',
        'pan',
        'permAddress1',
        'permAddress2',
        'permCity',
        'permState',
        'permPin',
        'currentAddress1',
        'currentAddress2',
        'currentState',
        'currentCity',
        'currentPin',
        'aadharphoto',
        'panphoto',
        'userphoto',
    ];
}
