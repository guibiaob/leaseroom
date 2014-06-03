<html>




<script type="text/javascript" src="jquery.js" >

</script>






<script>
$(document).ready(function(){

  $("#button5").click(function(){
    $.post("transcationAction.php",{'type':3},function(data,status){
      alert("数据：" + data + "\n状态：" + status);
	  
	  
	 
	  
	 
    });
  });

  //
  
  });


$(document).ready(function(){
  $("#button6").click(function(){
    $.get("transcationAction.php","",function(data,status){
	
	$("p").remove();
	
      });
  });
});



</script>


<head>


<head>
<div id="body2" style="position:absolute;top:200px;left:900px;width:200px;height:400px;background-color:#ffeeee;">
<input type="button" name="button" id="button" value="提交";>
<input type="button" name="button" id="button2" value="清除";>

</div>


<html>