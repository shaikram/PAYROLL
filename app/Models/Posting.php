<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Client as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Posting extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientId',
        'empId',
        'createdBy'
    ];
}
