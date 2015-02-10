<?php

class Hebergement extends Eloquent {

	public function users()
    {
        return $this->hasMany('User');
    }
	
}