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
				'<div class="btn-group btn-group-justified" role="group" aria-label="...">'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Goalkeeper()" type="button" class="btn btn-default">GoalKeepers</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Defense()" type="button" class="btn btn-default">Defenses</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Middlefielder()" type="button" class="btn btn-default">Middlefielder</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Forward()"type="button" class="btn btn-default">Forwards</button>'+
					'</div>'+
				'</div>');
			$.each(data, function (key, value) 
			{

			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="float:left;margin-right: 50px;margin-left: 50px;width: 150px;height: 150px;border:solid 1px #000;margin: 10px 10px 10px 10px;padding: 35px 0 0 40px;box-shadow: 5px 10px 40px 0;">'
								+data[key].Fname+"<br/>"

								+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
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
			
			$('#playersZone').append('<div id="LatestPlayerAdditions" class="row" style="float:left;margin-right: 50px;margin-left: 50px;width: 150px;height: 150px;border:solid 1px #000;margin: 10px 10px 10px 10px;padding: 35px 0 0 40px;box-shadow: 5px 10px 40px 0;">'
								+data[key].Fname+"<br/>"
								+data[key].Lname+"<br/>"
								+data[key].Position+"<br/>"
								+data[key].Country+"<br/>"
							+'</div>');
			
			});
}
function yourFunction(data)
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
