<?php
session_start();
include('../include/conQuery.php');
include('../serverConfig/serverCon.php');
todo('');
$con = viaAttempConMessageErrno();
todo(' ');
echo $_SESSION['filter'];
	$sql = "select * from remarksview where remarks_details ='".$_SESSION['filter']."';";

	$result = $con->query($sql);
	if($result->num_rows > 0)
	{
		$output .= '
			
	<table class="tbl_wb"  style="width:250%; table-layout:fixed">
			
				<tr class="tbl_wb" >
			
				   <th class="tbl_wb" > Date</th>
					<th class="tbl_wb" > PR._No.</th>
					<th class="tbl_wb"> Particulars</th>
					<th class="tbl_wb"> Total</th>
					<th class="tbl_wb" > Requesting_Division</th>
					<th class="tbl_wb" > PO. No.</th>
					<th class="tbl_wb" > Supplier</th>
					<th class="tbl_wb" > Total</th>
					<th class="tbl_wb"> Notice_to_Proceed</th>
					<th class="tbl_wb"> Delivery/Completion</th>
					<th class="tbl_wb"> Acceptance/Turnover</th>
					<th class="tbl_wb" > CI._No.</th>
					<th class="tbl_wb" >Accounting</th>
					<th class="tbl_wb" > Cashier</th>
					<th class="tbl_wb" > PO-Delivery.</th>
					<th class="tbl_wb"> Delivery-Cashier</th>
					<th class="tbl_wb"> Remarks</th>
				

				</tr>
		';

		while($row = mysqli_fetch_array($result))
		{
			$output.='
				<td >'.$row[0].' 
			<td  >'.$row[1].' 
			<td >'.$row[2].' 
			<td >'.$row[3].' 
			<td >'.$row[4].' 
			<td >' .$row[5].'
			<td >'.$row[6].' 
			<td >'.$row[7].' 
			<td >'.$row[8].' 
			<td >'.$row[9].'
			<td >'.$row[10].' 
			<td >' .$row[11].'
			<td >'.$row[12].' 
			<td >'.$row[13].' 
			<td >'.$row[14].' 
			<td >'.$row[15].' 
			<td >'.$row[16].'	
			
			</tr>
			';
		}
		viaStoredMessage($con,$sql);
		$output .= '</table>';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition:attachment; filename='.rand().'.xls');
		echo $output;
	}

if(isset($_POST["export_excel"]))
{
$sql ="SELECT * FROM home ";
$result = mysqli_query($connect, $sql);
	if(mysqli_num_rows($result)>0)
	{
		$output .= '
			
	<table class="tbl_wb"  style="width:250%; table-layout:fixed">
			
				<tr class="tbl_wb" >
			
				   <th class="tbl_wb" > Date</th>
					<th class="tbl_wb" > PR._No.</th>
					<th class="tbl_wb"> Particulars</th>
					<th class="tbl_wb"> Total</th>
					<th class="tbl_wb" > Requesting_Division</th>
					<th class="tbl_wb" > PO. No.</th>
					<th class="tbl_wb" > Supplier</th>
					<th class="tbl_wb" > Total</th>
					<th class="tbl_wb"> Notice_to_Proceed</th>
					<th class="tbl_wb"> Delivery/Completion</th>
					<th class="tbl_wb"> Acceptance/Turnover</th>
					<th class="tbl_wb" > CI._No.</th>
					<th class="tbl_wb" >Accounting</th>
					<th class="tbl_wb" > Cashier</th>
					<th class="tbl_wb" > PO-Delivery.</th>
					<th class="tbl_wb"> Delivery-Cashier</th>
					<th class="tbl_wb"> Remarks</th>
				

				</tr>
		';

		while($row = mysqli_fetch_array($result))
		{
			$output.='
				<td >'.$row[0].' 
			<td  >'.$row[1].' 
			<td >'.$row[2].' 
			<td >'.$row[3].' 
			<td >'.$row[4].' 
			<td >' .$row[5].'
			<td >'.$row[6].' 
			<td >'.$row[7].' 
			<td >'.$row[8].' 
			<td >'.$row[9].'
			<td >'.$row[10].' 
			<td >' .$row[11].'
			<td >'.$row[12].' 
			<td >'.$row[13].' 
			<td >'.$row[14].' 
			<td >'.$row[15].' 
			<td >'.$row[16].'	
			</tr>
			';
		}
		$output .= '</table>';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition:attachment; filename='.rand().'.xls');
		echo $output;
	}
}
?>