<?php


define("SUCCESS", "SUCCESS");

require("class/simple_restclient.php");

function gflacso_graduados__install($module_id)
{
  global $g_table_prefix;


  // lastly, add our hooks
  gflacso_graduados_reset_hooks();
  return array(true, "");
}


function gflacso_graduados__uninstall($module_id)
{
  global $g_table_prefix;

  return array(true, "");
}

function gflacso_graduados_update_submission_start_hook($params)
{
  /*$infohash = $params["infohash"];
  $form_id = $params["form_id"];
  $submission_id = $params["submission_id"];
  $view_id = $infohash["view_id"];

  if (gg_isLoginForm($infohash)){
    $return_info = gg_preProcessLoginForm($infohash);
  }

  if ($return_info['success']) {
    $infohash = gg_postProcessLoginForm($form_id,$submission_id,$view_id,$infohash);
  }

  //Necesito setear valores segun como vengan de los ws

  //Tengo el ID del usuario y obtengo los datos

  //preprocess login 
 // $ggUserID = $_SESSION['gg_user_id'];
  //$ggUserID = $_SESSION['gg_user_id'];*/

}

function gflacso_graduados_update_submission_hook($params)
{
  global $LANG;
  $form_id       = $params["form_id"];
  $submission_id = $params["submission_id"];
  $infohash = $params["infohash"];

  if (gg_isLoginForm($infohash)){
    $return_info = gg_processLoginForm($infohash);

    if ($return_info['success']) {
      $return_info = gg_loadCreateCourseStatus($form_id,$submission_id,$infohash);
    }
    
    if ($return_info['success']) {
      $return_info = gg_loadUserPersonalData($form_id,$submission_id,$infohash);
    }
  }

  if (gg_isUpdatePersonalData($infohash)){

    //Actualizo informacion personal en base de datos Flacso
    $return_info = gg_processUpdatePersonalDataForm($infohash);

    //Actualizo Informacion Adicional
  }

  if (gg_isTyCForm($infohash)){

    //Marco al alumno como preinscripto
    $return_info = gg_processTyCForm($infohash);
  }

  if (gg_isResetPasswordForm($infohash)){
    $return_info = gg_processResetPasswordForm($infohash);
  }

  //Solo accesible via URL brindada por Reset Password
  if (gg_isResetChangePasswordForm($infohash)){
    $return_info = gg_processResetChangePasswordForm($infohash);
  }

  if (gg_isChangePasswordForm($infohash)){
    $return_info = gg_processChangePasswordForm($infohash);
  }

  if (gg_isNewAccountForm($infohash)){
    $return_info = gg_processNewAccountForm($infohash);
  }

return $return_info;
}

//Chequea si el formulario es de login
function gg_isLoginForm($infohash) {

  if ( isset($infohash['usuario']) && isset($infohash['clave']))
     return true;
      

  return false;
}

//Chequea si la pagina es de actualizar informacion personal
function gg_isUpdatePersonalData($infohash) {

  if ( isset($infohash['sexo']) && isset($infohash['telefono_1']) && isset($infohash['fecha_nacimiento']) && isset($infohash['calle_domicilio']))
     return true;

  return false;
}

//Chequea si la pagina es de Terminos y Condiciones
function gg_isTyCForm($infohash) {

  if ( isset($infohash['acepta_tyc']))
     return true;
      

  return false;
}

//Chequea si el formulario es de resetear password
function gg_isResetPasswordForm($infohash) {
  if ( isset($infohash['view_id']) && $infohash['view_id']== 5 )
     return true;
  return false;
}

//Chequea si el formulario es de Crear nuevo usuario
function gg_isResetChangePasswordForm($infohash) {
  if ( isset($infohash['view_id']) && $infohash['view_id']== 8 )
     return true;
  return false;
}

//Chequea si el formulario es de Crear nuevo usuario
function gg_isNewAccountForm($infohash) {
  if ( isset($infohash['view_id']) && $infohash['view_id']== 7 )
     return true;
  return false;
}

//Chequea si el formulario es de Crear nuevo usuario
function gg_isChangePasswordForm($infohash) {
  if ( isset($infohash['view_id']) && $infohash['view_id']== 6 )
     return true;
  return false;
}


