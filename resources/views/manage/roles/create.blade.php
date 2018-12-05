@extends('layouts.manage')


@section('content')
	<div class="x_panel">
              <div class="x_title">
                <h2>Create New Role </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />


                <h4>Skuuni Role</h4>
                
                <div class="col-md-8 center-margin">
                  <form action="{{route('role.store')}}" method="post" class="form-horizontal form-label-left">
                  	{{csrf_field()}}
                    <div class="form-group">
                      <label>Role Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Role Title">
                    </div>
                    <div class="form-group">
                      <label>Role Description</label>
                      <input type="text" name="label" class="form-control" placeholder="Details of role">
                    </div>
        
                  <div class="row">

                    <div class="col-md-6">
                      <label for="skuuni">Permissions</label>
                      @foreach($permissions as $permission)
                        <div class="checkbox">
                        <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                      </div>
                      @endforeach
                    </div>
                    
                    </div>

          <div class="form-group co-lg-12">
          <button type="submit" class="btn btn-success">Add Role</button>
          <button onclick="location.href='{{route('role.index')}}'" type="button" class="btn btn-danger">Cancel</button>
          </div>
					
                  </form>
                </div>

            
             
              </div>
            </div>
        <!-- /page content -->
@endsection