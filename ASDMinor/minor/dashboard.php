<?php
session_start();
?>
<!Doctype>
<html>
<style>
.page-header h2{
  margin-top: 0;
 
}

  ul{
    margin:0;
    padding:0;
    overflow: hidden;
    list-style-type: none;
    background-color: #182286;
    margin-bottom: 8px;
  }
  li{
    float: left;
  }
  li a{
    display: inline-block;
    color: white;
    text-align: center;
    padding: 15px 18px;
    text-decoration: none;
  }
  li a:hover{
    background-color: #4169E1;
    color: white;
  }
.user{
  font-size: 20px;
font-weight: bolder;
margin-top: 4px;
}
.btnsignout{
 background-color: #ff5c5c;
    border: none;
    color: white;
    padding: 4px 30%;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
   border-radius: 10px;
    margin: 10px 2px;
    cursor: pointer;  font-family: raleway;
}

</style>
<script type="text/javascript" >
$(document).ready(function()
{
$("#notif").click(function()
{
$("#notification_count").fadeOut("slow");
return false;
});

 
</script>
<head>
<title></title>
    <link rel="stylesheet" type="text/css" href="../minor/css/main.css">
    
</head>
<body>
</br>

<div class="container fadeInUP">

<header>
  <table width="100%" height="50px" bgcolor="white" border="0">
  <tr>
    <td width="10%">
 <img src="../html/dti.png"  >
    </td>
     <td width="75%">
      <h3>Department of Trade and Industry XI</h3>

    
    </td>
    <td>
     
      <?php

   echo '<p class="user">'. "User: ".$_SESSION['user'];
   
    ?>
    
    <a href="../minor/logout.php" ><button  class="btnsignout "  type="submit"  > SignOut</button></a>
<!--     <form action="../include/upload.php" method="POST" enctype="multipart/form-data" style="margin-top: -20px">
  
</form> -->
  </h1>
    </td>
  </tr>
</table>
   
</header>
   <ul>
  <li> <a href="../minor/remarksView.php" target="myIframe"  style="margin-right:0px">Home</a></li>
   
  <li > <a href="../minor/History.php" target="myIframe">History</a></li>

  <li > <a href="../minor/Inventory.php" target="myIframe">IN</a></li>
  
  <li > <a href="../minor/outitems.php" target="myIframe">OUT</a></li>


 
</span>
  <li>
    </ul>
<table class="headertable" width="100%" bgcolor="#182286">
  <tr>
    <td>
     
<div class="page-header clearfix"  >

  
 </div> 
</td>
  </tr>
</table>

<article class="art">


 <table width = "100%" border = "0" name="mytable" >    
          <td colspan = "10" bgcolor = "" width = "100%" height= "500px"> 
          <iframe  name="myIframe"  frameborder="0" width="100%" height="100%" src="../minor/remarksView.php">
          </iframe> 
          </td>

</table>

</article>
<center>
<footer >@2017. | Procurement System</footer>
</center>
</div>
</body>

</html>
<?php
if(!isset($_SESSION['user'])){
    header("location:../minor/login.php");
}
  ?>