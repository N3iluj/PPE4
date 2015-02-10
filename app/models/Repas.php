<?php

class Repas extends Eloquent {

	public function users()
    {
        return $this->hasMany('User');
    }
	
}