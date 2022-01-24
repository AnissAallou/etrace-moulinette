$(document).ready(function(){
    $('#upload_csv').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:"./fetch/fetch_tasks.php",
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
         html += '<td class="tac_id" contenteditable>'+data.row_data[count].tac_id+'</td>';
         html += '<td class="tac_id_liaison" contenteditable>'+data.row_data[count].tac_id_liaison+'</td>';
         html += '<td class="tym_id" contenteditable>'+data.row_data[count].tym_id+'</td>';
         html += '<td class="cli_id" contenteditable>'+data.row_data[count].cli_id+'</td>';
         html += '<td class="adr_id" contenteditable>'+data.row_data[count].adr_id+'</td>';
         html += '<td class="age_id" contenteditable>'+data.row_data[count].age_id+'</td>';
         html += '<td class="dep_id" contenteditable>'+data.row_data[count].dep_id+'</td>';
         html += '<td class="uti_id" contenteditable>'+data.row_data[count].uti_id+'</td>';
         html += '<td class="tac_numero" contenteditable>'+data.row_data[count].tac_numero+'</td>';
         html += '<td class="tac_statut" contenteditable>'+data.row_data[count].tac_statut+'</td>';
         html += '<td class="tac_date" contenteditable>'+data.row_data[count].tac_date+'</td>';
         html += '<td class="tac_date_livraison" contenteditable>'+data.row_data[count].tac_date_livraison+'</td>';
         html += '<td class="tac_date_rdv" contenteditable>'+data.row_data[count].tac_date_rdv+'</td>';
         html += '<td class="tac_description" contenteditable>'+data.row_data[count].tac_description+'</td>';
         html += '<td class="tac_reference" contenteditable>'+data.row_data[count].tac_reference+'</td>';
         html += '<td class="usr_date_modif" contenteditable>'+data.row_data[count].usr_date_modif+'</td>';
         html += '<td class="usr_user_modif" contenteditable>'+data.row_data[count].usr_user_modif+'</td>';
         html += '<td class="sli_id" contenteditable>'+data.row_data[count].sli_id+'</td>';
         html += '<td class="sli_id_liaison" contenteditable>'+data.row_data[count].sli_id_liaison+'</td>';
         html += '<td class="art_id" contenteditable>'+data.row_data[count].art_id+'</td>';
         html += '<td class="sli_quantite" contenteditable>'+data.row_data[count].sli_quantite+'</td>';
         html += '<td class="sli_quantite_prepare" contenteditable>'+data.row_data[count].sli_quantite_prepare+'</td>';
         html += '<td class="sns_id" contenteditable>'+data.row_data[count].sns_id+'</td>';
         html += '<td class="sns_numero_serie" contenteditable>'+data.row_data[count].sns_numero_serie+'</td>';
         html += '<td class="sns_code_barre" contenteditable>'+data.row_data[count].sns_code_barre+'</td>';
         html += '<td class="stp_id" contenteditable>'+data.row_data[count].stp_id+'</td>';
         html += '<td class="sns_emplacement" contenteditable>'+data.row_data[count].sns_emplacement+'</td></tr>';
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
     var tac_id = [];
     var tac_id_liaison = [];
     var tym_id = [];
     var cli_id = [];
     var adr_id = [];
     var age_id = [];
     var dep_id = [];
     var uti_id = [];
     var tac_numero = [];
     var tac_statut = [];
     var tac_date = [];
     var tac_date_livraison = [];
     var tac_date_rdv = [];
     var tac_description = [];
     var tac_reference = [];
     var usr_date_modif = [];
     var usr_user_modif = [];
     var sli_id = [];
     var sli_id_liaison = [];
     var art_id = [];
     var sli_quantite = [];
     var sli_quantite_prepare = [];
     var sns_id = [];
     var sns_numero_serie = [];
     var sns_code_barre = [];
     var stp_id = [];
     var sns_emplacement = [];
     $('.tac_id').each(function(){
       tac_id.push($(this).text());
     });
     $('.tac_id_liaison').each(function(){
        tac_id_liaison.push($(this).text());
     });
     $('.tym_id').each(function(){
        tym_id.push($(this).text());
     });
     $('.cli_id').each(function(){
        cli_id.push($(this).text());
     });
     $('.adr_id').each(function(){
        adr_id.push($(this).text());
     });
     $('.age_id').each(function(){
        age_id.push($(this).text());
     });
     $('.dep_id').each(function(){
        dep_id.push($(this).text());
     });
     $('.uti_id').each(function(){
        uti_id.push($(this).text());
     });
     $('.tac_numero').each(function(){
        tac_numero.push($(this).text());
     });
     $('.tac_statut').each(function(){
        tac_statut.push($(this).text());
     });
     $('.tac_date').each(function(){
        tac_date.push($(this).text());
     });
   
     $('.tac_date_livraison').each(function(){
        tac_date_livraison.push($(this).text());
     });
     $('.tac_date_rdv').each(function(){
        tac_date_rdv.push($(this).text());
     });
     $('.tac_description').each(function(){
        tac_description.push($(this).text());
     });
     $('.tac_reference').each(function(){
        tac_reference.push($(this).text());
     });
     $('.usr_date_modif').each(function(){
        usr_date_modif.push($(this).text());
     });
     $('.usr_usr_modif').each(function(){
        usr_usr_modif.push($(this).text());
     });
     $('.sli_id').each(function(){
        sli_id.push($(this).text());
     });
     $('.sli_id_liaison').each(function(){
        sli_id_liaison.push($(this).text());
     });
     $('.art_id').each(function(){
        art_id.push($(this).text());
     });
     $('.sli_quantite').each(function(){
        sli_quantite.push($(this).text());
     });
     $('.sli_quantite_prepare').each(function(){
        sli_quantite_prepare.push($(this).text());
     });
     $('.sns_id').each(function(){
        sns_id.push($(this).text());
     });
     $('.sns_numero_serie').each(function(){
        sns_numero_serie.push($(this).text());
     });
     $('.sns_code_barre').each(function(){
        sns_code_barre.push($(this).text());
     });
     $('.stp_id').each(function(){
        stp_id.push($(this).text());
     });
     $('.sns_emplacement').each(function(){
        sns_emplacement.push($(this).text());
     });
   
     $.ajax({
      url:"import/import_tasks.php",
      method:"post",
      data:{tac_id:tac_id, 
             tac_id_liaison:tac_id_liaison,
             tym_id:tym_id,
             cli_id:cli_id,
             adr_id:adr_id,
             age_id:age_id,
             dep_id:dep_id, 
             uti_id:uti_id,
             tac_numero:tac_numero, 
             tac_statut:tac_statut,
             tac_date:tac_date,    
             tac_date_livraison:tac_date_livraison, 
             tac_date_rdv:tac_date_rdv,
             tac_description:tac_description, 
             tac_reference:tac_reference,
             usr_date_modif:usr_date_modif,
             usr_user_modif:usr_user_modif, 
             sli_id:sli_id,
             sli_id_liaison:sli_id_liaison, 
             art_id:art_id,
             sli_quantite:sli_quantite,
             sli_quantite_prepare:sli_quantite_prepare,
             sns_id:sns_id,
             sns_numero_serie:sns_numero_serie,
             sns_code_barre:sns_code_barre,
             stp_id:stp_id,
             sns_emplacement:sns_emplacement
             },
   
      success:function(data)
      {
       $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
      }
     })
    });
   });