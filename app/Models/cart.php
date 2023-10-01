<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'addtocartclicks',
        'viewclicks',
        'Abandonedtimes',
        'usersession',
        'quantity',
        'imagepath'

    ];




    public function productImage()
    {
        return $this->hasOne(Product::class, 'id', 'product_id'); // Assuming 'productimage' is the foreign key column
    }


}
