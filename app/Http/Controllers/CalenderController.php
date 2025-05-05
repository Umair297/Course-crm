<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CalenderController extends Controller
{
    public function index(){
        $events = Customer::all();
        return view('calender.index',compact('events'));
    }
}
