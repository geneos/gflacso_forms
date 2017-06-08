<?php

/**
 * This page was created by the Form Tools Form Builder module.
 */

require_once('../../../global/library.php');

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


$filename  = "inscripcion.php";

require_once("$g_root_dir/modules/form_builder/form.php");