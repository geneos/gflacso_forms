/* COMBO RESIDENCIA */
jQuery(document).ready(function(){

  //Funcion on changue de paises
  jQuery("[id$='_country']").change(function(event){
      gflacso_startLoading();
      
      selector = jQuery("[id$='_province']");
      selector.find('option').remove();
      var id_pais = jQuery(this).val() ? jQuery(this).val() : parseInt(jQuery(this).attr("data-value"));
      //Trigger onchange de paises 
      jQuery("[id$='_province']").trigger("change");

      request = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_provincias','id_pais':id_pais}
      });
      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          items = response.data;
        jQuery.each(items, function (i, item) {
            selector.append(jQuery('<option>', { 
              value: item.id_provincia,
              text : item.descripcion_provincia ,
              /*selected: (item.id_provincia == selector.attr('data-value')) ? 'selected' : false*/
            }));
         });

        gflacso_stopLoading();

    });

    jQuery("[id$='_values']").val( jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val() );

  });

  //Funcion on changue de provincias
  jQuery("[id$='_province']").change(function(event){
      gflacso_startLoading();
      var selector = jQuery("[id$='_city']");
      selector.find('option').remove();
      var id_provincia = jQuery(this).val() ? jQuery(this).val() : parseInt(jQuery(this).attr("data-value"));
      request = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_localidades','id_provincia':id_provincia}
      });
      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          items = response.data;
        jQuery.each(items, function (i, item) {
            selector.append(jQuery('<option>', { 
              value: item.id_localidad,
              text : item.descripcion_localidad ,
              /*selected: (item.id_localidad == selector.attr('data-value') ) ? 'selected' : false*/
            }));
         });

      gflacso_stopLoading();
      jQuery("[id$='_values']").val(jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val());
       
    });
   });

  jQuery("[id$='_city']").change(function(event){

    jQuery("[id$='_values']").val(jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val());
  
  });


  // Cargo valores iniciales para Paises
  if (jQuery("[id$='_country']").length > 0) {
    gflacso_startLoading();

    request = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_paises'}
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        items = response.data;
        var selector = jQuery("[id$='_country']");
        jQuery.each(items, function (i, item) {

          selector.append(jQuery('<option>', { 
            value: item.id_pais,
            text : item.descripcion_pais ,
            /*selected: (item.id_pais == parseInt(selector.attr('data-value')) ) ? 'selected' : false*/
          }));
        });

        gflacso_stopLoading();
        jQuery("[id$='_values']").val(jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val());
    }); 

    //Si ya existe un valor seteado para pais, provincia y localidad:
    if ( jQuery("[id$='_country']").attr('data-value') != undefined 
          && jQuery("[id$='_country']").attr('data-value') != 0 ){

      //Trigger onchange de paises 
      jQuery("[id$='_country']").trigger("change");

    }

  }
  
  if (jQuery("[id$='_editvalues']").length > 0){
      var editValues = jQuery("[id$='_editvalues']").val().split(",");
    
      gflacso_startLoading();
      requestCountry = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_paises'}
      });
      // Callback handler that will be called on success
      requestCountry.done(function (response, textStatus, jqXHR){
          items = response.data;
        jQuery.each(items, function (i, item) {
              if (item.id_pais == editValues[0]){
                jQuery("[id$='_countryeditvalues']").html(item.descripcion_pais);
              }
         });
        gflacso_stopLoading();
      });
    
      gflacso_startLoading();
      requestProvince = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_provincias','id_pais':editValues[0]}
      });
      // Callback handler that will be called on success
      requestProvince.done(function (response, textStatus, jqXHR){
          items = response.data;
        jQuery.each(items, function (i, item) {
              if (item.id_provincia == editValues[1]){
                jQuery("[id$='_provinceeditvalues']").html(item.descripcion_provincia);
              }
         });
        gflacso_stopLoading();
      });
    
      gflacso_startLoading();
      requestCity = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_localidades','id_provincia':editValues[1]}
      });
      // Callback handler that will be called on success
      requestCity.done(function (response, textStatus, jqXHR){
          items = response.data;
        jQuery.each(items, function (i, item) {
              if (item.id_localidad == editValues[2]){
                jQuery("[id$='_cityeditvalues']").html(item.descripcion_localidad);
              }
         });
        gflacso_stopLoading();
      });
  }
  
  
});


