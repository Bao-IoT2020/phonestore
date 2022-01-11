<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;
    protected $table = 'tbl_brand';
    protected $primaryKey = 'id';
    protected $fillable = ['name','description','status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