//Crea instancia el cliente necesario para comunicarse con los webservices
function gg_getWebserviceClient() {

  $settings = ft_get_module_settings("", "arbitrary_settings");

  $uid  = $settings["WSUser"];
  $pwd  = $settings["WSPassword"];
  $url = $settings["WSURL"];

  $clase = "FlacsoWs";
  $client =new simple_restclient($url); 
  $client->SetClass($clase);
  $client->SetAuth($uid, $pwd);
  return $client;
}

//Ejecuta acciones necesarias para el formulario de logeo
function gg_updateCourseStatus($status) {

  //Llamo al webservice con el id del usuario
  $client = gg_getWebserviceClient();

  $val = array(
  'id_alumno'=>intval($_SESSION['gg_user_id']),
  'id_posgrado'=>intval($_SESSION['gg_course_id'])
  );

  if ($status == 1)
    $method = 'alumno_posgrado_interesado';
  if ($status == 2)
    $method = 'alumno_posgrado_preinscripto';

  if($client->Service_Exists()){

    $client->Call->Method($method,$val,$return);
     
    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
    }
    else {
      //Fix para que pase igual.
      if ( $message == "Se ha ingresado al alumno como preinscripto, pero no se pudo enviar aviso"
          ||  $message == "Se ha ingresado al alumno como interesado, pero no se pudo enviar aviso" )
        $success = true;
      else 
        $success = false;

      $message = $return['message'];      
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );
  return $return_info;
}

