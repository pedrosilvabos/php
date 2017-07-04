<?php

class playersClass{

	function insertNewPlayer($DOB,$Position,$Fname,$Lname,$Country,$Weight,$Height, $Avatar){

		include("../db_con.php");
		$date = date("Y-m-d H:i:s");
		if(empty($Avatar))
		{
			$Avatar = 'no_image_avatar.png';
		}
		$query = "	INSERT INTO 
								players (DOB, Position, Fname, Lname, Country, Weight, Height, DateAdded, Avatar) 
					VALUES 
								('$DOB', '$Position', '$Fname', '$Lname', '$Country', '$Weight', '$Height', '$date', '$Avatar')";
		if ($link->query($query) === TRUE) {
			echo "<div class=\"alert alert-success\" role=\"alert\">New record created successfully</div>";
		} 
		else 
		{
		    echo "Error: " . $query . "<br>" . $link->error . "<br>";
		}		
	}	   
	function GetLatestPlayerAdditions($user=0, $limit=50,$where=null)
	{
		if($user==1)
	    {
	    	include("../db_con.php");
	    }
	    else
	    {
	    	include("db_con.php");
	    }
		if(isset($where)){$where = "WHERE Position='".$where."'";}
		if(isset($limit)){$limit = "LIMIT ".$limit;}
		$query = "
			SELECT 
					*
			FROM 
				players
			$where
			ORDER BY
				DateAdded
				$limit;			
		";
			if ($Result = $link->query($query)) 
			{
				$GetLatestPlayerAdditionsArray = array();

		 		while ($obj = $Result->fetch_object()) 
	    		{
	    			if($user==1)
				    {
				    	$admin = "";
				    	if(empty($obj->Avatar))
				    	{
				    		$avatar = '../img/uploads/player_avatar/no_image_avatar.png';
				    	}
				    	else
				    	{
				    		$avatar = '../img/uploads/player_avatar/'.$obj->Avatar;
				    	}
				    	echo "
							<div class=\"row\" style=\"float:left\" style=\"width:150px;height:150px\">
										<div class=\"col-xs-1 col-md-11\" >
							    <div >
								    <a href=\"$obj->ID\" class=\"thumbnail\" style=\"width: 176px;height: 250px;margin: 10px;\">
								      <img src=\"$avatar\" alt=\"...\" width=150px height=150px>
								      $obj->Fname $obj->Lname
								   	</a>
							    </div>
							    <p><a href=\"#\" class=\"btn btn-info btn-xs\" role=\"button\">Edit</a> 
				    			<a href=\"?ERASE=$obj->ID\" class=\"btn btn-danger btn-xs\" role=\"delete\">Delete</a></p>
							  </div>
							</div>		
						";
				    }
				    else
				    {
				    	$GetLatestPlayerAdditionsArray[] = $obj;
				    }	
	    		}
	    		  return $GetLatestPlayerAdditionsArray;
	    	$Result->close();

		}
	}

	function GetPositions()
	{
		include("../db_con.php");
	 	$Positions = array();
	 	$query = "	SELECT 
	 					position 
					FROM 
						playerpositions";

		if ($Result = $link->query($query)) 
		{
		 	while ($obj = $Result->fetch_object()) 
    		{
		    	$Positions[]= $obj->position;	
    		}
	    	return($Positions);		
		}
	}
	function GetCountries()
	{
		include("../db_con.php");
	 	$Positions = array();
	 	$query = "	SELECT
	 					 country_name 
	 				FROM 
	 					countries";

		if ($Result = $link->query($query)) 
		{
		 	while ($obj = $Result->fetch_object()) 
    		{
		    	$Countries[]= $obj->country_name;	
    		}
	    	return($Countries);		
		}
	}

	function RemovePlayer($Result)
	{
		include("../db_con.php");

	 	$query = "	DELETE 
	 				FROM 
	 					players 
	 				WHERE 
	 					ID = ".$Result.";";

		if ($link->query($query) === TRUE) 
		{

	   		echo "<div class=\"alert alert-success\" role=\"alert\">Record deleted successfully</div>";
		} 
		else 
		{
		    echo "<div class=\"alert alert-danger\" role=\"alert\">Error deleting record:</div>". $link->error;
		}
	}

	function GetSinglePlayer($ID)
	{

		include("db_con.php");
		$GetSinglePlayer = array();
		$query = "SELECT 
						* 
					FROM 
						players 
					WHERE 
						ID=$ID;";

		if ($Result = $link->query($query)) 
		{
		 	while ($obj = $Result->fetch_object()) 
    		{
		    	$GetSinglePlayer[]= $obj;	
    		}
	    	return($GetSinglePlayer);		
		}
	}
	

}
?>