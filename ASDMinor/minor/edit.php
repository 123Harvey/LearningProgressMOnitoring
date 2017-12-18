<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../minor/login.php");
}
session_start();
// including the database connection file
include("../serverCon.php");
if(isset($_POST['update']))
{   

    $prnumber = $_POST['prnumber'];
    $prdate = $_POST['prdate'];
    $requestdate = $_POST['requestdate'];
    $daterequired = $_POST['daterequired'];
    $particulars_details = $_POST['particularsdetails'];   
    $requestingdivision = $_POST['requestingdivision'];
    $date = $_POST['date'];
    $cashierdate = $_POST['cashierdate'];
    $suppliername = $_POST['suppliername'];
    $noticetoproceed = $_POST['noticetoproceed'];
    $deliverycompletion = $_POST['deliverycompletion'];
    $acceptanceturnover = $_POST['acceptanceturnover'];
    $cinumber = $_POST['cinumber'];
    $podelivery = $_POST['podelivery'];
    $deliverycashier = $_POST['deliverycashier'];
    $accountingdate = $_POST['accountingdate'];
    $remarksdetails = $_POST['remarksdetails'];
    $ponumber = $_POST['ponumber'];
    $totalactualcost = $_POST['totalactualcost'];
    $totalapprovedcost = $_POST['totalapprovedcost'];
    // checking empty fields
   /* if(empty($particulars_details) || empty($pr_number)) {  
            
        if(empty($pr_number)) {
            echo "<font color='red'>Pr number field is empty.</font><br/>";
        }
        
        if(empty($particulars_details)) {
            echo "<font color='red'>Particular field is empty.</font><br/>";
        }
    } else {    */
        //insert the table
        //particulars
    if($con->connect_errno)
    die("Could not connect: ".$con->connect_error);
    $sql = "
    Insert into item_logs(item_id,pr_date, pr_number,
    particulars_details, total_approved_budget_cost,
    division, po_number, supplier_name,
    total_actual_cost, delivery_completion,
    acceptance_turn_over, ci_number, accounting_date,
    cashier_date, number_of_days_po_to_delivery,
    remarks_details, pr_id, user_id) Values
    (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"
    $con->bind_param("isisisisisissssii", $firstname, $lastname, $email);

    if($con->query($sql))
    //echo "Database created successfully";successfully created I
    echo "table was created successfully";
    else
    die("error creating database");

    $con->close();

    header("location:../html/home.php");
    }
//}


particulars();
function particulars(){
todo(' ');
//getting id from url
$_SESSION['prid'] = $_GET['prid'];  
//selecting data associated with this particular id
  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM particulars WHERE pr_id = ".$_SESSION['prid'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $GLOBALS['pr_id'] = $row[0];
      $GLOBALS['pr_number'] = $row[1];
      $GLOBALS['pr_date'] = $row[2];
      $GLOBALS['request_date'] = $row[3];
      $GLOBALS['date_required'] = $row[4];
      $_SESSION['supplier_id'] = $row[5];
      $GLOBALS['particulars_details'] = $row[6];
    }
  }else{
      echo "no match!";
  }
  supplier();
}


function supplier()
{
todo(' ');
//getting id from url
//selecting data associated with this particular id

  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM supplier where supplier_id = ".$_SESSION['supplier_id'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $GLOBALS['supplier'] = $row[1];
      $GLOBALS['user_id'] = $row[2];
    }
  }else{
      echo "no match!";
  }
 cashier();
}

function cashier()
{
todo(' ');
//getting id from url
//selecting data associated with this particular id
  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM cashier where supplier_id = ".$_SESSION['supplier_id'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $_SESSION['cashier_id']  = $row[0];
      $GLOBALS['cashierdate']  = $row[1];
      $GLOBALS['supplier_id'] = $row[2];
    }
  }else{
      echo "no match!";
  }
  accounting();
}

function accounting()
{
todo(' ');
//getting id from url
//selecting data associated with this particular id

  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM accounting where cashier_id = ".$_SESSION['cashier_id'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $_SESSION['accounting_id'] = $row[0];
      $GLOBALS['accounting_date'] = $row[1];
      $GLOBALS['cashier_id'] = $row[2]; 
    }
  }else{
      echo "no match!";
  }
  remarks();
}

function remarks()
{
todo(' ');
//getting id from url
//selecting data associated with this particular id

  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM remarks where pr_id =".$_SESSION['prid'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $GLOBALS['remarks_id'] = $row[0];
      $GLOBALS['remarks_details'] = $row[1];
      $GLOBALS['pr_id'] = $row[2];
    }
  }else{
      echo "no match!";
  }
  delivery();
}


function delivery()
{
todo(' ');
//getting id from url
//selecting data associated with this particular id

  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM delivery where pr_id =".$_SESSION['prid'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $GLOBALS['pr_id'] = $row[0];
      $GLOBALS['notice_to_proceed'] = $row[1];
      $GLOBALS['delivery_completion'] = $row[2];
      $GLOBALS['acceptance_turn_over'] = $row[3];
      $GLOBALS['cino'] = $row[4];
      $GLOBALS['number_of_days_po_to_delivery'] = $row[5];
      $GLOBALS['number_of_days_delivery_to_cashier'] = $row[6];
    }
  }else{
      echo "no match!";
  }
  cost();
}



function cost()
{
todo(' ');
//getting id from url
//selecting data associated with this particular id

  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM cost where accounting_id=".$_SESSION['accounting_id'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $GLOBALS['po_id'] = $row[0];
      $GLOBALS['po_number'] = $row[1];
      $GLOBALS['total_actual_cost'] = $row[2];
      $GLOBALS['total_approved_budget_cost'] = $row[3];
      $GLOBALS['accounting_id'] = $row[4];
    }
  }else{
      echo "no match!";
  }
  req_div();
}


