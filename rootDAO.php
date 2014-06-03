<?php



class rootDao 
{

public $link; //表示连接

public function __construct($localhost,$user,$password)
{
 $this->link=mysql_connect($localhost,$user,$password);
 mysql_query("SET NAMES 'GBK'");
 mysql_select_db('myleasehome',$this->link) or die('count not<br>');
 //echo "完成";
}

public function __destruct()
{
//echo is_null($this->link);
echo "134";
mysql_close($this->link);


}


}


//$arr=new rootDao("localhost","root","");






//$link=mysql_connect("localhost","mysql","");
//mysql_close($link);
//echo "wangcheng";




?>