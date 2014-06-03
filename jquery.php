<?php



//$(.test)
//   #id  . class
//  $("p.intro") p class
//  $("p#intro")  p id


$("p").css("background","red");

//更精确的选择

$("ul li:first") //每个 <ul> 的第一个 <li> 元素


$("[href$='.jpg']")   


$("p:first");  //



$("ul li:eq(3)");
// gt   lt  eq

$("input:not(:empty)")

//jquery  有复杂的语法可以拿到任何一个对象

$(":empty") 

//一篮子的数据
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



