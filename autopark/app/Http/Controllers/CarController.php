<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AutoparkController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Car;
use App\Autopark;


class CarController extends Controller
{
    public function CarsList() {
        if(Auth::user()->id != NULL)
        {
            $cars = Car::select(['name_driver', 'number', 'autopark'])
            ->where('id_user', '=', Auth::user()->id)
            ->get();

            return view('carsReference', ['cars' => $cars]);
        }

    }


    public function CarCreate(Request $request) {
        if($request->isMethod('get')) {
            return view('carCreate');
        }

        if($request->isMethod('post')) {

            $this->validate($request, [
                "numberCar" => 'required|string',
                "driverName" => 'required|string',
            ]);

            DB::insert('insert into cars (name_driver, number, id_user, autopark) values (?, ?, ?, ?)', [$request->driverName, $request->numberCar, Auth::user()->id, ""]);
            return  redirect()->route('carsReference');
        }
    }


    public function carEditingPage(Request $request) {
        $cars = Car::select(['name_driver', 'number', 'id'])
            ->where('id_user', '=', Auth::user()->id)
            ->get();
        return view('/carEditing', ['cars' => $cars]);
    }


    public function carEditing(Request $request) {
        DB::update('update cars set name_driver = ?, number = ? where id = ?', [$request->driverName , $request->numberCar , $request->id]);

        return  redirect()->route('carsReference');
    }


    public function BindingCarsPage(Request $request) {
        $cars = Car::select(['name_driver', 'number', 'autopark', 'id'])->get();
        $autoparks = Autopark::select(['name', 'address', 'schedule', 'id'])->get();
        $infocar = [
            "name_driver" => [],
            "autopark" => [],
            "number" => [],
            "id" => [],
        ];
        $nameAutopark = [];
        for ($i = 0; $i < count($cars); $i++)
        {

            array_push($infocar["name_driver"], $cars[$i]->name_driver);
            array_push($infocar["autopark"], $cars[$i]->autopark);
            array_push($infocar["number"], $cars[$i]->number);
            array_push($infocar["id"], $cars[$i]->id);
        }

        for ($i = 0; $i < count($autoparks); $i++)
        {
            array_push($nameAutopark, $autoparks[$i]['name']);
        }

        return view('BindingCars',
            ['AllDataCar' => $cars,
                'AllDataAutopark' => $autoparks,
                'ListNameAutopark' => $nameAutopark,
                'infoCar' => $infocar
            ]);

    }

    public function BindingCars(Request $request) {
        $string = implode(',', $request->selectAutopark);
        DB::update('update cars set autopark = ? where id = ?', [$string, $request->idCars]);
        return view('BindingCars');
    }

}
