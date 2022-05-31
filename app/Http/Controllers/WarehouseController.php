<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.admin.warehouse.index');
    }
    public function addWarehouse()
    {
        return view('frontend.admin.warehouse.add');
    }
}
