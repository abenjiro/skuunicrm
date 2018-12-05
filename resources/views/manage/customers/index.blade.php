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
{{-- <script type="text/javascript" src="http://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script> --}}

<script type="text/javascript">

  $(document).ready(function() {
    var printCounter = 0;
 
    
 
    $('#customerTable').DataTable( {
        "scrollX": true,
        responsive: true,
        dom: 'lBfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                title: 'SKUUNI CUSTOMER DATA',
                messageTop: 'LIST OF ALL SKUUNI CUSTOMERS',
                exportOptions: {
                  columns: ':not(.notexport)'
        }
            },
            {
                extend: 'pdf',
                title: 'SKUUNI CUSTOMER DATA',
                messageBottom: null,
                exportOptions: {
                  columns: ':not(.notexport)'
        }
            },
            {
                extend: 'print',
                title: 'SKUUNI CUSTOMER DATA',
                // messageTop: function () {
                //     printCounter++;
 
                //     if ( printCounter === 1 ) {
                //         return 'This is the first time you have printed this document.';
                //     }
                //     else {
                //         return 'You have printed this document '+printCounter+' times';
                //     }
                // },
                messageBottom: null,
                exportOptions: {
                  columns: ':not(.notexport)'
        }
            }
        ]
    } );
} );
</script>

@endsection

@section('content')
      

	<div class="container">
	 
          @can('create_customers')          
          <a href="{{route('customer.create')}}" class="btn btn-success">ADD CUSTOMER</a>
          @endcan
                       
                 
                      	
                    
              

                
                
                  <table id="customerTable" class="table table-striped table-bordered table-responsive table-hover" class="display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name Of School</th>
                          <th>Contact Person</th>
                          <th>Role</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Status</th>
                          @can('edit_customers')
                          <th class="notexport">Edit</th>
                         @endcan
                         @can('delete_customers')
                          <th class="notexport">Delete</th>
                         @endcan
                        </tr>
                      </thead>

          <tbody>
                      @foreach($customers as $customer)
                        
                      
                      
                        <tr>
                          <td>{{$loop->index + 1}}</td>
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
                            
                          <form method="post" action="{{  route('customer.delete' , array($customer->id)) }}" id="delete-form-{{$customer->id}}">
                            {{csrf_field()}} 
                            {{method_field('DELETE')}}
                          
                            </form>
                            <a href="" class="btn btn-danger btn-xs" onclick="

                            if (confirm('Are you sure, You Want to delete this?')) {
                              event.preventDefault();
                              document.getElementById('delete-form-{{$customer->id}}').submit();
                            }
                              else{
                                event.preventDefault();
                              }

                            "><span class="fa fa-trash-o"></span></a> 

                          </td>
                        @endcan
                        </tr>
                    
                      @endforeach
                        </tbody>
                    </table>


                  </div>
   



@endsection