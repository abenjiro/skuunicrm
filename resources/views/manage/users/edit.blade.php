@extends('layouts.manage')

@section('dynamicJs')
	<script type="text/javascript">
    $(document).ready(function(){
    $(".radioBtn").change(function(){
      $("#password").attr("disabled", true);
      // alert($("input[name=radio]:checked").val())
      if ($("input[name=radio]:checked").val() == "manual") {
        $("#password").attr("disabled", false);
      }
    });
  });
  </script>
	
@endsection

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Registered User</div>

                <div class="panel-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post" class="form-horizontal form-label-left">
                    {{csrf_field()}} {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="@if(old('name')){{ old('name')}}@else{{$user->name}}@endif" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="@if(old('email')){{ old('email')}}@else{{$user->email}}@endif" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                          <label class="col-md-4 control-label">Password</label>
                          <div class="col-md-6" >
                          <!-- radio -->
                            {{-- <div class="radio">
                              <label class="radio-custom">
                                <input type="radio" name="radio"  class="radioBtn"  value="keep" checked="checked">
                                <i class=""></i>
                                Do Not Change Password
                              </label>
                            </div>
                            <div class="radio">
                              <label class="radio-custom">
                                <input type="radio" name="radio"  class="radioBtn" value="auto">
                                <i class=""></i>
                                Auto-Generate New Password
                              </label>
                            </div> --}}
                            <div class="radio">
                              <label class="radio-custom">
                                <input type="radio" name="radio"  class="radioBtn" value="manual" checked>
                                <i class=""></i>
                                Manually Set New Password
                              </label>
                            </div>

                            <div class="">
                            <input type="password" name="password"  class="form-control" id="password"  placeholder="Manually give Password to this User" >
                          </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Assign Role</label>

                            <div class="form-group col-md-3">

                            @foreach($roles as $role)
                                <div class="">
                                   <div class="radio">
                                       <label><input type="radio" name="role" value="{{$role->id}}"
                                      @foreach($user->roles as $user_role)
                                        @if($user_role->id == $role->id)
                                        checked 
                                        @endif
                                      @endforeach>{{$role->name}}</label>
                                   </div> 
                                </div>
                            @endforeach
        
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>


                            <button onclick="location.href='{{route('user.index')}}'" type="button"  class="btn btn-danger">Cancel</button>


                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection