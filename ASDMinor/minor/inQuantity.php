<?php
function calcQuantity($filter){

  INCLUDE('../minor/config.php'); 
  $sql ="SELECT
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
  count(p.pr_id)                           As counter
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
     WHERE cat.`category_name` = '".$filter."'
      AND d.acceptance_turn_over IS NOT NULL AND cat.category_name IS NOT NULL AND q.`pieces` IS NULL";

$result = $con->query($sql);
  if($result->num_rows > 0)
  {
     while($row = $result->fetch_array())
    { 
    $_SESSION['Quantity'] = $row[19];
  }
}
}
       ?>


