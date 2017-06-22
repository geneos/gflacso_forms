<?php

ft_include_module("form_builder");
$namespace = "form_builder_{$published_form_id}";

// find out about the page: form / review / thanks. That determines what values we pass to ft_api_process_form_builder_page()
$config  = fb_get_form_configuration($published_form_id);

//Overrides thankyou page content with settings depends on form type.
$ggsettings = ft_get_module_settings("", "arbitrary_settings");

//preinscripcion toma el general es decir que si no lo pisa queda como esta.
foreach ( $config['placeholders'] as $aPlaceholder ) {

  //registro
  if ($aPlaceholder['placeholder_id'] == 18 
      && $filename == $ggsettings["GGNewAccountForm"])
    $config['thankyou_page_content'] = $aPlaceholder['placeholder_value'];

  //resetear contrasena
  if ($aPlaceholder['placeholder_id'] == 16
      && $filename == $ggsettings["GGResetPasswordForm"])
    $config['thankyou_page_content'] = $aPlaceholder['placeholder_value'];

  //cambiar contrasena
  if ($aPlaceholder['placeholder_id'] == 17 
      && ($filename == $ggsettings["GGChangePasswordForm"] 
          || $filename == $ggsettings["GGResetPasswordChangeForm"]) )
    $config['thankyou_page_content'] = $aPlaceholder['placeholder_value'];

}

//GENEOS Modificacion para poder forzar form y view
if (!isset($form_id) )
  $form_id = $config["form_id"];
else
  $config["form_id"] = $form_id;

if (!isset($view_id) )
  $view_id = $config["view_id"];
else
  $config["view_id"] = $view_id;
//Fin Mofificaciones

// clears out old, dud unfinalized submissions
fb_delete_unfinalized_submissions($form_id);

// check that we have all the info we need (configured form, View etc)
$error_code = fb_check_live_form_conditions($config);
if (!empty($error_code))
{
	$config["error_code"] = $error_code;
  fb_generate_form_page($config);
  exit;
}

fb_init_sessions();

if (isset($_GET["clear"]))
{
  fb_clear_form_builder_form_sessions($namespace);
  header("location: $filename?published_form_id=$published_form_id&course_id=$course_id");
}

//Tambien tengo que hacer clear cuando cambia a otro formulario (Seria algo como "logout") cuando cambia de un form a otro.
if ( isset($_SESSION[$namespace]['filename']) && $_SESSION[$namespace]['filename'] != $filename){
  fb_clear_form_builder_form_sessions($namespace);
  unset($_SESSION['coursename']);
}

// check the form shouldn't be taken offline. This does some special logic to override the is_online == "no"
// for cases where submissions have been started but the form is now offline
$is_online = fb_check_form_offline($config, $namespace);
$config["is_online"] = ($is_online) ? "yes" : "no";

// set up sessions and retrieve the field data already submitted
list($new_session, $fields) = fb_init_form_builder_page($form_id, $view_id, $namespace);
$_SESSION[$namespace]['filename'] = $filename;

if (isset($coursename)) {
  $_SESSION['coursename'] = $coursename;
}


// get the current submission ID
$submission_id = isset($_SESSION[$namespace]["form_tools_submission_id"]) ? $_SESSION[$namespace]["form_tools_submission_id"] : "";

// get an ordered list of the pages in this published form
$page_params = array(
  "view_tabs"                  => ft_get_view_tabs($view_id, true),
	"include_review_page"        => ($config["include_review_page"] == "yes") ? true : false,
	"include_thanks_page_in_nav" => ($config["include_thanks_page_in_nav"] == "yes") ? true : false,
  "review_page_title"          => $config["review_page_title"],
  "thankyou_page_title"        => $config["thankyou_page_title"]
);

$all_pages = fb_get_all_form_pages($page_params);


$page = ft_load_field("page", "{$namespace}_form_page", 1, $namespace);

$isPreinscripted = ft_load_field("ispreinscripted", "{$namespace}_form_ispreinscripted", 0, $namespace);



// one additional check: make sure the page they're attempting to look at is permitted. They have to pass
// through each page in order to prevent people bypassing any field validation
$page = fb_verify_page_number($page, $all_pages, $namespace);

//Cant go to tyc page
if ($isPreinscripted == 1 && $filename  == "inscripcion.php"){
    
  $discount = ($config["include_review_page"] == "yes") ? 2 : 1;
  if ($page == count($all_pages) - $discount) //Always quit review and thanyou
    $page = count($all_pages) - $discount + 1;//Go to LAST PAGE 
}


$next_page = $page + 1;
$page_info = $all_pages[$page - 1];
$page_type = $page_info["page_type"];

$post_values = array();
$params = array();

/*
if ($page_type == "review" && $filename  = "inscripcion.php"){
  $finalize = ft_load_field("finalize", "{$namespace}_form_finalize", 0, $namespace);
  if ($finalize == 1){
    $page = sizeof($all_pages)-1; //Go to thanks Page
    $next_page = $page + 1;
    $page_info = $all_pages[$page - 1];
    $page_type = $page_info["page_type"];
  }
}
*/

$next_page = "$filename?page=$next_page";
$nosession = "$filename?page=1";

if (isset($published_form_id)){
  $next_page .= "&published_form_id=$published_form_id";
  $nosession .= "&published_form_id=$published_form_id";
}

if (isset($course_id)){
  $next_page .= "&course_id=$course_id";
  $nosession .= "&course_id=$course_id";
}

if (isset($id_alumno)){
  $next_page .= "&id_alumno=$id_alumno";
  $nosession .= "&id_alumno=$id_alumno";
}

if (isset($key)) {
  $next_page .= "&key=$key";
  $nosession .= "&key=$key";
}


if ($page_type == "thanks")
{
  fb_clear_form_builder_form_sessions($namespace);
}
else
{
  $params = array(
    "namespace"         => $namespace,
    "published_form_id" => $published_form_id,
    "submission_id"     => $submission_id,
    "config"            => $config,
    "page"              => $page,
    "page_type"         => $page_type,
    "form_id"           => $form_id,
    "view_id"           => $view_id,
    "submit_button"     => "form_tools_continue",
    //Pass form_published_id and course_id parameters
    "next_page"         => "$next_page",
    "form_data"         => $_POST,
    "file_data"         => $_FILES,
    "no_sessions_url"   => "$nosession"
  );

  // we need to finalize the submission on the penultimate page. This can mean either the Review page or
  // the final form page if there's no Review page
  $num_pages = count($all_pages);
  if ($page_type == "review" || ($page >= $num_pages - 1))
  {
    $params["finalize"] = true;
  }

  // just in case
  if ($page == $num_pages && isset($params["form_data"]["form_tools_continue"]))
  {
    $params["next_page"] = "";
  }

	list($g_success, $g_message) = fb_process_form_builder_page($params);

	// if there were any validation errors, pass the error along to the page. It'll use it to know not to
	// redirecting and to show the error message
	if (!$g_success)
	{
	  $config["validation_error"] = $g_message;
	}
  else if ( isset($_SESSION[$namespace]["validation_warning"])
            && !empty($_SESSION[$namespace]["validation_warning"]) ) {
    $config["validation_warning"] = $_SESSION[$namespace]["validation_warning"];
  }
}

// now generate and display the form

fb_generate_form_page($config, $page, $submission_id);
