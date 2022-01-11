<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    protected $primaryKey = 'id';
    protected $fillable = ['customer_id','shipping_id','total','status','reason_cancel'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'tbl_order_detail')->withPivot('quantity','price','sale_price');
    }
}
