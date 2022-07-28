<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = product::all();
        return view('Product.product')->with('product',$products);
    }
    public function show($id)
    {
        $products = product::where('id', $id)->first();
        return view('Product.productDetails', compact('products'));
         
    }
    public function cart()
    {
        return view('cart.index');
         
    }
    public function shop($id)
    {

        if(!empty(request()->sub_id))
        {
            $product = product::where('SubCategory_id',request()->sub_id)->where('Category_id',$id)->get();
        }
        else
        {
            $product = product::where('Category_id',$id)->orderBy('id')->get();
        }
        $category_id = $id;
        $subcategory_id = request()->sub_id;

        return view('Frontend.Product.product_page',compact('category_id','subcategory_id'))->with('product',$product);

    }

}