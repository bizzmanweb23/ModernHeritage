<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getInventory()
    {

        return view('frontend.admin.inventory.overview');
    }
    public function allproducts()
    {
        $products = Product::get();
        return view('frontend.admin.inventory.products.allproducts',['products' => $products]);
    }
    public function addproduct()
    {
       
        return view('frontend.admin.inventory.products.addproduct');
    }
    
}
