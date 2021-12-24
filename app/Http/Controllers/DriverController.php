<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;


class DriverController extends Controller
{
    public function driverOverview()
    {
        return view('frontend.admin.driver.overview');
    }

    public function presentDelivery()
    {
        return view('frontend.admin.driver.presentDelivery');
    }
}
