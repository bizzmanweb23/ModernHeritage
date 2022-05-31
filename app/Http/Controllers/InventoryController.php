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
use Picqer;
use DNS2D;
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
    public function allproducts(Request $request)
    {
        $products_p = Product::select('products.*', 'product_categories.category_name')->join('product_categories', 'product_categories.id', 'products.cat_id');

        if (isset($request->type)) {
            $products['products'] = $products_p->where('products.cat_id', $request->type)->get();
        } else {
            $products['products'] = $products_p->get();
        }
        $products['product_categories'] = DB::table('product_categories')->where('status', 1)->get();
        return view('frontend.admin.inventory.products.allproducts', $products);
    }
    public function addproduct()
    {
        $data['product_categories'] = DB::table('product_categories')->where('status', 1)->get();
        $data['colors'] = DB::table('colors')->where('hex', 1)->get();
        $data['size'] = DB::table('size')->where('size.status', 1)->join('units', 'units.id', 'size.unit')->get();
        $data['unit'] = DB::table('units')->get();
        return view('frontend.admin.inventory.products.addproduct', $data);
    }
    public function viewProduct($id)
    {
        $data = Product::select('products.*', 'product_categories.category_name','subcategories.sub_category')
            ->join('product_categories', 'product_categories.id', 'products.cat_id')
            ->join('subcategories', 'subcategories.id', 'products.sub_cat')
            ->where('products.id', $id)->first();

        $data['data'] = $data;


        return view('frontend.admin.inventory.products.viewproduct', $data);


        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v13.0/114093384643374/messages');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"messaging_product\": \"whatsapp\", \"to\": \"916289621701\", \"type\": \"template\", \"template\": { \"name\": \"hello_world\", \"language\": { \"code\": \"en_US\" }  } }");

        // $headers = array();
        // $headers[] = 'Authorization: Bearer EAAFz4Pls8ZAgBAOmqBZCTkOkgmq9fukT3QMLXCWtbZAJXy5ZAQdUmvrZA6NOJjflRwrowwD5Gk4nT2Gv1prtXL8I8ZBiAlZCsJ6KVgOPhnSjnXqSg3gliavyp9kZBkbK9XFbHhYWWRJ5FELSMJajoZAnlGATeHfKJoMYV3tPYll8GrnLMdRdZA9mIy';
        // $headers[] = 'Content-Type: application/json';
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $result = curl_exec($ch);
        // if (curl_errno($ch)) {
        //     echo 'Error:' . curl_error($ch);
        // }
        // else
        // {
        //     echo $result;
        // }
        // curl_close($ch);
    }

    public function editProduct($id)
    {
        $data = Product::select('products.*', 'product_categories.category_name')
            ->join('product_categories', 'product_categories.id', 'products.cat_id')


            ->where('products.id', $id)->first();




        $data['product_categories'] = DB::table('product_categories')->where('status', 1)->get();
        $data['sub_category'] = DB::table('subcategories')->where('cat_id', $data->cat_id)->where('status', 1)->get();


        $data['unit'] = DB::table('units')->get();
        $data['data'] = $data;
        return view('frontend.admin.inventory.products.editproduct', $data);
    }
    public function saveProduct(Request $request)
    {

        $unique_id = DB::table('products')->orderBy('id', 'desc')->first();
        if ($unique_id) {
            $number = str_replace('MHP', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHP00001';
        } else {
            $number = "MHP" . sprintf("%05d", $number + 1);
        }

        $images = $request->file('images');
        if ($request->hasFile('images')) :
            foreach ($images as $item) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(public_path('/images/products/'), $imageName);
                $arr[] = $imageName;
            endforeach;
            $image = implode(",", $arr);
        else :
            $image = '';
        endif;


        DB::table('products')->insert([

            'unique_id' => $number,
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'cat_id' => $request->cat_id,
            'sub_cat' => $request->subcategory,
            'color' => $request->color,
            'size' => $request->size,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'material'=>$request->thickness,
            'price' => $request->price,
            'mrp_price' => $request->mrp_price,
            'available_quantity' => $request->available_quantity . $request->unit_1,
            'sku' => $request->sku,
            'tax' => $request->tax,
            'coverage' => $request->coverage,
            'per_pallet' => $request->per_pallet . $request->unit_p,
            'per_box' => $request->per_box . $request->unit_b,
            'pac_bags' => $request->pac_bags,
            'loose_per_lorry' => $request->loose_per_lorry . $request->unit_l,
            'supplier_code' => $request->supplier_code,
            'status' => $request->status,
            'description' => $request->description,
            'product_image' => $image
        ]);

        return redirect(route('allproducts'));
    }
    public function updateProduct(Request $request)
    {
        $images = $request->file('images');
        if ($request->hasFile('images')) {

            $data = DB::table('products')->where('id', $request->id)->first();



            foreach (explode(',', $data->product_image) as $img) {
                if($img != '')
                {
                    $image_path = public_path('images/products/' . $img);

               
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
             
            }
            foreach ($images as $item) {
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(public_path('/images/products/'), $imageName);
                $arr[] = $imageName;
            }
            $image = implode(",", $arr);
        } else {
            $image = $request->old_images;
        }

        DB::table('products')->where('id', $request->id)->update([

            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'cat_id' => $request->cat_id,
            'sub_cat' => $request->subcategory,
            'color' => $request->color,
            'size' => $request->size,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'material'=>$request->thickness,
            'price' => $request->price,
            'mrp_price' => $request->mrp_price,
            'available_quantity' => $request->available_quantity . $request->unit_1,
            'sku' => $request->sku,
            'tax' => $request->tax,
            'coverage' => $request->coverage,
            'per_pallet' => $request->per_pallet . $request->unit_p,
            'per_box' => $request->per_box . $request->unit_b,
            'pac_bags' => $request->pac_bags . $request->unit_p_b,
            'loose_per_lorry' => $request->loose_per_lorry . $request->unit_l,
            'supplier_code' => $request->supplier_code,
            'status' => $request->status,
            'description' => $request->description,
            'product_image' => $image
        ]);
        return redirect(route('allproducts'));
    }

    public function allwarehouse()
    {
        return view('frontend.admin.inventory.configuration.allwarehouse');
    }
    public function allProductCategory(Request $request)
    {
        $data = DB::table('product_categories');
        if (isset($request->status)) {
            if ($request->status != 'all') {
                $product_category = $data->where('status', $request->status)->get();
            } else {
                $product_category = $data->get();
            }
        } else {
            $product_category = $data->get();
        }

        return view('frontend.admin.inventory.configuration.allproductcategory', ['product_category' => $product_category]);
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
        return view('frontend.admin.inventory.configuration.allUOMcategory', ['uom_category' => $uom_category]);
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
        $alluom = UOM::leftjoin('uom_categories', 'uom_categories.id', '=', 'uom.category')
            ->where('uom.active', '=', '1')
            ->select('uom_categories.uom_category_name', 'uom.*')
            ->get();
        return view('frontend.admin.inventory.configuration.allUOM', ['uom_category' => $uom_category, 'alluom' => $alluom]);
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

        if (isset($request->active)) {
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
        return view('frontend.admin.inventory.configuration.allServices', ['services' => $services]);
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
        $product_category = ProductCategory::where('id', $id)->first();
        return view('frontend.admin.inventory.configuration.editCategory', ['product_category' => $product_category]);
    }
    public function  updateproductcategory(Request $request)
    {
        $cat = ProductCategory::find($request->id);
        $cat->category_name = $request->category_name;
        $cat->status = $request->status;
        $cat->save();
        return redirect(route('allproductcategory'))->with('message', 'Prodict Updated Successfully');
    }
    public function deleteCategory(Request $request)
    {
        $data = ProductCategory::where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function deleteProduct(Request $request)
    {
        $data = DB::table('products')->where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function allSubCategory(Request $request)
    {
        $data_s = DB::table('subcategories')->select('subcategories.*', 'product_categories.category_name')->join('product_categories', 'product_categories.id', 'subcategories.cat_id');

        if (isset($request->status)) {
            if ($request->status != 'all') {
                $data['sub_category'] = $data_s->where('subcategories.status', $request->status)->get();
            } else {
                $data['sub_category'] = $data_s->get();
            }
        } else {
            $data['sub_category'] = $data_s->get();
        }


        return view('frontend.admin.inventory.products.subCategory', $data);
    }
    public function addsubcategory()
    {
        $data['product_categories'] = DB::table('product_categories')->where('status', 1)->get();
        return view('frontend.admin.inventory.products.addsubCategory', $data);
    }

    public function  addproductsubcategory(Request $request)
    {
        DB::table('subcategories')->insert([
            'cat_id' => $request->cat_id,
            'sub_category' => $request->sub_category,
            'status' => $request->status
        ]);
        return redirect(route('allproductsubcategory'))->with('message', 'Subcategory Added Successfully');
    }
    public function deleteSubCategory(Request $request)
    {
        DB::table('subcategories')->where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function editSubCategory($id)
    {
        $data['product_categories'] = DB::table('product_categories')->where('status', 1)->get();
        $data['data'] = DB::table('subcategories')->where('id', $id)->first();
        return view('frontend.admin.inventory.products.editSubCategory', $data);
    }
    public function  updateproductsubcategory(Request $request)
    {
        DB::table('subcategories')->where('id', $request->id)->update([
            'cat_id' => $request->cat_id,
            'sub_category' => $request->sub_category,
            'status' => $request->status
        ]);
        return redirect(route('allproductsubcategory'))->with('message', 'Subcategory Updated Successfully');
    }
    public function subCat(Request $request)
    {
         
        $parent_id = $request->cat_id;
         
        $subcategories =  DB::table('subcategories')->where('cat_id',$parent_id)
                          
                              ->get();
        return response()->json($subcategories);
    }
}
