<?php

// import_tasks.php

if(isset($_POST["tac_id"]) && isset($_POST["tac_id_liaison"]) && isset($_POST["tym_id"]) && isset($_POST["cli_id"]) && isset($_POST["adr_id"]) && isset($_POST["age_id"]) 
&& isset($_POST["dep_id"]) && isset($_POST["uti_id"]) && isset($_POST["tac_numero"]) && isset($_POST["tac_statut"]) && isset($_POST["tac_date"]) && isset($_POST["tac_date_livraison"]) 
&& isset($_POST["tac_date_rdv"]) && isset($_POST["tac_description"]) && isset($_POST["tac_reference"]) && isset($_POST["usr_date_modif"]) && isset($_POST["usr_user_modif"]) 
&& isset($_POST["sli_id"]) && isset($_POST["sli_id_liaison"]) && isset($_POST["art_id"]) && isset($_POST["sli_quantite"]) && isset($_POST["sli_quantite_prepare"]) 
&& isset($_POST["sns_id"]) && isset($_POST["sns_numero_serie"]) && isset($_POST["sns_code_barre"]) && isset($_POST["stp_id"]) && isset($_POST["sns_emplacement"]))
{
 // PDO connection
 $connect = new PDO("mysql:host=localhost;dbname=ratp", "root", "root");

 // Data transfert using POST method
 $tac_id = $_POST["tac_id"];
 $tac_id_liaison = $_POST["tac_id_liaison"];
 $tym_id = $_POST["tym_id"];
 $cli_id = $_POST["cli_id"];
 $adr_id = $_POST["adr_id"];
 $age_id = $_POST["age_id"];
 $dep_id = $_POST["dep_id"];
 $uti_id = $_POST["uti_id"];
 $tac_numero = $_POST["tac_numero"];
 $tac_statut = $_POST["tac_statut"];
 $tac_date = $_POST["tac_date"];
 $tac_date_livraison = $_POST["tac_date_livraison"];
 $tac_date_rdv = $_POST["tac_date_rdv"];
 $tac_description = $_POST["tac_description"];
 $tac_reference = $_POST["tac_reference"];
 $usr_date_modif = $_POST["usr_date_modif"];
 $usr_user_modif = $_POST["usr_user_modif"];
 $sli_id = $_POST["sli_id"];
 $sli_id_liaison = $_POST["sli_id_liaison"];
 $art_id = $_POST["art_id"];
 $sli_quantite = $_POST["sli_quantite"];
 $sli_quantite_prepare = $_POST["sli_quantite_prepare"];
 $sns_id = $_POST["sns_id"];
 $sns_numero_serie = $_POST["sns_numero_serie"];
 $sns_code_barre = $_POST["sns_code_barre"];
 $stp_id = $_POST["stp_id"];
 $sns_emplacement = $_POST["sns_emplacement"];
 for($count = 0; $count < count($tac_id); $count++)
 {
  $query .= "INSERT INTO stock_tache_entete, stock_tache_ligne, stock_tache_ligne_serie (SELECT stock_tache_entete.TAC_ID, stock_tache_entete.TAC_ID_Liaison, stock_tache_entete.TYM_ID, 
  stock_tache_entete.CLI_ID, stock_tache_entete.ADR_ID, stock_tache_entete.AGE_ID, stock_tache_entete.DEP_ID, stock_tache_entete.UTI_ID, stock_tache_entete.TAC_Numero, 
  stock_tache_entete.TAC_Statut, FROM_UNIXTIME(stock_tache_entete.TAC_Date), FROM_UNIXTIME(stock_tache_entete.TAC_DateLivraison), FROM_UNIXTIME(stock_tache_entete.TAC_DateRDV), 
  stock_tache_entete.TAC_Description, stock_tache_entete.TAC_Reference, FROM_UNIXTIME(stock_tache_entete.USR_DateModif), stock_tache_entete.USR_UserModif, stock_tache_ligne.SLI_ID, 
  stock_tache_ligne.SLI_ID_Liaison, stock_tache_ligne.ART_ID, stock_tache_ligne.SLI_Quantite, stock_tache_ligne.SLI_QuantitePrepare, stock_tache_ligne_serie.SNS_ID, 
  stock_tache_ligne_serie.SNS_NumeroSerie, stock_tache_ligne_serie.SNS_CodeBarre, stock_tache_ligne_serie.STP_ID, stock_tache_ligne_serie.SNS_Emplacement 
  FROM stock_tache_entete JOIN stock_tache_ligne ON stock_tache_entete.TAC_ID = stock_tache_ligne.TAC_ID 
  JOIN stock_tache_ligne_serie ON stock_tache_ligne.ART_ID = stock_tache_ligne_serie.ART_ID) VALUES ('".$tac_id[$count]."', '".$tac_id_liaison[$count]."', '".$tym_id[$count]
  ."', '".$cli_id[$count]."', '".$adr_id[$count]."', '".$age_id[$count]."', '".$dep_id[$count]."', '".$uti_id[$count]."', '".$tac_numero[$count]."', '".$tac_statut[$count]
  ."', '".$tac_date[$count]."', '".$tac_date_livraison[$count]."', '".$tac_date_rdv[$count]."', '".$tac_description[$count]."', '".$tac_reference[$count]."', '".$usr_date_modif[$count]
  ."', '".$usr_user_modif[$count]."', '".$sli_id[$count]."', '".$sli_id_liaison[$count]."', '".$art_id[$count]."', '".$sli_quantite[$count]."', '".$sli_quantite_prepare[$count]
  ."', '".$sns_id[$count]."', '".$sns_numero_serie[$count]."', '".$sns_code_barre[$count]."', '".$stp_id[$count]."', '".$sns_emplacement[$count]."');
  INSERT INTO `tasks`(`TAC_ID`, `TAC_ID_Liaison`, `TYM_ID`, `CLI_ID`, `ADR_ID`, `AGE_ID`, `DEP_ID`, `UTI_ID`, `TAC_Numero`, `TAC_Statut`, `TAC_Date`, `TAC_DateLivraison`, 
  `TAC_DateRDV`, `TAC_Description`, `TAC_Reference`, `USR_DateModif`, `USR_UserModif`, `SLI_ID`, `SLI_ID_Liaison`, `ART_ID`, `SLI_Quantite`,
  `SLI_QuantitePrepare`, `SNS_ID`, `SNS_NumeroSerie`, `SNS_CodeBarre`, `STP_ID`, `SNS_Emplacement`) VALUES ('".$tac_id[$count]."', '".$tac_id_liaison[$count]."', '".$tym_id[$count]."', '".$cli_id[$count].
  "', '".$adr_id[$count]."', '".$age_id[$count]."', '".$dep_id[$count]."', '".$uti_id[$count]."', '".$tac_numero[$count]."', '".$tac_statut[$count]."', '".$tac_date[$count].
  "', '".$tac_date_livraison[$count]."', '".$tac_date_rdv[$count]."', '".$tac_description[$count].."', '".$tac_reference[$count]."', '".$usr_date_modif[$count]."', '".$usr_user_modif[$count].
  "', '".$sli_id[$count]."', '".$sli_id_liaison[$count]"', '".$art_id[$count]"', '".$sli_quantite[$count]"', '".$sli_quantite_prepare[$count]
  "', '".$sns_id[$count]"', '".$sns_numero_serie[$count]"', '".$sns_code_barre[$count]"', '".$stp_id[$count]"', '".$sns_emplacement[$count]"');";
  /*
  $query .= "INSERT INTO `tasks`(`TAC_ID`, `TAC_ID_Liaison`, `TYM_ID`, `CLI_ID`, `ADR_ID`, `AGE_ID`, `DEP_ID`, `UTI_ID`, `TAC_Numero`, `TAC_Statut`, `TAC_Date`, `TAC_DateLivraison`, 
  `TAC_DateRDV`, `TAC_Description`, `TAC_Reference`, `USR_DateModif`, `USR_UserModif`, `SLI_ID`, `SLI_ID_Liaison`, `ART_ID`, `SLI_Quantite`,
  `SLI_QuantitePrepare`, `SNS_ID`, `SNS_NumeroSerie`, `SNS_CodeBarre`, `STP_ID`, `SNS_Emplacement`) VALUES ('".$tac_id[$count]."', '".$tac_id_liaison[$count]."', '".$tym_id[$count]."', '".$cli_id[$count].
  "', '".$adr_id[$count]."', '".$age_id[$count]."', '".$dep_id[$count]."', '".$uti_id[$count]."', '".$tac_numero[$count]."', '".$tac_statut[$count]."', '".$tac_date[$count].
  "', '".$tac_date_livraison[$count]."', '".$tac_date_rdv[$count]."', '".$tac_description[$count].."', '".$tac_reference[$count]."', '".$usr_date_modif[$count]."', '".$usr_user_modif[$count].
  "', '".$sli_id[$count]."', '".$sli_id_liaison[$count]"', '".$art_id[$count]"', '".$sli_quantite[$count]"', '".$sli_quantite_prepare[$count]
  "', '".$sns_id[$count]"', '".$sns_numero_serie[$count]"', '".$sns_code_barre[$count]"', '".$stp_id[$count]"', '".$sns_emplacement[$count]"');";
  */
 }
 $statement = $connect->prepare($query); // prepare the query for execution and return the object
 $statement->execute();
}

?>