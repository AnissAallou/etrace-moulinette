<?php  
$connect = mysqli_connect("localhost", "root", "root", "ratp");  
$query ="SELECT UTI_ID, SOC_ID, UTI_Type, UTI_Login, UTI_Pass, FROM_UNIXTIME(UTI_PassExpire), FROM_UNIXTIME(UTI_DateExpiration), UTI_Nom, UTI_Prenom, FROM_UNIXTIME(UTI_DateConnexion), UTI_Actif FROM `utilisateurs`";  
$result = mysqli_query($connect, $query);  
?>  
<!DOCTYPE html>  
<html>  
    <head>  
          <title>SIMET Users</title>  

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>  
    <body>  
          <br /><br />  
          <div class="container" style="width:900px;">  
              <h2 align="center">SIMET</h2>  
              <br />  
              <a href="tasks.php" class="btn btn-primary">Tasks</a>
              <a href="stock.php" class="btn btn-info">Stock</a>
              <a href="profiles.php" class="btn btn-warning">Profiles</a>
              <button type="button" class="btn btn-secondary"><a href="cities.php" style="text-decoration:none;">Cities</a></button>
              <br />
              <h3 align="center">Users Data</h3>                 
              <br />  
              
              <br />  
              <div class="table-responsive" id="users">  
                    <table class="table table-bordered">  
                        <tr>  
                              <th width="5%">UTI_ID</th>  
                              <th width="5%">SOC_ID</th>  
                              <th width="5%">UTI_Type</th>  
                              <th width="5%">UTI_Login</th>  
                              <th width="5%">UTI_Pass</th>  
                              <th width="5%">UTI_PassExpire</th>  
                              <th width="5%">UTI_DateExpiration</th>  
                              <th width="25%">UTI_Nom</th>  
                              <th width="35%">UTI_Prenom</th>  
                              <th width="10%">UTI_DateConnexion</th>  
                              <th width="20%">UTI_Actif</th>   
                        </tr>  
                    <?php  
                    while($row = mysqli_fetch_array($result))  
                    {  
                    ?>  
                        <tr>  
                              <td><?php echo $row["UTI_ID"]; ?></td>  
                              <td><?php echo $row["SOC_ID"]; ?></td>  
                              <td><?php echo $row["UTI_Type"]; ?></td>  
                              <td><?php echo $row["UTI_Login"]; ?></td>  
                              <td><?php echo $row["UTI_Pass"]; ?></td>   
                              <td><?php echo $row["UTI_PassExpire"]; ?></td> 
                              <td><?php echo $row["UTI_DateExpiration"]; ?></td> 
                              <td><?php echo $row["UTI_Nom"]; ?></td>       
                              <td><?php echo $row["UTI_Prenom"]; ?></td>  
                              <td><?php echo $row["UTI_DateConnexion"]; ?></td>    
                              <td><?php echo $row["UTI_Actif"]; ?></td>    
                        </tr>  
                    <?php       
                    }  
                    ?>  
                    </table>   
              </div>  
              <br />
              <form method="post" action="export/export_users.php" align="center">  
                    <input type="submit" name="export" value="Users Export" class="btn btn-success" />  
              </form> 
          </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">
  <br />
  <h3 align="center">Users Importing</h3>
  <br />
  <form id="upload_csv" method="post" enctype="multipart/form-data">
  <div class="col-md-3">
    <br />
    <label>utilisateurs-jour-mois-année.csv</label>
  </div>  
              <div class="col-md-4">  
                  <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
              </div>  
              <div class="col-md-5">  
                  <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-success" />
              </div>  
              <div style="clear:both"></div>
  </form>
  <br />
  <br />
  <div id="csv_file_data"></div>
  
</div> 

<script type="text/javascript" src="js/users.js" ></script> 

    </body>  
</html>  