///Single Combo
jQuery(document).ready(function(){

    // Cargo valores iniciales para Paises
    request = $.ajax({
        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",
        type: "post",
        data: {'action':'get_paises'}
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        items = response.data;
        var selector = jQuery("[id$='_country_only']");
        jQuery.each(items, function (i, item) {

          selector.append(jQuery('<option>', { 
            value: item.id_pais,
            text : item.descripcion_pais ,
            selected: (item.id_pais == selector.attr('data-value') ) ? 'selected' : false
          }));
        });

    }); 
  
});

/* FILE PICKER */
$(document).ready(function() {

  if (jQuery("[id^='file_input']").length > 0){

    $.ajax({
            url: g.root_url+"/modules/gflacso_graduados/ajax/file-manager.php?action=get-files",
            type: "POST",
            data: {gg_user_id:$('#hidden_user_id').val()},
            success: function (response, status) {
                response = JSON.parse(response);
                loadFileUploader(response);
            },
            error: function (response, status) {
                return false;
            }
        });
  }

});

function loadFileUploader(info){

    var initialPreview = [];
    var initialPreviewConfig = [];
    var initialPreviewThumbTags = [];
    for (var i = 0; i<info.length;i++) {
      initialPreview[i]=info[i].url,
      initialPreviewConfig[i]={caption: info[i].nombre, key: info[i].id,  };
      initialPreviewThumbTags[i]={'{CUSTOM_TAG_DESCRIPTION}': '<textarea disabled class="input_description">'+info[i].descripcion+'</textarea>'}
    }
        
    $("[id^='file_input']").fileinput({
        //Aca tengo que traer los archivos de Flacso
        initialPreview: initialPreview,
        initialPreviewAsData: true,
        maxFileCount:1,
        //Deberia obtener la info tambien de los archivos de Flacso
        initialPreviewConfig: initialPreviewConfig,
        layoutTemplates: { footer: '<div class="file-thumbnail-footer">\n' +
                                   '    <div class="file-caption-name" style="width:{width}">{caption}</div>\n' +
                                   '{CUSTOM_TAG_DESCRIPTION}\n' +
                                   '    {actions}\n' +
                                   '</div>',
        },
        previewThumbTags : {'{CUSTOM_TAG_DESCRIPTION}': '<textarea class="input_description"></textarea>'},
        initialPreviewThumbTags : initialPreviewThumbTags,
        //Aca deberia impactar en script php que llame al webservice de agregar
        /*
        Envia la siguiente info 
        file data: This data is sent to the server in a format very similar to the form file input. For example in PHP you can read this data as $_FILES['input-name'], where input-name is the name attribute of your input. If you do not set a name attribute for your input, the name is defaulted to file_data. Note that multiple file uploads require that you set multiple property to true for your input. So in PHP you would receive the file data as $_FILES['file_data']
        */
        uploadUrl: g.root_url+"/modules/gflacso_graduados/ajax/file-manager.php?action=upload",
        deleteUrl: g.root_url+"/modules/gflacso_graduados/ajax/file-manager.php?action=delete",
        //Siempre en False
        overwriteInitial: false,
        fileActionSettings: {
          showDrag:false
        },
        language: 'es',
        //Sacar de la configuracion
        maxFileSize: 100,
        initialCaption: "Seleccione un archivo",

        // previewId and index is only available for individual file upload via the thumbnail
        uploadExtraData: function (previewId, index) {
                          var obj = {};
                          obj.description = $('#'+previewId).find('textarea').val();
                          obj.gg_user_id=$('#hidden_user_id').val();
                          return obj;
                      },
      });
}