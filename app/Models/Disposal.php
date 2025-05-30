<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'complaints',
        'received',
        'resolved',
        'pending',
    ];
}
