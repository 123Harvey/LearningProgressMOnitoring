<?php
session_start();
if(!isset($_SESSION['user'])){
   header("location:/ITPE/view/welcome.php"); 
}else;

 
?>
<!DOCTYPE html>

<html>
<head>
 <meta charset="UTF-8">
<style type="text/css">
  
  .form-control{
  border-radius: 5px;
      font-family: raleway;
      font-size: 15px;
     height: 28px;


border-color: #DFE3EE;
  }

  .col-2 col-form-label{

    font-family: raleway;

  }
  .task{
    font-size: 20px;
  }
  .submitbtn{
    color: white;
    font-size: 25px;
     border-radius: 5px;
     background-color: green;
  }
  
</style>
 <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

</head>
<body bgcolor="#FFFAFA">

<center>
    

          <form action = "../include/stored.php" method = "post">
 <table width="90%" height="100%"  >    
<tr> 
<td>     

                <label for="example-date-input" class="col-2 col-form-label">PR Number:</label>
                <br>
                    <input class="form-control" type="text" id="date" name="prnumber" style="width: 400px" required><br>
                    <br>

                 <label for="example-date-input" class="col-2 col-form-label">PR Date:</label>
                  <br>  <input class="form-control" type="date" value="mm-dd-yy" id="date" name="prdate" style="width: 400px" required><br>
                    <br>

                 <label for="example-date-input" class="col-2 col-form-label">Request Date:</label>
                  <br>  <input class="form-control" type="date" value="mm-dd-yy" id="date" name="requestdate" style="width:
                     400px" required><br>
                     <br>

                <label for="example-date-input" class="col-2 col-form-label">Date Required:</label>
                <br>    <input class="form-control" type="date" value="mm-dd-yy" id="date" name="daterequired" style="width:
                     400px" required><br>
                     <br>

                  <label for="example-date-input" class="col-2 col-form-label">Particulars Details</label>
                  <br>
                    <input class="form-control" type="text" name="particularsdetails" style="width: 400px" required><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Requesting Division</label>
                    <br>
                    <input class="form-control" type="text" name="requestingdivision" style="width: 400px" required><br>
                    <br>

                  <label for="example-date-input" class="col-2 col-form-label">Date:</label>
                  <br>
                    <input class="form-control" type="date" id="date" name="date" style="width: 400px" required><br>
                    <br>
                 <label for="example-date-input" class="col-2 col-form-label">Cashier Date:</label>
                 <br>
                    <input class="form-control" type="date" value="mm-dd-yy" id="date" name="cashierdate" style="width: 400px" required><br>
                    <br>

                 <label for="example-date-input" class="col-2 col-form-label">Supplier Name:</label>
                 <br>
                    <input class="form-control" type="text" id="date" name="suppliername" style="width: 400px" required><br>
                    <br>

                   <label for="example-date-input" class="col-2 col-form-label">Notice to Proceed:</label>
                   <br>
                    <input class="form-control" type="date" value="mm-dd-yy" id="date" name="noticetoproceed" style="width: 400px" required><br>
                    <br>

</td>
<td>  
    <br>
                     <label for="example-date-input" class="col-2 col-form-label">Delivery Completion:</label>
                     <br>
                    <input class="form-control" type="date" value="mm-dd-yy" id="date" name="deliverycompletion" style="width: 400px" required><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Acceptance Turn over:</label>
                       <br>
                    <input class="form-control" type="text" id="date" name="acceptanceturnover" style="width: 400px" ><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Ci Number:</label>
                       <br>
                    <input class="form-control" type="text" id="date" name="cinumber" style="width: 400px" required><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Number of days po-delivery:</label>
                       <br>
                    <input class="form-control" type="text"  id="date" name="podelivery" style="width: 400px" required><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Number of days delivery-cashier:</label>
                       <br>
                    <input class="form-control" type="text"  name="deliverycashier" style="width: 400px" required><br>
                    <br>
                    <label for="example-date-input" class="col-2 col-form-label">Accounting Date:</label>
                    <br>
                    <input class="form-control" type="date" id="date" name="accountingdate" style="width: 400px" required><br>  
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Remarks Details:</label>
                    <br>
                    <input class="form-control" type="text"  name="remarksdetails" style="width: 400px" required><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Po Number:</label>
                    <br>
                    <input class="form-control" type="text"  name="ponumber" style="width: 400px" required><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Total Actual Cost:</label>
                    <br>
                    <input class="form-control" type="text"  name="totalactualcost" style="width: 400px" required><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">total Approved Budget Cost:</label><br>
                    <input class="form-control" type="text" name="totalapprovedcost" style="width: 400px" required><br>
                    <br>    


                    <button type="submit" class="btn btn-primary" name = "btnSubmit" value = "Submit"  >Submit</button> 
</td>
</tr>
</table>                 
                    </form>  
</center>
</body>

</html>
