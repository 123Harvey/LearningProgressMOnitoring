<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../minor/login.php");
}
$getpr = $_GET['prid'];
togetQuantity($getpr);
function togetQuantity($getpr)
{
	INCLUDE_once('../minor/config.php');
		$sql = "UPDATE category
		SET category_name = '', category_date = null
		WHERE pr_id = ".$getpr.";";
	$result = $con->query($sql);
	if($con->query($sql))
		{
		}
	else
		die("");

}
?>