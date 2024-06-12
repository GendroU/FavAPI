<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->get('limit');

        if ($limit) {
            return response()->json(Cars::limit($limit)->get());
        }

        return response()->json(Cars::get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'color' => 'required|string',
            'milage' => 'required|integer',
            'price' => 'required|integer',
            'fuelType' => 'required|string',
            'transmission' => 'required|string',
            'engine' => 'required|string',
            'horsepower' => 'required|integer',
            'owners' => 'required|integer',
            'image' => 'required|string',
        ]);

        $cars = Cars::create($request->all());

        return response()->json($cars);
    }

    public function show(Cars $cars)
    {
        return response()->json($cars);
    }

    public function update(Request $request, cars $cars)
    {
        $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'color' => 'required|string',
            'milage' => 'required|integer',
            'price' => 'required|integer',
            'fuelType' => 'required|string',
            'transmission' => 'required|string',
            'engine' => 'required|string',
            'horsepower' => 'required|integer',
            'owners' => 'required|integer',
            'image' => 'required|string',
        ]);

        $cars->update($request->all());

        return response()->json($cars);
    }

    public function destroy(cars $cars)
    {
        $cars->delete();

        return response()->json(['message' => 'Car deleted']);
    }

}