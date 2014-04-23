<?php

class Problem extends Eloquent{

	public $timestamps = true;


	protected $guarded = array();


	public function topic()
	{
	    return $this->belongsTo('Topic');
	}

}