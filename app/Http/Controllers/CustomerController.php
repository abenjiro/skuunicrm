<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Customer;
use Auth;
use Datatables;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('manage.customers.index', compact('customers'));
    }

    public function create()
    {
    	return view('manage.customers.create');
    }

 

    public function store(Request $request)
    {
    	$this->validate($request,[
            'school_name' => 'required',
            'contact_person' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'email' => 'required',

        ]);

        $customer = new Customer;
        $customer->user_id = Auth::user()->id;
        $customer->school_name = $request->school_name;
        $customer->contact_person = $request->contact_person;
        $customer->role = $request->role;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->isActive = $request->isActive;


        $customer->save();

        $request->session()->flash('success', 'customer was successfully saved');

        return redirect()->route('customer.index');
    }


     public function edit($id)
    {
        //
        $customer = Customer::find($id);
        return view('manage.customers.edit', compact('customer'));
    }

     public function update(Request $request, $id)
    {
       // $this->authorize('update',  $customer);
        //validate data
        $this->validate($request, [
            'school_name' => 'required',
            'contact_person' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        //save the data
        $customer = Customer::find($id);

        $customer->school_name = $request->input('school_name');
        $customer->contact_person = $request->input('contact_person');
        $customer->role = $request->input('role');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->isActive = $request->input('isActive');

        $customer->save();
        //set flash
        $request->session()->flash('success', 'Customer updated');
        //redirect
        return redirect()->route('customer.index');
    }


    public function destroy(Request $request, $id)
    {

    //$this->authorize(ability: 'update', arguments: $customer);

    $customer = Customer::find($id);
    
    $customer->delete();
        
    $request->session()->flash('success', 'Customer deleted');

    return redirect()->route('customer.index');
    }

}
