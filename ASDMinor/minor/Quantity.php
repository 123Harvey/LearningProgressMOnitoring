<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../minor/login.php");
}
$getpr = $_GET['prid'];  

	INCLUDE_once('../minor/config.php');
	$sql = "insert into Quantity(pieces,pr_id) Values (1,$getpr)";
	if($con->query($sql))
		{
		header("location:../minor/inInventory.php?filter=Foods");
		}
	else
		die("no item match");

?>