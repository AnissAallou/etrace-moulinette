<?php  
//export_users.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "root", "ratp");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=utilisateurs-jour-mois-année.csv', ';');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('UTI_ID', 'SOC_ID', 'UTI_Type', 'UTI_Login', 'UTI_Pass', 'UTI_PassExpire', 'UTI_DateExpiration', 'UTI_Nom', 'UTI_Prenom', 'UTI_DateConnexion', 'UTI_Actif'), ';');  
      $query ="SELECT UTI_ID, SOC_ID, UTI_Type, UTI_Login, UTI_Pass, FROM_UNIXTIME(UTI_PassExpire), FROM_UNIXTIME(UTI_DateExpiration), UTI_Nom, UTI_Prenom, FROM_UNIXTIME(UTI_DateConnexion), UTI_Actif FROM `utilisateurs`";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row, ';');  
      }  
      fclose($output);  

      $data = file_get_contents('http://localhost/export_import/');
      file_put_contents('../../export_import/utilisateurs-jour-mois-année.csv',$data);
      unset($data);
 }  
 ?>  