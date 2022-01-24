<?php

// import_stock.php

if(isset($_POST["stk_id"]) && isset($_POST["dep_id"]) && isset($_POST["art_id"]) && isset($_POST["stk_quantite"]) && isset($_POST["stk_quantite_commande"]) && isset($_POST["stk_quantite_reserve"]) && isset($_POST["stp_id"]))
{
  // PDO connection
 $connect = new PDO("mysql:host=localhost;dbname=ratp", "root", "root");

 // Data transfert using POST method
 $stk_id = $_POST["stk_id"];
 $dep_id = $_POST["dep_id"];
 $art_id = $_POST["art_id"];
 $stk_quantite = $_POST["stk_quantite"];
 $stk_quantite_commande = $_POST["stk_quantite_commande"];
 $stk_quantite_reserve = $_POST["stk_quantite_reserve"];
 $stp_id = $_POST["stp_id"];
 for($count = 0; $count < count($uti_id); $count++)
 {
  $query .= "INSERT INTO stock(STK_ID, DEP_ID, ART_ID, STK_Quantite, STK_QuantiteCommande, STK_QuantiteReserve, STP_ID) 
  VALUES ('".$stk_id[$count]."', '".$dep_id[$count]."', '".$art_id[$count]."', '".$stk_quantite[$count]."', '".$stk_quantite_commande[$count]."', '".$stk_quantite_reserve[$count]
  ."', '".$stp_id[$count]."' );";
 }
 $statement = $connect->prepare($query); // prepare the query for execution and return the object
 $statement->execute();
}

?>