//Ejecuta acciones necesarias para el formulario de logeo
function gg_loadCreateCourseStatus($form_id,$submission_id,$infohash) {

  //Llamo al webservice con el id del usuario
  $client = gg_getWebserviceClient();

  $val = array(
  'id_alumno'=>intval($_SESSION['gg_user_id']),
  'id_posgrado'=>intval($_SESSION['gg_course_id'])
  );

  if($client->Service_Exists()){

    //FIXME: Cambiar por metodo correcto
    $client->Call->Method("alumno_curso",$val,$return);
     
    if ($return) {
        $success = true;
        //Si no lo encuentro entonces aca mismo intento marcarlo como interesado.
        if ($return['id_alumno_estado'] === 0) {
          //Asigno alumno a curso en estado 1
          $return_info = gg_updateCourseStatus(1);

          if (!$return_info["success"])
            return  $return_info;

          $data['estado_inscripcion']= 1;
        }
        else {
          $data['estado_inscripcion']= $return['id_alumno_estado'];
          $namespace = "form_builder_".$_GET["published_form_id"];
          $session_name = "form_tools_completed_pages";

          if (intval($return['id_alumno_estado']) > 1){
            
            //$_SESSION[$namespace][$session_name] = array(1,2);
            $_SESSION[$namespace]["{$namespace}_form_ispreinscripted"] = 1;
          }
          
        }
        $data['nombre_curso']= $return['nombre_posgrado'];
        $_SESSION[$namespace]["{$namespace}_form_coursename"] =  $data['nombre_curso'];

    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );


  //Itero Sobre el llamado al web service
  if ($success) {
    //Actualizo formulario actual con info de webservice
    if (!gg_updateCurrentSubmission($form_id,$submission_id,$data) )
        $return_info = array(
          "success" => false,
          "message" => "Error actualizando base de datos"
        );

  }

  return $return_info;
}

//Ejecuta acciones necesarias para el formulario de logeo
function gg_processLoginForm($infohash) {

  $val = array(
  'usuario'=>$infohash['usuario'],
  'password'=>$infohash['clave'],
  );

  $client = gg_getWebserviceClient();

  if($client->Service_Exists()){
   
    $client->Call->Method("autenticar",$val,$return);
     
    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
        $_SESSION['gg_user_id'] = $return['id_alumno'];
        $_SESSION['gg_course_id'] = $_GET['course_id'];
    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );

  return $return_info;
}

//Obtiene informacion personal del usuario
function gg_loadUserPersonalData($form_id,$submission_id,$infohash) {

  //Llamo al webservice con el id del usuario
  $client = gg_getWebserviceClient();

  $val = array(
  'id_alumno'=> intval($_SESSION['gg_user_id'])
  );

  if($client->Service_Exists()){

    $client->Call->Method("alumno_datos_personales",$val,$return);
     
    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
        
        foreach ($return['datos_personales'] as $field => $value){
          $data[$field] = $value;
        }

        $ggsettings = ft_get_module_settings("", "arbitrary_settings");
        //Seteo valores por defecto para Residencia
        if (!isset($data["pais_residencia"]) || empty($data["pais_residencia"]) 
            || $data["pais_residencia"] == 269)
          $data["pais_residencia"] = intval($ggsettings["GGDefaultCountry"]);

        if (!isset($data["provincia"]) || empty($data["provincia"]))
          $data["provincia"] = intval($ggsettings["GGDefaultProvince"]);

        if (!isset($data["localidad"]) || empty($data["localidad"]))
          $data["localidad"] = intval($ggsettings["GGDefaultCity"]);
        //Fix para mulivalor del selector de Residencia (Pais, provincia, ciudad)
        $data['residencia']=$data["pais_residencia"].','.$data["provincia"].','.$data["localidad"];
        $data['fecha_nacimiento'] = date("Y-m-d H:i:s",strtotime($data['fecha_nacimiento']));
        $data['telefono'] = $data["pais_telefono_particular"].'|'.$data["area_telefono_particular"].'|'.$data["numero_telefono_particular"];
        $data['celular'] = $data["pais_telefono_celular"].'|'.$data["area_telefono_celular"].'|'.$data["numero_telefono_celular"];
         $data['confirmar_email'] = $data['email'];

    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );


  //Itero Sobre el llamado al web service
  if ($success) {
    //Actualizo formulario actual con info de webservice
    if (!gg_updateCurrentSubmission($form_id,$submission_id,$data) )
        $return_info = array(
          "success" => false,
          "message" => "Error actualizando base de datos"
        );

  }
  
  return $return_info;
}

//Ejecuta acciones necesarias para el actualizar informacion personal
function gg_processUpdatePersonalDataForm($infohash) {

  //Valido Selector de Pais / provincia / ciudad
  $message = "";
  $pais_residencia = intval(split(',',$infohash['residencia'])[0]);
  $provincia_residencia = intval(split(',',$infohash['residencia'])[1]);
  $localidad_residencia = intval(split(',',$infohash['residencia'])[2]);
  if ($pais_residencia == 13) {
    if ($provincia_residencia == null || $provincia_residencia == 0)
      $message .= "Debe ingresar una Provincia </br>";
    if ($localidad_residencia == null || $localidad_residencia == 0)
      $message .= "Debe ingresar una Localidad </br>";
  }
  else {
    if ($pais_residencia == null || $pais_residencia == 0 ) {
      $message .= "Debe ingresar un Pais </br>";
  }

  if ($infohash['email'] != $infohash['confirmar_email'] )
      $message .= "Los mails no coinciden";
  }

  if (!empty($message))
    return array (
      "success" => false,
      "message" => $message
    );
    

  $val = array(
    'id_alumno'=> intval($_SESSION['gg_user_id']),
    'apellido' => $infohash['apellido'],
    'nombre' => $infohash['nombre'],
    'email' => $infohash['email'],    
    'confirmar_email' => $infohash['confirmar_email'],    
    'sexo' => $infohash['sexo'],
    'pais_emisor_documento' => $infohash['pais_emisor_documento_country_only'],
    'fecha_nacimiento' => $infohash['fecha_nacimiento'],
    'calle_domicilio' => $infohash['calle_domicilio'],
    'numero_domicilio' => intval($infohash['numero_domicilio']),
    'cp_domicilio' => $infohash['cp_domicilio'],
    'pais_residencia' => $pais_residencia,
    'provincia' => $provincia_residencia,
    'localidad' => $localidad_residencia,
    'pais_telefono_particular' => $infohash['telefono_1'],
    'area_telefono_particular' => $infohash['telefono_2'],
    'numero_telefono_particular' => $infohash['telefono_3'],
    'pais_celular_alumno' => $infohash['celular_1'],
    'area_celular_alumno' => $infohash['celular_2'],
    'numero_celular_alumno' => $infohash['celular_3']
  );

  $client = gg_getWebserviceClient();

  if($client->Service_Exists()){
   
    $client->Call->Method("alumno_update_datos_personales",$val,$return);
     
    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );

  return $return_info;
}

//Ejecuta acciones necesarias para el formulario de logeo
function gg_processTyCForm($infohash) {

  if ($infohash["acepta_tyc"][0] == 1 && $infohash["acepta_tyc"][1] == 2)
      $return_info = gg_updateCourseStatus(2);
  else 
    $return_info = array (
      "success" => false,
      "message" => "Debe aceptar ambas opciones de los Terminos y Condiciones"
    );


  return $return_info;
}

//Ejecuta acciones necesarias para reseteo de password
function gg_processResetPasswordForm($infohash) {

  $val = array(
  'tipo_documento' => $infohash['tipo_documento'],
  'nro_documento' => $infohash['nro_documento']
  );

  $client = gg_getWebserviceClient();

  if($client->Service_Exists()){
   
    $client->Call->Method("alumno_resetear_password",$val,$return);

    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );

  return $return_info;
}

//Ejecuta acciones necesarias para el cambio con reseteo

function gg_processResetChangePasswordForm($infohash) {

  //Token e id de alumno vienen por URL
  $id_alumno = $_GET['id_alumno'];
  $token = $_GET['key'];

  //Valido token
  $client = gg_getWebserviceClient();

  $val = array(
    'id_alumno' => intval($id_alumno),
    'key' => $token
  );


  if($client->Service_Exists()){
   
    $client->Call->Method("alumno_validar_key",$val,$return);
    //KEY OK.
    if ($return &&  $return['transaction'] == SUCCESS) {
      //Valido Contrasenas iguales
      $message = "";
      $password = $infohash['clave'];
      $confirmar_password =$infohash['confirmar_clave'];
      if ($password != $confirmar_password)
          $message .= "Las contraseñas no coinciden";

      if (!empty($message))
        return array (
          "success" => false,
          "message" => $message
        );

      //Validaciones ok, proceso cambio
      $val = array(
        'id_alumno' => intval($id_alumno),
        'password' =>  $infohash['clave']
      );

      $client->Call->Method("alumno_modificar_password_por_id",$val,$return);
    
      //CHANGE OK.
      if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];

      }
      else {
        $success = false;
        $message = $return['message'];
      }

    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }


  $return_info = array(
    "success" => $success,
    "message" => $message
  );

  return $return_info;
}

