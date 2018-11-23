@extends('layouts.manage')

@section('content')

<a href="" class="btn btn-success">ADD USER</a>


                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          
                          <th style="width: 20%">User Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th style="width: 20%">#Edit</th>

                        </tr>
                      </thead>
                      <tbody>

                        @foreach($users as $user)

                        
                        <tr>
                          
                          <td>
                            {{$user->name}}
                          </td>
                          <td>
                          	{{$user->email}}
                          </td>
                          <td>Guest/Admin</td>
                          
                        
                          <td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- end project list -->

               

@endsection