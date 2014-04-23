<?php

class ProblemController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()

	{
		$topics = Topic::all();
		$data = array();
		$default;
		$data[0] = 'All';
		foreach ($topics as $topic) {
			$data[$topic->id] = $topic->type;
			if($topic->type == 'General'){
				$default = $topic->id;
			}
		}
		 $problems = DB::table('problems')->orderBy('updated_at', 'desc')->get();
		//$problems = Problem::all() ;
		return View::make('problem.list')->with('problems', $problems)->with('data', $data)->with('default', $default);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$topics = Topic::all();
		$data = array();
		$default;
		foreach ($topics as $topic) {
			$data[$topic->id] = $topic->type;
			if($topic->type == 'General'){
				$default = $topic->id;
			}
		}
		return View::make('problem.add')->with('data', $data)->with('default', $default);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$data['user_id'] = Auth::user()->id;
		$validator = Validator::make(
    		$data,
		    array(
		        'body' => 'required',
		        'topic_id' => 'required',
		        'title' => 'required',
		        'source' => 'required',
		    )
		);

		if ($validator->fails())
		{
			return Redirect::to('problem/add')->withErrors($validator);
		}else{

			$prob = new Problem($data);
			/*$prob->body = $data['body'];
			$prob->input = $data['input'];
			$prob->output = $data['output'];
			$prob->topic_id = $data['topic_id'];*/
			$prob->save();
			return Redirect::to('problem/view/'.$prob->id);
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)

	{
		$prob = Problem::find($id);
		$user = User::find($prob->user_id);
		$name = $user->username;
		$topics = Topic::all();
		$data = array();
		$default;
		foreach ($topics as $topic) {
			$data[$topic->id] = $topic->type;
			if($topic->type == 'General'){
				$default = $topic->id;
			}
		}

		return View::make('problem.view')->with('prob', $prob)->with('data', $data)->with('name', $name);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$prob = Problem::find($id);
		if(Auth::user()->id == $prob->user_id){
			$topics = Topic::all();
			$data = array();
			$default;
			foreach ($topics as $topic) {
				$data[$topic->id] = $topic->type;
				if($topic->type == 'General'){
					$default = $topic->id;
				}
			}
			return View::make('problem.edit')->with('prob', $prob)->with('data', $data)->with('default', $default);

		}else{
			return Redirect::to('/');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$prob = Problem::find($id);
		$user_id = Auth::user()->id;
		if($user_id == $prob->user_id){
			$data = Input::all();
			$data['user_id'] = $user_id;
			$validator = Validator::make(
	    		$data,
			    array(
			        'body' => 'required',
			        'topic_id' => 'required',
			        'title' => 'required',
			        'source' => 'required',
			    )
			);

			if ($validator->fails())
			{	
				$url = 'problem/edit/'.$prob->id;
				return Redirect::to($url)->withErrors($validator);
			}else{
				$prob->title = $data['title'];
				$prob->body = $data['body'];
				$prob->input = $data['input'];
				$prob->output = $data['output'];
				$prob->topic_id = $data['topic_id'];
				$prob->source = $data['source'];
				$prob->save();
				return Redirect::to('problem/view/'.$prob->id);
			}

		}else{
			return Redirect::to('/');
		}
	}

	public function search()
	{
		
		$param = array(
			'keyword' => Input::get('keyword'),
			'topic_id' => Input::get('topic_id'),
			);
		if($param['keyword'] == NULL && $param['topic_id'] == 0){
			$problems = Problem::all();
		}

		else if($param['keyword'] != NULL && $param['topic_id'] == 0){
			$problems = $users = DB::table('problems')
			->where('body', 'LIKE', '%'.$param['keyword']."%")
			->get();
		}
		else if($param['keyword'] == NULL && $param['topic_id'] != 0){
			$problems = $users = DB::table('problems')
			->where('topic_id', '=', $param['topic_id'])
			->get();

		}else{
			$problems = $users = DB::table('problems')
			->where('body', 'LIKE', '%'.$param['keyword']."%")
			->where('topic_id', '=', $param['topic_id'])
			->get();
		}
		$topics = Topic::all();
		$data = array();
		$data[0] = 'All';
		$default;
		foreach ($topics as $topic) {
			$data[$topic->id] = $topic->type;
			if($topic->type == 'General'){
				$default = $topic->id;
			}
		}
		return View::make('problem.list')->with('problems', $problems)->with('data', $data)->with('default', $default);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}