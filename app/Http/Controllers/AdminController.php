<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Item;
use DB;
use Gregwar\Image\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function updateStatus($id, $newState)
    {
        $car = Car::find($id);
        $car->car_soldOrBooked = $newState;
        $car->update();

        $result = 'success';
        return $result;
    }

    public function showNewCar()
    {
        return view('car.newcar');
    }

    public function showimages($id)
    {
        $car = Car::find($id);
        $items = Item::where('car_id', $id)
            ->get();

        return view('image.showImages', compact('car', 'items'));
    }

    public function createNewCar(Request $request)
    {
        $cropMeasures = $request->input('cropMeasures');
        $cropMeasures = json_decode($cropMeasures);

        $car = new Car();
        $car->user_id = auth()->user()->id;
        $car->car_brand = $request->input('car_brand');
        $car->car_model = $request->input('car_model');
        $car->car_color = $request->input('car_color');
        $car->car_motorFuel = $request->input('car_motorFuel');
        $car->car_cylinder = $request->input('car_cylinder');
        $car->car_doors = $request->input('car_doors');
        $car->car_equipment = $request->input('car_equipment');
        $car->car_observations = $request->input('car_observations');
        $car->car_horsePower = $request->input('car_horsePower');
        $car->car_km = $request->input('car_km');
        $car->car_numberPlate = $request->input('car_numberPlate');
        $numberPlate = $request->input('car_numberPlate');
        $car->car_price = $request->input('car_price');
        $car->car_body = $request->input('car_body');
        $car->car_registration_date = $request->input('car_registration_date');
        $car->car_gear = $request->input('car_gear');
        $car->car_soldOrBooked = $request->input('car_soldOrBooked');
        $car->save();
        if ($request->hasFile('addPhotosInput')) {
            $images = $request->addPhotosInput;
            $extensionErrors = array();
            $items = array();
            foreach ($images as $key => $image) {
                $extension = $image->getClientOriginalExtension();
                $extensionsallowed = ['jpg', 'png', 'jpeg'];
                if (in_array($extension, $extensionsallowed)) {
                    $tempName = 'temp_Image.' . $extension;
                    if (!Storage::exists('images/' . 'temp')) {
                        Storage::makeDirectory('images/' . 'temp', [0755]);
                    }
                    $image->storeAs('images/' . 'temp', $tempName);
                    $imgSize = getimagesize('images/' . 'temp' . '/' . $tempName);
                    $fileName = $numberPlate . '_' . time() . '_sm.' . $extension;
                    if ($cropMeasures[$key]->height == '100%' && $cropMeasures[$key]->width == '100%') {
                        if (!Storage::exists('images/' . $car->id)) {
                            Storage::makeDirectory('images/' . $car->id, [0755]);
                        }
                        Image::open('images/' . 'temp' . '/' . $tempName)
                            ->save('images/' . $car->id . '/' . $fileName, 'guess', 50);
                    } else {
                        //cast to web format
                        $x = (((int)str_replace('px', '', $cropMeasures[$key]->left)) / $cropMeasures[$key]->webWidth) * $imgSize[0];
                        $y = (((int)str_replace('px', '', $cropMeasures[$key]->top)) / $cropMeasures[$key]->webHeight) * $imgSize[1];
                        $w = (((int)str_replace('px', '', $cropMeasures[$key]->width)) / $cropMeasures[$key]->webWidth) * $imgSize[0];
                        $h = (((int)str_replace('px', '', $cropMeasures[$key]->height)) / $cropMeasures[$key]->webHeight) * $imgSize[1];
                        if (!Storage::exists('images/' . $car->id)) {
                            Storage::makeDirectory('images/' . $car->id, [0755]);
                        }
                        Image::open('images/' . 'temp' . '/' . $tempName)
                            ->crop($x, $y, $w, $h)
                            ->save('images/' . $car->id . '/' . $fileName, 'guess', 50);
                    }
                    $items[] = new Item([
                        'filename' => $fileName,
                        'main' => $cropMeasures[$key]->main == true ? 1 : 0
                    ]);
                } else {
                    $extensionErrors[] = 'La imagen ' . $image->getClientOriginalName() . ' no tiene una extensión permitida.';
                }
                Storage::delete('images/temp/' . $tempName);
            }
        }
        if (isset($items) && !empty($items)) {
            $car->items()->saveMany($items);
        }
        return redirect()
            ->route('home')
            ->withErrors($extensionErrors);
    }

    public function editCar($id)
    {
        $items = Item::where('car_id', $id)
            ->get();

        $car = Car::find($id);

        return view('car.editcar', compact('car', 'items'));
    }

    public function updateCar(Request $request, $id)
    {

        $cropMeasures = $request->input('cropMeasures');
        $cropMeasures = json_decode($cropMeasures);

        $car = Car::find($id);
        $car->user_id = Auth::user()->id;
        $car->car_brand = $request->input('car_brand');
        $car->car_model = $request->input('car_model');
        $car->car_color = $request->input('car_color');
        $car->car_motorFuel = $request->input('car_motorFuel');
        $car->car_cylinder = $request->input('car_cylinder');
        $car->car_doors = $request->input('car_doors');
        $car->car_equipment = $request->input('car_equipment');
        $car->car_observations = $request->input('car_observations');
        $car->car_horsePower = $request->input('car_horsePower');
        $car->car_km = $request->input('car_km');
        $car->car_numberPlate = $request->input('car_numberPlate');
        $numberPlate = $request->input('car_numberPlate');
        $car->car_price = $request->input('car_price');
        $car->car_body = $request->input('car_body');
        $car->car_gear = $request->input('car_gear');
        $car->car_registration_date = $request->input('car_registration_date');
        $car->car_soldOrBooked = $request->input('car_soldOrBooked');
        $car->update();

        $extensionErrors = array();
        if ($request->hasFile('addPhotosInput')) {
            $images = $request->addPhotosInput;
            $items = array();
            foreach ($images as $key => $image) {
                $extension = $image->getClientOriginalExtension();
                $extensionsallowed = ['jpg', 'png', 'jpeg'];
                if (in_array($extension, $extensionsallowed)) {
                    $tempName = 'temp_Image.' . $extension;
                    if (!Storage::exists('images/' . 'temp')) {
                        Storage::makeDirectory('images/' . 'temp', [0755]);
                    }
                    $image->storeAs('images/' . 'temp', $tempName);
                    $imgSize = getimagesize('images/' . 'temp' . '/' . $tempName);
                    $fileName = $numberPlate . '_' . time() . '_sm.' . $extension;
                    if ($cropMeasures[$key]->height == '100%' && $cropMeasures[$key]->width == '100%') {
                        if (!Storage::exists('images/' . $car->id)) {
                            Storage::makeDirectory('images/' . $car->id, [0755]);
                        }
                        Image::open('images/' . 'temp' . '/' . $tempName)
                            ->save('images/' . $car->id . '/' . $fileName, 'guess', 50);
                    } else {
                        //cast to web format
                        $x = (((int)str_replace('px', '', $cropMeasures[$key]->left)) / $cropMeasures[$key]->webWidth) * $imgSize[0];
                        $y = (((int)str_replace('px', '', $cropMeasures[$key]->top)) / $cropMeasures[$key]->webHeight) * $imgSize[1];
                        $w = (((int)str_replace('px', '', $cropMeasures[$key]->width)) / $cropMeasures[$key]->webWidth) * $imgSize[0];
                        $h = (((int)str_replace('px', '', $cropMeasures[$key]->height)) / $cropMeasures[$key]->webHeight) * $imgSize[1];
                        if (!Storage::exists('images/' . $car->id)) {
                            Storage::makeDirectory('images/' . $car->id, [0755]);
                        }
                        Image::open('images/' . 'temp' . '/' . $tempName)
                            ->crop($x, $y, $w, $h)
                            ->save('images/' . $car->id . '/' . $fileName, 'guess', 50);
                    }
                    $items[] = new Item([
                        'filename' => $fileName,
                        'main' => $cropMeasures[$key]->main == true ? 1 : 0
                    ]);
                } else {
                    $extensionErrors[] = 'La imagen ' . $image->getClientOriginalName() . ' no tiene una extensión permitida.';
                }
                Storage::delete('images/temp/' . $tempName);
            }
        }
        if (!empty($items)) {
            $car->items()->saveMany($items);
        }
        return redirect()
            ->route('home')
            ->withErrors($extensionErrors);
    }

    public function deleteCar($id)
    {
        Item::where('car_id', $id)
            ->delete();

        if (Storage::exists('images/' . $id)) {
            Storage::deleteDirectory('images/' . $id);
        }

        Car::find($id)
            ->delete();

        return redirect()
            ->back()
            ->withSuccess("El anuncio se ha eliminado correctamente");
    }

    public function deleteImg($id)
    {
        $image = Item::where('idItem', $id)
            ->get();

        Item::where('idItem', $id)
            ->delete();


        if (Storage::exists('images/' . $image[0]->car_id . '/' . $image[0]->filename)) {
            Storage::delete('images/' . $image[0]->car_id . '/' . $image[0]->filename);
        }
        return redirect()
            ->back()
            ->withSuccess("Se ha eliminado correctamente la foto");
    }
}
