<?php

$link=mysql_connect("localhost","mysql","");

if(!$link)
{
die('count not connect'.mysql_error());
}
echo 'connected sucessfully<br>';


$sql="CREATE DATABASE `test_lease_room`";


if(mysql_query("select 1",$link))
{
echo "databse test_lease_roon create sucessed<br>";
}else
{
echo "Errir create databse<br>";
}

mysql_select_db('test_lease_room',$link) or die('count not<br>');

echo "100";



$sql = "CREATE TABLE Persons2 
(
FirstName varchar(15),
LastName varchar(15),
Age int
)";

if(mysql_query($sql,$link))
{
echo "success<br>";
}else
{
echo "fail<br>";
}

echo "200";

$firstname="xixi";
$lastname="gege";
$age=80;

//插入数据


for($j=0;$j<10;$j++){
$sql="INSERT INTO `test_lease_room`.`persons` (
`FirstName` ,
`LastName` ,
`Age`
)
VALUES (
'$firstname','$lastname','$age'
)";



if(mysql_query("select 1",$link))
{
echo "传入数据成功<br>";
}else
{
echo "传入数据失败<br>";
}
}


$result=mysql_query("SELECT * FROM `persons` WHERE `Age`=80",$link);
//$arr=mysql_fetch_row($result);  每次一次去一行
//echo count($arr);          一行的长度
//print_r($arr);

//echo mysql_num_rows($result); 
//echo mysql_num_fields($result);//返回的是字段的

$meta = mysql_fetch_field($result);
if ($meta) {
        echo "yes meta<br />\n";
    }
	//echo gettype($meta);
	

//blob:         $meta->blob
//max_length:   $meta->max_length
//multiple_key: $meta->multiple_key
echo $meta->name;
//not_null:     $meta->not_null
//numeric:      $meta->numeric
//primary_key:  $meta->primary_key
//echo $meta->table;
 //echo $meta->type;
//unique_key:   $meta->unique_key
//unsigned:     $meta->unsigned
//zerofill:     $meta->zerofill



	
//如何参看一个对象类型
	

//if($arr)
//{

//$lengths=mysql_fetch_lengths($result);

//print_r($lengths);
//}



//echo is_bool($arr)? "yes":"no";
//print_r($arr);

//echo mysql_fetch_lengths($arr);





















mysql_close($link);




?>