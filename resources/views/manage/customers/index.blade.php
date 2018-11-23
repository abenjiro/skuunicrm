@extends('layouts.manage')

@section('dynamicCss')
	<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
  
@endsection

@section('dynamicJs')




<script src="{{ asset('js/datatables.min.js') }}"></script>

@endsection

@section('content')
      

	<div class="container">
	 
                        @can('create_customers')
                      	<a href="{{route('customer.create')}}" class="btn btn-success">ADD CUSTOMER</a>
                        @endcan
                 
                      	
                    
              


                    
                  <table id="datatable-buttons" class="table table-striped table-bordered table-responsive table-hover">
                      <thead>
                        <tr>
                          <th>Name Of School</th>
                          <th>Contact Person</th>
                          <th>Role</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Current Status</th>
                          @can('edit_customers')
                          <th>Edit</th>
                          @endcan
                          @can('delete_customers')
                          <th>Delete</th>
                          @endcan
                        </tr>
                      </thead>

          <tbody>
                      @foreach($customers as $customer)
                        
                      
                      
                        <tr>
                          <td>{{$customer->school_name}}</td>
                          <td>{{$customer->contact_person}}</td>
                          <td>{{$customer->role}}</td>
                          <td>{{$customer->phone}}</td>
                          <td>{{$customer->email}}</td>
                          <td>{{$customer->isActive == 1 ?"Active":"Not Active" }}</td>
                          @can('edit_customers')
                          <td>
                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
                          </td>
                          @endcan
                          @can('delete_customers')
                          <td>
                          <form method="post" action="{{  route('customer.delete' , array($customer->id)) }}">
                            {{csrf_field()}} {{method_field('DELETE')}}
                          <button type="submit" class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span></button>
                        
                            </form>
                          </td>
                         @endcan
                        </tr>
                    
                      @endforeach
                        </tbody>
                    </table>


                  </div>
   



@endsection