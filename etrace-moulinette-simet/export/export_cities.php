<?php  
//export_cities.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "root", "ratp");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=villes-jour-mois-année.csv', ';');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('VIL_ID', 'VIL_CP', 'VIL_NOM'), ';');  
      $query ="SELECT * FROM `ville`;";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row, ';');  
      }  
      fclose($output);  

      $data = file_get_contents('http://localhost/export_import/');
      file_put_contents('../../export_import/villes-jour-mois-année.csv',$data);
      unset($data);
 }  
 ?>  