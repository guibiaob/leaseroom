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

//����һ������
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
//ɾ������ ����id����
public function del($id){echo "del";}
//���·������Ϣ
public function update(leaseroom $user){echo "updata";}

//����id���ط�����Ϣ
public function select($id){echo "select";}



public function __destruct(){
     parent::__destruct();
}

}













?>