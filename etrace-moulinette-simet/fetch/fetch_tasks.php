<?php

//fetch_tasks.php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
 $column = fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $row_data[] = array(
   'tac_id'  => $row[0],
   'tac_id_liaison'  => $row[1],
   'tym_id'  => $row[2],
   'cli_id'  => $row[3],
   'adr_id'  => $row[4],
   'age_id'  => $row[5],
   'dep_id'  => $row[6],
   'uti_id'  => $row[7],
   'tac_numero'  => $row[8],
   'tac_statut'  => $row[9],
   'tac_date'  => $row[10],
   'tac_date_livraison'  => $row[11],
   'tac_date_rdv'  => $row[12],
   'tac_description'  => $row[13],
   'tac_reference'  => $row[14],
   'usr_date_modif'  => $row[15],
   'usr_user_modif'  => $row[16],
   'sli_id'  => $row[17],
   'sli_id_liaison'  => $row[18],
   'art_id'  => $row[19],
   'sli_quantite'  => $row[20],
   'sli_quantite_prepare'  => $row[21],
   'sns_id'  => $row[22],
   'sns_numero_serie'  => $row[23],
   'sns_code_barre'  => $row[24],
   'stp_id'  => $row[25],
   'sns_emplacement'  => $row[26],
  );
 }
 $output = array(
  'column'  => $column,
  'row_data'  => $row_data
 );

 echo json_encode($output);

}

?>