<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientId',
        'userId',
        'from',
        'to',
        'dtr',
        'empId',
        'duty',
        'rate',
        'ot',
        'op',
        'noh',
        'holType',
        'gp',
        'sss',
        'philhealth',
        'hmdf',
        'cb',
        'ca',
        'td',
        'np'
    ];
}
