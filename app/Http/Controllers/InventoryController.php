<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Attributes;
use App\Models\Service;
use App\Models\UomCategory;
use App\Models\UOM;
use App\Models\Tax;
use DB;


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
       $product_categories = ProductCategory::get();
        $tax = Tax::get();
        $uom = UOM::get();
        return view('frontend.admin.inventory.products.addproduct',['product_categories' => $product_categories,'tax' => $tax,'uom' => $uom]);
    }
    public function allwarehouse()
    {
        return view('frontend.admin.inventory.configuration.allwarehouse');
    }
    public function allProductCategory(Request $request)
    {
        $data = DB::table('product_categories');
            if(isset($request->status))
            {
                if($request->status!='all')
                {
                    $product_category = $data->where('status',$request->status)->get();
                }
                else
                {
                    $product_category = $data->get();
                }
           
            }
            else
            {
                $product_category = $data->get();
            }

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
        $category->status = $request->status;
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

    public function allServices()
    {
        $services = Service::get();
        return view('frontend.admin.inventory.configuration.allServices',['services' => $services]);
    }

    public function saveServices(Request $request)
    {
        $data = $request->validate([
            'service_name' => 'required',
        ]);

        $service = new Service;
        $service->service_name = $request->service_name;
        $service->service_desc = $request->service_desc;
        $service->save();

        return redirect(route('allServices'));
    }
    public function editCategory($id)
    {
        $product_category= ProductCategory::where('id',$id)->first();
       return view('frontend.admin.inventory.configuration.editCategory',['product_category' => $product_category]);
    }
    public function  updateproductcategory(Request $request)
    {
        $cat = ProductCategory::find($request->id);
        $cat->category_name = $request->category_name;
        $cat->status = $request->status;
        $cat->save();
        return redirect(route('allproductcategory'))->with('message','Prodict Updated Successfully');
       

    }
    public function deleteCategory(Request $request)
    {
       $data = ProductCategory::where('id',$request->id)->delete();
       return json_encode(1);
       
    }
}
