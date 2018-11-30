<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;

class ManageController extends Controller
{
    public function index()
    {
    	$customers = Customer::all()->count();
    	$users = User::all()->count();
    	
    	return view('manage.dashboard', compact('customers','users'));
    }
}
