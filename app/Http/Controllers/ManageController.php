<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class ManageController extends Controller
{
    public function index()
    {
    	$customers = Customer::orderBy('id', 'desc')->paginate(5);
    	return view('manage.customers.index' , compact('customers'));
    }
}
