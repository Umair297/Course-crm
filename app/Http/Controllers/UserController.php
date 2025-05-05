<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        
        return view('user.index',compact('users'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function save(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user-management');
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
       $user->save();
       return redirect()->back();
    }
    
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
 

}