<?php


require_once('rootDAO.php');
require_once('user_model.php');
require_once('lease_roomdao.php');
//业务的逻辑类
class lease_roomAction
{
public $lease_roomdao;
public function __construct()
{
    //设计有问题  不需要参数
    $this->lease_roomdao=new lease_roomdao("localhost","root","");
}
public function select()
{   
   $this->lease_roomdao->select(100);
   //$a->select();
}

public function update()
{

    $this->lease_roomdao->update(new leaseroom(1,2,3));
}


public function insert()
{
    //lease_room
	
	
	if(isset($_POST['room'])){
	$id=$_POST['room'];
    $price=$_POST['price'];
	
	}

	
    $isempty=1;
	
   $this->lease_roomdao->add(new leaseroom($id,$price,$isempty));
   
   
   
}



}

$p1=new lease_roomAction();
$p1->insert();


















?>