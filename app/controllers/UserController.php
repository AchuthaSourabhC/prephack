<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function login()
	{
		$username = Input::get('email');
		$password = Input::get('password');
		$credentials = array('email' => $username, 'password' => $password);
		
		if ( Auth::attempt($credentials) )
		{
			$url = URL::previous();
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('login')
				->with('login_errors', true)->withInput();
		}
		//return Response::json($credentials);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('home.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$rules = array(
			'username' => 'required|alpha_dash|unique:users',
			'email' => 'required|unique:users|email',
			'password' => 'required|confirmed|min:6'
		);
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{

			return Redirect::to('login')->withInput()->withErrors($validator);

		}else{
			$data = array(
				'username' => Input::get('username'),
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('password'))
				);
			$user = new User($data);
			$user->save();
			return Redirect::to('login')->with("new", true);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string $name
	 * @return Response
	 */
	public function show($name)
	{
		$fstatus = false;
		$follow= NULL;
		$user = DB::table('users')
				->where('username', '=', $name)->first();
		$me = Auth::user();

		if($me->id != $user->id){

			$follow = DB::table('followers')
							->where('user_id', '=', $me->id)
							->where('target_id', '=', $user->id)
							->lists('target_id');

			$prob = DB::table('problems')
							->where('user_id', '=', $user->id)
							->orderBy('updated_at', 'desc')
							->get();

		}else{

			$follow = DB::table('followers')
							->where('user_id', '=', $me->id)
							->lists('target_id');
							
			$prob = DB::table('problems')
							->whereIn('user_id', $follow)
							->orWhere(function($query) use($me){
								$query->where('user_id', '=', $me->id);
							})
							->orderBy('updated_at', 'desc')
							->get();
		}

		if($follow){
			$fstatus = true;
		}								
		//return Response::json($follow);
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
		//
		
		return View::make('home.profile')->with('problems', $prob)
										->with('data', $data)
										->with('user', $user)
										->with('fstatus', $fstatus);
		//return Response::json($prob);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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