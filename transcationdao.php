<?php




require_once('rootDAO.php');
require_once('user_model.php');

require_once('transaction_model.php');
class transcationdao extends rootDAO
{

public function __construct($localhost,$user,$password)
{
   parent::__construct($localhost,$user,$password);
   //echo "construct<br>";
}


public function __destruct()
{


   // echo "tradao close";
  // parent::__destruct();
  
}



//增加一条记录
public function add(transaction $ta){

$sql="INSERT INTO  `myleasehome`.`transaction_mother` (
`ID` ,
`user_id` ,
`room_id` ,
`type` ,
`mes_time` ,
`Start_time` ,
`End_time` ,
`tv_clear_lamp_cost` ,
`deposit` ,
`Water_cost_Last` ,
`Electric_cost_Last` ,
`Water_cost` ,
`Electric_cost` ,
`Return_men` ,
`Last_recep_time`
)
VALUES (
NULL ,  '$ta->user_id',  '$ta->room_id', '$ta->type',  curdate(),  '$ta->start_time',  '$ta->end_time', 
 '$ta->tv_clear_lamp_cost', '$ta->deposit', '$ta->water_cost_last',  '$ta->electric_cost_last',  '$ta->water_cost',
 '$ta->electric_cost',  '$ta->return_men',  '$ta->last_recep_time'
)";

//使用当前时间函数$ta->mes_time
	

echo $sql;

if(mysql_query($sql,$this->link))
{
echo  "excute 1";


}
else
{

echo "faile";
}



}  






//根据id删除
public function del($id){echo "del";}
//跟新一条记录
public function update(transaction $user){echo "updata";}
//根据id 选择一条记录
public function select($id){echo "select";}


public function sqlfind($sql)
{
    $result=mysql_query($sql,$this->link);

   $row = mysql_fetch_array($result);
    return $row[0];
}



public function sqllist($sql)
{
$list=array();
$i=0;
$result=mysql_query($sql,$this->link);

while($row=mysql_fetch_row($result))
{

    $list[$i]=$row;
	$i++;
}
//echo json_encode($list);
//echo "hehe";
//print_r($list);




return $list;




}








public function sqlquery($sql)
{
if(mysql_query($sql,$this->link))
{

}else
{

die("修改失败");
}


}



}

$action=new transcationdao("localhost","root","");


//上一次组合的id 
//$sql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=101)";

//上一手的水费
//$sql="SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=101)";

//上一手的电费
//$sql="SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=101)";


//$sql="SELECT `ID` FROM `transaction_mother`";




//$action->sqlfind($sql);









?>