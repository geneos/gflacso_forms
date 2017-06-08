<?php

require_once("../../global/library.php");
ft_init_module_page();


$page = ft_load_module_field("hello_tabs", "page", "tab", "tab1");

// define the Image Manager tabs
$tabs = array(
  "tab1" => array(
      "tab_label" => $L["phrase_tab1"],
      "tab_link" => "{$_SERVER["PHP_SELF"]}?page=tab1"
        ),
  "tab2" => array(
      "tab_label" => $L["phrase_tab2"],
      "tab_link" => "{$_SERVER["PHP_SELF"]}?page=tab2"
        ),
  "tab3" => array(
      "tab_label" => $L["phrase_tab3"],
      "tab_link" => "{$_SERVER["PHP_SELF"]}?page=tab3"
        )
    );

// ------------------------------------------------------------------------------------------------

// load the appropriate code pages
switch ($page)
{
	case "tab1":
		require("tab1.php");
		break;
	case "tab2":
		require("tab2.php");
		break;
	case "tab3":
		require("tab3.php");
		break;
	default:
		require("tab1.php");
		break;
}
