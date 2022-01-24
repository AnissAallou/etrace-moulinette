<?php  
//export_stock.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "root", "ratp");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=stock-jour-mois-année.csv', ';');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('STK_ID', 'DEP_ID', 'ART_ID', 'STK_Quantite', 'STK_QuantiteCommande', 'STK_QuantiteReserve', 'STP_ID'), ';');  
      $query = "SELECT * FROM `stock`";
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row, ';');  
           
      }  
      fclose($output);  

      $data = file_get_contents('http://localhost/export_import/');
      file_put_contents('../../export_import/stock-jour-mois-année.csv',$data);
      unset($data);
 }  
 ?>  