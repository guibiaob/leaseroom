<?php

require_once('rootDAO.php');
require_once('user_model.php');
class userdao extends rootDAO
{

public function __construct($localhost,$user,$password)
{
   parent::__construct($localhost,$user,$password);
}

//����һ���û�
public function add(user $user){

//Ҫ����ʲô���

$sql="INSERT INTO `user`(`id`, `name`, `sex`, `number`, `identi`, `factor`) 
VALUES (NULL,'$user->name', '$user->sex', '$user->number', '$user->identi', '$user->factor')";


echo $sql;

if(mysql_query($sql,$this->link))
{
 echo "insert success";
}else
{

echo "insert fail";
}

//















}  
//����idɾ��һ���û�
public function del($id){echo "del";}
//����һ���û� ����һ���û�
public function update(user $user){echo "updata";}
//����id ѡ��һ���û�
public function select($id){echo "select";}



public function __destruct(){
     parent::__destruct();
}

}



?>