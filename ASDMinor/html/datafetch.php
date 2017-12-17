<?php
@include_once("../serverConfig/serverCon.php");
require '../Classes/PHPExcel/IOFactory.php';
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dti_procurement');
todo(' ');
if(isset($_POST['upload'])){
	$inputfil ename =rand().'.xls';
	$exceldata = array();

	

	try
	{
		$inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
		$objReader = PHPExcel_IOFactory::createReader($inputfiletype);
		$objPHPExcel =$objReader->load($inputfilename);
	}
	catch(Exception $e)
	{
		die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'":'.$e->getMessage());
	} 
	$sheet = $objPHPExcel->getSheet(0);
	$highestRow = $sheet->getHighestRow();
	$highestColumn = $sheet ->getHighestColumn();

	for($row=1;$row<=$highestRow;$row++){
		$rowData = $sheet->rowToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

	 $count = 0;
 	foreach ($_SESSION['stored'] as $value) {
    echo $count;
 	if($_SESSION['insertintoSuppliers'] == $value && $count == 0){
 		$con = viaAttempConMessageErrno();
 		$_SESSION['suppliername'] = $_POST['suppliername'];
		$sql = "CALL insertintoSupplier('".$_POST['suppliername']."',".$_SESSION['userid'].")";
		viaTableMessage($sql,$con);
		toGetIDSuppliers();
	}

   else if($_SESSION['insertintoParticulars'] == $value && $count == 1){
   echo $_POST['daterequired'];
  	 	$con = viaAttempConMessageErrno();
	$sql = "CALL insertIntoParticulars(".$_POST['prnumber'].",'".$_POST['prdate']."','".$_POST['requestdate']."','".$_POST['daterequired'] ."',".$_SESSION['suppliers_id'].",'".$_POST['particularsdetails']."');";
		viaTableMessage($sql,$con);
 		toGetIDParticulars();
	}

	else if($_SESSION['insertintoReqdiv'] == $value && $count == 2){
  	$con = viaAttempConMessageErrno();
	$sql = "CALL insertintoReqdiv(".$_SESSION['pr_id'].",".$_POST['requestingdivision'].");";
		viaTableMessage($sql,$con);
 		toGetIDParticulars();
	}

	else if($_SESSION['insertintoDelivery'] && $count == 3){
		$con = viaAttempConMessageErrno();
	$sql = "CALL insertIntoDelivery(".$_SESSION['pr_id'].",'".$_POST['noticetoproceed']."','".$_POST['deliverycompletion']."','".$_POST['acceptanceturnover']."','".$_POST['cinumber']."',".$_POST['podelivery'].",".
		$_POST['deliverycashier'].");";
		viaTableMessage($sql,$con);
	}	

	if($_SESSION['insertintoCashier'] == $value && $count == 4){
		$con = viaAttempConMessageErrno();
		$sql = "CALL insertIntoCashier('".$_POST['cashierdate']."',".$_SESSION['suppliers_id'].");";
		viaTableMessage($sql,$con);
		toGetIDCashier();
	}

	if($_SESSION['insertintoAccounting'] == $value && $count == 5){
		$con = viaAttempConMessageErrno();
        echo "--".$_POST['accountingdate'];
		$sql = "CALL insertIntoAccounting('".$_POST['accountingdate']."',".$_SESSION['cashier_id'].")";
		viaTableMessage($sql,$con);
		toGetIDAccounting();
	}
	
	if($_SESSION['insertintoCost'] == $value && $count == 6){
		$con = viaAttempConMessageErrno();
		$sql = "CALL insertIntoCost(".$_POST['ponumber'].",".$_POST['totalactualcost'].",".$_POST['totalapprovedcost'].",".$_SESSION['accounting_id'].");";
		viaTableMessage($sql,$con);
	}
		
	if($_SESSION['insertintoRemarks'] == $value && $count == 7){
		$con = viaAttempConMessageErrno();
		$sql = "CALL insertIntoRemarks('PAYABLE',".$_SESSION['pr_id'].");";
		viaTableMessage($sql,$con);

	}
	$count++;

	if(mysqli_query($conn,$sql))
	{
	 	$exceldata[] = $rowData[0];
	}
	else{
		echo "Error:" .$sql."<br>".mysqli_error($conn);
	}

	}
echo "<table border='1'>";
foreach ($exceldata as $index => $excelraw) 
{	
	echo "<tr>";
	foreach($excelraw as $excelcolumn)
	{
	echo "<td>".$excelcolumn."</td>";

    }
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);

}
}
?>