@extends('layouts.manage')

@section('content')
		<div class="x_panel">
              <div class="x_title">
                <h2>Edit Skuuni Role</h2>
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
                <form action="{{ route('role.update', $role->id) }}" method="post" class="form-horizontal form-label-left">
                    {{csrf_field()}} {{ method_field('PATCH') }}
             
                    <div class="form-group">
                      <label>Role Name</label>
                      <input type="text" name="name" class="form-control" value="{{$role->name}}" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label>Role Description</label>
                      <input type="text" name="label" class="form-control" value="{{$role->label}}">
                    </div>
                    <div class="row">

                    <div class="col-md-6">
                      <label for="skuuni">Permissions</label>
                      @foreach($permissions as $permission)
                        <div class="checkbox">
                        <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
							@foreach($role->permissions as $role_permit)
								@if($role_permit->id == $permission->id)
									checked="checked" 
								@endif
							@endforeach
                        	>{{$permission->name}}</label>
                      </div>
                      @endforeach
                    </div>
                    
                    </div>
                    <div class="form-group co-lg-12">
					<button type="submit" class="btn btn-success">Edit Role</button>
					<button onclick="location.href='{{route('role.index')}}'" type="button" class="btn btn-danger">Cancel</button>
					</div>
                  </form>
                </div>

            
             
              </div>
            </div>
        <!-- /page content -->
@endsection