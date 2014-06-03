<html>




<script type="text/javascript" src="jquery.js" >

</script>


<script>
$(document).ready(function(){

  $("#button").click(function(){
    $.get("transcationAction.php","",function(data,status){
      //alert("数据：" + data + "\n状态：" + status);
	  
	  
	 var obj2 = eval('(' + data + ')');
	  
	 // var obj2=data;
	  //$("p").remove()
	  
	  $("#body").append("<p ></p>");
	  
	  for(var i=0;i<obj2.length;i++)
	  {
	    for(var k=0;k<obj2[i].length;k++)
		{
		//document.write(obj2[i][k]);
		//document.write("<br>");
		if(k==0){
		$("p").append("房间:");
		$("p").append(obj2[i][k]);
		$("p").append("<br>");
		}
		
		if(k==1){
		$("p").append("目前时间:");
		$("p").append(obj2[i][k]);
		$("p").append("<br>");
		}
		
		if(k==2)
		{
		
		$("p").append("到期时间:");
		$("p").append(obj2[i][k]);
		$("p").append("<br>");
		
		}
		if(k==3)
		{
		$("p").append("剩余天数:");
		$("p").append(obj2[i][k]);
		$("p").append("<br>");
		
		}
		
		}
	  
	  }
	 
    });
  });

  //
  
  });


$(document).ready(function(){
  $("#button2").click(function(){
    $.get("transcationAction.php","",function(data,status){
	
	$("p").remove();
	
      });
  });
});



</script>


<head>


<head>
<div id="body" style="position:absolute;top:200px;left:900px;width:200px;height:400px;background-color:#ffeeee;">
<input type="button" name="button" id="button5" value="提交";>
<input type="button" name="button" id="button6" value="清除";>

</div>


<html>