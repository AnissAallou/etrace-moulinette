$(document).ready(function(){
    $('#upload_csv').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:"./fetch/fetch_stock.php",
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
         html += '<td class="stk_id" contenteditable>'+data.row_data[count].stk_id+'</td>';
         html += '<td class="dep_id" contenteditable>'+data.row_data[count].dep_id+'</td>';
         html += '<td class="art_id" contenteditable>'+data.row_data[count].art_id+'</td>';
         html += '<td class="stk_quantite" contenteditable>'+data.row_data[count].stk_quantite+'</td>';
         html += '<td class="stk_quantite_commande" contenteditable>'+data.row_data[count].stk_quantite_commande+'</td>';
         html += '<td class="stk_quantite_reserve" contenteditable>'+data.row_data[count].stk_quantite_reserve+'</td>';
         html += '<td class="stp_id" contenteditable>'+data.row_data[count].stp_id+'</td>';
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
     var stk_id = [];
     var dep_id = [];
     var art_id = [];
     var stk_quantite = [];
     var stk_quantite_commande = [];
     var stk_quantite_reserve = [];
     var stp_id = [];
     $('.stk_id').each(function(){
       stk_id.push($(this).text());
     });
     $('.dep_id').each(function(){
       dep_id.push($(this).text());
     });
     $('.art_id').each(function(){
       art_id.push($(this).text());
     });
     $('.stk_quantite').each(function(){
       stk_quantite.push($(this).text());
     });
     $('.stk_quantite_commande').each(function(){
       stk_quantite_commande.push($(this).text());
     });
     $('.stk_quantite_reserve').each(function(){
       stk_quantite_reserve.push($(this).text());
     });
     $('.stp_id').each(function(){
       stp_id.push($(this).text());
     });
     $.ajax({
      url:"import/import_stock.php",
      method:"post",
      data:{stk_id:stk_id, 
           dep_id:dep_id,
           art_id:art_id,
           stk_quantite:stk_quantite,
           stk_quantite_commande:stk_quantite_commande,
           stk_quantite_reserve:stk_quantite_reserve,
           stp_id:stp_id},
      success:function(data)
      {
       $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
      }
     })
    });
   });