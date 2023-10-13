<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Item;
use DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function showHome()
    {
        $cars = Car::select()
            ->orderBy('car_SoldOrBooked')
            ->orderBy('created_at', 'DESC')
            ->get();

        if ($cars->isEmpty()) {
            $cars = "No hay ninguna publicación por ahora.";
        }

        return view('home', ['cars' => $cars]);
    }

    public function showCar($id)
    {
        $car = Car::find($id);
        $items = Item::where('car_id', $id)
            ->where('main', '!=', 1)
            ->get();

        if ($items->isEmpty()) {
            $items = "No has subido ninguna foto aún!";
        }

        return view('car.showcar', compact('car', 'items'));
    }

    public function aboutUs()
    {
        return view('/aboutus');
    }
}
