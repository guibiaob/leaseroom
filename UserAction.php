<?php

require_once('rootDAO.php');
require_once('user_model.php');
require_once('userdao.php');
//业务的逻辑类
class useraction
{
public $userdao;
public function __construct()
{
    //设计有问题  不需要参数
    $this->userdao=new userdao("localhost","root","");
}
public function select()
{   
   $this->userdao->select(100);
   //$a->select();
}

public function update()
{
    $this->userdao->update(new user(1,2,3,4,5,6));

}
public function insert()
{

    //接受数据  过滤转移数据  
	$name="";
	if(isset($_POST['name'])){
	$name=$_POST['name'];
$sex=$_POST['sex'];
$number=$_POST['number'];
$identi=$_POST['identi'];
$factor=$_POST['factor'];
}
	
	
	//$id=$_POST[''];

     //从页面的表单获取结构
   $id="";  
   //$name='李小龙';
   //$sex=1;
   //$number=2342333;
  // $identi=440834332;
  // $factor='电影股份有限公司';
//$this->userdao->add(new user(1,2,3,4,5,'佛山照明'));
   $this->userdao->add(new user($id,$name,$sex,$number,$identi,$factor));
   
   
   //页面跳转
   
   
   header("Location:http://127.0.0.1/Myleaseroom/transcation.php?name=$name");

}



}

$p1=new useraction();
$p1->insert();



?>