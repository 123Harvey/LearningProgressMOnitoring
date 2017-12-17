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
		$sql = "UPDATE Quantity
		SET pieces = null, pr_id = null
		WHERE pr_id = ".$getpr.";";
	$result = $con->query($sql);
	if($con->query($sql))
		{
			//echo '<src="../minor/inInventory.php?filter=Foods" target="myIframe2">';
			header("location:../minor/outcategory.php?filter=Foods");
		}
	else
		die("");

}
?>