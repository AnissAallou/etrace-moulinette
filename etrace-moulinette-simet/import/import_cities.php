<?php

// import_cities.php

if(isset($_POST["vil_id"]) && isset($_POST["vil_cp"]) && isset($_POST["vil_nom"]))
{
 // PDO connection
 $connect = new PDO("mysql:host=localhost;dbname=ratp", "root", "root");

  // Data transfert using POST method
 $vil_id = $_POST["vil_id"];
 $vil_cp = $_POST["vil_cp"];
 $vil_nom = $_POST["vil_nom"];
 for($count = 0; $count < count($vil_id); $count++)
 {
  $query .= "INSERT INTO `ville`(`VIL_ID`, `VIL_CP`, `VIL_NOM`) VALUES ('".$vil_id[$count]."', '".$vil_cp[$count]."', '".$vil_nom[$count]."');";
 }
 $statement = $connect->prepare($query); // prepare the query for execution and return the object
 $statement->execute();
}

?>