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

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc" style="color: green;"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o" style="color: black;"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection