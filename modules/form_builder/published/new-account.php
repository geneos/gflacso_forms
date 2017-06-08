<?php
/**
 * Custom Form Page, creada manualmente
 */
require_once('../../../global/library.php');
//Search for POST first
$published_form_id = $_POST['published_form_id'];
//If not search for GET
if (!isset($published_form_id))
	$published_form_id = $_GET['published_form_id'];

//If not, throw error (HOWTO?)
if (!isset($published_form_id))
	die('Formulario/Link invalido');

//Search for POST first
$course_id = $_POST['course_id'];
//If not search for GET
if (!isset($course_id))
	$course_id = $_GET['course_id'];

//If not, throw error (HOWTO?)
if (!isset($course_id))
	die('Formulario/Link invalido');

//FIXME: Ver como obtenerlo de la base de datos
//Id del formulario reset-password
$form_id = 6;

//FIXME: Ver como obtenerlo de la base de datos
//Vista formulario reset-password
$view_id = 7;

$filename  = "new-account.php";
require_once("$g_root_dir/modules/form_builder/form.php");