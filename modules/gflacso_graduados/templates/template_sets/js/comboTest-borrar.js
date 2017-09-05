/* COMBO RESIDENCIA */

function change_country(id_pais,value){
  gflacso_startLoading();
  
  selector = jQuery("[id$='_province']");
  selector.find('option').remove();

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
          selected: (item.id_provincia == value) ? 'selected' : false
        }));
     });

    if (selector.val() == -1)
      selector.attr("disabled","disabled");
    else
      selector.removeAttr("disabled");

    gflacso_stopLoading();

    jQuery("[id$='_values']").val( jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val() );

  });
}

function change_province(id_provincia,value){
    gflacso_startLoading();
    var selector = jQuery("[id$='_city']");
    selector.find('option').remove();
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
            selected: (item.id_localidad == value ) ? 'selected' : false
          }));
       });

    if (selector.val() == -1)
      selector.attr("disabled","disabled");
    else
      selector.removeAttr("disabled");

    gflacso_stopLoading();


    jQuery("[id$='_values']").val(jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val());
     
  });
}
/* COMBO RESIDENCIA */
jQuery(document).ready(function(){


  //Funcion on changue de paises
  jQuery("[id$='_country']").change(function(event){
 
      var id_pais = jQuery(this).val();
      //Trigger onchange de paises 
      change_country(id_pais,0);
      change_province(-1,0);
      //jQuery("[id$='_province']").trigger("change");

  });

  //Funcion on changue de provincias
  jQuery("[id$='_province']").change(function(event){
      var id_provincia = jQuery(this).val();
      change_province(id_provincia,0);
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
            selected: (item.id_pais == parseInt(selector.attr('data-value')) ) ? 'selected' : false
          }));
        });

        gflacso_stopLoading();
        jQuery("[id$='_values']").val(jQuery("[id$='_country']").val()+','+jQuery("[id$='_province']").val()+','+jQuery("[id$='_city']").val());
    }); 

    //Si ya existe un valor seteado para pais, provincia y localidad:
    if ( jQuery("[id$='_country']").attr('data-value') != undefined 
          && jQuery("[id$='_country']").attr('data-value') != 0 ){

      var country_selector =  jQuery("[id$='_country']");
      var province_selector =  jQuery("[id$='_province']");
      var city_selector =  jQuery("[id$='_city']");


      var id_pais = country_selector.attr("data-value");
      change_country(id_pais,province_selector.attr("data-value"));

      var id_province = province_selector.attr("data-value"); 
      change_province(id_province,city_selector.attr("data-value"));


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

//Single Combo
jQuery(document).ready(function(){

    // Cargo valores iniciales para Paises
    if (jQuery("[id$='_country_only']").length > 0) {
      gflacso_startLoading();
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
              selected: (item.id_pais ==  parseInt(selector.attr('data-value')) ) ? 'selected' : false
            }));
          });
          gflacso_stopLoading();
      }); 
    
      if (jQuery("[id$='_editvalues_only']").length > 0){
        var editValues = jQuery("[id$='_editvalues_only']").val();
      
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
                if (item.id_pais == editValues){
                  jQuery("[id$='_countryeditvalues_only']").html(item.descripcion_pais);
                }
           });
          gflacso_stopLoading();
        });
     };
   }
  
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
    for (var i = 0; i<info.data.length;i++) {
      initialPreview[i]=info.data[i].content,
      initialPreviewConfig[i]={caption: info.data[i].nombre, key: info.data[i].id, type: info.data[i].type };
      initialPreviewThumbTags[i]={'{CUSTOM_TAG_DESCRIPTION}': '<textarea disabled class="input_description">'+info.data[i].descripcion+'</textarea>'}
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
        maxFileSize: info.maxFileSize,
        initialCaption: "Seleccione un archivo",
        removeFromPreviewOnError:true,
        elErrorContainer:'#fileInputError',

        // previewId and index is only available for individual file upload via the thumbnail
        uploadExtraData: function (previewId, index) {
                          var obj = {};
                          obj.description = $('#'+previewId).find('textarea.input_description').val();
                          obj.gg_user_id=$('#hidden_user_id').val();
                          return obj;
                      },
      });
}

/* COMBO CONDICIONAL */
jQuery(document).ready(function(){

  var select_conditional_input = jQuery(".select_conditional_input");
  var name = select_conditional_input.attr("name");
  var conditionalValue = select_conditional_input.attr("data-conditional-value");
  var conditionalInput =  jQuery("[name='"+name+"_conditional_input']");

  //Funcion on changue de paises
  select_conditional_input.change(function(event){
    console.log(conditionalValue);
    var val = select_conditional_input.val();
     console.log(val);
      //Show conditional input?
      if (val == conditionalValue)
        conditionalInput.show();
      else
        conditionalInput.hide();
  });

  //Show conditional input?
  var val = select_conditional_input.val();
  if (val == conditionalValue)
    conditionalInput.show();
  else
    conditionalInput.hide();

});