//Ejecuta acciones necesarias para el cambio NORMAL
function gg_processChangePasswordForm($infohash) {

  //Valido Contrasenas iguales
  $message = "";
  $password = $infohash['nueva_clave'];
  $confirmar_password =$infohash['confirmar_nueva_clave'];
  if ($password != $confirmar_password)
      $message .= "Las contraseñas no coinciden";
  
  if (!empty($message))
    return array (
      "success" => false,
      "message" => $message
    );
  
  $val = array(
    'tipo_documento' => $infohash['tipo_documento'],
    'numero_documento' => $infohash['nro_documento'],
    'password' => $infohash['clave'],
    'new_password' =>  $infohash['nueva_clave']
  );

  $client = gg_getWebserviceClient();

  if($client->Service_Exists()){
   
    $client->Call->Method("alumno_modificar_password",$val,$return);

    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );

  return $return_info;
}


//Ejecuta acciones necesarias para dar de alta un alumno
function gg_processNewAccountForm($infohash) {

  //Valido Contrasenas iguales
  $message = "";
  $password = $infohash['password'];
  $confirmar_password =$infohash['confirmar_password'];
  if ($password != $confirmar_password)
      $message .= "Las contraseñas no coinciden";
  
  if (!empty($message))
    return array (
      "success" => false,
      "message" => $message
    );

  $val = array(
    'apellido' => $infohash['apellido'],
    'nombre' => $infohash['nombre'],
    'email' => $infohash['email'],    
    'pais_emisor' => intval($infohash['pais_emisor']),
    'tipo_documento' => $infohash['tipo_documento'],
    'nro_documento' => $infohash['nro_documento'],
    'password' => $infohash['password'],
    'id_posgrado' => $_SESSION['gg_course_id']
  );

  $client = gg_getWebserviceClient();

  if($client->Service_Exists()){
   
    $client->Call->Method("alumno_nuevo",$val,$return);
    $namespace = "form_builder_".$_GET["published_form_id"];

    if ($return &&  $return['transaction'] == SUCCESS) {
        $success = true;
        $message = $return['message'];
        $_SESSION[$namespace]["{$namespace}_form_username"] = $return['username'];

    }
    else {
      $success = false;
      $message = $return['message'];
    }

  }else{
    $success = false;
    $message = "El servicio no esta diponible en $url";
  }

  $return_info = array(
    "success" => $success,
    "message" => $message
  );

  return $return_info;
}

