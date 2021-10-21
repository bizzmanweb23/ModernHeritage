<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Attributes;


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
    public function allwarehouse()
    {
        return view('frontend.admin.inventory.configuration.allwarehouse');
    }
    public function allProductCategory()
    {
        $product_category = ProductCategory::get();

        return view('frontend.admin.inventory.configuration.allproductcategory',['product_category' => $product_category]);
    }
    public function addProductCategory()
    {
        return view('frontend.admin.inventory.configuration.addProductCategory');
    }
    public function saveProductCategory(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required',
        ]);
        $category = new ProductCategory;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect(route('allproductcategory'));
    }

    public function allAttributes()
    {
        $attributes = Attributes::get();
        return view('frontend.admin.inventory.configuration.allAttributes', ['attributes' => $attributes]);
    }

    public function addAttributes()
    {
        return view('frontend.admin.inventory.configuration.addAttributes');
    }

    public function saveAttributes(Request $request)
    {
        $data = $request->validate([
            'attributes_name' => 'required',
            'display_type' => 'required',
            'variants_creation_mode' => 'required',
        ]);
        $attributes = new Attributes;
        $attributes->attributes_name = $request->attributes_name;
        $attributes->display_type = $request->display_type;
        $attributes->variants_creation_mode = $request->variants_creation_mode;
        $attributes->save();

        return redirect(route('allattributes'));
    }
    
}
