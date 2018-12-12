@extends('layouts.manage')


@section('content')
	<!-- page content -->
        <div class="" role="main">
          <div class="">
            <div class="row top_tiles">


            @can('read_user_button')  
              <a href="{{route('user.index')}}">
            @endcan
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user" style="color: red;"></i></div>
                  <div class="count">{{$users}}</div>
                  <h3>Registered Users</h3>
                  <p>Total Number of Users</p>
                </div>
              </div>
              </a>
              
              <a href="{{route('customer.index')}}">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users" style="color: gold;"></i></div>
                  <div class="count">{{ $customers }}</div>
                  <h3>Skuuni Customers</h3>
                  <p>Total Number of Customers.</p>
                </div>
              </div>
            </a>
            
            @can('read_roles_permission_button')  
            <a href="{{route('role.index')}}">
            @endcan
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-cogs" style="color: green;"></i></div>
                  <div class="count">{{$roles}}</div>
                  <h3>Roles</h3>
                  <p>Total Category of Users</p>
                </div>
              </div>
            </a>
            
            @can('read_roles_permission_button') 
            <a href="{{route('permission.index')}}">
            @endcan
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o" style="color: black;"></i></div>
                  <div class="count">{{$permissions}}</div>
                  <h3>Permissions</h3>
                  <p>Total Permissions Accessible to Users</p>
                </div>
              </div>
            </a>
            </div>
        </div>
    </div>
@endsection