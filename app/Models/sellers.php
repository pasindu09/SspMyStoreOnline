<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_name',
        'shop_address',
    ];
    public function usertableconnection()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
}
