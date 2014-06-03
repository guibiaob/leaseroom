<?php

class transaction
{
	public $id;
	public $user_id;
	public $room_id;
	public $type;
	public $mes_time;
	public $start_time;
	public $end_time;
	public $tv_clear_lamp_cost;
	public $deposit;
	public $water_cost_last;
	public $electric_cost_last;
	public $water_cost;
	public $electric_cost;
	public $return_men;
	public $last_recep_time;
	
	public function __construct($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15)
	{
	$this->id=$a1;
	$this->user_id=$a2;
	$this->room_id=$a3;
	$this->type=$a4;
	$this->mes_time=$a5;
	$this->start_time=$a6;
	$this->end_time=$a7;
	$this->tv_clear_lamp_cost=$a8;
	$this->deposit=$a9;
	$this->water_cost_last=$a10;
	$this->electric_cost_last=$a11;
	$this->water_cost=$a12;
	$this->electric_cost=$a13;
	$this->return_men=$a14;
	$this->last_recep_time=$a15;
	
	
	}


}




?>