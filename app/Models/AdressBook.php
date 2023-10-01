<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdressBook extends Model
{
    use HasFactory;
    protected $table = 'adressbook';

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'country',
        'street',
        'city',
        'state',
        'zip'
    ];

}
