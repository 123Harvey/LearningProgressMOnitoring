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
.message{
	text-align: center;
	font-size: 20px;
}
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
	$sql = "SELECT
  `p`.`pr_date`                            AS `pr_date`,
  `p`.`pr_number`                          AS `pr_number`,
  `p`.`particulars_details`                AS `particulars_details`,
  `co`.`total_approved_budget_cost`        AS `total_approved_budget_cost`,
  `r`.`division`                           AS `division`,
  `co`.`po_number`                         AS `po_number`,
  `s`.`supplier_name`                      AS `supplier_name`,
  `co`.`total_actual_cost`                 AS `total_actual_cost`,
  `d`.`notice_to_proceed`                  AS `notice_to_proceed`,
  `d`.`delivery_completion`                AS `delivery_completion`,
  `d`.`acceptance_turn_over`               AS `acceptance_turn_over`,
  `d`.`ci_no`                              AS `ci_no`,
  `a`.`accounting_date`                    AS `accounting_date`,
  `c`.`cashier_date`                       AS `cashier_date`,
  `d`.`number_of_days_po_to_delivery`      AS `number_of_days_po_to_delivery`,
  `d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,
  `re`.`remarks_details`                   AS `remarks_details`,
  `p`.`pr_id`                              AS `pr_id`,
  `cat`.`category_name`                    AS `category_name`,
  `q`.`pieces`                             AS `amount`
FROM (((((((((`particulars` `p`
           LEFT JOIN `supplier` `s`
             ON ((`p`.`supplier_id` = `s`.`supplier_id`)))
          LEFT JOIN `cashier` `c`
            ON ((`c`.`supplier_id` = `s`.`supplier_id`)))
         LEFT JOIN `accounting` `a`
           ON ((`a`.`cashier_id` = `c`.`cashier_id`)))
        LEFT JOIN `cost` `co`
          ON ((`co`.`accounting_id` = `a`.`accounting_id`)))
       LEFT JOIN `req_div` `r`
         ON ((`r`.`pr_id` = `p`.`pr_id`)))
      LEFT JOIN `delivery` `d`
        ON ((`d`.`pr_id` = `p`.`pr_id`)))
     LEFT JOIN `remarks` `re`
       ON ((`re`.`pr_id` = `p`.`pr_id`)))
    LEFT JOIN `category` `cat`
      ON ((`p`.`pr_id` = `cat`.`pr_id`)))
   LEFT JOIN `quantity` `q`
     ON ((`p`.`pr_id` = `q`.`pr_id`)))
WHERE acceptance_turn_over IS not NULL
AND category_name IS NULL";
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
					echo '<th class="tbl_wb"> Category </th>';

				echo '</tr>';
		
		while($row = $result->fetch_array())
		{	
			// if($row[10] !="" && $row[18]=="")
			// {
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
			echo '<td class="tbl_wb" width="40%">' .$row[10].'';
			echo '<td class="tbl_wb" width="40%">'.$row[12].' ';
			echo '<td class="tbl_wb" width="40%" >'.$row[13].' ';
			echo '<td class="tbl_wb" width="40%">'.$row[14].'' ;
			echo '<td class="tbl_wb" width="40%">'.$row[15].'' ;
			echo '<td class="tbl_wb" width="40%">'.$row[16].'' ;
			echo '<td class="tbl_wb" width="40%">'.$row[17].'' ;
			echo '<td/><select name="forma" onchange="location = this.value;">';
			 echo "
			 <option value='' disabled selected>Select Category</option>
			 <option value=\"../minor/updateRemarks.php?category=foods&prid=$row[17]\">Foods</option>
			 <option value=\"../minor/updateRemarks.php?category=hardware&prid=$row[17]\">Hardware</option>
			 <option value=\"../minor/updateRemarks.php?category=rental&prid=$row[17]\">Rental</option>
			 <option value=\"../minor/updateRemarks.php?category=officesupplies&prid=$row[17]\">Office Supplies</option>
			 <option value=\"../minor/updateRemarks.php?category=others&prid=$row[17]\">Others</option>
			</select>";
			// echo "<td  class='tbl_wb'><a href=\"../minor/updateRemarks.php?prid=$row[17]\">Add Inventory</a></td>";	
						echo '</tr>';
					// }
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