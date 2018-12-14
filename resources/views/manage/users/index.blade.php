@extends('layouts.manage')

@section('dynamicCss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.dataTables.min.css')}}">
  
  
@endsection

@section('dynamicJs')


<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/buttons.print.min.js')}}"></script>

<script type="text/javascript">

  $(document).ready(function() {
    
 
    
 
    $('#userTable').DataTable( {
        
        
    } );
} );
</script>

@endsection

@section('content')
<div class="container">

    <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

<a href="{{route('user.create')}}" class="btn btn-success">ADD USER</a>

<hr>
                    <!-- start project list -->
                    <div class="table-responsive">
                    <table id="userTable" class="table table-responsive table-striped projects" class="display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th style="width: 20%">User Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>

                        </tr>
                      </thead>
                      <tbody>

                        @foreach($users as $user)

                        
                        <tr>
                          <td>{{$loop->index + 1}}</td>
                          <td>
                            {{$user->name}}
                          </td>
                          <td>
                          	{{$user->email}}
                          </td>
                          <td>
                            @foreach($user->roles as $role )
                              {{$role->name}},
                            @endforeach
                          </td>
                          
                        
                          <td>
                            
                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            
                          </td>
                          <td>
                            <form method="post" action="{{  route('user.delete' , array($user->id)) }}" id="delete-form-{{$user->id}}">
                            {{csrf_field()}} 
                            {{method_field('DELETE')}}
                          
                            </form>
                            <a href="" class="btn btn-danger btn-xs" onclick="

                            if (confirm('Are you sure, You Want to delete this?')) {
                              event.preventDefault();
                              document.getElementById('delete-form-{{$user->id}}').submit();
                            }
                              else{
                                event.preventDefault();
                              }

                            "><span class="fa fa-trash-o"></span> Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    <!-- end project list -->

                  </div> 
                </div>
              </div>
            </div>
          </div>                  

@endsection