    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

<script>

$(function() {

	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=GetLatestPlayerAdditions",

	 success: function(data) 
	 {
			$('#portfolio').append(''+
				'<div class="btn-group btn-group-justified" role="group" aria-label="...">'+
					'<div class="btn-group" role="group">'+
						'<button onclick="GetGoalkeepers()" type="button" class="btn btn-default">GoalKeepers</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="GetDefenses()" type="button" class="btn btn-default">Defenses</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="GetMidfielders()" type="button" class="btn btn-default">Middlefielders</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button type="button" class="btn btn-default">Forwards</button>'+
					'</div>'+
				'</div>');
			$.each(data, function (key, value) 
			{
			
			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="float:left;margin-right: 50px;margin-left: 50px;">'
								+data[key].Fname+"<br/>"
								+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
			});
    }  

	});
});

function GetGoalkeepers()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=GetGoalkeeper",

	 success: function(data) 
	 {
	$('#playersZone').empty();
		$.each(data, function (key, value) 
			{
			
			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="float:left;margin-right: 50px;margin-left: 50px;">'
								+data[key].Fname+"<br/>"
								+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
			});
	}
});
}
function GetDefenses()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=GetDefenses",

	 success: function(data) 
	 {
	$('#playersZone').empty();
		$.each(data, function (key, value) 
			{
			
			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="float:left;margin-right: 50px;margin-left: 50px;">'
								+data[key].Fname+"<br/>"
								+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
			});
	}
});
}
function GetMidfielders()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=GetMidfielders",

	 success: function(data) 
	 {
	$('#playersZone').empty();
		$.each(data, function (key, value) 
			{
			
			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="float:left;margin-right: 50px;margin-left: 50px;">'
								+data[key].Fname+"<br/>"
								+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
			});
	}
});
}

</script>
