<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth as Auth;
use DB;

class WishlistController extends Controller
{

    public function index($product_id)
    {
        $wish = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        if(isset($wish)){
             return redirect()->back()->with('message','Product Added Already');
        }
        else{
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id
            ]);
            return redirect(route('wish.show'));
        }

    }
    public function wishShow()
    {
        $data = DB::table('wishlists')
        ->select('products.product_image','products.product_name','products.price','products.id')
        ->join('products','products.id','=','wishlists.product_id')->get();
        return view('wishlist.index')->with('data',$data);
    }
    public function removeWishlist($id)
    {
        Wishlist::destroy($id);
        return redirect()->back();
    }
}
