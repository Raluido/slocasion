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
    public function updateStatus(Request $request, $id)
    {
        $car = Car::find($id);
        $car->car_soldOrBooked = $request->input('car_soldOrBooked');
        $car->update();
        return redirect()
            ->back();
    }

    public function showNewCar()
    {
        return view('car.newcar');
    }

    public function createNewCar(Request $request)
    {
        $cropMeasures = $request->input('cropMeasures');
        log::info($cropMeasures);

        die();
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
        if ($request->hasFile('photoMain')) {
            $extension = $request->file('photoMain')->getClientOriginalExtension();
            $request->photoMain->storeAs('public/media', $numberPlate . '0.' . $extension);
            $car->car_photo_main = $numberPlate . '0' . 'sm.' . $extension;

            Image::open('storage/media/' . $numberPlate . '0.' . $extension)
                ->scaleResize(1000, 850)
                ->save('storage/media/' . $numberPlate . '0' . 'sm.' . $extension);

            Storage::disk('public')->delete('/media/' . $numberPlate . '0.' . $extension);
        }
        $car->save();

        $this->validate($request, [
            'photos' => 'nullable',
        ]);

        if ($request->hasFile('photos')) {

            $images = [];
            $files = $request->file('photos');

            foreach ($files as $key => $file) {
                $allowedfileExtension = ['jpg', 'png', 'jpeg'];
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    $addOne = $key + 1;
                    $file->storeAs('public/media', $numberPlate . $addOne . '.' . $extension);
                    $path = 'public/media/' . $numberPlate . $addOne . 'sm.' . $extension;
                    $images[] = new Item([
                        'filename' => $path,
                    ]);

                    Image::open('storage/media/' . $numberPlate . $addOne . '.' . $extension)
                        ->scaleResize(1000, 850)
                        ->save('storage/media/' . $numberPlate . $addOne . 'sm.' . $extension);

                    Storage::disk('public')->delete('/media/' . $numberPlate . $addOne . '.' . $extension);
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sólo se admiten éstas extensiones png , jpg , jpeg</div>';
                }
            }
            $car->items()->saveMany($images);
        }

        return redirect('admin');
    }

    public function editCar($id)
    {
        $items = Item::where('car_id', $id)
            ->get();
        $car = Car::find($id);
        $car->user_id = Auth::user()->id;
        $car_equipment = DB::Table('cars')->where('id', $id)->value('car_equipment');
        $car_observations = DB::Table('cars')->where('id', $id)->value('car_observations');
        return view('car.editcar', compact('car', 'car_equipment', 'car_observations', 'items'));
    }

    public function updateCar(Request $request, $id)
    {
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

        if ($request->hasFile('photoMain')) {
            $oldFileMain = DB::Table('cars')
                ->where('id', $id)
                ->value('car_photo_main');

            if (Storage::exists('/media/' . $oldFileMain)) {
                unlink(public_path('/media/' . $oldFileMain));
            }

            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $extension = $request->file('photoMain')->getClientOriginalExtension();
            if (in_array($extension, $allowedfileExtension)) {
                $request->photoMain->storeAs('public/media', $numberPlate . '0.' . $extension);

                // compress image

                Image::open('storage/media/' . $numberPlate . '0.' . $extension)
                    ->scaleResize(1000, 800)
                    ->save('storage/media/' . $numberPlate . '0' . 'sm.' . $extension);

                if (Storage::exists('/media/' . $numberPlate . '0.' . $extension)) {
                    unlink(public_path('storage/media/' . $numberPlate . '0.' . $extension));
                }

                // end

                $car->car_photo_main = $numberPlate . '0' . 'sm.' . $extension;
            } else {
                redirect()
                    ->back()
                    ->withErrors('La extensión de las imagenes no está permitida.');
            }
        }
        $car->update();

        if ($request->hasFile('photos')) {

            $oldFiles = DB::Table('items')
                ->where('car_id', $id)
                ->select('filename')
                ->get();

            $result = 0;

            foreach ($oldFiles as $oldFile) {
                $result++;
            }

            $images = [];

            foreach ($request->photos as  $item) {

                $allowedfileExtension = ['jpg', 'png', 'jpeg'];
                $extension = $item->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    $result += 1;
                    $item->storeAs('public/media', $numberPlate . $result . '.' . $extension);
                    $path = $item->storeAs('public/media', $numberPlate . $result . 'sm.' . $extension);
                    $images[] = new Item([
                        'filename' => $path,
                    ]);

                    Image::open('storage/media/' . $numberPlate . $result . '.' . $extension)
                        ->scaleResize(1000, 800)
                        ->save('storage/media/' . $numberPlate . $result . 'sm.' . $extension);

                    Storage::disk('public')->delete('/media/' . $numberPlate . $result . '.' . $extension);
                } else {
                    redirect()
                        ->back()
                        ->withErrors('La extensión de las imagenes no está permitida.');
                }
            }
            $car->items()->saveMany($images);
        }

        return redirect()
            ->back();
    }

    public function showimages($id)
    {
        $car = Car::find($id);
        $items = Item::where('car_id', $id)
            ->get();

        return view('image.showImages', compact('car', 'items'));
    }

    public function editimage($idorfilename)
    {
        if (ctype_digit($idorfilename)) {
            $item = Item::where('idItem', $idorfilename)
                ->get();
            $item = $item[0];
            $car = "";
        } else {
            $car = Car::where('car_photo_main', $idorfilename)
                ->get();
            $car = $car[0];
            $item = "";
        }
        return view('image.edit', compact('car', 'item'));
    }

    public function deleteCar($id)
    {
        $oldFileMain = DB::Table('cars')
            ->where('id', $id)
            ->value('car_photo_main');
        if (Storage::exists('storage/media/' . $oldFileMain)) {
            Storage::delete('storage/media/' . $oldFileMain);
        }

        $oldFiles = DB::Table('items')
            ->select('filename')
            ->where('car_id', $id)
            ->get();
        foreach ($oldFiles as $oldFile) {
            $search = 'public/media/';
            $oldFile = str_replace($search, '', $oldFile->filename);
            if (Storage::exists('storage/media/' . $oldFile)) {
                Storage::delete('storage/media/' . $oldFile);
            }
        }

        $deleted = Item::where('car_id', $id)->delete();
        if ($deleted >= 0) {
            $deleted = Car::where('id', $id)->delete();
            if ($deleted >= 0) {
                return redirect()
                    ->back()
                    ->withSuccess("El anuncio se ha eliminado correctamente");
            } else {
                return redirect()
                    ->back()
                    ->withSuccess("Han habido errores al intentar eliminar el anuncio");
            }
        } else {
            return redirect()
                ->back()
                ->withSuccess("Han habido errores al intentar eliminar el anuncio");
        }
    }

    public function deleteImgMain($id)
    {
        $oldFile = DB::Table('cars')
            ->where('id', $id)
            ->get();

        $path = 'storage/media/' . $oldFile[0]->car_photo_main;
        if (Storage::exists($path)) {
            Storage::delete($path);

            $car = Car::find($id);
            $car->car_photo_main = null;
            $deleted = $car->update();


            if ($deleted) {
                return redirect()
                    ->back()
                    ->withSuccess("Se ha eliminado correctamente la foto");
            } else {
                return redirect()
                    ->back()
                    ->withErrors("Ha habido un error al intentar eliminar la foto");
            }
        }
    }

    public function deleteImg($id)
    {
        $oldFile = DB::Table('items')
            ->where('idItem', $id)
            ->get();

        $oldFile = (str_replace('public/media/', '', $oldFile[0]->filename));

        $path = 'storage/media/' . $oldFile;
        if (Storage::exists($path)) {
            Storage::delete($path);

            $deleted = Item::where('idItem', $id)
                ->delete();
            if ($deleted) {
                return redirect()
                    ->back()
                    ->withSuccess("Se ha eliminado correctamente la foto");
            } else {
                return redirect()
                    ->back()
                    ->withErrors("Ha habido un error al intentar eliminar la foto");
            }
        }
    }
}
