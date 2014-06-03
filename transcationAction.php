<?php



require_once('rootDAO.php');
require_once('user_model.php');
require_once('lease_roomdao.php');
require_once('transcationdao.php');

//ҵ����߼���
class transcationAction
{
public $transcationdao;
public function __construct()
{
    //���������  ����Ҫ����
    $this->transcationdao=new transcationdao("localhost","root","");
	
	
}
public function select()
{   
   $this->transcationdao->select(100);
   //$a->select();
}

public function update()
{


    $this->transcationdao->update(new transaction(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15));
}



public function testlist()
{
// $sql="SELECT `ID` FROM `lease_room` WHERE `isempty`=1;";


$sql2="SELECT `room_id`,curdate(),`End_time`,`End_time`-curdate() as remain  FROM 

`transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM 

`transaction_mother` WHERE `room_id`=104)";


$sql="SELECT `room_id`,curdate(),`End_time`,`End_time`-curdate() as remain  FROM 

`transaction_mother` WHERE `ID`=some((SELECT max(`ID`) FROM 

`transaction_mother` WHERE `room_id`=104) union (SELECT max(`ID`) FROM 

`transaction_mother` WHERE `room_id`=103))";


$array=$this->transcationdao->sqllist($sql);

echo  json_encode($array);
 
 
}







public function testadd()
{
     $type=$_POST['type'];
     $id="";
     $user_id="";
     $room_id=""; 
	 $mes_time="";
	 $start_time="";
	 $end_time="";
	 $tv_clear_lamp_cost=15;
	 $deposit=0;
	 $water_cost_last=$_POST['water_cost_last'];
	 $electric_cost_last=$_POST['electric_cost_last'];
	 $water_cost="";
	 $electric_cost="";
	 $return_men="";
	 $last_recep_time="";

if($type==1)
{

if(isset($_POST['user'])){

$user=$_POST['user'];

$usersql="SELECT `id` FROM `user` WHERE `name`='$user'";

$user_id=$this->transcationdao->sqlfind($usersql);

$room_id=$_POST['room'];




$start_time=$_POST['start'];

$room_idsql="SELECT `isempty` FROM `lease_room` WHERE `ID`=$room_id";
$ismen=$this->transcationdao->sqlfind($room_idsql);

 if($ismen==1){
	 $room_idsql="UPDATE `lease_room` SET `isempty`=0 WHERE `ID`=$room_id";
	 $this->transcationdao->sqlquery($room_idsql);
	 }else{
	    echo "�ķ��������";
	    die("����");
	 }
    $start_time=date($start_time);
	list($year,$month,$day)=explode("-",$start_time);
    $end_time=date("Y-m-d", mktime(0,0,0,$month+1,$day-1,$year));
    $deposit=100;
	
	
	

	$watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	$water_cost=$this->transcationdao->sqlfind($watersql);   
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	$electric_cost=$this->transcationdao->sqlfind($electric);
	
}
}elseif($type==2)
{

if(isset($_POST['room2'])){

   $room_id=$_POST['room2'];
   //$water_cost_last=$_POST['lastwater2'];
   //$electric_cost_last=$_POST['lastelectric2'];

   $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
   $user_id=$this->transcationdao->sqlfind($user_idsql);

   $strat_timesql="select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id))";
   $end_timesql="select interval -1 day+
(select interval 1 month +(select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id
))))";
	
     $start_time=$this->transcationdao->sqlfind($strat_timesql);
	 $end_time=$this->transcationdao->sqlfind($end_timesql);
	   
      $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
        SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);





}

}elseif($type==3)
{

if(isset($_POST['room3'])){

       $room_id=$_POST['room3'];
	   $room_idsql="SELECT `isempty` FROM `lease_room` WHERE `ID`=$room_id";
	   $ismen=$this->transcationdao->sqlfind($room_idsql);
	   
	   if($ismen==0)
	   {
	       $room_idsql="UPDATE `lease_room` SET `isempty`=1 WHERE `ID`=$room_id";
	       $this->transcationdao->sqlquery($room_idsql);
		   
	   }else{
	   
	   echo "�÷��仹û�г���";
	   die("����");
	   }
	   $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
       $user_id=$this->transcationdao->sqlfind($user_idsql);
	   $start_time=0;
	   $end_time=0;
	   $tv_clear_lamp_cost=0;
	   $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
            SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	   $water_cost=$this->transcationdao->sqlfind($watersql);
	   $electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	   $electric_cost=$this->transcationdao->sqlfind($electric);

}


}

//������ʵ�����
  $this->transcationdao->add(new transaction(
	 $id,$user_id,$room_id,$type,$mes_time,$start_time,
	 $end_time,$tv_clear_lamp_cost,$deposit,
	 $water_cost_last,$electric_cost_last,
	 $water_cost,$electric_cost,$return_men,
	 $last_recep_time
	 )
	 );

}



public function add()
{







       $id="";
	   $user_id="10003";//�ӷ�������ȡ������
	   $room_id="103";  
	   
	   $type=3;
	   $mes_time="";
	   
	   $tstring="2014-07-18"; //��ҳ��õ���ֵ
	   list($year,$month,$day)=explode("-",$tstring);
	   $start_time="";//������
	   $end_time="";//������
	   $tv_clear_lamp_cost=15;
	   $deposit=0;
	   $water_cost_last=400;
	   $electric_cost_last=500;
	   $water_cost="";
	   $electric_cost="";
	   $return_men="";
	   $last_recep_time="";
	   //���������Ӧ����û�м�����
	   if($type==1)
	   {
	   $room_idsql="SELECT `isempty` FROM `lease_room` WHERE `ID`=$room_id";
	   $ismen=$this->transcationdao->sqlfind($room_idsql);
	   
	   if($ismen==1)
	   {
	       $room_idsql="UPDATE `lease_room` SET `isempty`=0 WHERE `ID`=$room_id";
	       $this->transcationdao->sqlquery($room_idsql);
		   
	   }else{
	   
	   echo "�ķ��������";
	   die("����");
	   }
	    $start_time=date($tstring);
	    $end_time=date("Y-m-d", mktime(0,0,0,$month+1,$day-1,$year));
	   $deposit=100;
	   
	   
	   $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	   $water_cost=$this->transcationdao->sqlfind($watersql);   
	   $electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	   $electric_cost=$this->transcationdao->sqlfind($electric);
	   
	   
	   }else if($type==2)
	   {
	   
	   $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
       $user_id=$this->transcationdao->sqlfind($user_idsql);
	   
	   
	   $strat_timesql="select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id))";
	 
    $end_timesql="select interval -1 day+
(select interval 1 month +(select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id
))))";
	
     $start_time=$this->transcationdao->sqlfind($strat_timesql);
	 
	
	 
	 $end_time=$this->transcationdao->sqlfind($end_timesql);
	   
	  
	   $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	  
	  
	   
	   }else if($type==3)
	   {
	   
	   $room_idsql="SELECT `isempty` FROM `lease_room` WHERE `ID`=$room_id";
	   $ismen=$this->transcationdao->sqlfind($room_idsql);
	   
	   if($ismen==0)
	   {
	       $room_idsql="UPDATE `lease_room` SET `isempty`=1 WHERE `ID`=$room_id";
	       $this->transcationdao->sqlquery($room_idsql);
		   
	   }else{
	   
	   echo "�÷��仹û�г���";
	   die("����");
	   }
	   
	   
	   
	   
	   $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
       $user_id=$this->transcationdao->sqlfind($user_idsql);
	   
	   $start_time=0;
	   $end_time=0;
	   $tv_clear_lamp_cost=0;
	   
	   
	   
	      $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	   
	   }
     
      $this->transcationdao->add(new transaction(
	 $id,$user_id,$room_id,$type,$mes_time,$start_time,
	 $end_time,$tv_clear_lamp_cost,$deposit,
	 $water_cost_last,$electric_cost_last,
	 $water_cost,$electric_cost,$return_men,
	 $last_recep_time
	 ) );











}




public function testone()
{

$sql="SELECT `ID` FROM `lease_room` WHERE `isempty`=1";

$array=$this->transcationdao->sqllist($sql);

echo  json_encode($array);


}















public function insert()
{
       $id="";
	   $user_id="10003";//�ӷ�������ȡ������
	   $room_id="103";  
	   
	   $type=3;
	   $mes_time="";
	   
	   $tstring="2014-07-18"; //��ҳ��õ���ֵ
	   list($year,$month,$day)=explode("-",$tstring);
	   $start_time="";//������
	   $end_time="";//������
	   $tv_clear_lamp_cost=15;
	   $deposit=0;
	   $water_cost_last=400;
	   $electric_cost_last=500;
	   $water_cost="";
	   $electric_cost="";
	   $return_men="";
	   $last_recep_time="";
	   //���������Ӧ����û�м�����
	   if($type==1)
	   {
	   $room_idsql="SELECT `isempty` FROM `lease_room` WHERE `ID`=$room_id";
	   $ismen=$this->transcationdao->sqlfind($room_idsql);
	   
	   if($ismen==1)
	   {
	       $room_idsql="UPDATE `lease_room` SET `isempty`=0 WHERE `ID`=$room_id";
	       $this->transcationdao->sqlquery($room_idsql);
		   
	   }else{
	   
	   echo "�ķ��������";
	   die("����");
	   }
	    $start_time=date($tstring);
	    $end_time=date("Y-m-d", mktime(0,0,0,$month+1,$day-1,$year));
	   $deposit=100;
	   
	   
	   $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	   $water_cost=$this->transcationdao->sqlfind($watersql);   
	   $electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	   $electric_cost=$this->transcationdao->sqlfind($electric);
	   
	   
	   }else if($type==2)
	   {
	   
	   $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
       $user_id=$this->transcationdao->sqlfind($user_idsql);
	   
	   
	   $strat_timesql="select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id))";
	 
    $end_timesql="select interval -1 day+
(select interval 1 month +(select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id
))))";
	
     $start_time=$this->transcationdao->sqlfind($strat_timesql);
	 
	
	 
	 $end_time=$this->transcationdao->sqlfind($end_timesql);
	   
	  
	   $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	  
	  
	   
	   }else if($type==3)
	   {
	   
	   $room_idsql="SELECT `isempty` FROM `lease_room` WHERE `ID`=$room_id";
	   $ismen=$this->transcationdao->sqlfind($room_idsql);
	   
	   if($ismen==0)
	   {
	       $room_idsql="UPDATE `lease_room` SET `isempty`=1 WHERE `ID`=$room_id";
	       $this->transcationdao->sqlquery($room_idsql);
		   
	   }else{
	   
	   echo "�÷��仹û�г���";
	   die("����");
	   }
	   
	   
	   
	   
	   $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
       $user_id=$this->transcationdao->sqlfind($user_idsql);
	   
	   $start_time=0;
	   $end_time=0;
	   $tv_clear_lamp_cost=0;
	   
	   
	   
	      $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	   
	   }
     
      $this->transcationdao->add(new transaction(
	 $id,$user_id,$room_id,$type,$mes_time,$start_time,
	 $end_time,$tv_clear_lamp_cost,$deposit,
	 $water_cost_last,$electric_cost_last,
	 $water_cost,$electric_cost,$return_men,
	 $last_recep_time
	 )
	 );


}


public function insert2()
{
     $type=3;
     if($type==1){
     $id="";  //������
	 $user_id=10002;  //1������� ���� ��ȡ��id
	 $room_id=102;
     $type=1;
	 $mes_time="";//���ô��� ��sql����
     $tstring="2014-07-18";   //���յ�ʱ�����;
     list($year,$month,$day)=explode("-",$tstring);
     $start_time=date($tstring);
	 $end_time=date("Y-m-d", mktime(0,0,0,$month+1,$day-1,$year));
	 $tv_clear_lamp_cost=15;      //Ĭ��15   �����3 ���ֵ����0
	 $deposit=100;
	 $water_cost_last=300;// ��д��ˮ��
	 $electric_cost_last=400;//��д�ĵ��
	 $return_cost="";
	 $last_recep_time="";
     $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*0";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	$this->transcationdao->add(new transaction(
	 $id,$user_id,$room_id,$type,$mes_time,$start_time,
	 $end_time,$tv_clear_lamp_cost,$deposit,
	 $water_cost_last,$electric_cost_last,
	 $water_cost,$electric_cost,$return_cost,
	 $last_recep_time
	 ) );
	// ����
	}else if($type==2){
	
	
	
     $id="";  //������
	 
	 
	 
	// $user_id=10002;  //1������� ���� ��ȡ��id
	 
	 //ʹ��sqlȡ����һ�ε��û�
	 $room_id=102;
	 $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
     $user_id=$this->transcationdao->sqlfind($user_idsql);
	 
     $type=2;
	 $mes_time="";//���ô��� ��sql����
	 
	 $strat_timesql="select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=102))";
	 
    $end_timesql="select interval -1 day+
(select interval 1 month +(select interval 1 day +(SELECT `End_time` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=102
))))";
	
	
	
	
     $start_time=$this->transcationdao->sqlfind($strat_timesql);
	 $end_time=$this->transcationdao->sqlfind($end_timesql);
	 
	 $tv_clear_lamp_cost=15;      //Ĭ��15   �����3 ���ֵ����0
	 $deposit=0;
	 $water_cost_last=860;// ��д��ˮ��
	 $electric_cost_last=930;//��д�ĵ��
	 $return_cost="";
	 $last_recep_time="";
     $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	$this->transcationdao->add(new transaction(
	 $id,$user_id,$room_id,$type,$mes_time,$start_time,
	 $end_time,$tv_clear_lamp_cost,$deposit,
	 $water_cost_last,$electric_cost_last,
	 $water_cost,$electric_cost,$return_cost,
	 $last_recep_time
	 ) );
	
	
	
	
	}
	else if($type==3)
	{
	
	
     $id="";  //������
	 
	 
	 
	// $user_id=10002;  //1������� ���� ��ȡ��id
	 
	 //ʹ��sqlȡ����һ�ε��û�
	 $room_id=102;
	 $user_idsql="SELECT `user_id` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)";
     $user_id=$this->transcationdao->sqlfind($user_idsql);
	 
     $type=3;
	 $mes_time="";//���ô��� ��sql����
	 
	
	
     $start_time="";
	 $end_time="";
	 
	 $tv_clear_lamp_cost=0;      //Ĭ��15   �����3 ���ֵ����0
	 $deposit=0;
	 $water_cost_last=900;// ��д��ˮ��
	 $electric_cost_last=1000;//��д�ĵ��
	 $return_cost="";
	 $last_recep_time="";
     $watersql="select ($water_cost_last-(SELECT `Water_cost_Last` FROM `transaction_mother` WHERE `ID`=(
SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$water_cost=$this->transcationdao->sqlfind($watersql);
	
	$electric="select ($electric_cost_last-(SELECT `Electric_cost_Last` FROM `transaction_mother` WHERE `ID`=(SELECT max(`ID`) FROM `transaction_mother` WHERE `room_id`=$room_id)))*1";
	
	$electric_cost=$this->transcationdao->sqlfind($electric);
	$this->transcationdao->add(new transaction(
	 $id,$user_id,$room_id,$type,$mes_time,$start_time,
	 $end_time,$tv_clear_lamp_cost,$deposit,
	 $water_cost_last,$electric_cost_last,
	 $water_cost,$electric_cost,$return_cost,
	 $last_recep_time
	 ) );
	

	
	}
}


}

$p1=new transcationAction();

//$p1->testadd();
if(isset($_POST['type']))
{
$type=$_POST['type'];
if($type==3){
$p1->testone();
}

}else{

$p1->testlist();
}















?>