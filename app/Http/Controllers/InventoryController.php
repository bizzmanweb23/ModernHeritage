<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Attributes;
use App\Models\UomCategory;
use App\Models\UOM;


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
    
    public function allUOMcategory()
    {
        $uom_category = UomCategory::get();
        return view('frontend.admin.inventory.configuration.allUOMcategory',['uom_category' => $uom_category]);
    }

    public function saveUOMcategory(Request $request)
    {
        $data = $request->validate([
            'uom_category_name' => 'required',
        ]);
        $uom_category = new UomCategory;
        $uom_category->uom_category_name = $request->uom_category_name;
        $uom_category->save();

        return redirect(route('allUOMcategory'));
    }

    public function allUOM()
    {
        $uom_category = UomCategory::get();
        $alluom = UOM::leftjoin('uom_categories','uom_categories.id','=','uom.category')
                        ->where('uom.active','=','1')
                        ->select('uom_categories.uom_category_name','uom.*')
                        ->get();
        return view('frontend.admin.inventory.configuration.allUOM',['uom_category' => $uom_category, 'alluom' => $alluom]);
    }

    public function saveUom(Request $request)
    {
        $data = $request->validate([
            'uom' => 'required',
            'category' => 'required',
            'rounding_precision' => 'required',
            'gst_uqc' => 'required',
            'uom_type' => 'required',
        ]);

        if(isset($request->active)){
            $active = 1;
        } else {
            $active = 0;
        }

        $uom = new UOM;

        $uom->uom = $request->uom;
        $uom->active = $active;
        $uom->category = $request->category;
        $uom->rounding_precision = $request->rounding_precision;
        $uom->gst_uqc = $request->gst_uqc;
        $uom->uom_type = $request->uom_type;
        $uom->ratio = $request->ratio;
        $uom->save();

        return redirect(route('allUOM'));

    }
}
