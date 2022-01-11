<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tbl_customer';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','phone','password'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
