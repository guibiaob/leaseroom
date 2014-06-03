<?php

class leaseroom
{
	public $id;
	public $price;
	public $isempty;

	public function __construct($id,$price,$isempty)
	{
		$this->id=$id;
		$this->price=$price;
		$this->isempty=$isempty;
	
	}

}





?>