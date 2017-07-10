<?php

echo 'ok';
class core{

	function GetArray($select='*',$table,$where='',$whereis='')
	{
		include("../db_con.php");
		isset($table) ? '':die('no table');

		if($where !='')
		{
			$where = "WHERE
				$where = $whereis";
		}

		$GetObjectArray = array();
		$query = "SELECT 
						$select 
					FROM 
						$table
						$where
						"
						.";";

		if ($Result = $link->query($query)) 
		{
		 	while ($obj = $Result->fetch_object()) 
    		{
		    	$GetObjectArray[]= $obj;	
    		}
	    	print_r($GetObjectArray);		
		}
	}

	function GetObjectArray($select='*',$table,$where='',$whereis='')
	{
		include("../db_con.php");
		isset($table) ? '':die('no table');

		if($where !='')
		{
			$where = "WHERE
				$where = $whereis";
		}
		
		 $query= "SELECT 
						$select 
					FROM 
						$table
						$where
						"
						.";";
		if ($result = $link->query($query)) {
			$objectArray = array();
	    /* fetch object array */
	    while ($obj = $result->fetch_object()) {
	        $objectArray[]=$obj;
	    }

	    /* free result set */
	   print_r($objectArray);
		}
	}
}
?>