<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Family;

class JsonController extends Controller
{
    public function families() {
        $families = Family::all()->pluck('name')->toJson();
        return response()->json($families);
    }

    public function genera(Request $request) {
        $family = Family::where('name', $request->input('family'))->firstOrFail();
        $genera = $family->genera()->pluck('name')->toJson();
        return response()->json($genera);
    }
}
