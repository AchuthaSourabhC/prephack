@extends('home.base')

@section('content')


{{ Form::open(array('url' => 'problem/edit/'.$prob->id, 'method' => 'POST', 'role' => 'form')) }}
            
        <div class="row">
            <div class="error">{{ $errors->first('title') }}</div>
            <div class="col-md-4 form-group">
              <p> {{ Form::text('title', $prob->title,  array( 'class' => "grid form-control ",'placeholder'=>'Problem Title')) }}</p>
            </div>
        </div>
         
            <div class="row">
                <div class="col-md-4 form-group">
                   <div class="error">{{ $errors->first('topic_id') }}</div>
                  <p> {{Form::select('topic_id', $data, $prob->topic_id, array('class'=>'grid-drop form-control ')) }}
                     </div>
                    <div class="col-md-4 form-group">
                      <div class="error">{{ $errors->first('source') }}</div>
                  <p> {{ Form::text('source', $prob->source,  array( 'class' => "grid form-control ",'placeholder'=>'Problem Source')) }}</p>
                   </div>
                  <div class="col-md-4 form-group">
                <p>{{ Form::submit('Update Problem', array( 'class' => "btn btn-primary col-md-4")) }}</p>
                </div>
            </div>
        
            <div class="form-group">
                <div class="error">{{ $errors->first('body') }}</div>
            <!-- username field -->
            <p> {{ Form::textarea('body', $prob->body,  array('class' => "grid form-control",'placeholder'=>'Problem Statement')) }}</p>
            </div>
            <!-- password field -->
           <div class="row">
                <div class="col-md-6 form-group">
                <!-- username field -->
                <p> {{ Form::textarea('input', $prob->input,  array('rows' =>'7', 'class' => "grid form-control",'placeholder'=>'Sample Input')) }}</p>
                </div>

                <div class="col-md-6 form-group">
                <!-- username field -->
                <p> {{ Form::textarea('output', $prob->output,  array('rows' =>'7', 'class' => "grid form-control ",'placeholder'=>'Sample Output')) }}</p>
                </div>
            </div>

         {{ Form::close() }} 
        

@stop