<?php

class Topic extends Eloquent{


	public $timestamps = true;


	protected $guarded = array();


	public function problems()
    {
        return $this->hasMany('Problem');
    }

}