<?php

require_once('rootDAO.php');
require_once('user_model.php');
require_once('userdao.php');
//ҵ����߼���
class useraction
{
public $userdao;
public function __construct()
{
    //���������  ����Ҫ����
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

    //��������  ����ת������  
	$name="";
	if(isset($_POST['name'])){
	$name=$_POST['name'];
$sex=$_POST['sex'];
$number=$_POST['number'];
$identi=$_POST['identi'];
$factor=$_POST['factor'];
}
	
	
	//$id=$_POST[''];

     //��ҳ��ı���ȡ�ṹ
   $id="";  
   //$name='��С��';
   //$sex=1;
   //$number=2342333;
  // $identi=440834332;
  // $factor='��Ӱ�ɷ����޹�˾';
//$this->userdao->add(new user(1,2,3,4,5,'��ɽ����'));
   $this->userdao->add(new user($id,$name,$sex,$number,$identi,$factor));
   
   
   //ҳ����ת
   
   
   header("Location:http://127.0.0.1/Myleaseroom/transcation.php?name=$name");

}



}

$p1=new useraction();
$p1->insert();



?>