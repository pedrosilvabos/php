<?php 
include("classes/playersClass.php");

if(($_GET['action'])=='GetLatestPlayerAdditions')
{
	$Result = playersClass::GetLatestPlayerAdditions();
	$GetLatestPlayerAdditionsArray =array();
	foreach ($Result as $value) 
	{
		$GetLatestPlayerAdditionsArray[] = $value;
	}
	
	echo(json_encode($GetLatestPlayerAdditionsArray));
}

if(($_GET['action'])=='GetGoalkeeper')
{
	$where='Goalkeeper';
	$Result = playersClass::GetLatestPlayerAdditions(0, 50, $where);

	$GetGoalkeepersArray =array();
	foreach ($Result as $value) 
	{
		$GetGoalkeepersArray[] = $value;
	}
	
	echo(json_encode($GetGoalkeepersArray));
}
if(($_GET['action'])=='GetDefenses')
{
	$where='Defense';
	$Result = playersClass::GetLatestPlayerAdditions(0, 50, $where);

	$GetDefensesArray =array();
	foreach ($Result as $value) 
	{
		$GetDefensesArray[] = $value;
	}
	
	echo(json_encode($GetDefensesArray));
}
if(($_GET['action'])=='GetMidfielders')
{
	$where='Middlefielder';
	$Result = playersClass::GetLatestPlayerAdditions(0, 50, $where);

	$GetMidfieldersArray =array();
	foreach ($Result as $value) 
	{
		$GetMidfieldersArray[] = $value;
	}
	
	echo(json_encode($GetMidfieldersArray));
}
?>