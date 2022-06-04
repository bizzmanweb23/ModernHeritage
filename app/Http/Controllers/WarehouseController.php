<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\CountryCode;
use App\Models\Product;
use App\Models\WarehouseProducts;
use DB;



class WarehouseController extends Controller
{
    //

    public function index()
    {
        $data['data'] = WareHouse::get();
        return view('frontend.admin.warehouse.index', $data);
    }
    public function addWarehouse()
    {
        $data['countryCodes'] = CountryCode::get();
        $data['country'] = DB::table('countries')->get();
        return view('frontend.admin.warehouse.add', $data);
    }
    public function saveWarehouse(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:rfc,dns',

        ]);


        $unique_id = User::orderBy('id', 'desc')->first();
        if ($unique_id) {
            $number = str_replace('MHU', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHU00001';
        } else {
            $number = "MHU" . sprintf("%05d", $number + 1);
        }


        WareHouse::insert([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->country_code_m . $request->mobile_no,
            'phone' => $request->country_code_p . $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'state' => $request->state,
            'country_id' => $request->country_id,
            'zipcode' => $request->zipcode
        ]);
        $user = new User;
        if ($request->file('war_house_img')) {
            $file_type = $request->file('war_house_img')->extension();
            $file_path = $request->file('war_house_img')->storeAs('images/users', $number . '.' . $file_type, 'public');
            $request->file('war_house_img')->move(public_path('images/users'), $number . '.' . $file_type);
        } else {
            $file_path = null;
        }
        $user->unique_id = $number;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 4;
        $user->status = $request->status;
        $user->user_image =  $file_path;
        $user->save();

        DB::table('user_address')->insert([
            'user_id' => $user->id,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'country' => $request->country_id,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'mobile' => $request->country_code_m . $request->mobile_no

        ]);


        return redirect(route('wareHouses'));
    }

    public function editWarehouse($id)
    {

        $data['countryCodes'] = CountryCode::get();
        $data['country'] = DB::table('countries')->get();
        $data['data'] = WareHouse::where('id', $id)->first();
        return view('frontend.admin.warehouse.edit', $data);
    }

    public function  updateWarehouse(Request $request)
    {



        WareHouse::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->country_code_m . $request->mobile_no,
            'phone' => $request->country_code_p . $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'state' => $request->state,
            'country_id' => $request->country_id,
            'zipcode' => $request->zipcode
        ]);
        $data = WareHouse::where('id', $request->id)->first();
        $data_u = User::where('email', $request->email)->first();
        $user = User::find($data_u->id);

        $user->user_name = $request->name;
        $user->email = $request->email;

        $user->role_id = 4;
        $user->status = $request->status;
        $user->save();

        DB::table('user_address')->where('user_id', $data_u->id)->update([

            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'country' => $request->country_id,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'mobile' => $request->country_code_m . $request->mobile_no

        ]);

        return redirect(route('wareHouses'));
    }
    public function viewWarehouse($id)
    {
        $data_1 = DB::table('ware_houses')->where('ware_houses.id', $id)
            ->join('countries', 'countries.id', 'ware_houses.country_id')
            ->first();

        $data['image'] = User::where('email', $data_1->email)->first();

        $data['data'] = $data_1;
        return view('frontend.admin.warehouse.view', $data);
    }
    public function  deleteWarehouse(Request $request)
    {
        $data = WareHouse::find($request->id);

        User::where('email', $data->email)->delete();
        WareHouse::where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function  proList($id)
    {



        $warehouse = DB::table('ware_houses')->where('id', $id)->first();
        $user = DB::table('users')->where('email', $warehouse->email)->first();

        $data['data'] = DB::table('warehouse_products')
            ->select('products.product_name', 'warehouse_products.*')
            ->join('products', 'products.id', 'warehouse_products.pro_id')
            ->where('warehouse_products.ware_house_id', $user->id)
            ->get();
        $data['wareHouse']=$warehouse->name;

        return view('frontend.admin.warehouse.products.index', $data);
    }
    public function addProductStock()
    {
        $data['unit'] = DB::table('units')->get();
        $data['products'] = Product::where('status', 1)->get();
        return view('frontend.admin.warehouse.products.add', $data);
    }
    public function warehouseProducts()
    {
        $uid = session()->get('ADMIN_USER_ID');
        $data['data'] = DB::table('warehouse_products')
            ->select('products.product_name', 'warehouse_products.*')
            ->join('products', 'products.id', 'warehouse_products.pro_id')
            ->where('warehouse_products.ware_house_id', $uid)
            ->get();

        return view('frontend.admin.warehouse.products.list', $data);
    }
    public function saveWarePro(Request $request)
    {

        $data = $request->validate([
           
            'sku' => 'required|unique:warehouse_products,sku',
        ]);

        $uid = session()->get('ADMIN_USER_ID');

        $data=DB::table('warehouse_products')->where('pro_id',$request->pro_id)->where('ware_house_id',$uid)->first();

        if($data)
        {
            return back()->with('message','Product already inserted');
        }

        WarehouseProducts::insert([
            'pro_id' => $request->pro_id,
            'selling_price' => $request->selling_price,
            'min_stock' => $request->min_stock . $request->unit_1,
            'max_stock' => $request->max_stock . $request->unit_2,
            'avl_stock' => $request->avl_stock . $request->unit_3,
            'ware_house_id' => $uid,
            'sku' => $request->sku

        ]);
        return redirect(route('warehouseProducts'));
    }
    public function editWarePro($id)
    {
        $data['products'] = Product::where('status', 1)->get();
        $data['unit'] = DB::table('units')->get();
        $data['data'] = DB::table('warehouse_products')
            ->where('warehouse_products.id', $id)
            ->first();



        return view('frontend.admin.warehouse.products.edit', $data);
    }
    public function updateWarePro(Request $request)
    {
        $data = $request->validate([
         
            'sku' => 'required|unique:warehouse_products,sku,' . $request->id,
        ]);

        $uid = session()->get('ADMIN_USER_ID');

        WarehouseProducts::where('id', $request->id)->update([
            'pro_id' => $request->pro_id,
            'selling_price' => $request->selling_price,
            'min_stock' => $request->min_stock . $request->unit_1,
            'max_stock' => $request->max_stock . $request->unit_2,
            'avl_stock' => $request->avl_stock . $request->unit_3,
            'ware_house_id' => $uid,
            'sku' => $request->sku

        ]);
        return redirect(route('warehouseProducts'));
    }
    public function viewWarePro($id)
    {
        $data['data'] = DB::table('warehouse_products')
                            ->select('products.product_name','warehouse_products.*')
                            ->join('products','products.id','warehouse_products.pro_id')
                            ->where('warehouse_products.id', $id)
                            ->first();
        return view('frontend.admin.warehouse.products.view', $data);
    }
}
