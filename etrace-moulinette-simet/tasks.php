<?php  
 $connect = mysqli_connect("localhost", "root", "root", "ratp");  
 $query = "SELECT stock_tache_entete.TAC_ID, stock_tache_entete.TAC_ID_Liaison, stock_tache_entete.TYM_ID, stock_tache_entete.CLI_ID, stock_tache_entete.ADR_ID, stock_tache_entete.AGE_ID, stock_tache_entete.DEP_ID, stock_tache_entete.UTI_ID, stock_tache_entete.TAC_Numero, stock_tache_entete.TAC_Statut, FROM_UNIXTIME(stock_tache_entete.TAC_Date), FROM_UNIXTIME(stock_tache_entete.TAC_DateLivraison), FROM_UNIXTIME(stock_tache_entete.TAC_DateRDV), stock_tache_entete.TAC_Description, stock_tache_entete.TAC_Reference, FROM_UNIXTIME(stock_tache_entete.USR_DateModif), stock_tache_entete.USR_UserModif, stock_tache_ligne.SLI_ID, stock_tache_ligne.SLI_ID_Liaison, stock_tache_ligne.ART_ID, stock_tache_ligne.SLI_Quantite, stock_tache_ligne.SLI_QuantitePrepare, stock_tache_ligne_serie.SNS_ID, stock_tache_ligne_serie.SNS_NumeroSerie, stock_tache_ligne_serie.SNS_CodeBarre, stock_tache_ligne_serie.STP_ID, stock_tache_ligne_serie.SNS_Emplacement 
 FROM stock_tache_entete JOIN stock_tache_ligne ON stock_tache_entete.TAC_ID = stock_tache_ligne.TAC_ID 
 JOIN stock_tache_ligne_serie ON stock_tache_ligne.ART_ID = stock_tache_ligne_serie.ART_ID"; 
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SIMET Tasks</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">SIMET Tasks</h2>   
                <br />                               
                <a href="index.php" class="btn btn-success">Users</a>
                <a href="stock.php" class="btn btn-info">Stock</a>
                <a href="profiles.php" class="btn btn-warning">Profiles</a>
                <button type="button" class="btn btn-secondary"><a href="cities.php" style="text-decoration:none;">Cities</a></button>
                <br />
                <h3 align="center">Tasks Data</h3>                 
                <br />  

                <br />
                <div class="table-responsive" id="tasks">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">TAC_ID</th>  
                               <th width="5%">TAC_ID_Liaison</th>  
                               <th width="5%">TYM_ID</th>  
                               <th width="5%">CLI_ID</th>  
                               <th width="5%">ADR_ID</th> 
                               <th width="5%">AGE_ID</th> 
                               <th width="5%">DEP_ID</th> 
                               <th width="5%">UTI_ID</th>
                               <th width="5%">TAC_Numero</th>
                               <th width="5%">TAC_Statut</th>  
                               <th width="5%">TAC_Date</th>  
                               <th width="25%">TAC_DateLivraison</th>  
                               <th width="35%">TAC_DateRDV</th>  
                               <th width="10%">TAC_Description</th>  
                               <th width="20%">TAC_Reference</th>  
                               <th width="20%">USR_DateModif</th>   
                               <th width="20%">USR_UserModif</th>  
                               <th width="20%">SLI_ID</th>  
                               <th width="20%">SLI_ID_Liaison</th>  
                               <th width="20%">ART_ID</th>  
                               <th width="20%">SLI_Quantite</th>  
                               <th width="20%">SLI_QuantitePrepare</th> 
                               <th width="20%">SNS_ID</th>  
                               <th width="20%">SNS_NumeroSerie</th>   
                               <th width="20%">SNS_CodeBarre</th>  
                               <th width="20%">STP_ID</th>  
                               <th width="20%">SNS_Emplacement</th>  
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                            <tr>  
                               <td><?php echo $row["TAC_ID"]; ?></td>  
                               <td><?php echo $row["TAC_ID_Liaison"]; ?></td>  
                               <td><?php echo $row["TYM_ID"]; ?></td>  
                               <td><?php echo $row["CLI_ID"]; ?></td>  
                               <td><?php echo $row["ADR_ID"]; ?></td>  
                               <td><?php echo $row["AGE_ID"]; ?></td>   
                               <td><?php echo $row["DEP_ID"]; ?></td> 
                               <td><?php echo $row["UTI_ID"]; ?></td> 
                               <td><?php echo $row["TAC_Numero"]; ?></td>       
                               <td><?php echo $row["TAC_Statut"]; ?></td>  
                               <td><?php echo $row["TAC_Date"]; ?></td>    
                               <td><?php echo $row["TAC_DateLivraison"]; ?></td>   
                               <td><?php echo $row["TAC_DateRDV"]; ?></td>   
                               <td><?php echo $row["TAC_Description"]; ?></td>   
                               <td><?php echo $row["TAC_Reference"]; ?></td>   
                               <td><?php echo $row["USR_DateModif"]; ?></td>   
                               <td><?php echo $row["USR_UserModif"]; ?></td>   
                               <td><?php echo $row["SLI_ID"]; ?></td>  
                               <td><?php echo $row["SLI_Quantite"]; ?></td>   
                               <td><?php echo $row["SLI_QuantitePreparee"]; ?></td>   
                               <td><?php echo $row["SNS_ID"]; ?></td>   
                               <td><?php echo $row["SNS_NumeroSerie"]; ?></td>   
                               <td><?php echo $row["SNS_CodeBarre"]; ?></td>   
                               <td><?php echo $row["STP_ID"]; ?></td>   
                               <td><?php echo $row["SNS_Emplacement"]; ?></td>    
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>   
                </div>  
                <br />
                <form method="post" action="export/export_tasks.php" align="center">  
                     <input type="submit" name="export" value="Tasks Export" class="btn btn-primary" />  
                </form> 
           </div>  

           <script src="http://code.jquery.com/jquery.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">
   <br />
   <h3 align="center">Tasks Importing</h3>
   <br />
   <form id="upload_csv" method="post" enctype="multipart/form-data">
    <div class="col-md-3">
     <br />
     <label>taches-jour-mois-année.csv</label>
    </div>  
                <div class="col-md-4">  
                    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                </div>  
                <div class="col-md-5">  
                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-primary" />
                </div>  
                <div style="clear:both"></div>
   </form>
   <br />
   <br />
   <div id="csv_file_data"></div>
   
  </div> 

<script type="text/javascript" src="js/tasks.js"></script>

      </body>  
 </html>  