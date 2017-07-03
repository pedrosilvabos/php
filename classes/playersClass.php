<?php

class playersClass{

	function insertNewPlayer($DOB,$Position,$Fname,$Lname,$Country,$Weight,$Height){

		include("../db_con.php");
		$date = date("Y-m-d H:i:s");
		$query = "INSERT INTO players (DOB, Position, Fname, Lname, Country, Weight, Height, DateAdded) VALUES ('$DOB', '$Position', '$Fname', '$Lname', '$Country', '$Weight', '$Height', '$date')";
		if ($link->query($query) === TRUE) {
			echo "<div class=\"alert alert-success\" role=\"alert\">New record created successfully</div>";
		     
		} 
		else 
		{
		    echo "Error: " . $query . "<br>" . $link->error . "<br>";
		    echo $query;
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
				    	echo "
							<div id=\"LatestPlayerAdditions\" class=\"row\" style=\"float:left\">
										<div class=\"col-xs-2 col-md-12\">
							    <a href=\"$obj->ID\" class=\"thumbnail\">
							      <img src=\"../images/person.png\" alt=\"...\">
							      $obj->Fname
							   s </a>
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

	function GetPositions($Result)
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