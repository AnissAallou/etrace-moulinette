$(document).ready(function(){
    $('#upload_csv').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:"./fetch/fetch_profiles.php",
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
         html += '<td class="pro_id" contenteditable>'+data.row_data[count].pro_id+'</td>';
         html += '<td class="soc_id" contenteditable>'+data.row_data[count].soc_id+'</td>';
         html += '<td class="pro_nom" contenteditable>'+data.row_data[count].pro_nom+'</td></tr>';
        }
       }
       html += '<table>';
       html += '<div align="center"><button type="button" id="import_data" class="btn btn-warning">Import</button></div>';
   
       $('#csv_file_data').html(html);
       $('#upload_csv')[0].reset();
      }
     })
    });
   
    $(document).on('click', '#import_data', function(){
     var pro_id = [];
     var soc_id = [];
     var pro_nom = [];
     $('.pro_id').each(function(){
       pro_id.push($(this).text());
     });
     $('.soc_id').each(function(){
       soc_id.push($(this).text());
     });
     $('.pro_nom').each(function(){
       pro_nom.push($(this).text());
     });
     $.ajax({
      url:"import/import_profiles.php",
      method:"post",
      data:{pro_id:pro_id, 
           soc_id:soc_id,
           pro_nom:pro_nom},
      success:function(data)
      {
       $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
      }
     })
    });
   });