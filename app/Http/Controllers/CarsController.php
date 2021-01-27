<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;

class CarsController extends Controller
{
    public function storeCar(Request $request) {
        $car = new Cars();
        $car->marca = $request->marca;
        $car->modelo = $request->modelo;
        $car->ano = $request->ano;
        $car->fabricacao = $request->fabricacao;
        $car->placa = $request->placa;
        $car->save();

        return $car;
    }

    public function getCars(Request $request) {
        $cars = Cars::all();

        return $cars;
    }

    public  function editCar(Request $request, $id){
        $car = Cars::where('id',$id)->first();

        $car->marca = $request->get('val_1');
        $car->modelo = $request->get('val_2');
        $car->ano = $request->get('val_3');
        $car->fabricacao = $request->get('val_4');
        $car->placa = $request->get('val_5');

        $car->save();

        return $car;
    }

    public function deleteCar(Request $request){
        $car = Cars::find($request->id)->delete();
    }
}
