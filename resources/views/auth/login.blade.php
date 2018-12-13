@extends('layouts.app')

@section('content')
<a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="{{asset('img/skuuni.png')}}">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('warning'))
                <div class="alert alert-warning">
                    {{session('warning')}}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
              <h1>Login Form</h1>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 <label for="email" class="control-label pull-left">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label pull-left">Password</label>
                <input id="password" type="password" class="form-control" name="password" required />
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                
                <a class="btn btn-link" href="{{ route('password.request') }}">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SKUUNI!</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
    </div>
@endsection