function req_div(){
todo(' ');
echo $_SESSION['prid'];
//getting id from url
//selecting data associated with this particular id
  $con = viaAttempConMessageErrno();
  $sql = "SELECT * FROM req_div where pr_id =".$_SESSION['prid'].";";
  $result = $con->query($sql);

  if($result->num_rows > 0)
  { 
    while($row = $result->fetch_array())
    { 
      $GLOBALS['pr_id'] = $row[0];
      $GLOBALS['division'] = $row[1];
    }
  }else{
      echo "no match!";
  }
}
?>

<html>
<head>  
 <title>Edit Data</title>
</head>

<body>
    <form name="form1" method="post" action="updateRemarks.php">
        <table border="0">
            <tr> 
<td>     

                <label for="example-date-input" class="col-2 col-form-label">PR Number:</label>
                <br>
                    <input class="form-control" type="text" id="date" name="prnumber" value ="<?php echo $pr_number;?>" style="width: 400px" ><br>
                    <br>

                 <label for="example-date-input" class="col-2 col-form-label">PR Date:</label>
                  <br>  <input class="form-control" type="date" value="<?php echo $pr_date;?>" id="date" name="prdate" style="width: 400px"><br>
                    <br>

                 <label for="example-date-input" class="col-2 col-form-label">Request Date:</label>
                  <br>  <input class="form-control" type="date" value="<?php echo $request_date;?>" id="date" name="requestdate" style="width:
                     400px"><br>
                     <br>

                <label for="example-date-input" class="col-2 col-form-label">Date Required:</label>
                <br>    <input class="form-control" type="date" value="<?php echo $date_required;?>" id="date" name="daterequired" style="width:
                     400px"><br>
                     <br>

                  <label for="example-date-input" class="col-2 col-form-label">Particulars Details</label>
                  <br>
                    <input class="form-control" type="text" name="particularsdetails" value="<?php echo $particulars_details;?>" style="width: 400px"><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Requesting Division</label>
                    <br>
                    <input class="form-control" type="text" name="requestingdivision" value ="<?php echo $division;?>" style="width: 400px"><br>
                    <br>

                  <label for="example-date-input" class="col-2 col-form-label">Date:</label>
                  <br>
                    <input class="form-control" type="date" id="date" name="date" value ="<?php echo $accounting_date;?>" style="width: 400px"><br>
                    <br>
                 <label for="example-date-input" class="col-2 col-form-label">Cashier Date:</label>
                 <br>
                    <input class="form-control" type="date" id="date" name="cashierdate" value = "<?php echo $cashierdate;?>" style="width: 400px"><br>
                    <br>

                 <label for="example-date-input" class="col-2 col-form-label">Supplier Name:</label>
                 <br>
                    <input class="form-control" type="text" id="date" name="suppliername" value ="<?php echo $supplier;?>" style="width: 400px"><br>
                    <br>

                   <label for="example-date-input" class="col-2 col-form-label">Notice to Proceed:</label>
                   <br>
                    <input class="form-control" type="date" id="date" name="noticetoproceed" value ="<?php echo $notice_to_proceed?>" style="width: 400px"><br>
                    <br>

</td>
<td>  
    <br>
                     <label for="example-date-input" class="col-2 col-form-label">Delivery Completion:</label>
                     <br>
                    <input class="form-control" type="date" id="date" name="deliverycompletion" value ="<?php echo $delivery_completion;?>" style="width: 400px"><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Acceptance Turn over:</label>
                       <br>
                    <input class="form-control" type="text" id="date" name="acceptanceturnover" value ="<?php echo $acceptance_turn_over;?>" style="width: 400px"><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Ci Number:</label>
                       <br>
                    <input class="form-control" type="text" id="date" name="cinumber" value ="<?php echo $cino?>" style="width: 400px"><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Number of days po-delivery:</label>
                       <br>
                    <input class="form-control" type="text" id="date" name="podelivery" value = "<?php echo $number_of_days_po_to_delivery;?>" style="width: 400px"><br>
                    <br>

                       <label for="example-date-input" class="col-2 col-form-label">Number of days delivery-cashier:</label>
                       <br>
                    <input class="form-control" type="text"  id="date" name="deliverycashier" value = "<?php echo $number_of_days_po_to_delivery;?>" style="width: 400px"><br>
                    <br>
                    <label for="example-date-input" class="col-2 col-form-label">Accounting Date:</label>
                    <br>
                    <input class="form-control" type="date" id="date" value = "<?php echo $accounting_date;?>" name="accountingdate" style="width: 400px"><br>  
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Remarks Details:</label>
                    <br>
                    <input class="form-control" type="text"  id="date" name="remarksdetails" value ="<?php echo $remarks_details;?>" style="width: 400px"><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Po Number:</label>
                    <br>
                    <input class="form-control" type="text"  id="date" name="ponumber" value="<?php echo $po_number?>" style="width: 400px"><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">Total Actual Cost:</label>
                    <br>
                    <input class="form-control" type="text"  id="date" name="totalactualcost" value ="<?php echo $total_actual_cost?>" style="width: 400px"><br>
                    <br>

                    <label for="example-date-input" class="col-2 col-form-label">total Approved Budget Cost:</label><br>
                    <input class="form-control" type="text" id="date" name="totalapprovedcost" value ="<?php echo $total_approved_budget_cost?>" style="width: 400px"><br>
                    <br>    
</td>
</tr>
            <tr>
                <td><input type="hidden" name="prid" value=<?php echo $_GET['prid'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>
