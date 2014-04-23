@extends('home.base')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<pre class="prob-content"><h3>{{$prob->title}}</h3>{{ $prob->body }}</pre>
			<div class=".grid-prob-view">
				<pre class="prob-content"><h3>Sample Input</h3>{{$prob->input}}</pre>
			</div>
			<div class=".grid-prob-view">
				<pre class="prob-content"><h3>Sample Output</h3>{{ $prob->output }}</pre>
			</div>
		</div>
		<div class="col-md-3 prob-content ">
			<h5><small>{{$prob->updated_at}}</small></h5>
			<h5>Topic: <strong>{{ $data[$prob->topic_id]}}</strong></h5>
			<h5>Difficulty:</h5>
			<h5>Source: <strong>{{$prob->source}}</strong></h5>
			<h5>Posted by: <strong>{{ HTML::link('profile/'.$name, $name) }}</strong></h5>
			@if (Auth::user())
				@if (Auth::user()->id == $prob->user_id)
					<a class="btn btn-primary" href="{{ URL::to('problem/edit', array($prob->id)) }}">Edit Problem</a>
				@endif
			@endif

		</div>
	</div>
	<div class="col-md-9">
	<div class="row">
		 <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'prephack'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
	</div>
</div>
@stop