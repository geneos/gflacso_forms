<?php

/**
 * This page was created by the Form Tools Form Builder module.
 */

require_once('../../../global/library.php');
require_once("../../gflacso_graduados/class/simple_restclient.php");

//Search for POST first
$published_form_id = $_POST['published_form_id'];
//If not search for GET
if (!isset($published_form_id))
	$published_form_id = $_GET['published_form_id'];

$course_id =$_POST['course_id']; 
if (!isset($course_id))
	$course_id = $_GET['course_id'];

//If not, throw error (HOWTO?)
if (!isset($published_form_id) || !isset($course_id))
	die('Formulario/Link invalido');

/* Get Course name and put on SESSION later */
$settings = ft_get_module_settings("", "arbitrary_settings");

$uid  = $settings["WSUser"];
$pwd  = $settings["WSPassword"];
$url = $settings["WSURL"];

$clase = "FlacsoWs";
$client =new simple_restclient($url); 
$client->SetClass($clase);
$client->SetAuth($uid, $pwd);

$coursename = '';
if (isset($_SESSION['coursename']) && !empty($_SESSION['coursename']))
	$coursename = $_SESSION['coursename'];
else {
	$val = array(
	  'id_posgrado'=>intval($course_id)
	  );

	if($client->Service_Exists()){

		$client->Call->Method('get_nombre_posgrado',$val,$return);
		 
		if ($return &&  $return['transaction'] == SUCCESS) {
		    $coursename = $return['nombre_posgrado'];
		}

	} 
}

$filename  = "inscripcion.php";

require_once("$g_root_dir/modules/form_builder/form.php");