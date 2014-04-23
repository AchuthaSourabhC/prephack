@extends('home.base')
@section('sidebar')

	
	@stop

@section('content')

<div class="row">

			<div class="col-md-3 ">
		<div class="grid-filter">
			<h4>Search & Filters</h4>
			{{ Form::open(array('url' => 'problem/search', 'method' => 'POST', 'role' => 'form')) }}
				<p> {{ Form::text('keyword', Input::old('keyword'),  array( 'class' => "grid form-control ",'placeholder'=>'Seach Problems')) }}</p>
				<p>{{Form::label('Topics', 'Topics')}}</p>
				<p> {{Form::select('topic_id', $data, 0, array('class'=>'grid-drop form-control ')) }}

	            <p>{{ Form::submit('Search', array( 'class' => "btn btn-primary")) }}</p>

			{{ Form::close() }} 

			<footer>
        	<p>Developed by <a target="_blank" href="https://plus.google.com/u/0/+SourabhCA/about">Sourabh</a><br>Powered By <a target="_blank" href="http://laravel.com/">Laravel</a></p>
        </footer>
		</div>
</div>
	
	<div class="grid-wrap col-md-9">
	@foreach ($problems as $prob)

		<a href="{{ URL::to('problem/view', array($prob->id)) }}">
			<div class="grid-list">
				<div class="row">
					<div class="grid-list-item col-md-8">
						<h4>{{$prob->title}}</h4>
						<pre class="prob-content">{{Str::limit($prob->body, 100)}}
						</pre>
						
					</div>
					<div class="col-md-4">
						<h5><small>{{$prob->updated_at}}</small></h5>
						<h5>Topic: <strong>{{ $data[$prob->topic_id]}}</strong></h5>

						<h5>Difficulty:</h5>

						<h5>Source: <strong>{{$prob->source  }}</strong></h5>
					</div>
				</div>
			</div>
		</a>

	@endforeach
	</div>

</div>

@stop