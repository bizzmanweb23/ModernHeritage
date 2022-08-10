<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use Session;
use DB;
use App\Models\product;
use remove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $dummy = Cart::where('product_id',$request->id)->where('user_id',Auth::id())->first();
        if($dummy)
        {
            Cart::where('product_id',$request->id)->where('user_id',Auth::id())->update([
                'quantity'=> $dummy->quantity+$request->quantity
            ]);
        }
        else
        {
            $user_id = Auth::user()->id;
           
            $product = product::find($request->id);
            $cart = new Cart();
            $cart->product_image = $product->product_image;
            $cart->product_name = $product->product_name;
            $cart->user_id = $user_id;
            $cart->price = $product->price;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->total = $request->quantity * $product->price;
            $cart->save();
        session()->put('cart', $cart);
        }
        return redirect(route('cart.show'));
    }
    public function addWish($id)
    {
        $dummy = Cart::where('product_id',$id)->where('user_id',Auth::id())->first();
        if($dummy)
        {
            return redirect(route('cart.show'));
        }
        else
        {
            $user_id = Auth::user()->id;
            $product = product::find($id);
            $cart = new Cart();
            $cart->product_image = $product->product_image;
            $cart->product_name = $product->product_name;
            $cart->user_id = $user_id;
            $cart->price = $product->price;
            $cart->product_id = $product->id;
            $cart->quantity = 1;
            $cart->total = $product->price;
            $cart->save();
        session()->put('cart', $cart);
        }

        return redirect(route('cart.show'));
    }
    public function cartShow()
    {
        $data = Cart::Join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',Auth::user()->id)
        ->select('carts.product_image','carts.product_name','carts.price','carts.quantity','carts.id')
        ->get();


       // echo '<pre>';
       // print($data); exit;
        return view('cart.index')->with('data',$data);
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
    public function update_cart(Request $request)
    {
        $old= Cart::where('id',$request->cart_id)->where('user_id',Auth::id())->first();
        Cart::where('id',$request->cart_id)->where('user_id',Auth::id())->update([
            'quantity' =>  $request->quantity,
            'total' => $old->price * $request->quantity,
        ]);
        echo json_encode(["status"=>"Success"]);
    }
    public function show()
    {
        return view('cart.index');
    }

}