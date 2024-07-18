<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    //

    public function home(){
        App::setlocale('en');
        $items = Item::paginate(3);
        Session::forget('Page');
        return view('home', ['items' => $items]);
    }
    
    public function home_id(){
        App::setlocale('id');
        $items = Item::paginate(3);
        Session::forget('Page');
        return view('home', ['items' => $items]);
    }

    public function search(Request $request){
        $search = $request->search;
        $items = Item::where('item_name', 'LIKE', "%$search%")->paginate(3)->appends(['search' => $search]);
        return view('home', ['items' => $items]);
    }

    public function loginPage(){
        App::setlocale('en');
        return view('login');
    }

    public function loginPage_id(){
        App::setlocale('id');
        return view('login');
    }

    public function alertPage(){
        App::setlocale('en');
        return view('alert');
    }

    public function alertPage_id(){
        App::setlocale('id');
        return view('alert');
    }

    public function registerPage(){
        App::setLocale('en');
        return view('register');
    }

    public function registerPage_id(){
        App::setLocale('id');
        return view('register');
    }
    
    public function cartPage(){
        App::setlocale('en');
        Session::forget('Page');
        $cartItems = Order::join('items', 'items.item_id', 'orders.item_id')
        ->where('user_id', Auth::user()->id)
        ->select('items.item_id AS item_id', 'item_name', 'orders.price')
        ->get();
        return view('cart', ['cartItems' => $cartItems]);
    }

    public function cartPage_id(){
        App::setlocale('id');
        Session::forget('Page');
        $cartItems = Order::join('items', 'items.item_id', 'orders.item_id')
        ->where('user_id', Auth::user()->id)
        ->select('items.item_id AS item_id', 'item_name', 'orders.price')
        ->get();
        return view('cart', ['cartItems' => $cartItems]);
    }
    
    public function profilePage(){
        App::setlocale('en');
        Session::forget('Page');
        $roles = Role::all();
        return view('profile', ['roles' => $roles]);
    }

    public function profilePage_id(){
        App::setlocale('id');
        Session::forget('Page');
        $roles = Role::all();
        return view('profile', ['roles' => $roles]);
    }

    public function detail($item_id){
        App::setlocale('en');

        $item = Item::where('item_id',$item_id)->first();
        return view('detail', ['item' => $item]);
    }

    public function detail_id($item_id){
        App::setlocale('id');

        $item = Item::where('item_id',$item_id)->first();
        return view('detail', ['item' => $item]);
    }

    public function accountMaintenancePage(){
        App::setlocale('en');
        $users = User::join('roles', 'roles.role_id', 'users.role_id')->get();
        return view('account_maintenance', ['users' => $users]);
    }

    public function accountMaintenancePage_id(){
        App::setlocale('id');
        $users = User::join('roles', 'roles.role_id', 'users.role_id')->get();
        return view('account_maintenance', ['users' => $users]);
    }

    public function updateRolePage($user_id){
        App::setlocale('en');
        $user = User::find($user_id);
        return view('update_role', ['user' => $user]);
    }

    public function updateRolePage_id($user_id){
        App::setlocale('id');
        $user = User::find($user_id);
        return view('update_role', ['user' => $user]);
    }
    
}
