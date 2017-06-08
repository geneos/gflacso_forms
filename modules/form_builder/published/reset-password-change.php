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


//Search for POST first
$id_alumno = $_POST['id_alumno'];
//If not search for GET
if (!isset($id_alumno))
	$id_alumno = $_GET['id_alumno'];

//Search for POST first
$key = $_POST['key'];
//If not search for GET
if (!isset($key))
	$key = $_GET['key'];



//If not, throw error (HOWTO?)
if (!isset($published_form_id) || !isset($id_alumno) || !isset($key))
	die('Formulario/Link invalido');

//FIXME: Ver como obtenerlo de la base de datos
//Id del formulario reset-password
$form_id = 7;

//FIXME: Ver como obtenerlo de la base de datos
//Vista formulario reset-password-change
$view_id = 8;

$filename  = "reset-password-change.php";
require_once("$g_root_dir/modules/form_builder/form.php");