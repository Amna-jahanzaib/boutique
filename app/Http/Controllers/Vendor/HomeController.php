<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product ;
use Illuminate\Http\Request;
use Auth;
use Gate;
use App\Models\Role;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        
        $products=Product::all();

        $categories=Category::all();
        return view('vendor.dashboard',compact('products','categories'));

    }
    
    public function profile()
    {
        $user=Auth::user();

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');
        return view('vendor.profile', compact('roles', 'user'));

    }

}
