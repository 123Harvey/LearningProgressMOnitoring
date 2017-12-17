<?php
session_start();
if(!isset($_SESSION['user'])){
   header("location:/ITPE/view/welcome.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
</head>
<body>

<?php
include('../serverConfig/serverCon.php');
include('../include/fetchView.php');
      toInit();
      homeView();
?>
<?php
?>
<center>
  	 <!-- <ul class="pagination" style="">
    <li><a href="../html/home.php" target="myIframe">1</a></li>
    <li><a href="../html/home.php" target="myIframe">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li> -->
</ul> 
</center>
</body>