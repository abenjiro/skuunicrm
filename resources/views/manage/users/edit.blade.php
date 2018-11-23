@extends('layouts.manage')

@section('dynamicJs')
	
	
@endsection

@section('content')
	<h1>Edit user</h1>
	<div class="row">
                <form class="bs-example form-horizontal" method="POST" action="{{route('user.update', $users->id)}}">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
              <div class="col-sm-6" >
                
              <section class="panel panel-default">
                    <header class="panel-heading font-bold">Horizontal form</header>
                    <div class="panel-body" >
                      

                        <div class="form-group">
                          <label class="col-lg-2 control-label">Name</label>
                          <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$users->name}}">
                            <span class="help-block m-b-none">Example block-level help text here.</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$users->email}}">
                            <span class="help-block m-b-none">Example block-level help text here.</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Password</label>
                          <div class="col-lg-10" >
                          <!-- radio -->
                            <div class="radio">
                              <label class="radio-custom">
                                <input type="radio" name="radio" v-model="password_options" class="radioBtn"  value="keep" checked="checked">
                                <i class="fa fa-circle-o"></i>
                                Do Not Change Password
                              </label>
                            </div>
                            <div class="radio">
                              <label class="radio-custom">
                                <input type="radio" name="radio" v-model="password_options" class="radioBtn" value="auto">
                                <i class="fa fa-circle-o"></i>
                                Auto-Generate New Password
                              </label>
                            </div>
                            <div class="radio">
                              <label class="radio-custom">
                                <input type="radio" name="radio" v-model="password_options" class="radioBtn" value="manual">
                                <i class="fa fa-circle-o"></i>
                                Manually Set New Password
                              </label>
                            </div>

                            <div class="">
                            <input type="password" name="password" v-if="password_options == 'manual'" class="form-control" id="password"  placeholder="Manually give Password to this User" >
                          </div>
                          </div>
                        </div>
                        
                        
                      
                    </div>
                  </section>
                
                  </div>

            
            <div class="col-sm-6 ">
              
              <!-- .comment-list -->
                 
                    <article id="comment-id-1" class="comment-item">
                      
                      <span class="arrow left"></span>
                      <section class="comment-body panel panel-default">
                        <header class="panel-heading bg-white">
                          <a href="#"><h2>Roles:</h2></a>
                          <label class="label bg-info m-l-xs"></label> 
                        </header>
                        
                        <div class="panel-body">
                          <label for="roles"></label>
                          <input type="hidden" name="roles" :value="rolesSelected">
                          
                            @foreach($roles as $role)
                              
                              <div class="checkbox">
                                <input type="checkbox" v-model="rolesSelected" value="{{$role->id}}" id="{{$role->id}}" name="rolesSelected">{{$role->name}} <em><small>({{$role->label}})</small></em>

                              </div>

                            @endforeach
                          
                          
                        </div>
                      </section>
                    </article>
              
      </div>

      <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-sm btn-default">£dit User</button>
                          </div>
                        </div>
      
         </form>
                      
    </div>
@endsection