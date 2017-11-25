
<script src="vendor/jquery/jquery.min.js"></script>
<script>
$(function() {

	$.ajax({
	  method: "GET",
	   dataType: "JSON",
	  url: "ajax.php?action=SlideShowBanner",

	success: function(data) 
	{

		slideChange(data);
		

		}
	});
});

function slideChange(data)
{
var_start = 1;	
 var n = data.length+1;
 $('#slides').html('<div id="slide"><img src="slides/slides/pic'+var_start+'.jpg" height=600px></div>');
setInterval(function() {
	if(n > var_start)
	{
		
		$('#slides').html('<div id="slide"><img src="slides/slides/pic'+var_start+'.jpg" height=600px></div>');

		var_start++;
	}
	else
	{
		var_start	= 1;
	}
 }, 2000);



}
</script>