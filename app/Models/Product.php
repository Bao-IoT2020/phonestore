<?php

namespace App\Models;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_id',
                           'name',
                           'description',
                           'image',
                           'price',
                           'sale_price',
                           'rom',
                           'ram',
                           'battery',
                           'screen',
                           'front_camera',
                           'rear_camera',
                           'chipset',
                           'status'];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'tbl_order_detail','product_id','order_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
