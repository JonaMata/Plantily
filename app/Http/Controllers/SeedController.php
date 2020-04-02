<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seed;
use App\Plant;
use Illuminate\Support\Facades\Redirect;

class SeedController extends Controller
{
    public function index(Seed $seed) {
        return view('seed.show', ['seed' => $seed]);
    }

    public function edit(Seed $seed) {
        return view('seed.edit', ['seed' => $seed]);
    }

    public function store(Request $request, Seed $seed) {
        $seed->update([
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);
        return Redirect::route('plant.show', ['plant' => $seed->plant]);
    }

    public function create(Request $request, Plant $plant) {
        $seed = Seed::create([
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'plant_id' => $plant->id,
            ]);
        return Redirect::route('plant.show', ['plant' => $plant]);
    }
}
