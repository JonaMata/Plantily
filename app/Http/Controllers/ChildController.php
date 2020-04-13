<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use App\Plant;
use Illuminate\Support\Facades\Redirect;

class ChildController extends Controller
{
    public function index(Child $child) {
        return view('child.show', ['child' => $child]);
    }

    public function edit(Child $child) {
        return view('child.edit', ['child' => $child]);
    }

    public function store(Request $request, Child $child) {
        $child->update([
            'type' => $request->input('amount'),
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);
        return Redirect::route('plant.show', ['plant' => $child->plant]);
    }

    public function create(Request $request, Plant $plant) {
        $seed = Child::create([
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'plant_id' => $plant->id,
            ]);
        return Redirect::route('plant.show', ['plant' => $plant]);
    }
}
