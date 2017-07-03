<?php 
include("classes/playersClass.php");

if(
	($_GET['action'])=='LatestPlayerAdditions' ||
	($_GET['action'])=='Goalkeeper' ||
	($_GET['action'])=='Defense' ||
	($_GET['action'])=='Middlefielder' ||
	($_GET['action'])=='Forward'
		)
{
	if(($_GET['action'])=='LatestPlayerAdditions')
	{

	$Result = playersClass::GetLatestPlayerAdditions();	
	}
	else
	{
		$where = $_GET['action'];
		$Result = playersClass::GetLatestPlayerAdditions(0, 50, $where);	
	}
	$GetLatestPlayerAdditionsArray =array();
	foreach ($Result as $value) 
	{
		$GetLatestPlayerAdditionsArray[] = $value;
	}
	
	echo(json_encode($GetLatestPlayerAdditionsArray));
	}
	elseif(($_GET['action'])=='player')
	{

	$id = $_GET['ID'];
	$Result = playersClass::GetSinglePlayer($id);
	echo json_encode($Result[0]);
}

?>