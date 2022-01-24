<?php

//fetch_users.php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
 $column = fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $row_data[] = array(
   'uti_id'  => $row[0],
   'soc_id'  => $row[1],
   'uti_type'  => $row[2],
   'uti_login'  => $row[3],
   'uti_pass'  => $row[4],
   'uti_pass_expire'  => $row[5],
   'uti_date_expiration'  => $row[6],
   'uti_nom'  => $row[7],
   'uti_prenom'  => $row[8],
   'uti_date_connexion'  => $row[9],
   'uti_actif'  => $row[10]
  );
 }
 $output = array(
  'column'  => $column,
  'row_data'  => $row_data
 );

 echo json_encode($output);

}

?>