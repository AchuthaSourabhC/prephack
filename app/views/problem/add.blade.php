@extends('home.base')

@section('content')


{{ Form::open(array('url' => 'problem/add', 'method' => 'POST', 'role' => 'form')) }}
            
        <div class="row">
            <div class="error">{{ $errors->first('title') }}</div>
            <div class="col-md-4 form-group">
              <p> {{ Form::text('title', Input::old('title'),  array( 'class' => "grid form-control ",'placeholder'=>'Problem Title')) }}</p>
            </div>
        </div>
          <div class="error">{{ $errors->first('topic_id') }}</div>
            <div class="row">
                <div class="col-md-4 form-group">
                  <p> {{Form::select('topic_id', $data, $default, array('class'=>'grid-drop form-control ')) }}
                     </div>
                    <div class="col-md-4 form-group">
                  <p> {{ Form::text('source', Input::old('output'),  array( 'class' => "grid form-control ",'placeholder'=>'Problem Author')) }}</p>
                   </div>
                  <div class="col-md-4 form-group">
                <p>{{ Form::submit('Add Problem', array( 'class' => "btn btn-primary col-md-4")) }}</p>
                </div>
            </div>
        
            <div class="form-group">
                <div class="error">{{ $errors->first('body') }}</div>
            <!-- username field -->
            <p> {{ Form::textarea('body', Input::old('body'),  array('class' => "grid form-control",'placeholder'=>'Problem Statement')) }}</p>
            </div>
            <!-- password field -->
           <div class="row">
                <div class="col-md-6 form-group">
                <!-- username field -->
                <p> {{ Form::textarea('input', Input::old('input'),  array('rows' =>'7', 'class' => "grid form-control",'placeholder'=>'Sample Input')) }}</p>
                </div>

                <div class="col-md-6 form-group">
                <!-- username field -->
                <p> {{ Form::textarea('output', Input::old('output'),  array('rows' =>'7', 'class' => "grid form-control ",'placeholder'=>'Sample Output')) }}</p>
                </div>
            </div>

         {{ Form::close() }} 
        

@stop