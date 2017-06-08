<?php

$page_vars = array();
$page_vars["page"] = $page;
$page_vars["tabs"] = $tabs;

ft_display_module_page("templates/index.tpl", $page_vars);