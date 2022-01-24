$(document).ready(function(){
    $('#upload_csv').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:"./fetch/fetch_cities.php",
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
         html += '<td class="vil_id" contenteditable>'+data.row_data[count].vil_id+'</td>';
         html += '<td class="vil_cp" contenteditable>'+data.row_data[count].vil_cp+'</td>';
         html += '<td class="vil_nom" contenteditable>'+data.row_data[count].vil_nom+'</td></tr>';
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
     var vil_id = [];
     var vil_cp = [];
     var vil_nom = [];
     $('.vil_id').each(function(){
       vil_id.push($(this).text());
     });
     $('.vil_cp').each(function(){
       vil_cp.push($(this).text());
     });
     $('.vil_nom').each(function(){
       vil_nom.push($(this).text());
     });
     $.ajax({
      url:"import/import_cities.php",
      method:"post",
      data:{vil_id:vil_id, 
           vil_cp:vil_cp,
           vil_nom:vil_nom},
      success:function(data)
      {
       $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
      }
     })
    });
   });