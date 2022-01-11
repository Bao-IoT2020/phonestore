<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','phone','note','address'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
