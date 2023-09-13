<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'Productname',
        'productprice',
        'productdescription',
        'productimage',
        'seller_id',
    ];



    public function sellertableconnection()
    {
        return $this->belongsTo(sellers::class, 'seller_id');
    }
   

    public function productImage()
    {
        return $this->hasOne(Photo::class, 'id', 'productimage'); // Assuming 'productimage' is the foreign key column
    }

}

