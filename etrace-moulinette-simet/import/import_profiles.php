<?php

// import_profiles.php

if(isset($_POST["pro_id"]) && isset($_POST["soc_id"]) && isset($_POST["pro_nom"]))
{
 // PDO connection
 $connect = new PDO("mysql:host=localhost;dbname=ratp", "root", "root");

  // Data transfert using POST method
 $pro_id = $_POST["pro_id"];
 $soc_id = $_POST["soc_id"];
 $pro_nom = $_POST["pro_nom"];
 for($count = 0; $count < count($pro_id); $count++)
 {
  $query .= "INSERT INTO `profils`(`PRO_ID`, `SOC_ID`, `PRO_Nom`) VALUES ('".$pro_id[$count]."', '".$soc_id[$count]."', '".$pro_nom[$count]."');";
 }
 $statement = $connect->prepare($query); // prepare the query for execution and return the object
 $statement->execute();
}

?>