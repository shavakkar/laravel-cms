<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'monthpending',
        'received',
        'resolved',
        'pending',
        'pending3',
        'avg',
    ];
}
