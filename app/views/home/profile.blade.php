@extends('home.base')

@section('content')
<div class="row">
	
	<div class="col-md-3 ">
		<h4></h4>

		<div class="profile grid-filter grid-list">
			@if(Auth::user()->id != $user->id)
				@if($fstatus == false)
					<h5><a class="btn btn-success" href="{{ URL::to('user/follow', array($user->id)) }}">Follow</a> </h5>
				@else
					<h5><a class="btn btn-success" href="#">Following</a> </h5>
				@endif
			@endif
			<h4>{{ $user->username }} </h4>
			<h5>{{ $user->email }}</h5>
			<h5></h5>
		</div>

		<div class="grid-filter grid-list">
			<h4>Stats:</h4>
			<h5>Submitted: </h5>
			<h5>Solved:</h5>
			<h5>Failed:</h5>
			<h5>Pending:</h5>
		</div>		
			
		
	</div>
		<div class="col-md-9 ">
	@foreach ($problems as $prob)

		<a href="{{ URL::to('problem/view', array($prob->id)) }}">
			<div class="grid-list">
				<div class="row">
					<div class="col-md-8">
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

	<div class="col-md-4 ">
	</div>
</div>
	
@stop