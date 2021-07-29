<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payList extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientId',
        'userId',
        'from',
        'to',
        'dtr'
    ];
}
