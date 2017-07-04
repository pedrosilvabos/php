    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

<script>

$(function() {

	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=LatestPlayerAdditions",

	 success: function(data) 
	 {
			$('#portfolio').append(''+
				'<div class="btn-group btn-group-justified .btn-success" role="group" aria-label="..." style="    padding: 0 10px 0 20px;">'+
					'<div class="intro-heading btn-group" role="group" >'+
						'<button onclick="Goalkeeper()" type="button" class="btn btn-success intro-heading" style="height:60px;    font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 20px;";>GoalKeepers</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Defense()" type="button" class="btn btn-success " style="height:60px;font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 20px;";>Defenses</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Middlefielder()" type="button" class="btn btn-success" style="height:60px;font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 20px;";>Middlefielder</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Forward()"type="button" class="btn btn-success" style="height:60px;font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 20px";>Forwards</button>'+
					'</div>'+
				'</div>');
			$.each(data, function (key, value) 
			{
				fillPlayers(data)	
			});
    }  

	});
});

function Goalkeeper()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=Goalkeeper",

	 success: function(data) 
	 {	
			fillPlayers(data)	
	}
});
}
function Defense()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=Defense",

	success: function(data) 
	 {
			fillPlayers(data)	
	}
});
}
function Middlefielder()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=Middlefielder",

	success: function(data) 
	{
			fillPlayers(data)	
	}
});
}
function Forward()
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=Forward",

	 success: function(data) 
	{
			fillPlayers(data)	
	}
});
}
function fillPlayers(data)
{
	$('#playersZone').empty();
	$.each(data, function (key, value) 
			{
		
			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="    float: left;margin: 10px;padding-left: 25px;height: 250px;width: 200px;box-shadow: 5px 0px 10px 0px;>"'
								+'<a onClick="showPlayerModal('+data[key].ID+')"></a>'+"<br/>"
								+'<img src=img/uploads/player_avatar/'+data[key].Avatar+' width=150px height=150px>'+"<br/>"
								+data[key].Fname+' '+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
			});
}
function showPlayerModal(data)
{
	$.ajax({
	  method: "GET",
	  dataType: "json",
	  url: "ajax.php?action=player&ID="+data,

	 success: function(data) 
	 {
		var ID = data.ID;
		var DOB = data.DOB;
		var Position = data.Position;
		var Fname = data.Fname;
		var Lname = data.Lname;

		$('#myModal').modal('show');
		$('#modal-body').html(ID+'<br/>'+DOB+'<br/>'+Position+'<br/>'+Fname+'<br/>'+Lname);
	
	}
	
});
}
</script>
