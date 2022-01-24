<?php

// import_users.php

if(isset($_POST["uti_id"]) && isset($_POST["soc_id"]) && isset($_POST["uti_type"]) && isset($_POST["uti_login"]) 
&& isset($_POST["uti_pass"]) && isset($_POST["uti_pass_expire"]) 
&& isset($_POST["uti_date_expiration"]) && isset($_POST["uti_nom"]) && isset($_POST["uti_prenom"]) 
&& isset($_POST["uti_date_connexion"]) && isset($_POST["uti_actif"]))
{
 // PDO connection
 $connect = new PDO("mysql:host=localhost;dbname=ratp", "root", "root");

  // Data transfert using POST method
 $uti_id = $_POST["uti_id"];
 $soc_id = $_POST["soc_id"];
 $uti_type= $_POST["uti_type"];
 $uti_login = $_POST["uti_login"];
 $uti_pass = $_POST["uti_pass"];
 $uti_pass_expire = $_POST["uti_pass_expire"];
 $uti_date_expiration = $_POST["uti_date_expiration"];
 $uti_nom = $_POST["uti_nom"];
 $uti_prenom = $_POST["uti_prenom"];
 $uti_date_connexion = $_POST["uti_date_connexion"];
 $uti_actif = $_POST["uti_actif"];
 for($count = 0; $count < count($uti_id); $count++)
 {
  $query .= "
  INSERT INTO utilisateurs(UTI_ID, SOC_ID, UTI_Type, UTI_Login, UTI_Pass, UTI_PassExpire, UTI_DateExpiration, UTI_Nom, UTI_Prenom, UTI_DateConnexion, UTI_Actif) 
  VALUES ('".$uti_id[$count]."', '".$soc_id[$count]."', '".$uti_type[$count]."', '".$uti_login[$count]."', '".$uti_pass[$count]."', '".$uti_pass_expire[$count]."', '".$uti_date_expiration[$count]."', '".$uti_nom[$count]."', '".$uti_prenom[$count]."', '".$uti_date_connexion[$count]."', '".$uti_actif[$count]."');";
 }
 $statement = $connect->prepare($query); // prepare the query for execution and return the object
 $statement->execute();
}

?>