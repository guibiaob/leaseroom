<?php

require_once('rootDAO.php');
require_once('user_model.php');
class userdao extends rootDAO
{

public function __construct($localhost,$user,$password)
{
   parent::__construct($localhost,$user,$password);
}

//增加一个用户
public function add(user $user){

//要插入什么表格

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
//根据id删除一个用户
public function del($id){echo "del";}
//传入一个用户 更新一个用户
public function update(user $user){echo "updata";}
//根据id 选择一个用户
public function select($id){echo "select";}



public function __destruct(){
     parent::__destruct();
}

}



?>