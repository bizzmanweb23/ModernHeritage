<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['id','product_name','product_image','price','product_id','user_id'];
    protected $table = "wishlists";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->belongsTo(Product::class);
     }

}
