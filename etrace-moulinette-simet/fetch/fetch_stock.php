<?php 

//fetch_stock.php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
 $column = fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $row_data[] = array(
   'stk_id'  => $row[0],
   'dep_id'  => $row[1],
   'art_id'  => $row[2],
   'stk_quantite'  => $row[3],
   'stk_quantite_commande'  => $row[4],
   'stk_quantite_reserve'  => $row[5],
   'stp_id'  => $row[6]
  );
 }
 $output = array(
  'column'  => $column,
  'row_data'  => $row_data
 );

 echo json_encode($output);

}

?>