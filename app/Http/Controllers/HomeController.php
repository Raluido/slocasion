<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Item;
use DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showHome()
    {
        $cars = Car::select()->orderBy('car_SoldOrBooked')->orderBy('created_at', 'DESC')->get();
        return view('home')->with('cars', $cars);
    }

    public function showCar($id)
    {
        $item = Item::where('car_id', $id);
        $result = DB::Table('items')->select('filename')->where('car_id', $id)->count();
        $car = Car::find($id);
        $carEquipment = DB::Table('cars')->where('id', $id)->value('car_equipment');
        $EquipmentOrdered = '<ul class="carEquipment"><li>' . str_replace(', ', '</li><li>', $carEquipment) . '</li></ul>';
        $carObservations = DB::Table('cars')->where('id', $id)->value('car_observations');
        $Observations = '<ul class="carEquipment"><li>' . str_replace(', ', '</li><li>', $carObservations) . '</li></ul>';
        $cars = Car::select()->orderBy('car_SoldOrBooked')->get();
        if ($car->car_soldOrBooked == "Vendido") {
            echo "<script>";
            echo "alert('Este coche ya lo vendimos!');";
            echo "</script>";
            return view('home')->with('cars', $cars);
        } else {

            return view('car.showcar', compact('car', 'result', 'EquipmentOrdered', 'Observations'));
        }
    }

    public function aboutUs()
    {
        return view('/aboutus');
    }
}
