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
              selected: item.id_provincia == selector.attr('data-value') ? 'selected' : ''
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
              selected: item.id_localidad == selector.attr('data-value') ? 'selected' : ''
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
  if (jQuery("[id$='_country']").length) {
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
            selected: item.id_pais == selector.attr('data-value') ? 'selected' : ''
          }));
        });

        gflacso_stopLoading();
    }); 

    //Si ya existe un valor seteado para pais, provincia y localidad:
    if ( jQuery("[id$='_province']").attr('data-value') ){

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
              if (item.id_pais == editValues[0])
                jQuery("[id$='_countryeditvalues']").html(item.descripcion_pais);
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
            selected: item.id_pais == selector.attr('data-value') ? 'selected' : ''
          }));
        });

    }); 
  
});