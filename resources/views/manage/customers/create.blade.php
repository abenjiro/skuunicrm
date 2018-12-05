@extends('layouts.manage')

{{-- @section('dynamicCss')
	<link href="{{ asset('css/green.css') }}" rel="stylesheet">
@endsection

@section('dynamicJs')
	<script src="{{ asset('js/icheck.min.js') }}"></script>
@endsection
 --}}
@section('content')
	<div class="page-title">
              

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New Customer</h2>
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
                   
                    <form action="{{ route('customer.store') }}" method="post" class="form-horizontal form-label-left">
					{{csrf_field()}}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_name">Name of School <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="school_name" name="school_name" required="required" class="form-control col-md-7 col-xs-12" placeholder="ABC School" value="{{ old('school_name') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_person">Contact Person <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="contact_person" name="contact_person" required="required" class="form-control col-md-7 col-xs-12" placeholder="Mr./Mrs Abc Zed" value="{{ old('contact_person') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="role" class="control-label col-md-3 col-sm-3 col-xs-12">Role of Person <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="role" class="form-control col-md-7 col-xs-12" type="text" name="role" placeholder="Teacher" value="{{ old('role') }}">
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" name="phone" class="form-control col-md-7 col-xs-12" required="required" type="text" placeholder="example: 0200000208" value="{{ old('phone') }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" name="email" class="form-control col-md-7 col-xs-12" required="required" type="email"
                          placeholder="example@abc.com" value="{{ old('email') }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="isActive" class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type='hidden' value='0' name='isActive'>
                              <input type="checkbox" name="isActive" value="1" class="flat"> Checked means Active
                            </label>
                          </div>
                      </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button onclick="location.href='{{route('customer.index')}}'" type="button" class="btn btn-danger">Cancel</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

@endsection