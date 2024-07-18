<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function registerMethod(Request $request){
        $rules =[
            'first_name' => 'required|alpha:ascii|max:25',
            'last_name' => 'required|alpha:ascii|max:25',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:1, 2',
            'gender' => 'required',
            'display_picture' => 'required|image',
            'password' => ['required', 'string',
            'min:8', 'regex:/[0-9]/', 'confirmed'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $users = User::all();
        foreach ($users as $user) {
            if($request->email==$user->email){
                return back()->withErrors('Email already used, please input another email');
            }
        }

        $user = new User();

        $users = User::all();
        $counter= 1;
        foreach($users as $temp){
            $counter++;
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role_id = $request->role;
        $user->gender_id = $request->gender;
        $user->email = $request->email;

        $image = $request->file('display_picture');
        $fileName = 'dp_' . $counter . '.' .  $image->getClientOriginalExtension();
        Storage::putFileAs('public/images/display_picture/', $image, $fileName);
        $user->display_picture_link = 'images/display_picture/' . $fileName;

        $user->password = bcrypt($request->password);

        $user->save();

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        Session::put(['Page' => 'Register']);
        return redirect('/alert');
    }   
    
    
    public function loginMethod(Request $request){
        $valid = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me);
        if(!$valid){
            return redirect()->back()->withErrors('Wrong Email/Password. Please Check Again');
        }

        if($request->remember_me){
            Cookie::queue('email', $request->email);
            Cookie::queue('password', $request->password);
        }else{
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }
        Session::put(['Page' => 'Login']);

        return redirect('/alert');
    }

    public function loginMethod_id(Request $request){
        $valid = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me);
        if(!$valid){
            return redirect()->back()->withErrors('Masukan salah pada Surat Elektronik/Kata sandi. Silahkan coba lagi.');
        }

        if($request->remember_me){
            Cookie::queue('email', $request->email);
            Cookie::queue('password', $request->password);
        }else{
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }
        Session::put(['Page' => 'Login']);
        return redirect('/alert');
    }

    public function logout(){
        Auth::logout();
        Session::put(['Page' => 'Logout']);
        return redirect('/alert');
    }

    public function updateProfileMethod(Request $request){
        $rules =[
            'first_name' => 'required|alpha:ascii|max:25',
            'last_name' => 'required|alpha:ascii|max:25',
            'email' => 'required|email',
            'gender' => 'required',
            'display_picture' => 'required|image',
            'password' => ['required', 'string',
            'min:8', 'regex:/[0-9]/', 'confirmed'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $counter= 1;

        $users = User::all();
        foreach ($users as $user) {
            if($request->email==$user->email && Auth::user()->email != $request->email){
                return back()->withErrors('Email already used, please input another email');
            }
            $counter++;
        }

        $user = User::find(Auth::user()->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender_id = $request->gender;
        $user->email = $request->email;

        $image = $request->file('display_picture');
        $fileName = 'dp_' . $counter . '.' .  $image->getClientOriginalExtension();
        Storage::delete('public/'.Auth::user()->display_picture_link);
        Storage::putFileAs('public/images/display_picture/', $image, $fileName);
        $user->display_picture_link = 'images/display_picture/' . $fileName;

        $user->password = bcrypt($request->password);

        $user->save();

        Session::put(['Page' => 'Profile']);
        return redirect('/alert');
    }

    public function deleteUserMethod($user_id, $flag){
        if($user_id == Auth::user()->id && $flag==0){
            Session::put(['Page' => 'ValidateOwnAccountDelete']);
            return redirect('/alert');
        }

        else if($user_id == Auth::user()->id && $flag==1){
            Auth::logout();

            $user = User::find($user_id);
            Storage::delete('public/'.$user->display_picture_link);
            $user->delete();

            Session::put(['Page' => 'LogoutDelete']);
            return redirect('/alert');
        }

        $user = User::find($user_id);
        Storage::delete('public/'.$user->display_picture_link);
        $user->delete();
        Session::put(['Page' => 'DeleteUser']);
        return redirect('/alert');
        
    }
    
    public function updateRoleMethod(Request $request, $user_id){
        $rules =[
            'role' => 'required|in:1, 2',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find($user_id);
        $user->role_id = $request->role;
        $user->save();

        Session::put(['Page' => 'UpdateRole']);
        return redirect('/alert');
    }
}
