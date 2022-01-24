$(document).ready(function(){
    $('#upload_csv').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:"./fetch/fetch_users.php",
      method:"POST",
      data:new FormData(this),
      dataType:'json',
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
       var html = '<table class="table table-striped table-bordered">';
       if(data.column)
       {
        html += '<tr>';
        for(var count = 0; count < data.column.length; count++)
        {
         html += '<th>'+data.column[count]+'</th>';
        }
        html += '</tr>';
       }
   
       if(data.row_data)
       {
        for(var count = 0; count < data.row_data.length; count++)
        {
         html += '<tr>';
         html += '<td class="uti_id" contenteditable>'+data.row_data[count].uti_id+'</td>';
         html += '<td class="soc_id" contenteditable>'+data.row_data[count].soc_id+'</td>';
         html += '<td class="uti_type" contenteditable>'+data.row_data[count].uti_type+'</td>';
         html += '<td class="uti_login" contenteditable>'+data.row_data[count].uti_login+'</td>';
         html += '<td class="uti_pass" contenteditable>'+data.row_data[count].uti_pass+'</td>';
         html += '<td class="uti_pass_expire" contenteditable>'+data.row_data[count].uti_pass_expire+'</td>';
         html += '<td class="uti_nom" contenteditable>'+data.row_data[count].uti_nom+'</td>';
         html += '<td class="uti_prenom" contenteditable>'+data.row_data[count].uti_prenom+'</td>';
         html += '<td class="uti_date_connexion" contenteditable>'+data.row_data[count].uti_date_connexion+'</td>';
         html += '<td class="uti_actif" contenteditable>'+data.row_data[count].uti_actif+'</td></tr>';
        }
       }
       html += '<table>';
       html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';
   
       $('#csv_file_data').html(html);
       $('#upload_csv')[0].reset();
      }
     })
    });
   
    $(document).on('click', '#import_data', function(){
     var uti_id = [];
     var soc_id = [];
     var uti_type = [];
     var uti_login = [];
     var uti_pass = [];
     var uti_pass_expire = [];
     var uti_date_expiration = [];
     var uti_nom = [];
     var uti_prenom = [];
     var uti_date_connexion = [];
     var uti_actif = [];
     $('.uti_id').each(function(){
       uti_id.push($(this).text());
     });
     $('.soc_id').each(function(){
       soc_id.push($(this).text());
     });
     $('.uti_type').each(function(){
       uti_type.push($(this).text());
     });
     $('.uti_login').each(function(){
       uti_login.push($(this).text());
     });
     $('.uti_pass').each(function(){
       uti_pass.push($(this).text());
     });
     $('.uti_pass_expire').each(function(){
       uti_pass_expire.push($(this).text());
     });
     $('.uti_date_expiration').each(function(){
       uti_date_expiration.push($(this).text());
     });
     $('.uti_nom').each(function(){
       uti_nom.push($(this).text());
     });
     $('.uti_prenom').each(function(){
       uti_prenom.push($(this).text());
     });
     $('.uti_date_connexion').each(function(){
       uti_date_connexion.push($(this).text());
     });
     $('.uti_actif').each(function(){
       uti_actif.push($(this).text());
     });
     $.ajax({
      url:"import/import_users.php",
      method:"post",
      data:{uti_id:uti_id, 
           soc_id:soc_id,
           uti_type:uti_type,
           uti_login:uti_login,
           uti_pass:uti_pass,
           uti_pass_expire:uti_pass_expire,
           uti_date_expiration:uti_date_expiration, 
           uti_nom:uti_nom,
           uti_prenom:uti_prenom, 
           uti_date_connexion:uti_date_connexion,
           uti_actif:uti_actif},
      success:function(data)
      {
       $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
      }
     })
    });
   });