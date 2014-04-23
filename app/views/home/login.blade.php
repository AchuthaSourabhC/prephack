@extends('home.base')


@section('content')
<div class='grid row'>
    <div class='col-md-5'>
        <h3>Login: </h3>
        {{ Form::open(array('url' => 'login', 'method' => 'POST', 'role' => 'form')) }}
            @if (Session::has('new'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfully Registered !</strong> PLease Login to continue.
            </div>
            @endif
            <!-- check for login errors flash var -->
            @if (Session::has('login_errors'))
                <span class="error">email or password incorrect.</span>
            @endif
            <div class="form-group">
            <!-- username field -->
            <p> {{ Form::text('email', Input::old('email'),  array('class' => "grid form-control",'placeholder'=>'Email')) }}</p>
            </div>
            <!-- password field -->
            <div class="form-group">
            <p> {{ Form::password('password', array('class' => "grid form-control", 'placeholder'=>'Password')) }}</p>
            </div>
            <!-- submit button -->
            <p>{{ Form::submit('Login', array('class' => "btn btn-primary")) }}</p>
        {{ Form::close() }} 
        
    </div>  

    <div class='col-md-7'>
    <h3>Register: </h3>
    {{ Form::open(array('url' => 'register', 'method' => 'POST', 'role' => 'form')) }}
            
               
                @if (Session::has('errors'))
                    <span class="error">Sorry :( Some Kind of error happened</span>
                @endif
                
                 <div class="error">{{ $errors->first('username') }}</div>
                <p>{{ Form::text('username', Input::old('username'), array('class'=>'grid form-control', 'placeholder'=>'Username')) }}</p>

        
                 <div class="error">{{ $errors->first('email') }}</div>
                <p>{{ Form::text('email', Input::old('email'), array('class'=>'grid form-control', 'placeholder'=>'Email')) }}</p>
                
                <div class="error">{{ $errors->first('password') }}</div>
                <p>{{ Form::password('password', array('class'=>'grid form-control', 'placeholder'=>'Password')) }}</p>
                
                <p>{{ Form::password('password_confirmation', array('class'=>'grid form-control', 'placeholder'=>'Confirm Password')) }}</p>
                  
                <p>{{ Form::submit('Register', array('class' => "btn btn-primary")) }}</p>
            
        </div>
    {{ Form::close() }}
    </div>
</div> 

 @endsection