<?php



//$(.test)
//   #id  . class
//  $("p.intro") p class
//  $("p#intro")  p id


$("p").css("background","red");

//����ȷ��ѡ��

$("ul li:first") //ÿ�� <ul> �ĵ�һ�� <li> Ԫ��


$("[href$='.jpg']")   


$("p:first");  //



$("ul li:eq(3)");
// gt   lt  eq

$("input:not(:empty)")

//jquery  �и��ӵ��﷨�����õ��κ�һ������

$(":empty") 

//һ���ӵ�����
$("th,td,.intro")








?>



<script type="text/javascript" src="jquery.js"></script>

<script>

$(document).ready(function()
{
$("p").click(function(){

$(this).hide();

})



}

)

</script>



