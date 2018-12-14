@extends('layouts.manage')


@section('content')
	<div class="x_panel">
              <div class="x_title">
                <h2>Add New Permission</h2>
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


                
                <div class="col-md-8 center-margin">
                  <form action="{{route('permission.store')}}" method="post" class="form-horizontal form-label-left">
                  	{{csrf_field()}}
                    <div class="form-group">
                      <label>permission Name</label>
                      <input type="text" name="name" class="form-control" placeholder="example: add_users">
                    </div>
                    <div class="form-group">
                      <label>permission Description</label>
                      <input type="text" name="label" class="form-control" placeholder="Details of permission">
                    </div>
                    
					<button type="submit" class="btn btn-success">Add Permission</button>
					<button onclick="location.href='{{route('permission.index')}}'" type="button" class="btn btn-danger">Cancel</button>
                  </form>
                </div>

            
             
              </div>
            </div>
        <!-- /page content -->
@endsection