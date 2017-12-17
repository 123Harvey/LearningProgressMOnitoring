
<html >
<head>
	<meta charset="UTF-8">
  <title></title>
  
        <link rel="stylesheet" type="text/css" href="../css/main.css">


          <style type="text/css">
         
.button {
    background-color: white;
    border: none;   
    color: white;   
    padding: 0px 0px;        
   display: inline-block;   
    font-size: 17px; 
    margin: 2px 0px;   
transition-duration: 0.04s;
  font-family: raleway;
    cursor: pointer;
    height: 50px; 


}
.button1 {border-radius: 10px;}
.button2 {border-radius: 10px;}
.button3 {border-radius: 10px;}
.button4 {border-radius: 10px;}
.button5{border-radius: 10px;}
.button6{border-radius: 10px;}

.button1 {
   
    /*background-color:#AD5D5D;*/
     color:blue;
    border: 1px solid blue;

    }
.button1:hover {    
background-color: blue ;   
    color: white;
      border: 1px solid blue;

}

.button2 {
 /*background-color:#AD5D5D;*/
     color:blue;
    border: 1px solid blue;
    }
    
.button2:hover {    
background-color:blue ;   
    color: white;
      border: 0px solid #034F84;
}
.button3 {
   
   /*background-color:#AD5D5D;*/
     color:blue;
    border: 1px solid blue;
    }
    
.button3:hover {    
background-color:blue ;   
    color: white;
      border: 0px solid #034F84;
}
.button4 {
   /*background-color:#AD5D5D;*/
     color:blue;
    border: 1px solid blue;
    }
    
.button4:hover {    
background-color:blue ;   
    color: white;
      border: 0px solid #034F84;
}
.button5 {
  /*background-color:#AD5D5D;*/
     color:blue;
    border: 1px solid blue;
    }
    
.button5:hover {    
background-color:blue ;   
    color: white;
      border: 0px solid #034F84;
}
.button6 {
  /*background-color:#AD5D5D;*/
     color:blue;
    border: 1px solid blue;
    }
    
.button6:hover {    
background-color:blue ;   
    color: white;
      border: 0px solid #034F84;
}
          </style>
</head>
<body>
<table width="100%" style="margin-top: -10px" >
	 <tr>
    <td bgcolor="#E6E6FA" style="width: 13%">
<a href="../include/filter.php?filter=PAYABLE" target="myIframe2"  ><button class="button button1" style="height:35px;width:100%; margin-top:-170px">Payable</button></a>
<br>
<a href="../include/filter.php?filter=PETTY CASH" target="myIframe2"  ><button class="button button2" style="height:30px;width:100%;margin-top: -120px">Petty Cash</button></a>
<a href="../include/filter.php?filter=CANCELED" target="myIframe2"  ><button class="button button3" style="height:30px;width:100%;margin-top: -80px">Cancelled</button></a>
<a href="../include/filter.php?filter=REIMBURSEMENT" target="myIframe2"  ><button class="button button4" style="height:30px;width:100%;margin-top: -40px">Reimbursement</button></a>
<a href="../include/filter.php?filter=UNDELIVERED" target="myIframe2"  ><button class="button button5" style="height:30px;width:100%;margin-top: -0px">Undelivered</button></a>
<a href="../include/filter.php?filter=FAILED BID" target="myIframe2"  ><button class="button button6" style="height:30px;width:100%;margin-top: 10px">Failed Bid </button></a>
  </td>
          <td colspan = "10" width = "100%" height= "430 px"  bgcolor="white">
          <center> 
          <iframe  name="myIframe2"  frameborder="0" width="100%" height="100%" src="../include/filter.php?filter=PAYABLE"" >
            
          </iframe> 
     
          </td>
</tr>
</table>

</center>
</body>
</html>
