<?php  
$connect = mysqli_connect("localhost", "root", "root", "ratp");  
$query ="SELECT * FROM `ville` LIMIT 10;";  
$result = mysqli_query($connect, $query);  
?>  
<!DOCTYPE html>  
<html>  
    <head>  
          <title>SIMET Cities</title>  

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
              <h2 align="center">SIMET Cities</h2>  
              <br />  
              <a href="index.php" class="btn btn-success">Users</a>
              <a href="tasks.php" class="btn btn-primary">Tasks</a>
              <a href="stock.php" class="btn btn-info">Stock</a>
              <a href="profiles.php" class="btn btn-warning">Profiles</a>
              <br />
              <h3 align="center">Cities Data</h3>                 
              <br />  
              
              <br />  
              <div class="table-responsive" id="cities">  
                    <table class="table table-bordered">  
                        <tr>  
                              <th width="5%">VIL_ID</th>  
                              <th width="5%">VIL_CP</th>  
                              <th width="5%">VIL_NOM</th>   
                        </tr>  
                    <?php  
                    while($row = mysqli_fetch_array($result))  
                    {  
                    ?>  
                        <tr>  
                              <td><?php echo $row["VIL_ID"]; ?></td>  
                              <td><?php echo $row["VIL_CP"]; ?></td>  
                              <td><?php echo $row["VIL_NOM"]; ?></td>  
                        </tr>  
                    <?php       
                    }  
                    ?>  
                    </table>   
              </div>  
              <br />
              <form method="post" action="export/export_cities.php" align="center">  
                    <input type="submit" name="export" value="Cities Export" class="btn btn-secondary" />  
              </form> 
          </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">
  <br />
  <h3 align="center">Cities Importing</h3>
  <br />
  <form id="upload_csv" method="post" enctype="multipart/form-data">
  <div class="col-md-3">
    <br />
    <label>villes-jour-mois-année.csv</label>
  </div>  
              <div class="col-md-4">  
                  <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
              </div>  
              <div class="col-md-5">  
                    <!-- <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-grey" />
                  
                  <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" />-->

                  <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-dark" />
              </div>  
              <div style="clear:both"></div>
  </form>
  <br />
  <br />
  <div id="csv_file_data"></div>
  
</div> 

<script type="text/javascript" src="js/cities.js" ></script> 

    </body>  
</html>  