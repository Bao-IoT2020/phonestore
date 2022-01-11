<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_detail';
    protected $fillable = ['order_id','product_id','quantity','price','sale_price'];

    // public function products()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    // public function orders()
    // {
    //     return $this->belongsTo(Order::class);
    // }

}
