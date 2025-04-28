<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyDisposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'forward',
        'received',
        'resolved',
        'pending',
    ];
}
