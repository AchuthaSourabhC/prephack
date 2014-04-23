<?php

class FollowerController extends BaseController {


	public function follow($id){
		
		$user = Auth::user();
		$fuser = User::find($id);
		$data = array('user_id' => $user->id, 'target_id' => $id);
		if($fuser){
			$follower = new Follower($data);
			$follower->save();
			return Redirect::to('profile/'.$fuser->username);
		}
		return Redirect::to('profile/'.$fuser->username);
	}

}