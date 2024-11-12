<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('status', 1)->count();
        $equipo = Product::where('status', 1)->count();
        $listos = Product::where('status', 0)->count();
        return view('components.dashboard', compact('users', 'equipo', 'listos'));
    }
}
