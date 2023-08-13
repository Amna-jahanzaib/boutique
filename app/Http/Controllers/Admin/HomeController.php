<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Message;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Auth;
use Gate;
use App\Models\Role;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;


class HomeController
{
    
    public function index()
    {
        
        $orders=Order::all();
        $payments=Payment::all();    
        $customers=User::all();
        $products=Product::all();
        return view('admin.dashboard',compact('orders','payments','customers'))->with('products',$products);

    }
    public function profile()
    {

        $user=Auth::user();

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');
        return view('admin.profile', compact('roles', 'user'));

    }


}
