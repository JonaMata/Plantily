<?php

namespace App\Http\Controllers;

use App\Child;
use App\ShopItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function index()
    {
        $children = Child::all();
        $shopItems = ShopItem::all();
        return view('shop.index', ['children' => $children, 'shopItems' => $shopItems]);
    }

    public function add() {
        return view('shop.add');
    }

    public function create(Request $request) {
        ShopItem::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);
        return Redirect::route('shop.index');
    }
}
