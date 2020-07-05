<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Autopark;
use App\Car;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;

class AutoparkController extends Controller
{

    var $car  = [
    'name_driver'=> [],
    "number"=>[],
    "autopark"=>[],
    "id"=>[],
    ];


    var $autopark = [
        'name'=> [],
        "address"=>[],
        "schedule"=>[],
        "id"=>[],
    ];


    public  function  __construct()
    {

        $cars = Car::select(['name_driver', 'number', 'autopark', 'id'])->get();
        $autoparks = Autopark::select(['name', 'address', 'schedule', 'id'])->get();

        for ($i = 0; $i < count($cars->toArray()); $i++){
                array_push($this->car['name_driver'], $cars->toArray()[$i]['name_driver']);
                array_push($this->car['number'], $cars->toArray()[$i]['number']);
                array_push($this->car['autopark'], $cars->toArray()[$i]['autopark']);
                array_push($this->car['id'], $cars->toArray()[$i]['id']);
        }

        for ($i = 0; $i < count($autoparks->toArray()); $i++){
                array_push($this->autopark['name'], $autoparks->toArray()[$i]['name']);
                array_push($this->autopark['address'], $autoparks->toArray()[$i]['address']);
                array_push($this->autopark['schedule'], $autoparks->toArray()[$i]['schedule']);
                array_push($this->autopark['id'], $autoparks->toArray()[$i]['id']);
        }
    }



    public function autoparkList() {
        $car = Car::select(['name_driver', 'number', 'autopark'])->get();
        $CarInfo = [
            'name_driver' => [],
            'number' => [],
            'autopark' => [],
        ];

        $autoparkData = [];

        for ($i = 0; $i < count($car); $i++){
            array_push($CarInfo['name_driver'], $car[$i]->name_driver);
            array_push($CarInfo['number'], $car[$i]->number);
            array_push($CarInfo['autopark'], array("name" => explode(',', $car[$i]->autopark)));
        }

        for ($i = 0; $i < count($CarInfo['autopark']); $i++){
            for ($j = 0; $j < count($CarInfo['autopark'][$i]["name"]); $j++){
                if(in_array($CarInfo['autopark'][$i]["name"][$j], $this->autopark['name'])){
                    array_push($autoparkData,
                        array($CarInfo['autopark'][$i]["name"][$j] => ['name_driver' => $CarInfo['name_driver'][$i], 'number' => $CarInfo['number'][$i]]));
                }

            }

        }
        return view('autoparksReference', ['autoparkData' => $autoparkData, 'autopark' => $this->autopark]);

    }


    public function autoparkCreatePage(){
        return view('autoparkCreate');
    }


    public function autoparkCreate(Request $request) {
        session(['nameAutopark' => $request->nameAutopark]);
        session(['address' => $request->address]);
        session(['schedule' => $request->schedule]);
        session(['name_driver' => $request->driverName]);
        session(['number' => $request->numberCar]);

        $car = NULL;

        $this->validate($request, [
            "nameAutopark" => 'required|max:255|min:5|unique:autoparks,name',
            "address" => 'required|max:255',
            "schedule" => 'required|max:255',
            "numberCar.*" => ['required', 'string'],
            "driverName.*" => ['required', 'string'],
        ]);
        DB::insert('insert into autoparks ( name, address, schedule, car) values (?, ?, ?, ?)', [$request->nameAutopark, $request->address, $request->schedule, $request->numberCar[0]]);

        for($i = 0; $i < count($request->driverName); $i++){
            $car = DB::select('select * from cars where name_driver = :name_driver and number = :number', ['name_driver' => $request->driverName[$i], 'number' => $request->numberCar[$i]]);
            if(count($car) > 0){
                $new_str = $car[0]->autopark;
                $new_str = $new_str . ',' .(string)$request->nameAutopark;
                $array = explode(',', $new_str);
                $data = array(
                    'id' => $car[0]->id,
                    'name_driver' => $car[0]->name_driver,
                    'number' => $car[0]->number,
                    'id_user' => $car[0]->id_user,
                    'autopark' => $new_str,
                    'published_at' => $car[0]->published_at,
                    'created_at' => $car[0]->created_at,
                    'updated_at' => $car[0]->updated_at,
                );
                DB::table('cars')->where(['name_driver' => $request->driverName[$i], 'number' => $request->numberCar[$i]])->update($data);

            }else{
                DB::insert('insert into cars ( name_driver, number, id_user, autopark) values (?, ?, ?, ?)', [$request->driverName[$i], $request->numberCar[$i], Auth::user()->id, (string)$request->nameAutopark]);
            }
        }
        return  redirect()->route('autoparksReference');

    }


    public function autoparkEditingPage(){
        $cars = Car::select(['name_driver', 'number', 'autopark', 'id'])->get();
        $autoparks = Autopark::select(['name', 'address', 'schedule', 'id'])->get();
        return view('autoparkEditing', ['cars' => $cars, 'autoparks' => $autoparks,'carName' => $this->car,'nameAutopark'=> $this->autopark]);
    }


    public function autoparkEditing(Request $request){
        DB::update('update autoparks set name = ?, address = ?, schedule = ? where id = ?', [$request->nameAutopark, $request->address, $request->schedule, $request->id]);
        $cars = Car::select(['name_driver', 'number', 'autopark', 'id'])->get();
        $autoparks = Autopark::select(['name', 'address', 'schedule', 'id'])->get();
        return view('autoparkEditing', ['cars' => $cars, 'autoparks' => $autoparks,'carName' => $this->car,'nameAutopark'=> $this->autopark]);
    }


    public function autoparkDelete(Request $request){
        DB::table('autoparks')->where('id', $request->id)->delete();
    }
}
