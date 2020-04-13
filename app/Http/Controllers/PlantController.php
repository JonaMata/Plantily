<?php

namespace App\Http\Controllers;

use App\Family;
use App\Genus;
use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{

    public function list() {
        $plants = Auth::user()->plants;
        return view('plant.list', ['plants' => $plants]);
    }

    public function show($plant) {
        return view('plant.show', ['plant' => $plant]);
    }

    public function add() {
        return view('plant.add');
    }

    public function create(Request $request) {
        $family = Family::firstOrCreate([
            'name' => $request->input('family'),
            'description' => '',
        ]);
        $family->save();

        $genus = Genus::firstorCreate([
            'name' => $request->input('genus'),
            'description' => '',
            'family_id' => $family->id,
        ]);
        $genus->save();

        Plant::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'user_id' => Auth::user()->id,
            'genus_id' => $genus->id,
            'birth' => $request->input('birth'),
            'description' => $request->input('description'),
        ]);
        return redirect(route('plant.list'));
    }
}
