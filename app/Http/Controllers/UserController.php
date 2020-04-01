<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user = null) {
        if($user == null) $user = Auth::user() ? Auth::user() : abort(404);
        return view('user.index', ['user' => $user]);
    }
}
