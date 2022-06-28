<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Client as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'address',
        'addedBy'
    ];
}
