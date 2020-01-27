@extends('layouts.layouts_login')

@section('content')
    <section class="login-content">
        <div class="logo">
            {{--
            <img class="img-responsive" width="620px" height="480px" src={{ asset('images/monitor.png') }}>
            --}}
            <h1>Agence</h1>
        </div>
        <br>

        <div class="login-box">
            
            
            {{Form::open(['route'=>'login.store','method'=>'POST','id'=>'LoginUsr', 'class'=>'login-form'])}}
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            
            <div class="form-group{{ $errors->has('no_email') ? ' has-error' : '' }}">
                <label class="control-label">Correo Electronico</label>
                {!! Form::email('no_email',null,['class'=>'form-control','id'=>'email','placeholder'=>'Email', 'required' => 'true', 'autofocus' => 'true'])!!}
                
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('no_email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>
                {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'Password', 'required' => 'true', 'autofocus' => 'true'])!!}
                
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <!--div class="form-group">
                <div class="utility">
                <div class="animated-checkbox">
                    <label>
                    <input type="checkbox"><span class="label-text">Stay Signed in</span>
                    </label>
                </div>
                <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvido su Password ?</a></p>
                </div>
            </div-->
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" ><i class="fa fa-sign-in fa-lg fa-fw"></i>Enviar</button>
            </div>
            {{Form::close()}}
            <!--form class="forget-form" action="index.html">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" placeholder="Email">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
            </form-->
        </div>
    </section>
@endsection