<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Role;
use App\Permission;

class ManageController extends Controller
{
    public function index()
    {
    	$customers = Customer::all()->count();
    	$users = User::all()->count();
    	$roles = Role::all()->count();
    	$permissions = Permission::all()->count();
    	
    	return view('manage.dashboard', compact('customers','users','roles','permissions'));
    }
}
