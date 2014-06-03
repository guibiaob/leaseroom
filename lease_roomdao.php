<?php

require_once('rootDAO.php');
require_once('user_model.php');
require_once('lease_room_model.php');
class lease_roomdao extends rootDAO
{

public function __construct($localhost,$user,$password)
{
   parent::__construct($localhost,$user,$password);
}

//增加一个房间
public function add(leaseroom $newroom){







$sql="INSERT INTO  `myleasehome`.`lease_room` (
`ID` ,
`price` ,
`isempty`
)
VALUES (
'$newroom->id','$newroom->price','$newroom->isempty'
)";

//$sql="select 1";

echo $sql;

if(mysql_query($sql,$this->link))
{
echo "exucse susession";
}
else
{
echo  "excuse fial";
}






}
//删除房间 根究id号码
public function del($id){echo "del";}
//更新房间的信息
public function update(leaseroom $user){echo "updata";}

//根究id返回房间信息
public function select($id){echo "select";}



public function __destruct(){
     parent::__destruct();
}

}













?>