/*
 Actualiza los valores del corriente formulario con la info obtenida de la base
 de flacso_graduados.
 El secreto esta en que los campos del formulario coincidan con los campos de 
 los webservices
*/
function gg_updateCurrentSubmission($form_id,$submission_id,$data) {
  global $g_table_prefix;
  $form_fields = ft_get_form_fields($form_id);
  foreach ($form_fields as $row) {
    $field_id = $row["field_id"];

    // TODO: Ver como manejar archivos
    /*
    if ($field_types_processing_info[$row["field_type_id"]]["is_file_field"] == "yes")
    {
      $file_data = array(
        "field_id"   => $field_id,
        "field_info" => $row,
        "data"       => $infohash,
        "code"       => $field_types_processing_info[$row["field_type_id"]]["php_processing"],
        "settings"   => $field_settings[$field_id]
      );

      if (empty($field_types_processing_info[$row["field_type_id"]]["php_processing"]))
      {
        $file_fields[] = $file_data;
        continue;
      }
      else
      {
        $value = ft_process_form_field($file_data);
        $query[] = $row["col_name"] . " = '$value'";
      }
    }*/

    if ($row["field_name"] == "core__submission_date" || $row["col_name"] == "core__last_modified")
    {
      if (!isset($data[$row["field_name"]]) || empty($data[$row["field_name"]]))
        continue;
    }

    // TODO: Ver como manejar archivos
    /*
    if (!empty($field_types_processing_info[$row["field_type_id"]]["php_processing"]))
    {
      $data = array(
        "field_info"   => $row,
        "data"         => $infohash,
        "code"         => $field_types_processing_info[$row["field_type_id"]]["php_processing"],
        "settings"     => $field_settings[$field_id],
        "account_info" => isset($_SESSION["ft"]["account"]) ? $_SESSION["ft"]["account"] : array()
      );
      $value = ft_process_form_field($data);
      $query[] = $row["col_name"] . " = '$value'";
    }
    else
    { */
    if (isset($data[$row["field_name"]]) && !empty($data[$row["field_name"]]) )
      {
        
        if (is_array($data[$row["field_name"]]))
          $query[] = $row["col_name"] . " = '" . implode("$g_multi_val_delimiter", $data[$row["field_name"]]) . "'";
        else
          $query[] = $row["col_name"] . " = '" . $data[$row["field_name"]] . "'";
      }
    }

  $set_query = join(",\n", $query);

  $query = "
    UPDATE {$g_table_prefix}form_{$form_id}
    SET    $set_query
    WHERE  submission_id = $submission_id
           ";

  return mysql_query($query);
}

function gflacso_graduados_process_form_start_hook($params){
  /*$redirect_query_params = $params["redirect_query_params"];

  $return_info = array(
    "success" => true,
    "message" => "",
    "redirect_query_params" => $redirect_query_params
  );

  return $return_info;*/
}

/**
 * Called on installation and upgrades.
 */
function gflacso_graduados_reset_hooks()
{
  ft_unregister_module_hooks("gflacso_graduados");

  ft_register_hook("code", "gflacso_graduados", "end", "ft_update_submission", "gflacso_graduados_update_submission_hook", 50, true);

  ft_register_hook("code", "gflacso_graduados", "start", "ft_update_submission", "gflacso_graduados_update_submission_start_hook", 50, true);

  ft_register_hook("code", "gflacso_graduados", "start", "ft_process_form", "gflacso_graduados_process_form_start_hook", 50, true);
  
}