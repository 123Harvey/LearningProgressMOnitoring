<!Doctype>
<html>
<style >
table.tbl_wb {
	text-align: left;
	border: 1px solid gray;
	font-size: 12pt;
	border-collapse: collapse;
	text-align: center;

}

td.tbl_wb {

	border: 0px solid 	#F5F5F5;
	text-align: center;
	font-size: 12pt;

	border-collapse: collapse;
	border-bottom: 1px solid #B0C4DE;
}

th.tbl_wb {
	border-bottom: 1px solid #B0C4DE;

	text-align: center;
	background-color: 	#E6E6FA;
	color: black;
	font-size: 11pt;
	font-weight: bolder;
}
tr:nth-child(even){background-color:   #F0F0F0 }

tr.tbl_wb:hover{background-color: #DFE3EE}
</style>
</html>
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../minor/login.php");
}
remarksView();
function remarksView()
{
	INCLUDE_ONCE('../minor/config.php');
	$sql = "select * from history;";
	$result = $con->query($sql);
	if($result->num_rows > 0)
	{ 
		echo '<table class="tbl_wb" style="width:250%; table-layout:fixed">';
			
					echo '<tr class="tbl_wb width="150%">';
					echo '<th class="tbl_wb"> Date</th>';
					echo '<th class="tbl_wb"> PR._No.</th>';
					echo '<th class="tbl_wb"> Particulars</th>';
					echo '<th class="tbl_wb"> Date_Required/Needed</th>';
					echo '<th class="tbl_wb"> Total</th>';
					echo '<th class="tbl_wb"> Requesting_Division</th>';
					echo '<th class="tbl_wb"> PO. No.</th>';
					echo '<th class="tbl_wb"> Supplier</th>';
					echo '<th class="tbl_wb"> Total</th>';
					echo '<th class="tbl_wb"> Notice_to_Proceed</th>';
					echo '<th class="tbl_wb"> Delivery/Completion</th>';
					echo '<th class="tbl_wb"> Acceptance/Turnover</th>';
					echo '<th class="tbl_wb"> CI._No.</th>';
					echo '<th class="tbl_wb"> Accounting</th>';
					echo '<th class="tbl_wb"> Cashier</th>';
					echo '<th class="tbl_wb"> PO-Delivery.</th>';
					echo '<th class="tbl_wb"> Delivery-Cashier</th>';
					echo '<th class="tbl_wb"> Remarks</th>';
				echo '</tr>';
		
		while($row = $result->fetch_array())
		{	
				echo '<td class="tbl_wb" width="20%">'.$row[0].' ';
			echo '<td class="tbl_wb" width="15%" >'.$row[1].' ';
			echo '<td class="tbl_wb" width="15%">'.$row[2].'' ;
			echo '<td class="tbl_wb" width="15%">'.$row[3].'' ;
			echo '<td class="tbl_wb" width="15%">'.$row[4].'' ;
			echo '<td class="tbl_wb" width="15%">' .$row[5].'';
			echo '<td class="tbl_wb" width="15%">'.$row[6].' ';
			echo '<td class="tbl_wb" width="15%" >'.$row[7].' ';
			echo '<td class="tbl_wb" width="15%">'.$row[8].'' ;
			echo '<td class="tbl_wb" width="15%">'.$row[9].'' ;
			echo '<td class="tbl_wb" width="40%">'.$row[10].'' ;
			echo '<td class="tbl_wb" width="40%">' .$row[11].'';
			echo '<td class="tbl_wb" width="40%">'.$row[12].' ';
			echo '<td class="tbl_wb" width="40%" >'.$row[13].' ';
			echo '<td class="tbl_wb" width="40%">'.$row[14].'' ;
			echo '<td class="tbl_wb" width="40%">'.$row[15].'' ;
				echo '<td class="tbl_wb" width="40%">'.$row[16].'' ;
					echo '<td class="tbl_wb" width="40%">'.$row[17].'' ;
						echo '</tr>';
		}
	}else{
		echo '<center><h1 style = "color:red;font-size:50px">'. "no items!".'</h1></center>';
	}
	if($con->query($sql))
		//echo "Database created successfully";successfully created I
		{}
	else
		die("error creating database");

	$con->close();
}