<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .button{
      background-color: white;
        display: inline-block;
        color: blue;
        border: 2px;
        border-color: red;
    }
  </style>
</head>
<body>
<table width="100%" style="margin-top: -10px;margin-left: -7px" bgcolor="">
   <tr>
    <td bgcolor="#182286" style="width: 13%">
<a href="../minor/inInventory.php?filter=Foods" target="myIframe2"  ><button class="button button1" style="height:35px;width:100%; margin-top:-170px">Foods</button></a><br>
<br>
<a href="../minor/inInventory.php?filter=Hardware" target="myIframe2"  ><button class="button button2" style="height:30px;width:100%;margin-top: -140px">Hardware</button></a><br>
<br>
<a href="../minor/inInventory.php?filter=rental" target="myIframe2"  ><button class="button button3" style="height:30px;width:100%;margin-top: -100px">Rental</button></a><br>
<br>
<a href="../minor/inInventory.php?filter=officesupplies" target="myIframe2"  ><button class="button button4" style="height:30px;width:100%;margin-top: -60px">Office Supplies</button></a><br>
<br>
<a href="../minor/inInventory.php?filter=others" target="myIframe2"  ><button class="button button5" style="height:30px;width:100%;margin-top: -20px">Other</button></a><br>
<h1 style="color:#182286 ">sd</h1>
<h5 style="color:#182286 ">sd</h5>
<h5 style="color:#182286 ">sd</h5>
  </td>
          <td colspan = "10" width = "100%" height= "430 px"  bgcolor="white">
           
          <iframe  name="myIframe2"  frameborder="0" width="100%" height="100%" src="../minor/inInventory.php?filter=Foods" >
            
          </iframe> 
     
          </td>
</tr>
</table>

</body>
</html>
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../login.php");
}
  ?>