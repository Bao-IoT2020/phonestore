<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'tbl_comment';
    protected $primaryKey = 'id';
    protected $fillable = ['name','comment','status','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
