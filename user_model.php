<?php


class user
{
   public $id;
   public $name;
   public $sex;
   public $number;
   public $identi;
   public $factor;
   
   public function __construct($id,$name,$sex,$number,$identi,$factor)
   {
     $this->id=$id;
	 $this->name=$name;
	 $this->sex=$sex;
	 $this->number=$number;
	 $this->identi=$identi;
     $this->factor=$factor;
   }
   
}


?>