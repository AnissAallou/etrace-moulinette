<?php  
//export_tasks.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "root", "ratp");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=taches-jour-mois-année.csv', ';');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('TAC_ID', 'TAC_ID_Liaison', 'TYM_ID', 'CLI_ID', 'ADR_ID', 'AGE_ID', 'DEP_ID', 'UTI_ID', 'TAC_Numero', 'TAC_Statut', 'TAC_Date', 'TAC_DateLivraison', 'TAC_DateRDV', 'TAC_Description', 'TAC_Reference', 'USR_DateModif', 'USR_UserModif', 'SLI_ID', 'SLI_ID_Liaison', 'ART_ID', 'SLI_Quantite', 'SLI_QuantitePrepare', 'SNS_ID', 'SNS_NumeroSerie', 'SNS_CodeBarre', 'STP_ID', 'SNS_Emplacement' ), ';');
      $query = "SELECT stock_tache_entete.TAC_ID, stock_tache_entete.TAC_ID_Liaison, stock_tache_entete.TYM_ID, stock_tache_entete.CLI_ID, stock_tache_entete.ADR_ID, stock_tache_entete.AGE_ID, stock_tache_entete.DEP_ID, stock_tache_entete.UTI_ID, stock_tache_entete.TAC_Numero, stock_tache_entete.TAC_Statut, FROM_UNIXTIME(stock_tache_entete.TAC_Date), FROM_UNIXTIME(stock_tache_entete.TAC_DateLivraison), FROM_UNIXTIME(stock_tache_entete.TAC_DateRDV), stock_tache_entete.TAC_Description, stock_tache_entete.TAC_Reference, FROM_UNIXTIME(stock_tache_entete.USR_DateModif), stock_tache_entete.USR_UserModif, stock_tache_ligne.SLI_ID, stock_tache_ligne.SLI_ID_Liaison, stock_tache_ligne.ART_ID, stock_tache_ligne.SLI_Quantite, stock_tache_ligne.SLI_QuantitePrepare, stock_tache_ligne_serie.SNS_ID, stock_tache_ligne_serie.SNS_NumeroSerie, stock_tache_ligne_serie.SNS_CodeBarre, stock_tache_ligne_serie.STP_ID, stock_tache_ligne_serie.SNS_Emplacement 
      FROM stock_tache_entete JOIN stock_tache_ligne ON stock_tache_entete.TAC_ID = stock_tache_ligne.TAC_ID 
      JOIN stock_tache_ligne_serie ON stock_tache_ligne.ART_ID = stock_tache_ligne_serie.ART_ID";
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row, ';');  
      }  
      fclose($output);  

      $data = file_get_contents('http://localhost/export_import/');
      file_put_contents('../../export_import/taches-jour-mois-année.csv',$data);
      unset($data);
 }  
 ?>  