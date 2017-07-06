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
						'<button onclick="Goalkeeper()" type="button" class="btn btn-success intro-heading" style="height:60px;    font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 30px;";>GoalKeepers</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Defense()" type="button" class="btn btn-success " style="height:60px;font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 30px;";>Defenses</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Middlefielder()" type="button" class="btn btn-success" style="height:60px;font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 30px;";>Middlefielder</button>'+
					'</div>'+
					'<div class="btn-group" role="group">'+
						'<button onclick="Forward()"type="button" class="btn btn-success" style="height:60px;font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 30px";>Forwards</button>'+
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
//gets all the Goalkeeper players
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
//gets all the Middlefielder players
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
//gets all the Forward players
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
			var getFlag = data[key].Country.toLowerCase();
			$('#playersZone').append('<div class="m_wrap"><div id="Latest'+data[key].ID+'" class="row player_card thumbnail "'
				+'<a onClick="showPlayerModal('+data[key].ID+')"></a>'+"<br/>"
				+'<img src=img/uploads/player_avatar/'+data[key].Avatar+' style="height: 76%";>'
				+data[key].Fname+' '+data[key].Lname+"<br/>"
				+'</div>');
			$('#Latest'+data[key].ID+'').append('<div>'+data[key].Position+' '+'<img id="flag'+data[key].ID+'"src="img/icons/spinner.gif" class="flag flag-'+getFlag+'"/></div></div>');
			});
}
function showPlayerModal(data) 
// this is the modal that opens when you click the player
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
		var Avatar = data.Avatar;
		$('#myModal').modal('show');
		$('#modal-dialog').css('width','95%');
		$('#modal-body').html('<img src=img/uploads/player_avatar/'+Avatar+' width=300px>');

		
	}
	
});
}
</script>
