-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-06-2017 a las 20:52:51
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formtools`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_accounts`
--

CREATE TABLE `ft_accounts` (
  `account_id` mediumint(8) UNSIGNED NOT NULL,
  `account_type` enum('admin','client') NOT NULL DEFAULT 'client',
  `account_status` enum('active','disabled','pending') NOT NULL DEFAULT 'disabled',
  `last_logged_in` datetime DEFAULT NULL,
  `ui_language` varchar(50) NOT NULL DEFAULT 'en_us',
  `timezone_offset` varchar(4) DEFAULT NULL,
  `sessions_timeout` varchar(10) NOT NULL DEFAULT '30',
  `date_format` varchar(50) NOT NULL DEFAULT 'M jS, g:i A',
  `login_page` varchar(50) NOT NULL DEFAULT 'client_forms',
  `logout_url` varchar(255) DEFAULT NULL,
  `theme` varchar(50) NOT NULL DEFAULT 'default',
  `swatch` varchar(255) NOT NULL,
  `menu_id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `temp_reset_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_accounts`
--

INSERT INTO `ft_accounts` (`account_id`, `account_type`, `account_status`, `last_logged_in`, `ui_language`, `timezone_offset`, `sessions_timeout`, `date_format`, `login_page`, `logout_url`, `theme`, `swatch`, `menu_id`, `first_name`, `last_name`, `email`, `username`, `password`, `temp_reset_password`) VALUES
(1, 'admin', 'active', '2017-06-08 20:12:36', 'en_us', '0', '30', 'M jS, g:i A', 'admin_forms', 'http://localhost/www/formtools', 'default', 'green', 1, 'Pablo', 'Velazquez', 'pablcho88@gmail.com', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_account_settings`
--

CREATE TABLE `ft_account_settings` (
  `account_id` mediumint(8) UNSIGNED NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_client_forms`
--

CREATE TABLE `ft_client_forms` (
  `account_id` mediumint(8) UNSIGNED NOT NULL,
  `form_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_client_views`
--

CREATE TABLE `ft_client_views` (
  `account_id` mediumint(8) UNSIGNED NOT NULL,
  `view_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_email_templates`
--

CREATE TABLE `ft_email_templates` (
  `email_id` mediumint(8) UNSIGNED NOT NULL,
  `form_id` mediumint(8) UNSIGNED NOT NULL,
  `email_template_name` varchar(100) DEFAULT NULL,
  `email_status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `view_mapping_type` enum('all','specific') NOT NULL DEFAULT 'all',
  `view_mapping_view_id` mediumint(9) DEFAULT NULL,
  `limit_email_content_to_fields_in_view` mediumint(9) DEFAULT NULL,
  `email_event_trigger` set('on_submission','on_edit','on_delete') DEFAULT NULL,
  `include_on_edit_submission_page` enum('no','all_views','specific_views') NOT NULL DEFAULT 'no',
  `subject` varchar(255) DEFAULT NULL,
  `email_from` enum('admin','client','form_email_field','custom','none') DEFAULT NULL,
  `email_from_account_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `email_from_form_email_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `custom_from_name` varchar(100) DEFAULT NULL,
  `custom_from_email` varchar(100) DEFAULT NULL,
  `email_reply_to` enum('admin','client','form_email_field','custom','none') DEFAULT NULL,
  `email_reply_to_account_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `email_reply_to_form_email_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `custom_reply_to_name` varchar(100) DEFAULT NULL,
  `custom_reply_to_email` varchar(100) DEFAULT NULL,
  `html_template` mediumtext,
  `text_template` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_email_template_edit_submission_views`
--

CREATE TABLE `ft_email_template_edit_submission_views` (
  `email_id` mediumint(8) UNSIGNED NOT NULL,
  `view_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_email_template_recipients`
--

CREATE TABLE `ft_email_template_recipients` (
  `recipient_id` mediumint(8) UNSIGNED NOT NULL,
  `email_template_id` mediumint(8) UNSIGNED NOT NULL,
  `recipient_user_type` enum('admin','client','form_email_field','custom') NOT NULL,
  `recipient_type` enum('main','cc','bcc') NOT NULL DEFAULT 'main',
  `account_id` mediumint(9) DEFAULT NULL,
  `form_email_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `custom_recipient_name` varchar(200) DEFAULT NULL,
  `custom_recipient_email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_email_template_when_sent_views`
--

CREATE TABLE `ft_email_template_when_sent_views` (
  `email_id` mediumint(9) NOT NULL,
  `view_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_options`
--

CREATE TABLE `ft_field_options` (
  `list_id` mediumint(8) UNSIGNED NOT NULL,
  `list_group_id` mediumint(9) NOT NULL,
  `option_order` smallint(4) NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `is_new_sort_group` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_options`
--

INSERT INTO `ft_field_options` (`list_id`, `list_group_id`, `option_order`, `option_value`, `option_name`, `is_new_sort_group`) VALUES
(1, 26, 1, 'AR', 'Argentina', 'yes'),
(1, 26, 2, 'VE', 'Venezuela', 'yes'),
(1, 26, 3, 'CO', 'Colombia', 'yes'),
(1, 26, 4, 'CH', 'Chile', 'yes'),
(1, 27, 5, 'AF', 'Africonia', 'yes'),
(1, 27, 6, 'NS', 'No se', 'yes'),
(2, 40, 1, 'H', 'Masculino', 'yes'),
(2, 40, 2, 'F', 'Femenino', 'yes'),
(7, 34, 1, 'CC', 'Cédula de Ciudadanía', 'yes'),
(7, 34, 2, 'CI', 'Cédula de Identidad', 'yes'),
(7, 34, 3, 'DNI', 'DNI', 'yes'),
(7, 34, 4, 'PAS', 'Pasaporte Argentino', 'yes'),
(7, 34, 5, 'PASE', 'Pasaporte Extranjero', 'yes'),
(7, 34, 6, 'OTRO', 'OTRO', 'yes'),
(8, 35, 1, 'N', 'No', 'yes'),
(8, 35, 2, 'S', 'Si', 'yes'),
(9, 38, 1, '1', 'Interesado', 'yes'),
(9, 38, 2, '2', 'Preinscripto', 'yes'),
(9, 38, 3, '3', 'Inscripto', 'yes'),
(9, 38, 4, '4', 'Abandono', 'yes'),
(9, 38, 5, '5', 'Graduado', 'yes'),
(9, 38, 6, '6', 'Titulo en trámite', 'yes'),
(9, 38, 7, '7', 'Entregado', 'yes'),
(10, 41, 1, '1', 'Declaro que todos los datos consignados en esta solicitud son fidedignos y en caso de que así lo requiera FLACSO/Sede Argentina, me comprometo a someter la documentación adicional que se me solicite para acreditarlos como verdaderos.', 'yes'),
(10, 41, 2, '2', 'Declaro conocer y aceptar las condiciones y las reglamentaciones de la propuesta docente a la que me inscribo.', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_settings`
--

CREATE TABLE `ft_field_settings` (
  `field_id` mediumint(8) UNSIGNED NOT NULL,
  `setting_id` mediumint(9) NOT NULL,
  `setting_value` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_settings`
--

INSERT INTO `ft_field_settings` (`field_id`, `setting_id`, `setting_value`) VALUES
(7, 11, '1'),
(7, 12, ''),
(20, 10, ''),
(22, 24, ''),
(23, 11, '2'),
(23, 12, ''),
(24, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(24, 23, 'yes'),
(25, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(25, 23, 'yes'),
(29, 55, '(xx) xxxx-xxxxxxxx'),
(30, 55, '(xx) xxxx-xxxxxxxx'),
(62, 4, ''),
(67, 19, '10'),
(68, 11, '9'),
(70, 11, '7'),
(75, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(75, 23, 'yes'),
(76, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(76, 23, 'yes'),
(81, 11, '7'),
(86, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(86, 23, 'yes'),
(87, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(87, 23, 'yes'),
(92, 53, ''),
(93, 11, '7'),
(95, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(95, 23, 'yes'),
(96, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(96, 23, 'yes'),
(105, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(105, 23, 'yes'),
(106, 22, 'datetime:yy-mm-dd|h:mm TT|ampm`true'),
(106, 23, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_types`
--

CREATE TABLE `ft_field_types` (
  `field_type_id` mediumint(8) UNSIGNED NOT NULL,
  `is_editable` enum('yes','no') NOT NULL,
  `non_editable_info` mediumtext,
  `managed_by_module_id` mediumint(9) DEFAULT NULL,
  `field_type_name` varchar(255) NOT NULL,
  `field_type_identifier` varchar(50) NOT NULL,
  `group_id` smallint(6) NOT NULL,
  `is_file_field` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_date_field` enum('yes','no') NOT NULL DEFAULT 'no',
  `raw_field_type_map` varchar(50) DEFAULT NULL,
  `raw_field_type_map_multi_select_id` mediumint(9) DEFAULT NULL,
  `list_order` smallint(6) NOT NULL,
  `compatible_field_sizes` varchar(255) NOT NULL,
  `view_field_rendering_type` enum('none','php','smarty') NOT NULL DEFAULT 'none',
  `view_field_php_function_source` varchar(255) DEFAULT NULL,
  `view_field_php_function` varchar(255) DEFAULT NULL,
  `view_field_smarty_markup` mediumtext NOT NULL,
  `edit_field_smarty_markup` mediumtext NOT NULL,
  `php_processing` mediumtext NOT NULL,
  `resources_css` mediumtext,
  `resources_js` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_types`
--

INSERT INTO `ft_field_types` (`field_type_id`, `is_editable`, `non_editable_info`, `managed_by_module_id`, `field_type_name`, `field_type_identifier`, `group_id`, `is_file_field`, `is_date_field`, `raw_field_type_map`, `raw_field_type_map_multi_select_id`, `list_order`, `compatible_field_sizes`, `view_field_rendering_type`, `view_field_php_function_source`, `view_field_php_function`, `view_field_smarty_markup`, `edit_field_smarty_markup`, `php_processing`, `resources_css`, `resources_js`) VALUES
(1, 'no', '{$LANG.text_non_deletable_fields}', NULL, '{$LANG.word_textbox}', 'textbox', 1, 'no', 'no', 'textbox', NULL, 1, '1char,2chars,tiny,small,medium,large,very_large', 'smarty', 'core', '', '{$VALUE|htmlspecialchars}', '<input type="text" name="{$NAME}" value="{$VALUE|escape}" \n  class="form-control {$size}{if $highlight} {$highlight}{/if}" \n  {if $maxlength}maxlength="{$maxlength}"{/if} />\n \n{if $comments}\n  <div class="cf_field_comments">{$comments}</div>\n{/if}', '', 'input.cf_size_tiny {\r\n  width: 30px; \r\n}\r\ninput.cf_size_small {\r\n  width: 80px; \r\n}\r\ninput.cf_size_medium {\r\n  width: 150px; \r\n}\r\ninput.cf_size_large {\r\n  width: 250px;\r\n}\r\ninput.cf_size_full_width {\r\n  width: 99%; \r\n}', ''),
(2, 'yes', NULL, NULL, '{$LANG.word_textarea}', 'textarea', 1, 'no', 'no', 'textarea', NULL, 2, 'medium,large,very_large', 'smarty', 'core', '', '{if $CONTEXTPAGE == "edit_submission"}  \n  {$VALUE|nl2br}\n{else}\n  {$VALUE}\n{/if}', '{* figure out all the classes *}\n{assign var=classes value=$height}\n{if $highlight_colour}\n  {assign var=classes value="`$classes` `$highlight_colour`"}\n{/if}\n{if $input_length == "words" && $maxlength != ""}\n  {assign var=classes value="`$classes` cf_wordcounter max`$maxlength`"}\n{elseif $input_length == "chars" && $maxlength != ""}\n  {assign var=classes value="`$classes` cf_textcounter max`$maxlength`"}\n{/if}\n\n<textarea name="{$NAME}" id="{$NAME}_id" class="{$classes} form-control">{$VALUE}</textarea>\n\n{if $input_length == "words" && $maxlength != ""}\n  <div class="cf_counter" id="{$NAME}_counter">\n    {$maxlength} {$LANG.phrase_word_limit_p} <span></span> {$LANG.phrase_remaining_words}\n  </div>\n{elseif $input_length == "chars" && $maxlength != ""}\n  <div class="cf_counter" id="{$NAME}_counter">\n    {$maxlength} {$LANG.phrase_characters_limit_p} <span></span> {$LANG.phrase_remaining_characters}\n  </div>\n{/if}\n\n{if $comments}\n  <div class="cf_field_comments">{$comments|nl2br}</div>\n{/if}', '', '.cf_counter span {\r\n  font-weight: bold; \r\n}\r\ntextarea {\r\n  width: 99%;\r\n}\r\ntextarea.cf_size_tiny {\r\n  height: 30px;\r\n}\r\ntextarea.cf_size_small {\r\n  height: 80px;  \r\n}\r\ntextarea.cf_size_medium {\r\n  height: 150px;  \r\n}\r\ntextarea.cf_size_large {\r\n  height: 300px;\r\n}', '/**\r\n * The following code provides a simple text/word counter option for any  \r\n * textarea. It either just keeps counting up, or limits the results to a\r\n * certain number - all depending on what the user has selected via the\r\n * field type settings.\r\n */\r\nvar cf_counter = {};\r\ncf_counter.get_max_count = function(el) {\r\n  var classes = $(el).attr(''class'').split(" ").slice(-1);\r\n  var max = null;\r\n  for (var i=0; i<classes.length; i++) {\r\n    var result = classes[i].match(/max(\\d+)/);\r\n    if (result != null) {\r\n      max = result[1];\r\n      break;\r\n    }\r\n  }\r\n  return max;\r\n}\r\n\r\n$(function() {\r\n  $("textarea[class~=''cf_wordcounter'']").each(function() {\r\n    var max = cf_counter.get_max_count(this);\r\n    if (max == null) {\r\n      return;\r\n    }\r\n    $(this).bind("keydown", function() {\r\n      var val = $(this).val();\r\n      var len        = val.split(/[\\s]+/);\r\n      var field_name = $(this).attr("name");\r\n      var num_words  = len.length - 1;\r\n      if (num_words > max) {\r\n        var allowed_words = val.split(/[\\s]+/, max);\r\n        truncated_str = allowed_words.join(" ");\r\n        $(this).val(truncated_str);\r\n      } else {\r\n        $("#" + field_name + "_counter").find("span").html(parseInt(max) - parseInt(num_words));\r\n      }\r\n    });     \r\n    $(this).trigger("keydown");\r\n  });\r\n\r\n  $("textarea[class~=''cf_textcounter'']").each(function() {\r\n    var max = cf_counter.get_max_count(this);\r\n    if (max == null) {\r\n      return;\r\n    }\r\n    $(this).bind("keydown", function() {    \r\n      var field_name = $(this).attr("name");      \r\n      if (this.value.length > max) {\r\n        this.value = this.value.substring(0, max);\r\n      } else {\r\n        $("#" + field_name + "_counter").find("span").html(max - this.value.length);\r\n      }\r\n    });\r\n    $(this).trigger("keydown");\r\n  });});'),
(3, 'yes', NULL, NULL, '{$LANG.word_password}', 'password', 1, 'no', 'no', 'password', NULL, 3, '1char,2chars,tiny,small,medium', 'none', 'core', '', '', '<input class="form-control" type="password" name="{$NAME}" value="{$VALUE|escape}" \n  class="cf_password" />\n \n{if $comments}\n  <div class="cf_field_comments">{$comments}</div>\n{/if}', '', 'input.cf_password {\r\n  width: 120px;\r\n}', ''),
(4, 'yes', NULL, NULL, '{$LANG.word_dropdown}', 'dropdown', 1, 'no', 'no', 'select', 11, 4, '1char,2chars,tiny,small,medium,large', 'php', 'core', 'ft_display_field_type_dropdown', '{strip}{if $contents != ""}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {foreach from=$options item=option name=row}\r\n      {if $VALUE == $option.option_value}{$option.option_name}{/if}\r\n    {/foreach}\r\n  {/foreach}\r\n{/if}{/strip}', '{if $contents == ""}\n  <div class="cf_field_comments">\n    {$LANG.phrase_not_assigned_to_option_list} \n  </div>\n{else}\n  <select name="{$NAME}" class="form-control">\n  {foreach from=$contents.options item=curr_group_info name=group}\n    {assign var=group_info value=$curr_group_info.group_info}\n    {assign var=options value=$curr_group_info.options}\n    {if $group_info.group_name}\n      <optgroup label="{$group_info.group_name|escape}">\n    {/if}\n    {foreach from=$options item=option name=row}\n      <option value="{$option.option_value}"\n        {if $VALUE == $option.option_value}selected{/if}>{$option.option_name}</option>\n    {/foreach}\n    {if $group_info.group_name}\n      </optgroup>\n    {/if}\n  {/foreach}\n  </select>\n{/if}\n\n{if $comments}\n  <div class="cf_field_comments">{$comments}</div>\n{/if}', '', '', ''),
(5, 'yes', NULL, NULL, '{$LANG.phrase_multi_select_dropdown}', 'multi_select_dropdown', 1, 'no', 'no', 'multi-select', 13, 5, '1char,2chars,tiny,small,medium,large', 'php', 'core', 'ft_display_field_type_multi_select_dropdown', '{if $contents != ""}\r\n  {assign var=vals value="`$g_multi_val_delimiter`"|explode:$VALUE}\r\n  {assign var=is_first value=true}\r\n  {strip}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {foreach from=$options item=option name=row}\r\n      {if $option.option_value|in_array:$vals}\r\n        {if $is_first == false}, {/if}\r\n        {$option.option_name}\r\n        {assign var=is_first value=false}\r\n      {/if}\r\n    {/foreach}\r\n  {/foreach}\r\n  {/strip}\r\n{/if}', '{if $contents == ""}\r\n  <div class="cf_field_comments">{$LANG.phrase_not_assigned_to_option_list}</div>\r\n{else}\r\n  {assign var=vals value="`$g_multi_val_delimiter`"|explode:$VALUE}\r\n  <select name="{$NAME}[]" multiple size="{if $num_rows}{$num_rows}{else}5{/if}">\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=group_info value=$curr_group_info.group_info}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {if $group_info.group_name}\r\n      <optgroup label="{$group_info.group_name|escape}">\r\n    {/if}\r\n    {foreach from=$options item=option name=row}\r\n      <option value="{$option.option_value}"\r\n        {if $option.option_value|in_array:$vals}selected{/if}>{$option.option_name}</option>\r\n    {/foreach}\r\n    {if $group_info.group_name}\r\n      </optgroup>\r\n    {/if}\r\n  {/foreach}\r\n  </select>\r\n{/if}\r\n\r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}', '', '', ''),
(6, 'yes', NULL, NULL, '{$LANG.phrase_radio_buttons}', 'radio_buttons', 1, 'no', 'no', 'radio-buttons', 16, 6, '1char,2chars,tiny,small,medium,large', 'php', 'core', 'ft_display_field_type_radios', '{strip}{if $contents != ""}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {foreach from=$options item=option name=row}\r\n      {if $VALUE == $option.option_value}{$option.option_name}{/if}\r\n    {/foreach}\r\n  {/foreach}\r\n{/if}{/strip}', '{if $contents == ""}\r\n  <div class="cf_field_comments">{$LANG.phrase_not_assigned_to_option_list}</div>\r\n{else}\r\n  {assign var=is_in_columns value=false}\r\n  {if $formatting == "cf_option_list_2cols" || \r\n      $formatting == "cf_option_list_3cols" || \r\n      $formatting == "cf_option_list_4cols"}\r\n    {assign var=is_in_columns value=true}\r\n  {/if}\r\n\r\n  {assign var=counter value="1"}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=group_info value=$curr_group_info.group_info}\r\n    {assign var=options value=$curr_group_info.options}\r\n\r\n    {if $group_info.group_name}\r\n      <div class="cf_option_list_group_label">{$group_info.group_name}</div>\r\n    {/if}\r\n\r\n    {if $is_in_columns}<div class="{$formatting}">{/if}\r\n\r\n    {foreach from=$options item=option name=row}\r\n      {if $is_in_columns}<div class="column">{/if}\r\n        <input type="radio" name="{$NAME}" id="{$NAME}_{$counter}" \r\n          value="{$option.option_value}"\r\n          {if $VALUE == $option.option_value}checked{/if} />\r\n          <label for="{$NAME}_{$counter}">{$option.option_name}</label>\r\n      {if $is_in_columns}</div>{/if}\r\n      {if $formatting == "vertical"}<br />{/if}\r\n      {assign var=counter value=$counter+1}\r\n    {/foreach}\r\n\r\n    {if $is_in_columns}</div>{/if}\r\n  {/foreach}\r\n\r\n  {if $comments}<div class="cf_field_comments">{$comments}</div>{/if}\r\n{/if}', '', '/* All CSS styles for this field type are found in Shared Resources */', ''),
(7, 'yes', NULL, NULL, '{$LANG.word_checkboxes}', 'checkboxes', 1, 'no', 'no', 'checkboxes', 19, 7, '1char,2chars,tiny,small,medium,large', 'php', 'core', 'ft_display_field_type_checkboxes', '{strip}{if $contents != ""}\r\n  {assign var=vals value="`$g_multi_val_delimiter`"|explode:$VALUE}\r\n  {assign var=is_first value=true}\r\n  {strip}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {foreach from=$options item=option name=row}\r\n      {if $option.option_value|in_array:$vals}\r\n        {if $is_first == false}, {/if}\r\n        {$option.option_name}\r\n        {assign var=is_first value=false}\r\n      {/if}\r\n    {/foreach}\r\n  {/foreach}\r\n  {/strip}\r\n{/if}{/strip}', '{if $contents == ""}\r\n  <div class="cf_field_comments">{$LANG.phrase_not_assigned_to_option_list}</div>\r\n{else}\r\n  {assign var=vals value="`$g_multi_val_delimiter`"|explode:$VALUE}\r\n  {assign var=is_in_columns value=false}\r\n  {if $formatting == "cf_option_list_2cols" || \r\n      $formatting == "cf_option_list_3cols" || \r\n      $formatting == "cf_option_list_4cols"}\r\n    {assign var=is_in_columns value=true}\r\n  {/if}\r\n\r\n  {assign var=counter value="1"}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=group_info value=$curr_group_info.group_info}\r\n    {assign var=options value=$curr_group_info.options}\r\n\r\n    {if $group_info.group_name}\r\n      <div class="cf_option_list_group_label">{$group_info.group_name}</div>\r\n    {/if}\r\n\r\n    {if $is_in_columns}<div class="{$formatting}">{/if}\r\n\r\n    {foreach from=$options item=option name=row}\r\n      {if $is_in_columns}<div class="column">{/if}\r\n        <input type="checkbox" name="{$NAME}[]" id="{$NAME}_{$counter}" \r\n          value="{$option.option_value|escape}" \r\n          {if $option.option_value|in_array:$vals}checked{/if} />\r\n          <label for="{$NAME}_{$counter}">{$option.option_name}</label>\r\n      {if $is_in_columns}</div>{/if}\r\n      {if $formatting == "vertical"}<br />{/if}\r\n      {assign var=counter value=$counter+1}\r\n    {/foreach}\r\n\r\n    {if $is_in_columns}</div>{/if}\r\n  {/foreach}\r\n\r\n  {if {$comments}\r\n    <div class="cf_field_comments">{$comments}</div> \r\n  {/if}\r\n{/if}', '', '/* all CSS is found in Shared Resources */', ''),
(8, 'no', '{$LANG.text_non_deletable_fields}', NULL, '{$LANG.word_date}', 'date', 2, 'no', 'yes', '', NULL, 1, 'small', 'php', 'core', 'ft_display_field_type_date', '{strip}\r\n  {if $VALUE}\r\n    {assign var=tzo value=""}\r\n    {if $apply_timezone_offset == "yes"}\r\n      {assign var=tzo value=$ACCOUNT_INFO.timezone_offset}\r\n    {/if}\r\n    {if $display_format == "yy-mm-dd" || !$display_format}\r\n      {$VALUE|custom_format_date:$tzo:"Y-m-d"}\r\n    {elseif $display_format == "dd/mm/yy"}\r\n      {$VALUE|custom_format_date:$tzo:"d/m/Y"}\r\n    {elseif $display_format == "mm/dd/yy"}\r\n      {$VALUE|custom_format_date:$tzo:"m/d/Y"}\r\n    {elseif $display_format == "M d, yy"}\r\n      {$VALUE|custom_format_date:$tzo:"M j, Y"}\r\n    {elseif $display_format == "MM d, yy"}\r\n      {$VALUE|custom_format_date:$tzo:"F j, Y"}\r\n    {elseif $display_format == "D M d, yy"}\r\n      {$VALUE|custom_format_date:$tzo:"D M j, Y"}\r\n    {elseif $display_format == "DD, MM d, yy"}\r\n      {$VALUE|custom_format_date:$tzo:"l M j, Y"}\r\n    {elseif $display_format == "dd. mm. yy."}\r\n      {$VALUE|custom_format_date:$tzo:"d. m. Y."}\r\n    {elseif $display_format == "datetime:dd/mm/yy|h:mm TT|ampm`true"}\r\n      {$VALUE|custom_format_date:$tzo:"d/m/Y g:i A"}\r\n    {elseif $display_format == "datetime:mm/dd/yy|h:mm TT|ampm`true"}\r\n      {$VALUE|custom_format_date:$tzo:"m/d/Y g:i A"}\r\n    {elseif $display_format == "datetime:yy-mm-dd|h:mm TT|ampm`true"}\r\n      {$VALUE|custom_format_date:$tzo:"Y-m-d g:i A"}\r\n    {elseif $display_format == "datetime:yy-mm-dd|hh:mm"}\r\n      {$VALUE|custom_format_date:$tzo:"Y-m-d H:i"}\r\n    {elseif $display_format == "datetime:yy-mm-dd|hh:mm:ss|showSecond`true"}\r\n      {$VALUE|custom_format_date:$tzo:"Y-m-d H:i:s"}\r\n    {elseif $display_format == "datetime:dd. mm. yy.|hh:mm"}\r\n      {$VALUE|custom_format_date:$tzo:"d. m. Y. H:i"}\r\n    {/if}\r\n{/if}{/strip}', '{assign var=class value="cf_datepicker"}\n{if $display_format|strpos:"datetime" === 0}\n  {assign var=class value="cf_datetimepicker"}\n{/if}\n\n{assign var="val" value=""}\n{if $VALUE}\n  {assign var=tzo value=""}\n  {if $apply_timezone_offset == "yes"}\n    {assign var=tzo value=$ACCOUNT_INFO.timezone_offset}\n  {/if}\n  {if $display_format == "yy-mm-dd"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"Y-m-d"}\n  {elseif $display_format == "dd/mm/yy"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"d/m/Y"}\n  {elseif $display_format == "mm/dd/yy"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"m/d/Y"}\n  {elseif $display_format == "M d, yy"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"M j, Y"}\n  {elseif $display_format == "MM d, yy"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"F j, Y"}\n  {elseif $display_format == "D M d, yy"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"D M j, Y"}\n  {elseif $display_format == "DD, MM d, yy"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"l M j, Y"}\n  {elseif $display_format == "dd. mm. yy."}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"d. m. Y."}\n  {elseif $display_format == "datetime:dd/mm/yy|h:mm TT|ampm`true"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"d/m/Y g:i A"}\n  {elseif $display_format == "datetime:mm/dd/yy|h:mm TT|ampm`true"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"m/d/Y g:i A"}\n  {elseif $display_format == "datetime:yy-mm-dd|h:mm TT|ampm`true"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"Y-m-d g:i A"}\n  {elseif $display_format == "datetime:yy-mm-dd|hh:mm"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"Y-m-d H:i"}\n  {elseif $display_format == "datetime:yy-mm-dd|hh:mm:ss|showSecond`true"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"Y-m-d H:i:s"}\n  {elseif $display_format == "datetime:dd. mm. yy.|hh:mm"}\n    {assign var=val value=$VALUE|custom_format_date:$tzo:"d. m. Y. H:i"}\n  {/if}\n{/if}\n\n<div class="cf_date_group">\n  <input type="input" name="{$NAME}" id="{$NAME}_id" \n    class="cf_datefield {$class} cf_size_medium" value="{$val}" /><img class="ui-datepicker-trigger" src="{$g_root_url}/global/images/calendar.png" id="{$NAME}_icon_id" />\n  <input type="hidden" id="{$NAME}_format" value="{$display_format}" />\n  {if $comments}\n    <div class="cf_field_comments">{$comments}</div>\n  {/if}\n</div>', '$field_name     = $vars["field_info"]["field_name"];\r\n$date           = $vars["data"][$field_name];\r\n$display_format = $vars["settings"]["display_format"];\r\n$atzo           = $vars["settings"]["apply_timezone_offset"];\r\n$account_info   = isset($vars["account_info"]) ? $vars["account_info"] : array();\r\n\r\nif (empty($date))\r\n{\r\n  $value = "";\r\n}\r\nelse\r\n{\r\n  if (strpos($display_format, "datetime:") === 0)\r\n  {\r\n    $parts = explode(" ", $date);\r\n    switch ($display_format)\r\n    {\r\n      case "datetime:dd/mm/yy|h:mm TT|ampm`true":\r\n        $date = substr($date, 3, 2) . "/" . substr($date, 0, 2) . "/" . \r\n          substr($date, 6);\r\n        break;\r\n      case "datetime:dd. mm. yy.|hh:mm":\r\n        $date = substr($date, 4, 2) . "/" . substr($date, 0, 2) . "/" . \r\n          substr($date, 8, 4) . " " . substr($date, 14);\r\n        break;\r\n    }\r\n  }\r\n  else\r\n  {\r\n    if ($display_format == "dd/mm/yy")\r\n    {\r\n      $date = substr($date, 3, 2) . "/" . substr($date, 0, 2) . "/" . \r\n        substr($date, 6);\r\n    } \r\n    else if ($display_format == "dd. mm. yy.")\r\n    {\r\n      $parts = explode(" ", $date);\r\n      $date = trim($parts[1], ".") . "/" . trim($parts[0], ".") . "/" . trim($parts[2], ".");\r\n    }\r\n  }\r\n\r\n  $time = strtotime($date);\r\n  \r\n  // lastly, if this field has a timezone offset being applied to it, do the\r\n  // appropriate math on the date\r\n  if ($atzo == "yes" && !isset($account_info["timezone_offset"]))\r\n  {\r\n    $seconds_offset = $account_info["timezone_offset"] * 60 * 60;\r\n    $time += $seconds_offset;\r\n  }\r\n\r\n  $value = date("Y-m-d H:i:s", $time);\r\n}', '.cf_datepicker {\r\n  width: 160px; \r\n}\r\n.cf_datetimepicker {\r\n  width: 160px; \r\n}\r\n.ui-datepicker-trigger {\r\n  cursor: pointer; \r\n}', '$(function() {\r\n  // the datetimepicker has a bug that prevents the icon from appearing. So\r\n  // instead, we add the image manually into the page and assign the open event\r\n  // handler to the image\r\n  var default_settings = {\r\n    changeYear: true,\r\n    changeMonth: true   \r\n  }\r\n\r\n  $(".cf_datepicker").each(function() {\r\n    var field_name = $(this).attr("name");\r\n    var settings = default_settings;\r\n    if ($("#" + field_name + "_id").length) {\r\n      settings.dateFormat = $("#" + field_name + "_format").val();\r\n    }\r\n    $(this).datepicker(settings);\r\n    $("#" + field_name + "_icon_id").bind("click",\r\n      { field_id: "#" + field_name + "_id" }, function(e) {      \r\n      $.datepicker._showDatepicker($(e.data.field_id)[0]);\r\n    });\r\n  });\r\n    \r\n  $(".cf_datetimepicker").each(function() {\r\n    var field_name = $(this).attr("name");\r\n    var settings = default_settings;\r\n    if ($("#" + field_name + "_id").length) {\r\n      var settings_str = $("#" + field_name + "_format").val();\r\n      settings_str = settings_str.replace(/datetime:/, "");\r\n      var settings_list = settings_str.split("|");\r\n      var settings = {};\r\n      settings.dateFormat = settings_list[0];\r\n      settings.timeFormat = settings_list[1];      \r\n      for (var i=2; i<settings_list.length; i++) {\r\n        var parts = settings_list[i].split("`");\r\n        if (parts[1] === "true") {\r\n          parts[1] = true;\r\n        }\r\n        settings[parts[0]] = parts[1];\r\n      }\r\n    }\r\n    $(this).datetimepicker(settings);\r\n    $("#" + field_name + "_icon_id").bind("click",\r\n      { field_id: "#" + field_name + "_id" }, function(e) {      \r\n      $.datepicker._showDatepicker($(e.data.field_id)[0]);\r\n    });\r\n  });  \r\n});'),
(9, 'yes', NULL, NULL, '{$LANG.word_time}', 'time', 2, 'no', 'no', '', NULL, 2, 'small', 'none', 'core', '', '', '<div class="cf_date_group">\r\n  <input type="input" name="{$NAME}" value="{$VALUE}" class="cf_datefield cf_timepicker" />\r\n  <input type="hidden" id="{$NAME}_id" value="{$display_format}" />\r\n  \r\n  {if $comments}\r\n    <div class="cf_field_comments">{$comments}</div>\r\n  {/if}\r\n</div>', '', '.cf_timepicker {\r\n  width: 60px; \r\n}\r\n.ui-timepicker-div .ui-widget-header{ margin-bottom: 8px; }\r\n.ui-timepicker-div dl{ text-align: left; }\r\n.ui-timepicker-div dl dt{ height: 25px; }\r\n.ui-timepicker-div dl dd{ margin: -25px 0 10px 65px; }\r\n.ui-timepicker-div td { font-size: 90%; }', '$(function() {  \r\n  var default_settings = {\r\n    buttonImage:     g.root_url + "/global/images/clock.png",      \r\n    showOn:          "both",\r\n    buttonImageOnly: true\r\n  }\r\n  $(".cf_timepicker").each(function() {\r\n    var field_name = $(this).attr("name");\r\n    var settings = default_settings;\r\n    if ($("#" + field_name + "_id").length) {\r\n      var settings_list = $("#" + field_name + "_id").val().split("|");      \r\n      if (settings_list.length > 0) {\r\n        settings.timeFormat = settings_list[0];\r\n        for (var i=1; i<settings_list.length; i++) {\r\n          var parts = settings_list[i].split("`");\r\n          if (parts[1] === "true") {\r\n            parts[1] = true;\r\n          } else if (parts[1] === "false") {\r\n            parts[1] = false;\r\n          }\r\n          settings[parts[0]] = parts[1];\r\n        }\r\n      }\r\n    }\r\n    $(this).timepicker(settings);\r\n  });\r\n});'),
(10, 'yes', NULL, NULL, '{$LANG.phrase_phone_number}', 'phone', 2, 'no', 'no', '', NULL, 3, 'small,medium', 'php', 'core', 'ft_display_field_type_phone_number', '{php}\r\n$format = $this->get_template_vars("phone_number_format");\r\n$values = explode("|", $this->get_template_vars("VALUE"));\r\n$pieces = preg_split("/(x+)/", $format, 0, PREG_SPLIT_DELIM_CAPTURE);\r\n$counter = 1;\r\n$output = "";\r\n$has_content = false;\r\nforeach ($pieces as $piece)\r\n{\r\n  if (empty($piece))\r\n    continue;\r\n\r\n  if ($piece[0] == "x") {    \r\n    $value = (isset($values[$counter-1])) ? $values[$counter-1] : "";\r\n    $output .= $value;\r\n    if (!empty($value))\r\n    {\r\n      $has_content = true;\r\n    }\r\n    $counter++;\r\n  } else {\r\n    $output .= $piece;\r\n  }\r\n}\r\n\r\nif (!empty($output) && $has_content)\r\n  echo $output;\r\n{/php}', '{php}\r\n$format = $this->get_template_vars("phone_number_format");\r\n$values = explode("|", $this->get_template_vars("VALUE"));\r\n$name   = $this->get_template_vars("NAME");\r\n\r\n$pieces = preg_split("/(x+)/", $format, 0, PREG_SPLIT_DELIM_CAPTURE);\r\n$counter = 1;\r\n$total = 0;\r\nforeach ($pieces as $piece){\r\n   if ($piece[0] == "x")\r\n   $total += strlen($piece); \r\n}\r\n\r\nforeach ($pieces as $piece){\r\n   if ($piece[0] == "x")\r\n      $bootstrapColSize[] = floor(strlen($piece)*12/$total); \r\n       \r\n}\r\necho "<div class=\\"row\\" >";\r\nforeach ($pieces as $piece)\r\n{\r\n  if (strlen($piece) == 0)\r\n    continue;\r\n  \r\n  if ($piece[0] == "x") {\r\n    echo "<div class=\\"col-sm-".$bootstrapColSize[$counter-1]."\\">";\r\n    $size = strlen($piece); \r\n    $value = (isset($values[$counter-1])) ? $values[$counter-1] : "";\r\n    $value = htmlspecialchars($value);\r\n    echo "<input type=\\"text\\" name=\\"{$name}_$counter\\" value=\\"$value\\"\r\n            size=\\"$size\\"  maxlength=\\"$size\\" />";\r\n    echo "</div>";\r\n    $counter++;\r\n  }\r\n \r\n}\r\necho "</div>";\r\n{/php}\r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}', '$field_name = $vars["field_info"]["field_name"];\r\n$joiner = "|";\r\n\r\n$count = 1;\r\n$parts = array();\r\nwhile (isset($vars["data"]["{$field_name}_$count"]))\r\n{\r\n  $parts[] = $vars["data"]["{$field_name}_$count"];\r\n  $count++;\r\n}\r\n$value = implode("|", $parts);', '', 'var cf_phone = {};\r\ncf_phone.check_required = function() {\r\n  var errors = [];\r\n  for (var i=0; i<rsv_custom_func_errors.length; i++) {\r\n    if (rsv_custom_func_errors[i].func != "cf_phone.check_required") {\r\n      continue;\r\n    }\r\n    var field_name = rsv_custom_func_errors[i].field;\r\n    var fields = $("input[name^=\\"" + field_name + "_\\"]");\r\n    fields.each(function() {\r\n      if (!this.name.match(/_(\\d+)$/)) {\r\n        return;\r\n      }\r\n      var req_len = $(this).attr("maxlength");\r\n      var actual_len = this.value.length;\r\n      if (req_len != actual_len || this.value.match(/\\D/)) {\r\n        var el = document.edit_submission_form[field_name];\r\n        errors.push([el, rsv_custom_func_errors[i].err]);\r\n        return false;\r\n      }\r\n    });\r\n  }\r\n\r\n  if (errors.length) {\r\n    return errors;\r\n  }\r\n\r\n  return true;\r\n  \r\n}'),
(11, 'yes', NULL, NULL, '{$LANG.phrase_code_markup_field}', 'code_markup', 2, 'no', 'no', 'textarea', NULL, 4, 'large,very_large', 'php', 'core', 'ft_display_field_type_code_markup', '{if $CONTEXTPAGE == "edit_submission"}\r\n  <textarea id="{$NAME}_id" name="{$NAME}">{$VALUE}</textarea>\r\n  <script>\r\n  var code_mirror_{$NAME} = new CodeMirror.fromTextArea("{$NAME}_id", \r\n  {literal}{{/literal}\r\n    height: "{$SIZE_PX}px",\r\n    path:   "{$g_root_url}/global/codemirror/js/",\r\n    readOnly: true,\r\n    {if $code_markup == "HTML" || $code_markup == "XML"}\r\n      parserfile: ["parsexml.js"],\r\n      stylesheet: "{$g_root_url}/global/codemirror/css/xmlcolors.css"\r\n    {elseif $code_markup == "CSS"}\r\n      parserfile: ["parsecss.js"],\r\n      stylesheet: "{$g_root_url}/global/codemirror/css/csscolors.css"\r\n    {elseif $code_markup == "JavaScript"}  \r\n      parserfile: ["tokenizejavascript.js", "parsejavascript.js"],\r\n      stylesheet: "{$g_root_url}/global/codemirror/css/jscolors.css"\r\n    {/if}\r\n  {literal}});{/literal}\r\n  </script>\r\n{else}\r\n  {$VALUE|strip_tags}\r\n{/if}', '<div class="editor">\r\n  <textarea id="{$NAME}_id" name="{$NAME}">{$VALUE}</textarea>\r\n</div>\r\n<script>\r\n  var code_mirror_{$NAME} = new CodeMirror.fromTextArea("{$NAME}_id", \r\n  {literal}{{/literal}\r\n    height: "{$height}px",\r\n    path:   "{$g_root_url}/global/codemirror/js/",\r\n    {if $code_markup == "HTML" || $code_markup == "XML"}\r\n      parserfile: ["parsexml.js"],\r\n      stylesheet: "{$g_root_url}/global/codemirror/css/xmlcolors.css"\r\n    {elseif $code_markup == "CSS"}\r\n      parserfile: ["parsecss.js"],\r\n      stylesheet: "{$g_root_url}/global/codemirror/css/csscolors.css"\r\n    {elseif $code_markup == "JavaScript"}  \r\n      parserfile: ["tokenizejavascript.js", "parsejavascript.js"],\r\n      stylesheet: "{$g_root_url}/global/codemirror/css/jscolors.css"\r\n    {/if}\r\n  {literal}});{/literal}\r\n</script>\r\n\r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}', '', '.cf_view_markup_field {\r\n  margin: 0px; \r\n}', 'var cf_code = {};\r\ncf_code.check_required = function() {\r\n  var errors = [];\r\n  for (var i=0; i<rsv_custom_func_errors.length; i++) {\r\n    if (rsv_custom_func_errors[i].func != "cf_code.check_required") {\r\n      continue;\r\n    }\r\n    var field_name = rsv_custom_func_errors[i].field;\r\n    var val = $.trim(window["code_mirror_" + field_name].getCode());\r\n    if (!val) {\r\n      var el = document.edit_submission_form[field_name];\r\n      errors.push([el, rsv_custom_func_errors[i].err]);\r\n    }\r\n  }\r\n  if (errors.length) {\r\n    return errors;\r\n  }\r\n  return true;  \r\n}'),
(12, 'no', 'This module may only be edited via the File Upload module.', 1, '{$LANG.word_file}', 'file', 1, 'yes', 'no', 'file', NULL, 8, 'large,very_large', 'smarty', 'core', '', '{if $VALUE}\r\n  <a href="{$folder_url}/{$VALUE}" \r\n    {if $use_fancybox == "yes"}class="fancybox"{/if}>{$VALUE}</a>\r\n{/if}', '<div class="cf_file">\r\n  <input type="hidden" class="cf_file_field_id" value="{$FIELD_ID}" />\r\n  <div id="cf_file_{$FIELD_ID}_content" {if !$VALUE}style="display:none"{/if}>\r\n    <a href="{$folder_url}/{$VALUE}" \r\n      {if $use_fancybox == "yes"}class="fancybox"{/if}>{$VALUE}</a>\r\n    <input type="button" class="cf_delete_file" \r\n      value="{$LANG.phrase_delete_file|upper}" />\r\n  </div>\r\n  <div id="cf_file_{$FIELD_ID}_no_content" {if $VALUE}style="display:none"{/if}>\r\n    <input type="file" name="{$NAME}" />\r\n  </div>\r\n  <div id="file_field_{$FIELD_ID}_message_id" class="cf_file_message"></div>\r\n</div>\r\n', '', '', '/* all JS for this module is found in /modules/field_type_file/scripts/edit_submission.js */'),
(13, 'no', 'This module may only be edited via the tinyMCE module.', 4, '{$LANG.word_wysiwyg}', 'tinymce', 2, 'no', 'no', 'textarea', NULL, 5, 'large,very_large', 'smarty', 'core', '', '{if $CONTEXTPAGE == "edit_submission"}\r\n  {$VALUE}\r\n{elseif $CONTEXTPAGE == "submission_listing"}\r\n  {$VALUE|strip_tags}\r\n{else}\r\n  {$VALUE|nl2br}\r\n{/if}', '<textarea name="{$NAME}" id="cf_{$NAME}_id" class="cf_tinymce">{$VALUE}</textarea>\r\n<script>\r\ncf_tinymce_settings["{$NAME}"] = {literal}{{/literal}\r\n{if $toolbar == "basic"}\r\n  theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,bullist,numlist",\r\n  theme_advanced_buttons2: "",\r\n{elseif $toolbar == "simple"}\r\n  theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,bullist,numlist,|,outdent,indent,|,blockquote,hr,|,link,unlink,forecolorpicker,backcolorpicker",\r\n  theme_advanced_buttons2: "",\r\n{elseif $toolbar == "advanced"}\r\n  theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,bullist,numlist,|,outdent,indent,|,blockquote,hr,|,undo,redo,link,unlink,|,fontselect,fontsizeselect",\r\n  theme_advanced_buttons2: "forecolorpicker,backcolorpicker,|,sub,sup,code",\r\n{elseif $toolbar == "expert"}\r\n  theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,outdent,indent,|,blockquote,hr,|,undo,redo,link,unlink,|,formatselect,fontselect,fontsizeselect",\r\n  theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,outdent,indent,|,blockquote,hr,|,undo,redo,link,unlink,|,formatselect,fontselect,fontsizeselect",\r\n  theme_advanced_buttons2 : "undo,redo,|,forecolorpicker,backcolorpicker,|,sub,sup,|,newdocument,blockquote,charmap,removeformat,cleanup,code",\r\n{/if}\r\n  theme_advanced_buttons3: "",\r\n{if $show_path == "yes"}\r\n  theme_advanced_path_location:     "{$path_info_location}",\r\n  theme_advanced_resizing:          {$resizing},\r\n{/if}\r\n  theme_advanced_resize_horizontal: false,\r\n  theme_advanced_toolbar_location:  "{$location}",\r\n  theme_advanced_toolbar_align:     "{$alignment}"  \r\n{literal}}{/literal}\r\n</script>\r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}\r\n', '', 'body .defaultSkin table.mceLayout { border-width: 0px }\r\nbody .defaultSkin table.mceLayout tr.mceFirst td { border-top: 0px; }\r\nbody .defaultSkin .mceToolbar { height: 21px; }\r\nbody .defaultSkin td.mceToolbar { padding-top: 0px; }', '// this is populated by each tinyMCE WYWISYG with their settings on page load\r\nvar cf_tinymce_settings = {};\r\n\r\n$(function() {\r\n  $(''textarea.cf_tinymce'').each(function() {\r\n    var field_name = $(this).attr("name");\r\n    var settings   = cf_tinymce_settings[field_name];\r\n    settings.script_url = g.root_url + "/modules/field_type_tinymce/tinymce/tiny_mce.js";\r\n    settings.theme = "advanced",\r\n    $(this).tinymce(settings);\r\n  });\r\n});\r\n\r\ncf_tinymce_settings.check_required = function() {\r\n  var errors = [];\r\n  for (var i=0; i<rsv_custom_func_errors.length; i++) {\r\n    if (rsv_custom_func_errors[i].func != "cf_tinymce_settings.check_required") {\r\n      continue;\r\n    }\r\n    var field_name = rsv_custom_func_errors[i].field;\r\n    var val = $.trim(tinyMCE.get("cf_" + field_name + "_id").getContent());\r\n    if (!val) {\r\n      var el = document.edit_submission_form[field_name];\r\n      errors.push([el, rsv_custom_func_errors[i].err]);\r\n    }\r\n  }\r\n  if (errors.length) {\r\n    return errors;\r\n  }\r\n  return true; \r\n}'),
(14, 'yes', NULL, NULL, 'Dropdown custom', 'ddc', 12, 'no', 'no', 'select', 11, 1, '1char,2chars,tiny,small,medium,large', 'php', 'core', 'ft_display_field_type_dropdown', '{strip}{if $contents != ""}\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {foreach from=$options item=option name=row}\r\n      {if $VALUE == $option.option_value}{$option.option_name}{/if}\r\n    {/foreach}\r\n  {/foreach}\r\n{/if}{/strip}', '{if $contents == ""}\r\n  <div class="cf_field_comments">\r\n    {$LANG.phrase_not_assigned_to_option_list} \r\n  </div>\r\n{else}\r\n  <select name="{$NAME}">\r\n  {foreach from=$contents.options item=curr_group_info name=group}\r\n    {assign var=group_info value=$curr_group_info.group_info}\r\n    {assign var=options value=$curr_group_info.options}\r\n    {if $group_info.group_name}\r\n      <optgroup label="{$group_info.group_name|escape}">\r\n    {/if}\r\n    {foreach from=$options item=option name=row}\r\n      <option value="{$option.option_value}"\r\n        {if $VALUE == $option.option_value}selected{/if}>{$option.option_name}</option>\r\n    {/foreach}\r\n    {if $group_info.group_name}\r\n      </optgroup>\r\n    {/if}\r\n  {/foreach}\r\n  </select>\r\n{/if}\r\n\r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}', '', '', ''),
(15, 'yes', NULL, NULL, 'Cuadro de texto Bootstrap', 'bootstrap_textbox', 12, 'no', 'no', 'textbox', NULL, 2, '1char,2chars,tiny,small,medium,large,very_large', 'smarty', 'core', '', '{$VALUE|htmlspecialchars}', '<input type="text" name="{$NAME}" value="{$VALUE|escape}" \r\n  class="form-control {$size}{if $highlight} {$highlight}{/if}" \r\n  {if $maxlength}maxlength="{$maxlength}"{/if} />\r\n \r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}', '', 'input.cf_size_tiny {\r\n  width: 30px; \r\n}\r\ninput.cf_size_small {\r\n  width: 80px; \r\n}\r\ninput.cf_size_medium {\r\n  width: 150px; \r\n}\r\ninput.cf_size_large {\r\n  width: 250px;\r\n}\r\ninput.cf_size_full_width {\r\n  width: 99%; \r\n}', ''),
(16, 'yes', NULL, NULL, 'Selector Residencia (Pais, Provincia, Ciudad)', 'country_selector', 12, 'no', 'no', 'select', NULL, 3, '1char,2chars,tiny,small,medium,large', 'smarty', 'core', 'ft_display_field_type_dropdown', '<input type="hidden" id="{$NAME}_editvalues" value="{$VALUE}">\r\n<span id="{$NAME}_countryeditvalues"></span>, \r\n<span id="{$NAME}_provinceeditvalues"></span>, \r\n<span id="{$NAME}_cityeditvalues"></span>', '{assign var=values value=","|explode:$VALUE} \r\n\r\n<select id="{$NAME}_country" name="{$NAME}_country" class="form-control" data-value="{$values[0]}">\r\n  </select>\r\n  <select id="{$NAME}_province" name="{$NAME}_province" class="form-control" data-value="{$values[1]}">\r\n  </select>\r\n  <select id="{$NAME}_city" name="{$NAME}_city" class="form-control" data-value="{$values[2]}">\r\n  </select>\r\n<input type="hidden" name="{$NAME}" value="{$VALUE}" id="{$NAME}_values"/>', '', '', 'jQuery(document).ready(function(){\r\n\r\n  //Funcion on changue de paises\r\n  jQuery("[id$=''_country'']").change(function(event){\r\n      gflacso_startLoading();\r\n      \r\n      selector = jQuery("[id$=''_province'']");\r\n      selector.find(''option'').remove();\r\n      var id_pais = jQuery(this).val() ? jQuery(this).val() : parseInt(jQuery(this).attr("data-value"));\r\n      \r\n      //Trigger onchange de paises \r\n      jQuery("[id$=''_province'']").trigger("change");\r\n\r\n      request = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_provincias'',''id_pais'':id_pais}\r\n      });\r\n      // Callback handler that will be called on success\r\n      request.done(function (response, textStatus, jqXHR){\r\n          items = response.data;\r\n        jQuery.each(items, function (i, item) {\r\n            selector.append(jQuery(''<option>'', { \r\n              value: item.id_provincia,\r\n              text : item.descripcion_provincia ,\r\n              selected: item.id_provincia == selector.attr(''data-value'') ? ''selected'' : ''''\r\n            }));\r\n         });\r\n        gflacso_stopLoading();\r\n    });\r\n\r\n    jQuery("[id$=''_values'']").val( jQuery("[id$=''_country'']").val()+'',''+jQuery("[id$=''_province'']").val()+'',''+jQuery("[id$=''_city'']").val() );\r\n\r\n  });\r\n\r\n  //Funcion on changue de provincias\r\n  jQuery("[id$=''_province'']").change(function(event){\r\n      gflacso_startLoading();\r\n      var selector = jQuery("[id$=''_city'']");\r\n      selector.find(''option'').remove();\r\n      var id_provincia = jQuery(this).val() ? jQuery(this).val() : parseInt(jQuery(this).attr("data-value"));\r\n      request = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_localidades'',''id_provincia'':id_provincia}\r\n      });\r\n      // Callback handler that will be called on success\r\n      request.done(function (response, textStatus, jqXHR){\r\n          items = response.data;\r\n        jQuery.each(items, function (i, item) {\r\n            selector.append(jQuery(''<option>'', { \r\n              value: item.id_localidad,\r\n              text : item.descripcion_localidad ,\r\n              selected: item.id_localidad == selector.attr(''data-value'') ? ''selected'' : ''''\r\n            }));\r\n         });\r\n      gflacso_stopLoading();\r\n      jQuery("[id$=''_values'']").val(jQuery("[id$=''_country'']").val()+'',''+jQuery("[id$=''_province'']").val()+'',''+jQuery("[id$=''_city'']").val());\r\n       \r\n    });\r\n   });\r\n\r\n  jQuery("[id$=''_city'']").change(function(event){\r\n\r\n    jQuery("[id$=''_values'']").val(jQuery("[id$=''_country'']").val()+'',''+jQuery("[id$=''_province'']").val()+'',''+jQuery("[id$=''_city'']").val());\r\n  \r\n  });\r\n\r\n\r\n  // Cargo valores iniciales para Paises\r\n  if (jQuery("[id$=''_country'']").length > 0) {\r\n    gflacso_startLoading();\r\n\r\n    request = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_paises''}\r\n    });\r\n\r\n    // Callback handler that will be called on success\r\n    request.done(function (response, textStatus, jqXHR){\r\n        items = response.data;\r\n        var selector = jQuery("[id$=''_country'']");\r\n        console.log(selector.attr(''data-value''));\r\n        jQuery.each(items, function (i, item) {\r\n\r\n          selector.append(jQuery(''<option>'', { \r\n            value: item.id_pais,\r\n            text : item.descripcion_pais ,\r\n            selected: item.id_pais == parseInt(selector.attr(''data-value'')) ? ''selected'' : ''''\r\n          }));\r\n        });\r\n\r\n        gflacso_stopLoading();\r\n    }); \r\n\r\n    //Si ya existe un valor seteado para pais, provincia y localidad:\r\n    if ( jQuery("[id$=''_province'']").attr(''data-value'') ){\r\n\r\n      //Trigger onchange de paises \r\n      jQuery("[id$=''_country'']").trigger("change");\r\n\r\n    }\r\n\r\n  }\r\n  \r\n  if (jQuery("[id$=''_editvalues'']").length > 0){\r\n      var editValues = jQuery("[id$=''_editvalues'']").val().split(",");\r\n    \r\n      gflacso_startLoading();\r\n      requestCountry = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_paises''}\r\n      });\r\n      // Callback handler that will be called on success\r\n      requestCountry.done(function (response, textStatus, jqXHR){\r\n          items = response.data;\r\n        jQuery.each(items, function (i, item) {\r\n              if (item.id_pais == editValues[0]){\r\n                jQuery("[id$=''_countryeditvalues'']").html(item.descripcion_pais);\r\n              }\r\n         });\r\n        gflacso_stopLoading();\r\n      });\r\n    \r\n      gflacso_startLoading();\r\n      requestProvince = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_provincias'',''id_pais'':editValues[0]}\r\n      });\r\n      // Callback handler that will be called on success\r\n      requestProvince.done(function (response, textStatus, jqXHR){\r\n          items = response.data;\r\n        jQuery.each(items, function (i, item) {\r\n              if (item.id_provincia == editValues[1]){\r\n                jQuery("[id$=''_provinceeditvalues'']").html(item.descripcion_provincia);\r\n              }\r\n         });\r\n        gflacso_stopLoading();\r\n      });\r\n    \r\n      gflacso_startLoading();\r\n      requestCity = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_localidades'',''id_provincia'':editValues[1]}\r\n      });\r\n      // Callback handler that will be called on success\r\n      requestCity.done(function (response, textStatus, jqXHR){\r\n          items = response.data;\r\n        jQuery.each(items, function (i, item) {\r\n              if (item.id_localidad == editValues[2]){\r\n                jQuery("[id$=''_cityeditvalues'']").html(item.descripcion_localidad);\r\n              }\r\n         });\r\n        gflacso_stopLoading();\r\n      });\r\n  }\r\n  \r\n  \r\n});'),
(17, 'yes', NULL, NULL, 'Selector Pais', 'only_country_selector', 12, 'no', 'no', 'select', NULL, 4, '1char,2chars,tiny,small,medium,large', 'smarty', 'core', 'ft_display_field_type_dropdown', '<input type="hidden" id="{$NAME}_editvalues_only" value="{$VALUE}">\r\n<span id="{$NAME}_countryeditvalues_only"></span>', '<select id="{$NAME}_country_only" name="{$NAME}" class="form-control" data-value="{$VALUE}">\r\n  </select>\r\n ', '', '', '///Single Combo\r\njQuery(document).ready(function(){\r\n\r\n    // Cargo valores iniciales para Paises\r\n    request = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_paises''}\r\n    });\r\n\r\n    // Callback handler that will be called on success\r\n    request.done(function (response, textStatus, jqXHR){\r\n        items = response.data;\r\n        var selector = jQuery("[id$=''_country_only'']");\r\n        jQuery.each(items, function (i, item) {\r\n\r\n          selector.append(jQuery(''<option>'', { \r\n            value: item.id_pais,\r\n            text : item.descripcion_pais ,\r\n            selected: item.id_pais == selector.attr(''data-value'') ? ''selected'' : ''''\r\n          }));\r\n        });\r\n\r\n    }); \r\n  \r\n    if (jQuery("[id$=''_editvalues_only'']").length > 0){\r\n      var editValues = jQuery("[id$=''_editvalues_only'']").val();\r\n    \r\n      gflacso_startLoading();\r\n      requestCountry = $.ajax({\r\n        url: g.root_url+"/modules/gflacso_graduados/ajax/region.php",\r\n        type: "post",\r\n        data: {''action'':''get_paises''}\r\n      });\r\n      // Callback handler that will be called on success\r\n      requestCountry.done(function (response, textStatus, jqXHR){\r\n          items = response.data;\r\n        jQuery.each(items, function (i, item) {\r\n              if (item.id_pais == editValues){\r\n                jQuery("[id$=''_countryeditvalues_only'']").html(item.descripcion_pais);\r\n              }\r\n         });\r\n        gflacso_stopLoading();\r\n      });\r\n   }\r\n  \r\n});'),
(18, 'yes', NULL, NULL, 'Telefono', 'custom_phone', 12, 'no', 'no', '', NULL, 5, 'small,medium', 'php', 'core', 'ft_display_field_type_phone_number', '{php}\r\n$format = $this->get_template_vars("phone_number_format");\r\n$values = explode("|", $this->get_template_vars("VALUE"));\r\n$pieces = preg_split("/(x+)/", $format, 0, PREG_SPLIT_DELIM_CAPTURE);\r\n$counter = 1;\r\n$output = "";\r\n$has_content = false;\r\nforeach ($pieces as $piece)\r\n{\r\n  if (empty($piece))\r\n    continue;\r\n\r\n  if ($piece[0] == "x") {    \r\n    $value = (isset($values[$counter-1])) ? $values[$counter-1] : "";\r\n    $output .= $value;\r\n    if (!empty($value))\r\n    {\r\n      $has_content = true;\r\n    }\r\n    $counter++;\r\n  } else {\r\n    $output .= $piece;\r\n  }\r\n}\r\n\r\nif (!empty($output) && $has_content)\r\n  echo $output;\r\n{/php}', '{php}\r\n$format = $this->get_template_vars("phone_number_format");\r\n$values = explode("|", $this->get_template_vars("VALUE"));\r\n$name   = $this->get_template_vars("NAME");\r\n\r\n$pieces = preg_split("/(x+)/", $format, 0, PREG_SPLIT_DELIM_CAPTURE);\r\n$counter = 1;\r\n$total = 0;\r\nforeach ($pieces as $piece){\r\n   if ($piece[0] == "x")\r\n   $total += strlen($piece); \r\n}\r\n\r\nforeach ($pieces as $piece){\r\n   if ($piece[0] == "x"){\r\n      if (floor(strlen($piece)*12/$total) == 1)\r\n         $bootstrapColSize[] = floor(strlen($piece)*12/$total) + 1; \r\n      else\r\n         $bootstrapColSize[] = floor(strlen($piece)*12/$total);\r\n   }\r\n       \r\n}\r\necho "<div class=\\"row phonenumber\\" >";\r\nforeach ($pieces as $piece)\r\n{\r\n  if (strlen($piece) == 0)\r\n    continue;\r\n  \r\n  if ($piece[0] == "x") {\r\n    echo "<div class=\\"col-sm-".$bootstrapColSize[$counter-1]."\\">";\r\n    $size = strlen($piece); \r\n    $value = (isset($values[$counter-1])) ? $values[$counter-1] : "";\r\n    $value = htmlspecialchars($value);\r\n    echo "<input type=\\"text\\" name=\\"{$name}_$counter\\" value=\\"$value\\"\r\n            size=\\"$size\\"  maxlength=\\"$size\\" />";\r\n    echo "</div>";\r\n    $counter++;\r\n  }\r\n \r\n}\r\necho "</div>";\r\n{/php}\r\n{if $comments}\r\n  <div class="cf_field_comments">{$comments}</div>\r\n{/if}', '$field_name = $vars["field_info"]["field_name"];\r\n$joiner = "|";\r\n\r\n$count = 1;\r\n$parts = array();\r\nwhile (isset($vars["data"]["{$field_name}_$count"]))\r\n{\r\n  $parts[] = $vars["data"]["{$field_name}_$count"];\r\n  $count++;\r\n}\r\n$value = implode("|", $parts);', '', 'var cf_phone = {};\r\ncf_phone.check_required = function() {\r\n  var errors = [];\r\n  for (var i=0; i<rsv_custom_func_errors.length; i++) {\r\n    if (rsv_custom_func_errors[i].func != "cf_phone.check_required") {\r\n      continue;\r\n    }\r\n    var field_name = rsv_custom_func_errors[i].field;\r\n    var fields = $("input[name^=\\"" + field_name + "_\\"]");\r\n    fields.each(function() {\r\n      if (!this.name.match(/_(\\d+)$/)) {\r\n        return;\r\n      }\r\n      var req_len = $(this).attr("maxlength");\r\n      var actual_len = this.value.length;\r\n      if (req_len < actual_len || this.value.match(/\\D/) || actual_len == 0) {\r\n        var el = document.edit_submission_form[field_name];\r\n        errors.push([el, rsv_custom_func_errors[i].err]);\r\n        return false;\r\n      }\r\n    });\r\n  }\r\n\r\n  if (errors.length) {\r\n    return errors;\r\n  }\r\n\r\n  return true;\r\n  \r\n}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_type_settings`
--

CREATE TABLE `ft_field_type_settings` (
  `setting_id` mediumint(8) UNSIGNED NOT NULL,
  `field_type_id` mediumint(8) UNSIGNED NOT NULL,
  `field_label` varchar(255) NOT NULL,
  `field_setting_identifier` varchar(50) NOT NULL,
  `field_type` enum('textbox','textarea','radios','checkboxes','select','multi-select','option_list_or_form_field') NOT NULL,
  `field_orientation` enum('horizontal','vertical','na') NOT NULL DEFAULT 'na',
  `default_value_type` enum('static','dynamic') NOT NULL DEFAULT 'static',
  `default_value` varchar(255) DEFAULT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_type_settings`
--

INSERT INTO `ft_field_type_settings` (`setting_id`, `field_type_id`, `field_label`, `field_setting_identifier`, `field_type`, `field_orientation`, `default_value_type`, `default_value`, `list_order`) VALUES
(1, 1, '{$LANG.word_size}', 'size', 'select', 'na', 'static', 'cf_size_medium', 1),
(2, 1, '{$LANG.phrase_max_length}', 'maxlength', 'textbox', 'na', 'static', '', 2),
(3, 1, '{$LANG.word_highlight}', 'highlight', 'select', 'na', 'static', '', 3),
(4, 1, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 4),
(5, 2, '{$LANG.word_height}', 'height', 'select', 'na', 'static', 'cf_size_small', 1),
(6, 2, '{$LANG.phrase_highlight_colour}', 'highlight_colour', 'select', 'na', 'static', '', 2),
(7, 2, '{$LANG.phrase_input_length}', 'input_length', 'radios', 'horizontal', 'static', '', 3),
(8, 2, '{$LANG.phrase_max_length_words_chars}', 'maxlength', 'textbox', 'na', 'static', '', 4),
(9, 2, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 5),
(10, 3, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 1),
(11, 4, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(12, 4, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2),
(13, 5, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(14, 5, '{$LANG.phrase_num_rows}', 'num_rows', 'textbox', 'na', 'static', '5', 2),
(15, 5, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 3),
(16, 6, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(17, 6, '{$LANG.word_formatting}', 'formatting', 'select', 'na', 'static', 'horizontal', 2),
(18, 6, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 3),
(19, 7, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(20, 7, '{$LANG.word_formatting}', 'formatting', 'select', 'na', 'static', 'horizontal', 2),
(21, 7, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 3),
(22, 8, '{$LANG.phrase_custom_display_format}', 'display_format', 'select', 'na', 'static', 'yy-mm-dd', 1),
(23, 8, '{$LANG.phrase_apply_timezone_offset}', 'apply_timezone_offset', 'radios', 'horizontal', 'static', 'no', 2),
(24, 8, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 3),
(25, 9, '{$LANG.phrase_custom_display_format}', 'display_format', 'select', 'na', 'static', 'h:mm TT|ampm`true', 1),
(26, 9, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2),
(27, 10, '{$LANG.phrase_phone_number_format}', 'phone_number_format', 'textbox', 'na', 'static', '(xxx) xxx-xxxx', 1),
(28, 10, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2),
(29, 11, '{$LANG.phrase_code_markup_type}', 'code_markup', 'select', 'na', 'static', 'HTML', 1),
(30, 11, '{$LANG.word_height}', 'height', 'select', 'na', 'static', '200', 2),
(31, 11, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 3),
(32, 12, 'Open link with Fancybox', 'use_fancybox', 'radios', 'horizontal', 'static', 'no', 1),
(33, 12, 'Folder Path', 'folder_path', 'textbox', 'na', 'dynamic', 'file_upload_dir,core', 3),
(34, 12, 'Folder URL', 'folder_url', 'textbox', 'na', 'dynamic', 'file_upload_url,core', 4),
(35, 12, 'Permitted File Types', 'permitted_file_types', 'textbox', 'na', 'dynamic', 'file_upload_filetypes,core', 5),
(36, 12, 'Max File Size (KB)', 'max_file_size', 'textbox', 'na', 'dynamic', 'file_upload_max_size,core', 6),
(37, 12, 'Field Comments', 'comments', 'textarea', 'na', 'static', '', 7),
(38, 13, 'Toolbar', 'toolbar', 'select', 'na', 'static', 'simple', 1),
(39, 13, 'Toolbar Location', 'location', 'radios', 'horizontal', 'static', 'top', 2),
(40, 13, 'Toolbar Alignment', 'alignment', 'radios', 'horizontal', 'static', 'left', 3),
(41, 13, 'Show Path Information', 'show_path', 'radios', 'horizontal', 'static', 'yes', 4),
(42, 13, '- Path Information Location', 'path_info_location', 'radios', 'horizontal', 'static', 'bottom', 5),
(43, 13, '- Allow Toolbar Resizing', 'resizing', 'radios', 'horizontal', 'static', 'true', 6),
(44, 13, 'Field Comments', 'comments', 'textarea', 'na', 'static', '', 7),
(45, 14, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(46, 14, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2),
(47, 15, '{$LANG.word_size}', 'size', 'select', 'na', 'static', 'cf_size_medium', 1),
(48, 15, '{$LANG.phrase_max_length}', 'maxlength', 'textbox', 'na', 'static', '', 2),
(49, 15, '{$LANG.word_highlight}', 'highlight', 'select', 'na', 'static', '', 3),
(50, 15, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 4),
(51, 16, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(52, 16, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2),
(53, 17, '{$LANG.phrase_option_list_or_contents}', 'contents', 'option_list_or_form_field', 'na', 'static', '', 1),
(54, 17, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2),
(55, 18, '{$LANG.phrase_phone_number_format}', 'phone_number_format', 'textbox', 'na', 'static', '(xxx) xxx-xxxx', 1),
(56, 18, '{$LANG.phrase_field_comments}', 'comments', 'textarea', 'na', 'static', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_type_setting_options`
--

CREATE TABLE `ft_field_type_setting_options` (
  `setting_id` mediumint(9) NOT NULL,
  `option_text` varchar(255) DEFAULT NULL,
  `option_value` varchar(255) DEFAULT NULL,
  `option_order` smallint(6) NOT NULL,
  `is_new_sort_group` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_type_setting_options`
--

INSERT INTO `ft_field_type_setting_options` (`setting_id`, `option_text`, `option_value`, `option_order`, `is_new_sort_group`) VALUES
(1, '{$LANG.word_tiny}', 'cf_size_tiny', 1, 'yes'),
(1, '{$LANG.word_small}', 'cf_size_small', 2, 'yes'),
(1, '{$LANG.word_medium}', 'cf_size_medium', 3, 'yes'),
(1, '{$LANG.word_large}', 'cf_size_large', 4, 'yes'),
(1, '{$LANG.phrase_full_width}', 'cf_size_full_width', 5, 'yes'),
(3, '{$LANG.word_none}', '', 1, 'yes'),
(3, '{$LANG.word_red}', 'cf_colour_red', 2, 'yes'),
(3, '{$LANG.word_orange}', 'cf_colour_orange', 3, 'yes'),
(3, '{$LANG.word_yellow}', 'cf_colour_yellow', 4, 'yes'),
(3, '{$LANG.word_green}', 'cf_colour_green', 5, 'yes'),
(3, '{$LANG.word_blue}', 'cf_colour_blue', 6, 'yes'),
(5, '{$LANG.phrase_tiny_30px}', 'cf_size_tiny', 1, 'yes'),
(5, '{$LANG.phrase_small_80px}', 'cf_size_small', 2, 'yes'),
(5, '{$LANG.phrase_medium_150px}', 'cf_size_medium', 3, 'yes'),
(5, '{$LANG.phrase_large_300px}', 'cf_size_large', 4, 'yes'),
(6, '{$LANG.word_none}', '', 1, 'yes'),
(6, '{$LANG.word_red}', 'cf_colour_red', 2, 'yes'),
(6, '{$LANG.word_orange}', 'cf_colour_orange', 3, 'yes'),
(6, '{$LANG.word_yellow}', 'cf_colour_yellow', 4, 'yes'),
(6, '{$LANG.word_green}', 'cf_colour_green', 5, 'yes'),
(6, '{$LANG.word_blue}', 'cf_colour_blue', 6, 'yes'),
(7, '{$LANG.phrase_no_limit}', '', 1, 'yes'),
(7, '{$LANG.word_words}', 'words', 2, 'yes'),
(7, '{$LANG.word_characters}', 'chars', 3, 'yes'),
(17, '{$LANG.word_horizontal}', 'horizontal', 1, 'yes'),
(17, '{$LANG.word_vertical}', 'vertical', 2, 'yes'),
(17, '{$LANG.phrase_2_columns}', 'cf_option_list_2cols', 3, 'yes'),
(17, '{$LANG.phrase_3_columns}', 'cf_option_list_3cols', 4, 'yes'),
(17, '{$LANG.phrase_4_columns}', 'cf_option_list_4cols', 5, 'yes'),
(20, '{$LANG.word_horizontal}', 'horizontal', 1, 'yes'),
(20, '{$LANG.word_vertical}', 'vertical', 2, 'yes'),
(20, '{$LANG.phrase_2_columns}', 'cf_option_list_2cols', 3, 'yes'),
(20, '{$LANG.phrase_3_columns}', 'cf_option_list_3cols', 4, 'yes'),
(20, '{$LANG.phrase_4_columns}', 'cf_option_list_4cols', 5, 'yes'),
(22, '2011-11-30', 'yy-mm-dd', 1, 'yes'),
(22, '30/11/2011 (dd/mm/yyyy)', 'dd/mm/yy', 2, 'yes'),
(22, '11/30/2011 (mm/dd/yyyy)', 'mm/dd/yy', 3, 'yes'),
(22, 'Nov 30, 2011', 'M d, yy', 4, 'yes'),
(22, 'November 30, 2011', 'MM d, yy', 5, 'yes'),
(22, 'Wed Nov 30, 2011', 'D M d, yy', 6, 'yes'),
(22, 'Wednesday, November 30, 2011', 'DD, MM d, yy', 7, 'yes'),
(22, '30. 08. 2011.', 'dd. mm. yy.', 8, 'yes'),
(22, '30/11/2011 8:00 PM', 'datetime:dd/mm/yy|h:mm TT|ampm`true', 9, 'yes'),
(22, '11/30/2011 8:00 PM', 'datetime:mm/dd/yy|h:mm TT|ampm`true', 10, 'yes'),
(22, '2011-11-30 8:00 PM', 'datetime:yy-mm-dd|h:mm TT|ampm`true', 11, 'yes'),
(22, '2011-11-30 20:00', 'datetime:yy-mm-dd|hh:mm', 12, 'yes'),
(22, '2011-11-30 20:00:00', 'datetime:yy-mm-dd|hh:mm:ss|showSecond`true', 13, 'yes'),
(22, '30. 08. 2011. 20:00', 'datetime:dd. mm. yy.|hh:mm', 14, 'yes'),
(23, '{$LANG.word_yes}', 'yes', 1, 'yes'),
(23, '{$LANG.word_no}', 'no', 2, 'yes'),
(25, '8:00 AM', 'h:mm TT|ampm`true', 1, 'yes'),
(25, '16:00', 'hh:mm|ampm`false', 2, 'yes'),
(25, '16:00:00', 'hh:mm:ss|showSecond`true|ampm`false', 3, 'yes'),
(29, 'CSS', 'CSS', 1, 'yes'),
(29, 'HTML', 'HTML', 2, 'yes'),
(29, 'JavaScript', 'JavaScript', 3, 'yes'),
(29, 'XML', 'XML', 4, 'yes'),
(30, '{$LANG.phrase_tiny_50px}', '50', 1, 'yes'),
(30, '{$LANG.phrase_small_100px}', '100', 2, 'yes'),
(30, '{$LANG.phrase_medium_200px}', '200', 3, 'yes'),
(30, '{$LANG.phrase_large_400px}', '400', 4, 'yes'),
(32, 'Yes', 'yes', 1, 'yes'),
(32, 'No', 'no', 2, 'yes'),
(38, 'Basic', 'basic', 1, 'yes'),
(38, 'Simple', 'simple', 2, 'yes'),
(38, 'Advanced', 'advanced', 3, 'yes'),
(38, 'Expert', 'expert', 4, 'yes'),
(39, 'Top', 'top', 1, 'yes'),
(39, 'Bottom', 'bottom', 2, 'yes'),
(40, 'Left', 'left', 1, 'yes'),
(40, 'Center', 'center', 2, 'yes'),
(40, 'Right', 'right', 3, 'yes'),
(41, 'Yes', 'yes', 1, 'yes'),
(41, 'No', 'no', 2, 'yes'),
(42, 'Top', 'top', 1, 'yes'),
(42, 'Bottom', 'bottom', 2, 'yes'),
(43, 'Yes', 'true', 1, 'yes'),
(47, '{$LANG.word_tiny}', 'cf_size_tiny', 1, 'yes'),
(47, '{$LANG.word_small}', 'cf_size_small', 2, 'yes'),
(47, '{$LANG.word_medium}', 'cf_size_medium', 3, 'yes'),
(47, '{$LANG.word_large}', 'cf_size_large', 4, 'yes'),
(47, '{$LANG.phrase_full_width}', 'cf_size_full_width', 5, 'yes'),
(49, '{$LANG.word_none}', '', 1, 'yes'),
(49, '{$LANG.word_red}', 'cf_colour_red', 2, 'yes'),
(49, '{$LANG.word_orange}', 'cf_colour_orange', 3, 'yes'),
(49, '{$LANG.word_yellow}', 'cf_colour_yellow', 4, 'yes'),
(49, '{$LANG.word_green}', 'cf_colour_green', 5, 'yes'),
(49, '{$LANG.word_blue}', 'cf_colour_blue', 6, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_type_validation_rules`
--

CREATE TABLE `ft_field_type_validation_rules` (
  `rule_id` mediumint(8) UNSIGNED NOT NULL,
  `field_type_id` mediumint(9) NOT NULL,
  `rsv_rule` varchar(50) NOT NULL,
  `rule_label` varchar(100) NOT NULL,
  `rsv_field_name` varchar(255) NOT NULL,
  `custom_function` varchar(100) NOT NULL,
  `custom_function_required` enum('yes','no','na') NOT NULL DEFAULT 'na',
  `default_error_message` mediumtext NOT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_type_validation_rules`
--

INSERT INTO `ft_field_type_validation_rules` (`rule_id`, `field_type_id`, `rsv_rule`, `rule_label`, `rsv_field_name`, `custom_function`, `custom_function_required`, `default_error_message`, `list_order`) VALUES
(1, 1, 'required', '{$LANG.word_required}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_required}', 1),
(2, 1, 'valid_email', '{$LANG.phrase_valid_email}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_valid_email}', 2),
(3, 1, 'digits_only', '{$LANG.phrase_numbers_only}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_numbers_only}', 3),
(4, 1, 'letters_only', '{$LANG.phrase_letters_only}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_letters_only}', 4),
(5, 1, 'is_alpha', '{$LANG.phrase_alphanumeric}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_alpha}', 5),
(6, 2, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(7, 3, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(8, 4, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(9, 5, 'required', '{$LANG.word_required}', '{$field_name}[]', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(10, 6, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(11, 7, 'required', '{$LANG.word_required}', '{$field_name}[]', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(12, 8, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(13, 9, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(14, 10, 'function', '{$LANG.word_required}', '', 'cf_phone.check_required', 'yes', '{$LANG.validation_default_phone_num_required}', 1),
(15, 11, 'function', '{$LANG.word_required}', '', 'cf_code.check_required', 'yes', '{$LANG.validation_default_rule_required}', 1),
(16, 12, 'function', '{$LANG.word_required}', '', 'files_ns.check_required', 'yes', '{$LANG.validation_default_rule_required}', 1),
(17, 13, 'function', '{$LANG.word_required}', '', 'cf_tinymce_settings.check_required', 'yes', '{$LANG.validation_default_rule_required}', 1),
(18, 14, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(19, 15, 'required', '{$LANG.word_required}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_required}', 1),
(20, 15, 'valid_email', '{$LANG.phrase_valid_email}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_valid_email}', 2),
(21, 15, 'digits_only', '{$LANG.phrase_numbers_only}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_numbers_only}', 3),
(22, 15, 'letters_only', '{$LANG.phrase_letters_only}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_letters_only}', 4),
(23, 15, 'is_alpha', '{$LANG.phrase_alphanumeric}', '{$field_name}', '', 'no', '{$LANG.validation_default_rule_alpha}', 5),
(24, 16, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(25, 17, 'required', '{$LANG.word_required}', '{$field_name}', '', 'na', '{$LANG.validation_default_rule_required}', 1),
(26, 18, 'function', '{$LANG.word_required}', '', 'cf_phone.check_required', 'yes', '{$LANG.validation_default_phone_num_required}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_field_validation`
--

CREATE TABLE `ft_field_validation` (
  `rule_id` mediumint(8) UNSIGNED NOT NULL,
  `field_id` mediumint(9) NOT NULL,
  `error_message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_field_validation`
--

INSERT INTO `ft_field_validation` (`rule_id`, `field_id`, `error_message`) VALUES
(1, 28, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 31, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 32, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 43, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 46, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 47, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 61, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 62, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 65, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 66, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 82, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 84, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 85, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 90, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 91, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 94, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 100, 'Please enter a value for the <b>{$field}</b> field.'),
(1, 101, 'Please enter a value for the <b>{$field}</b> field.'),
(2, 31, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(2, 32, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(2, 46, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(2, 47, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(2, 66, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(2, 100, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(2, 101, 'Please enter a valid email address for the <b>{$field}</b> field.'),
(3, 28, 'Please only enter numbers for the <b>{$field}</b> field.'),
(3, 43, 'Please only enter numbers for the <b>{$field}</b> field.'),
(3, 71, 'Please only enter numbers for the <b>{$field}</b> field.'),
(7, 83, 'Please enter a value for the <b>{$field}</b> field.'),
(7, 98, 'Please enter a value for the <b>{$field}</b> field.'),
(7, 99, 'Please enter a value for the <b>{$field}</b> field.'),
(7, 103, 'Please enter a value for the <b>{$field}</b> field.'),
(7, 104, 'Please enter a value for the <b>{$field}</b> field.'),
(8, 7, ''),
(8, 42, 'Please enter a value for the <b>{$field}</b> field.'),
(11, 67, 'Please enter a value for the <b>{$field}</b> field.'),
(12, 22, 'Please enter a value for the <b>{$field}</b> field.'),
(14, 44, 'Please fill in the full telephone number for the <b>{$field}</b> field - numbers only.'),
(25, 92, 'Please enter a value for the <b>{$field}</b> field.'),
(26, 29, 'Please fill in the full telephone number for the <b>{$field}</b> field - numbers only.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_forms`
--

CREATE TABLE `ft_forms` (
  `form_id` mediumint(9) UNSIGNED NOT NULL,
  `form_type` enum('internal','external','form_builder') NOT NULL DEFAULT 'external',
  `access_type` enum('admin','public','private') NOT NULL DEFAULT 'public',
  `submission_type` enum('code','direct') DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_initialized` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_complete` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_multi_page_form` enum('yes','no') NOT NULL DEFAULT 'no',
  `form_name` varchar(255) NOT NULL DEFAULT '',
  `form_url` varchar(255) NOT NULL DEFAULT '',
  `redirect_url` varchar(255) DEFAULT NULL,
  `auto_delete_submission_files` enum('yes','no') NOT NULL DEFAULT 'yes',
  `submission_strip_tags` enum('yes','no') NOT NULL DEFAULT 'yes',
  `edit_submission_page_label` text,
  `add_submission_button_label` varchar(255) DEFAULT '{$LANG.word_add_rightarrow}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_forms`
--

INSERT INTO `ft_forms` (`form_id`, `form_type`, `access_type`, `submission_type`, `date_created`, `is_active`, `is_initialized`, `is_complete`, `is_multi_page_form`, `form_name`, `form_url`, `redirect_url`, `auto_delete_submission_files`, `submission_strip_tags`, `edit_submission_page_label`, `add_submission_button_label`) VALUES
(3, 'form_builder', 'public', 'direct', '2017-01-31 19:29:25', 'yes', 'yes', 'yes', 'no', 'Inscripcion', '', '', 'yes', 'yes', 'Editar Registro', '{$LANG.word_add_rightarrow}'),
(4, 'form_builder', 'public', 'direct', '2017-05-10 19:00:34', 'yes', 'yes', 'yes', 'no', 'Resetear Contraseña', '', '', 'yes', 'yes', 'Edit Submission', '{$LANG.word_add_rightarrow}'),
(5, 'form_builder', 'public', NULL, '2017-05-15 13:53:16', 'yes', 'yes', 'yes', 'no', 'Cambiar Contraseña', '', '', 'yes', 'yes', 'Edit Submission', '{$LANG.word_add_rightarrow}'),
(6, 'form_builder', 'public', NULL, '2017-05-15 14:11:48', 'yes', 'yes', 'yes', 'no', 'Alta Alumno', '', '', 'yes', 'yes', 'Edit Submission', '{$LANG.word_add_rightarrow}'),
(7, 'form_builder', 'public', 'direct', '2017-05-10 19:00:34', 'yes', 'yes', 'yes', 'no', 'Resetear Contraseña - Cambio', '', '', 'yes', 'yes', 'Edit Submission', '{$LANG.word_add_rightarrow}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_3`
--

CREATE TABLE `ft_form_3` (
  `submission_id` mediumint(8) UNSIGNED NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `posgrado` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` varchar(20) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `submission_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `is_finalized` enum('yes','no') DEFAULT 'yes',
  `nacionalidad` varchar(20) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `dni_a_imprimir` varchar(20) DEFAULT NULL,
  `residencia` varchar(255) DEFAULT NULL,
  `calle` varchar(20) DEFAULT NULL,
  `nro` varchar(5) DEFAULT NULL,
  `piso` varchar(5) DEFAULT NULL,
  `dto` varchar(5) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `confirmar_email` varchar(255) DEFAULT NULL,
  `acepta_tyc` varchar(20) DEFAULT NULL,
  `estado_inscripcion` varchar(255) DEFAULT NULL,
  `alumno_id` varchar(20) DEFAULT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_form_3`
--

INSERT INTO `ft_form_3` (`submission_id`, `usuario`, `clave`, `posgrado`, `fecha_nacimiento`, `sexo`, `submission_date`, `last_modified_date`, `ip_address`, `is_finalized`, `nacionalidad`, `dni`, `telefono`, `celular`, `email`, `nombre`, `apellido`, `dni_a_imprimir`, `residencia`, `calle`, `nro`, `piso`, `dto`, `cp`, `confirmar_email`, `acepta_tyc`, `estado_inscripcion`, `alumno_id`, `nombre_curso`) VALUES
(1, '5128119075', 'flacso1', NULL, '2017-05-01 00:00:00', 'H', '2017-01-31 20:10:58', '2017-05-15 13:39:11', '::1', 'yes', '', '28119075', '11|1111|11111111', '||', 'mailtest@yopmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,,', 'Saavedra2', '1253', '', '', '1640', 'mailtest@yopmail.com', NULL, '2', NULL, 'Nombre Demo'),
(20, '5128119075', '5128119075', NULL, '1988-02-02 00:00:00', ' M', '2017-02-17 17:52:06', '2017-02-17 18:06:36', '::1', 'yes', 'AR', '12345678', '322|123|1234567', '||', 'asd@asd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'asd', 'asd', NULL, '2017-05-09 00:00:00', ' M', '2017-05-02 18:44:04', '2017-05-02 19:35:13', '127.0.0.1', 'yes', 'AR', '33789052', '123|123|1234466', '||', 'asd@asd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'asd', 'asd', NULL, '2017-05-02 00:00:00', ' M', '2017-05-04 21:46:30', '2017-05-04 21:48:10', '127.0.0.1', 'yes', 'AR', '33789052', '123|345|1234567', '123|124|1211414', 'asd@as.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, '5128119075', 'flacso1', NULL, '2017-05-09 00:00:00', 'H', '2017-05-15 02:47:14', '2017-05-15 02:48:49', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,null', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(337, '5128119075', 'flacso1', NULL, '2017-05-09 00:00:00', 'H', '2017-05-15 07:38:55', '2017-05-15 07:39:14', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', NULL, NULL, '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(338, '5128119075', 'flacso1', NULL, '2017-05-02 00:00:00', 'H', '2017-05-15 07:40:19', '2017-05-15 07:41:27', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(346, '5128119075', 'flacso1', NULL, '2017-04-02 00:00:00', 'H', '2017-05-15 08:54:06', '2017-05-15 08:54:52', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(347, '5128119075', 'flacso1', NULL, '2017-04-03 00:00:00', 'H', '2017-05-15 09:01:14', '2017-05-15 09:07:40', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(348, '5128119075', 'flacso1', NULL, '2017-04-05 00:00:00', 'H', '2017-05-15 09:20:54', '2017-05-15 09:21:34', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(349, '5128119075', 'flacso1', NULL, '2017-04-02 00:00:00', 'H', '2017-05-15 09:23:19', '2017-05-15 09:24:09', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(350, '5128119075', 'flacso1', NULL, '2017-04-06 00:00:00', 'H', '2017-05-15 09:24:37', '2017-05-15 09:25:19', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(351, '5128119075', 'flacso1', NULL, '2017-04-03 00:00:00', 'H', '2017-05-15 09:26:28', '2017-05-15 09:27:11', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'hanskait@gmail.com', 'Hernánna', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'hanskait@gmail.com', NULL, '2', NULL, 'Aspectos de la Propiedad Intelectual en el Siglo XXI'),
(378, '5128119075', 'flacso1', NULL, '2017-05-09 00:00:00', 'H', '2017-05-18 16:10:46', '2017-05-18 16:16:06', '127.0.0.1', 'yes', '178', '28119075', '11|1111|11111111', '||', 'pablocho88@gmail.com', 'Hernan', 'Anskaitiene', '28119075', '13,2,1158', 'Saavedra2', '1253', '', '', '1640', 'pablocho88@gmail.com', '1, 2', '1', NULL, 'Nombre Demo'),
(395, '5433789052', '12345678', NULL, '2017-05-04 00:00:00', 'H', '2017-05-31 12:52:24', '2017-05-31 12:55:50', '127.0.0.1', 'yes', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', '1, 2', '1', NULL, 'Nombre Demo'),
(396, NULL, NULL, NULL, NULL, NULL, '2017-06-07 23:53:07', '2017-06-07 23:53:07', '127.0.0.1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 00:44:58', '2017-06-08 00:51:20', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|351677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(398, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 00:54:58', '2017-06-08 00:56:08', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(399, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 00:57:42', '2017-06-08 00:58:41', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(400, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 01:01:47', '2017-06-08 01:08:42', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(401, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 15:21:55', '2017-06-08 15:22:02', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '||', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '269,2,0', 'Calle', '1234', NULL, NULL, '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(402, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 15:25:39', '2017-06-08 15:26:16', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '||', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '269,2,0', 'Calle', '1234', NULL, NULL, '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(403, NULL, NULL, NULL, NULL, NULL, '2017-06-08 15:42:16', '2017-06-08 15:42:16', '127.0.0.1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(404, '5433789052', '33789052', NULL, '2017-05-04 00:00:00', 'H', '2017-06-08 15:42:17', '2017-06-08 15:59:05', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(405, NULL, NULL, NULL, NULL, NULL, '2017-06-08 16:06:57', '2017-06-08 16:06:57', '127.0.0.1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(406, '5433789052', '33789052', NULL, '2017-06-14 00:00:00', 'H', '2017-06-08 16:06:59', '2017-06-08 16:35:49', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,null,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(407, NULL, NULL, NULL, NULL, NULL, '2017-06-08 16:36:48', '2017-06-08 16:36:48', '127.0.0.1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(408, '5433789052', '33789052', NULL, '2017-06-06 00:00:00', 'H', '2017-06-08 16:36:49', '2017-06-08 16:40:16', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(409, '5433789052', '33789052', NULL, '2017-06-06 00:00:00', 'H', '2017-06-08 16:49:02', '2017-06-08 16:50:36', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(410, '5433789052', '33789052', NULL, '2017-06-06 00:00:00', 'H', '2017-06-08 16:51:21', '2017-06-08 16:51:48', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '54|249|361677', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(411, '5433789052', '33789052', NULL, '2017-06-06 00:00:00', 'H', '2017-06-08 19:25:55', '2017-06-08 19:37:12', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '||', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', 'null,null,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(412, NULL, NULL, NULL, NULL, NULL, '2017-06-08 19:53:53', '2017-06-08 19:53:53', '127.0.0.1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, '5433789052', '33789052', NULL, '2017-06-06 00:00:00', 'H', '2017-06-08 19:53:55', '2017-06-08 19:56:48', '127.0.0.1', 'no', '13', '33789052', '54|249|351677', '||', 'pablocho88@gmail.com', 'Pablo', 'Velazquez', '33789052', '13,2,1052', 'Calle', '1234', '', '', '7000', 'pablocho88@gmail.com', NULL, '2', NULL, 'Nombre Demo'),
(414, NULL, NULL, NULL, NULL, NULL, '2017-06-08 20:19:36', '2017-06-08 20:19:36', '127.0.0.1', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_4`
--

CREATE TABLE `ft_form_4` (
  `submission_id` mediumint(8) UNSIGNED NOT NULL,
  `tipo_de_documento` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `submission_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `is_finalized` enum('yes','no') DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_form_4`
--

INSERT INTO `ft_form_4` (`submission_id`, `tipo_de_documento`, `dni`, `submission_date`, `last_modified_date`, `ip_address`, `is_finalized`) VALUES
(2, 'DNI', '28119075', '2017-05-15 13:39:40', '2017-05-15 13:39:57', '127.0.0.1', 'yes'),
(3, 'DNI', '28119075', '2017-05-15 13:41:38', '2017-05-15 13:41:52', '127.0.0.1', 'yes'),
(7, 'CC', '33789052', '2017-05-26 21:21:14', '2017-05-26 21:21:21', '127.0.0.1', 'yes'),
(8, 'CC', '33789052', '2017-05-29 01:42:49', '2017-05-29 01:43:02', '127.0.0.1', 'yes'),
(9, 'OTRO', '28119075', '2017-05-30 20:55:50', '2017-05-30 20:56:23', '127.0.0.1', 'yes'),
(10, 'DNI', '33789052', '2017-05-30 21:04:26', '2017-05-30 21:04:45', '127.0.0.1', 'yes'),
(11, NULL, NULL, '2017-05-31 13:06:27', '2017-05-31 13:06:27', '127.0.0.1', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_5`
--

CREATE TABLE `ft_form_5` (
  `submission_id` mediumint(8) UNSIGNED NOT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `nro_documento` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `nueva_clave` varchar(255) DEFAULT NULL,
  `confirmar_nueva_clave` varchar(255) DEFAULT NULL,
  `submission_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `is_finalized` enum('yes','no') DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_form_5`
--

INSERT INTO `ft_form_5` (`submission_id`, `tipo_documento`, `nro_documento`, `clave`, `nueva_clave`, `confirmar_nueva_clave`, `submission_date`, `last_modified_date`, `ip_address`, `is_finalized`) VALUES
(2, 'DNI', '33789052', '12345678', '33789052', '33789052', '2017-05-31 13:06:34', '2017-05-31 13:10:27', '127.0.0.1', 'yes'),
(3, 'DNI', '33789052', '33789052', '12345678', '12345678', '2017-05-31 13:18:27', '2017-05-31 13:18:43', '127.0.0.1', 'yes'),
(4, 'DNI', '33789052', '12345678', '12345678', '12345678', '2017-05-31 13:21:09', '2017-05-31 13:21:39', '127.0.0.1', 'yes'),
(5, 'DNI', '33789052', '12345678', '12345678', '12345678', '2017-05-31 13:23:36', '2017-05-31 13:23:56', '127.0.0.1', 'yes'),
(6, 'DNI', '33789052', '12345678', '33789052', '33789052', '2017-05-31 13:24:35', '2017-05-31 13:26:17', '127.0.0.1', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_6`
--

CREATE TABLE `ft_form_6` (
  `submission_id` mediumint(8) UNSIGNED NOT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `pais_emisor_del_documento` varchar(255) DEFAULT NULL,
  `tipo_de_documento` varchar(255) DEFAULT NULL,
  `numero_documento` varchar(255) DEFAULT NULL,
  `submission_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `is_finalized` enum('yes','no') DEFAULT 'yes',
  `contrasea` varchar(255) DEFAULT NULL,
  `confirmar_contrasea` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `confirmar_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_form_6`
--

INSERT INTO `ft_form_6` (`submission_id`, `apellido`, `nombre`, `pais_emisor_del_documento`, `tipo_de_documento`, `numero_documento`, `submission_date`, `last_modified_date`, `ip_address`, `is_finalized`, `contrasea`, `confirmar_contrasea`, `email`, `confirmar_email`) VALUES
(1, 'Velazquez', 'Pablo', '1', 'CC', '123FE678', '2017-05-15 16:18:37', '2017-05-15 16:20:11', '127.0.0.1', 'yes', '12345678', '12345678', 'pablovelazquez@yopmail.com', 'pablovelazquez@yopmail.com'),
(3, 'Velazquez', 'Pablo', '13', 'DNI', '33789052', '2017-05-17 14:32:38', '2017-05-17 14:33:39', '127.0.0.1', 'yes', '12345678', '12345678', 'pablovelazquez@yopmail.com', 'pablovelazquez@yopmail.com'),
(5, 'Velazquez', 'Pablo', '1', 'CC', '33789052', '2017-05-18 16:41:30', '2017-05-18 16:42:31', '127.0.0.1', 'yes', '12345678', '12345678', 'pablovelazquez@yopmail.com', 'pablovelazquez@yopmail.com'),
(7, 'Velazquez', 'Pablo', '1', 'CC', '33789051', '2017-05-18 17:06:12', '2017-05-18 18:08:06', '127.0.0.1', 'yes', '12345678', '12345678', 'pablovelazquez2@yopmail.com', 'pablovelazquez2@yopmail.com'),
(8, 'Velazquez', 'Pablo', '1', 'CC', '1234567', '2017-05-18 18:12:07', '2017-05-18 18:13:07', '127.0.0.1', 'yes', '12345678', '12345678', 'pablovelazquez3@yopmail.com', 'pablovelazquez3@yopmail.com'),
(9, 'Velazquez', 'Pablo', '1', 'CC', '123456789', '2017-05-18 18:33:49', '2017-05-18 18:35:01', '127.0.0.1', 'yes', '12345678', '12345678', 'pablovelazquez4@yopmail.com', 'pablovelazquez4@yopmail.com'),
(10, NULL, NULL, NULL, NULL, NULL, '2017-05-22 13:32:44', '2017-05-22 13:32:44', '127.0.0.1', 'no', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_7`
--

CREATE TABLE `ft_form_7` (
  `submission_id` mediumint(8) UNSIGNED NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `confirmar_clave` varchar(255) DEFAULT NULL,
  `submission_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `is_finalized` enum('yes','no') DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_form_7`
--

INSERT INTO `ft_form_7` (`submission_id`, `clave`, `confirmar_clave`, `submission_date`, `last_modified_date`, `ip_address`, `is_finalized`) VALUES
(2, 'DNI', '28119075', '2017-05-15 13:39:40', '2017-05-15 13:39:57', '127.0.0.1', 'yes'),
(3, 'DNI', '28119075', '2017-05-15 13:41:38', '2017-05-15 13:41:52', '127.0.0.1', 'yes'),
(9, 'a33789052b', 'a33789052b', '2017-05-29 01:44:44', '2017-05-29 02:10:06', '127.0.0.1', 'yes'),
(10, NULL, NULL, '2017-05-29 02:11:33', '2017-05-29 02:11:33', '127.0.0.1', 'no'),
(11, '12345678', '12345678', '2017-05-30 21:06:03', '2017-05-30 21:06:18', '127.0.0.1', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_email_fields`
--

CREATE TABLE `ft_form_email_fields` (
  `form_email_id` mediumint(8) UNSIGNED NOT NULL,
  `form_id` mediumint(8) UNSIGNED NOT NULL,
  `email_field_id` mediumint(9) NOT NULL,
  `first_name_field_id` mediumint(9) DEFAULT NULL,
  `last_name_field_id` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_form_fields`
--

CREATE TABLE `ft_form_fields` (
  `field_id` mediumint(8) UNSIGNED NOT NULL,
  `form_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `field_name` varchar(255) NOT NULL DEFAULT '',
  `field_test_value` mediumtext,
  `field_size` varchar(255) DEFAULT 'medium',
  `field_type_id` smallint(6) NOT NULL DEFAULT '1',
  `is_system_field` enum('yes','no') NOT NULL DEFAULT 'no',
  `data_type` enum('string','number','date') NOT NULL DEFAULT 'string',
  `field_title` varchar(100) DEFAULT NULL,
  `col_name` varchar(100) DEFAULT NULL,
  `list_order` smallint(5) UNSIGNED DEFAULT NULL,
  `is_new_sort_group` enum('yes','no') NOT NULL DEFAULT 'yes',
  `include_on_redirect` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_form_fields`
--

INSERT INTO `ft_form_fields` (`field_id`, `form_id`, `field_name`, `field_test_value`, `field_size`, `field_type_id`, `is_system_field`, `data_type`, `field_title`, `col_name`, `list_order`, `is_new_sort_group`, `include_on_redirect`) VALUES
(18, 3, 'core__submission_id', '', 'medium', 1, 'yes', 'number', 'ID', 'submission_id', 1, 'yes', 'no'),
(19, 3, 'usuario', '1', 'small', 1, 'no', 'string', 'Usuario', 'usuario', 2, 'yes', 'no'),
(20, 3, 'clave', '2', 'small', 3, 'no', 'string', 'Clave', 'clave', 3, 'yes', 'no'),
(21, 3, 'idCurso', '3', 'medium', 1, 'no', 'string', 'Posgrado', 'posgrado', 26, 'yes', 'no'),
(22, 3, 'fecha_nacimiento', '4', 'small', 8, 'no', 'string', 'Fecha de Nacimiento', 'fecha_nacimiento', 6, 'yes', 'no'),
(23, 3, 'sexo', '5', 'small', 4, 'no', 'string', 'Sexo', 'sexo', 7, 'yes', 'no'),
(24, 3, 'core__submission_date', '', 'medium', 8, 'yes', 'date', 'Fecha', 'submission_date', 8, 'yes', 'no'),
(25, 3, 'core__last_modified', '', 'medium', 8, 'yes', 'date', 'Última modificación', 'last_modified_date', 9, 'yes', 'no'),
(26, 3, 'core__ip_address', '', 'medium', 1, 'yes', 'number', 'Dirección IP', 'ip_address', 10, 'yes', 'no'),
(27, 3, 'pais_emisor_documento', NULL, 'small', 17, 'no', 'string', 'Nacionalidad', 'nacionalidad', 11, 'yes', 'yes'),
(28, 3, 'nro_documento', NULL, 'small', 1, 'no', 'string', 'DNI', 'dni', 12, 'yes', 'yes'),
(29, 3, 'telefono', NULL, 'medium', 18, 'no', 'string', 'Telefono', 'telefono', 14, 'yes', 'yes'),
(30, 3, 'celular', NULL, 'medium', 18, 'no', 'string', 'Celular', 'celular', 15, 'yes', 'yes'),
(31, 3, 'email', NULL, 'medium', 1, 'no', 'string', 'Email', 'email', 16, 'yes', 'yes'),
(57, 3, 'nombre', NULL, 'medium', 1, 'no', 'string', 'Nombre', 'nombre', 4, 'yes', 'no'),
(58, 3, 'apellido', NULL, 'medium', 1, 'no', 'string', 'Apellido', 'apellido', 5, 'yes', 'no'),
(59, 3, 'nro_documento_imprimir', NULL, 'small', 1, 'no', 'string', 'DNI a imprimir', 'dni_a_imprimir', 13, 'yes', 'yes'),
(60, 3, 'residencia', NULL, 'medium', 16, 'no', 'string', 'Residencia', 'residencia', 18, 'yes', 'yes'),
(61, 3, 'calle_domicilio', NULL, 'small', 1, 'no', 'string', 'Calle', 'calle', 19, 'yes', 'yes'),
(62, 3, 'numero_domicilio', NULL, 'tiny', 1, 'no', 'string', 'Nro.', 'nro', 20, 'yes', 'yes'),
(63, 3, 'piso_domicilio', NULL, 'tiny', 1, 'no', 'string', 'Piso', 'piso', 21, 'yes', 'yes'),
(64, 3, 'departamento_domicilio', NULL, 'tiny', 1, 'no', 'string', 'Dto.', 'dto', 22, 'yes', 'yes'),
(65, 3, 'cp_domicilio', NULL, 'small', 1, 'no', 'string', 'Codigo Postal', 'cp', 23, 'yes', 'no'),
(66, 3, 'confirmar_email', NULL, 'medium', 1, 'no', 'string', 'Confirmar Email', 'confirmar_email', 17, 'yes', 'yes'),
(67, 3, 'acepta_tyc', NULL, 'small', 7, 'no', 'string', 'Acepto', 'acepta_tyc', 24, 'yes', 'no'),
(68, 3, 'estado_inscripcion', NULL, 'medium', 4, 'no', 'string', 'Estado Inscripcion', 'estado_inscripcion', 25, 'yes', 'no'),
(69, 4, 'core__submission_id', '', 'medium', 1, 'yes', 'number', 'ID', 'submission_id', 1, 'yes', 'no'),
(70, 4, 'tipo_documento', '1', 'medium', 4, 'no', 'string', 'Tipo de Documento', 'tipo_de_documento', 2, 'yes', 'no'),
(71, 4, 'nro_documento', '2', 'medium', 1, 'no', 'string', 'DNI', 'dni', 3, 'yes', 'no'),
(75, 4, 'core__submission_date', '', 'medium', 8, 'yes', 'date', 'Date', 'submission_date', 4, 'yes', 'no'),
(76, 4, 'core__last_modified', '', 'medium', 8, 'yes', 'date', 'Last modified', 'last_modified_date', 5, 'yes', 'no'),
(77, 4, 'core__ip_address', '', 'medium', 1, 'yes', 'number', 'IP Address', 'ip_address', 6, 'yes', 'no'),
(78, 3, 'idAlumno', NULL, 'small', 1, 'no', 'string', 'Alumno_ID', 'alumno_id', 27, 'yes', 'no'),
(79, 3, 'nombre_curso', NULL, 'medium', 1, 'no', 'string', 'Nombre Curso', 'nombre_curso', 28, 'yes', 'no'),
(80, 5, 'core__submission_id', '', 'medium', 1, 'yes', 'number', 'ID', 'submission_id', 1, 'yes', 'no'),
(81, 5, 'tipo_documento', '1', 'medium', 4, 'no', 'string', 'Tipo de Documento', 'tipo_documento', 2, 'yes', 'no'),
(82, 5, 'nro_documento', '2', 'medium', 1, 'no', 'string', 'DNI', 'nro_documento', 3, 'yes', 'no'),
(83, 5, 'clave', '3', 'medium', 3, 'no', 'string', 'Contraseña', 'clave', 4, 'yes', 'no'),
(84, 5, 'nueva_clave', '4', 'medium', 3, 'no', 'string', 'Nueva Contraseña', 'nueva_clave', 5, 'yes', 'no'),
(85, 5, 'confirmar_nueva_clave', '5', 'medium', 3, 'no', 'string', 'Confimar Nueva Contraseña', 'confirmar_nueva_clave', 6, 'yes', 'no'),
(86, 5, 'core__submission_date', '', 'medium', 8, 'yes', 'date', 'Date', 'submission_date', 7, 'yes', 'no'),
(87, 5, 'core__last_modified', '', 'medium', 8, 'yes', 'date', 'Last modified', 'last_modified_date', 8, 'yes', 'no'),
(88, 5, 'core__ip_address', '', 'medium', 1, 'yes', 'number', 'IP Address', 'ip_address', 9, 'yes', 'no'),
(89, 6, 'core__submission_id', '', 'medium', 1, 'yes', 'number', 'ID', 'submission_id', 1, 'yes', 'no'),
(90, 6, 'apellido', '1', 'medium', 1, 'no', 'string', 'Apellido', 'apellido', 2, 'yes', 'no'),
(91, 6, 'nombre', '2', 'medium', 1, 'no', 'string', 'Nombre', 'nombre', 3, 'yes', 'no'),
(92, 6, 'pais_emisor', '3', 'medium', 17, 'no', 'string', 'Pais emisor del documento', 'pais_emisor_del_documento', 4, 'yes', 'no'),
(93, 6, 'tipo_documento', '4', 'medium', 4, 'no', 'string', 'Tipo de documento', 'tipo_de_documento', 5, 'yes', 'no'),
(94, 6, 'nro_documento', '5', 'medium', 1, 'no', 'string', 'Numero documento', 'numero_documento', 6, 'yes', 'no'),
(95, 6, 'core__submission_date', '', 'medium', 8, 'yes', 'date', 'Date', 'submission_date', 7, 'yes', 'no'),
(96, 6, 'core__last_modified', '', 'medium', 8, 'yes', 'date', 'Last modified', 'last_modified_date', 8, 'yes', 'no'),
(97, 6, 'core__ip_address', '', 'medium', 1, 'yes', 'number', 'IP Address', 'ip_address', 9, 'yes', 'no'),
(98, 6, 'password', NULL, 'medium', 3, 'no', 'string', 'Contraseña', 'contrasea', 10, 'yes', 'no'),
(99, 6, 'confirmar_password', NULL, 'medium', 3, 'no', 'string', 'Confirmar Contraseña', 'confirmar_contrasea', 11, 'yes', 'no'),
(100, 6, 'email', NULL, 'medium', 1, 'no', 'string', 'Email', 'email', 12, 'yes', 'no'),
(101, 6, 'confirmar_email', NULL, 'medium', 1, 'no', 'string', 'Confirmar Email', 'confirmar_email', 13, 'yes', 'no'),
(102, 7, 'core__submission_id', '', 'medium', 1, 'yes', 'number', 'ID', 'submission_id', 1, 'yes', 'no'),
(103, 7, 'clave', '1', 'medium', 3, 'no', 'string', 'Contraseña', 'clave', 2, 'yes', 'no'),
(104, 7, 'confirmar_clave', '2', 'medium', 3, 'no', 'string', 'Confirmar contraseña', 'confirmar_clave', 3, 'yes', 'no'),
(105, 7, 'core__submission_date', '', 'medium', 8, 'yes', 'date', 'Date', 'submission_date', 4, 'yes', 'no'),
(106, 7, 'core__last_modified', '', 'medium', 8, 'yes', 'date', 'Last modified', 'last_modified_date', 5, 'yes', 'no'),
(107, 7, 'core__ip_address', '', 'medium', 1, 'yes', 'number', 'IP Address', 'ip_address', 6, 'yes', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_hooks`
--

CREATE TABLE `ft_hooks` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `hook_type` enum('code','template') NOT NULL,
  `component` enum('core','api','module') NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `action_location` varchar(255) NOT NULL,
  `function_name` varchar(255) NOT NULL,
  `params` mediumtext,
  `overridable` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_hooks`
--

INSERT INTO `ft_hooks` (`id`, `hook_type`, `component`, `filepath`, `action_location`, `function_name`, `params`, `overridable`) VALUES
(1, 'code', 'core', '/process.php', 'start', 'ft_process_form', 'form_info,form_id,form_data', 'form_data'),
(2, 'code', 'core', '/process.php', 'end', 'ft_process_form', 'form_id,submission_id', ''),
(3, 'code', 'core', '/process.php', 'manage_files', 'ft_process_form', 'form_id,submission_id,file_fields,redirect_query_params', 'success,message,redirect_query_params'),
(4, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_create_blank_submission', 'form_id,now,ip,new_submission_id', ''),
(5, 'code', 'core', '/global/code/submissions.php', 'start', 'ft_delete_submission', 'form_id,view_id,submission_id,is_admin', ''),
(6, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_delete_submission', 'form_id,view_id,submission_id,is_admin', 'success,message'),
(7, 'code', 'core', '/global/code/submissions.php', 'start', 'ft_delete_submissions', 'form_id,view_id,submissions_to_delete,omit_list,search_fields,is_admin', 'submission_ids'),
(8, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_delete_submissions', 'form_id,view_id,submissions_to_delete,omit_list,search_fields,is_admin', 'success,message'),
(9, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_get_submission', 'form_id,submission_id,view_id,return_arr', 'return_arr'),
(10, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_get_submission_info', 'form_id,submission_id,submission', 'submission'),
(11, 'code', 'core', '/global/code/submissions.php', 'start', 'ft_update_submission', 'form_id,submission_id,infohash', 'infohash'),
(12, 'code', 'core', '/global/code/submissions.php', 'manage_files', 'ft_update_submission', 'form_id,submission_id,file_fields', 'success,message'),
(13, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_update_submission', 'form_id,submission_id,infohash', 'success,message'),
(14, 'code', 'core', '/global/code/submissions.php', 'end', 'ft_search_submissions', 'form_id,submission_id,view_id,results_per_page,page_num,order,columns,search_fields,submission_ids,return_hash', 'return_hash'),
(15, 'code', 'core', '/global/code/submissions.php', 'main', 'ft_display_submission_listing_quicklinks', 'context', 'quicklinks'),
(16, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_view', 'view_id,view_info', 'view_info'),
(17, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_views', 'return_hash', 'return_hash'),
(18, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_view_ids', 'view_ids', 'view_ids'),
(19, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_view_tabs', 'view_id,tab_info', 'tab_info'),
(20, 'code', 'core', '/global/code/views.php', 'end', 'ft_create_new_view', 'view_id', ''),
(21, 'code', 'core', '/global/code/views.php', 'end', 'ft_delete_view', 'view_id', 'success,message'),
(22, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_view_clients', 'account_info', 'account_info'),
(23, 'code', 'core', '/global/code/views.php', 'end', 'ft_update_view', 'view_id,info', 'success,message'),
(24, 'code', 'core', '/global/code/views.php', 'start', 'ft_get_view_filter_sql', 'placeholders,is_client_account', 'placeholders,is_client_account'),
(25, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_form_views', 'view_hash', 'view_hash'),
(26, 'code', 'core', '/global/code/views.php', 'end', 'ft_get_view_list', 'form_id,result', 'result'),
(27, 'code', 'core', '/global/code/emails.php', 'end', 'ft_create_blank_email_template', 'email_id', ''),
(28, 'code', 'core', '/global/code/emails.php', 'end', 'ft_get_email_templates', 'form_id,return_hash', 'return_hash'),
(29, 'code', 'core', '/global/code/emails.php', 'end', 'ft_get_email_template_list', 'form_id,info', 'info'),
(30, 'code', 'core', '/global/code/emails.php', 'end', 'ft_get_email_template', 'email_template', 'email_template'),
(31, 'code', 'core', '/global/code/emails.php', 'start', 'ft_send_test_email', 'info', 'info'),
(32, 'code', 'core', '/global/code/emails.php', 'end', 'ft_get_email_patterns', 'text_patterns,html_patterns', 'text_patterns,html_patterns'),
(33, 'code', 'core', '/global/code/emails.php', 'end', 'ft_set_field_as_email_field', 'form_id,infohash', ''),
(34, 'code', 'core', '/global/code/emails.php', 'end', 'ft_unset_field_as_email_field', 'form_email_id', ''),
(35, 'code', 'core', '/global/code/emails.php', 'start', 'ft_update_email_template', 'email_id,info', 'info'),
(36, 'code', 'core', '/global/code/emails.php', 'end', 'ft_update_email_template', 'email_id,info', 'success,message'),
(37, 'code', 'core', '/global/code/emails.php', 'end', 'ft_get_edit_submission_email_templates', 'view_id,email_info', 'email_info'),
(38, 'code', 'core', '/global/code/emails.php', 'start', 'ft_process_email_template', 'form_id,submission_id,email_id,email_components', 'email_components'),
(39, 'code', 'core', '/global/code/accounts.php', 'main', 'ft_get_account_info', 'account_info', 'account_info'),
(40, 'code', 'core', '/global/code/accounts.php', 'main', 'ft_get_account_settings', 'account_id,hash', 'hash'),
(41, 'code', 'core', '/global/code/accounts.php', 'main', 'ft_login', 'account_info', 'account_info'),
(42, 'code', 'core', '/global/code/accounts.php', 'start', 'ft_send_password', 'info', 'info'),
(43, 'code', 'core', '/global/code/accounts.php', 'end', 'ft_send_password', 'success,message,info', 'success,message'),
(44, 'code', 'core', '/global/code/accounts.php', 'start', 'ft_set_account_settings', 'account_id,settings', 'settings'),
(45, 'code', 'core', '/global/code/accounts.php', 'end', 'ft_set_account_settings', 'account_id,settings', ''),
(46, 'code', 'core', '/global/code/option_lists.php', 'end', 'ft_get_option_lists', 'return_hash', 'return_hash'),
(47, 'code', 'core', '/global/code/option_lists.php', 'end', 'ft_update_option_list', 'list_id,info', 'success,message'),
(48, 'code', 'core', '/global/code/option_lists.php', 'end', 'ft_delete_option_list', 'list_id', 'success,message'),
(49, 'code', 'core', '/global/code/fields.php', 'end', 'ft_add_form_fields', 'infohash,form_id', 'success,message'),
(50, 'code', 'core', '/global/code/fields.php', 'end', 'ft_delete_form_fields', 'deleted_field_info,form_id,field_ids,success,message', 'success,message'),
(51, 'code', 'core', '/global/code/fields.php', 'end', 'ft_get_field_options', 'field_id,options', 'options'),
(52, 'code', 'core', '/global/code/fields.php', 'end', 'ft_get_form_field', 'field_id,info', 'info'),
(53, 'code', 'core', '/global/code/fields.php', 'end', 'ft_get_form_field_settings', 'field_id,settings', 'settings'),
(54, 'code', 'core', '/global/code/fields.php', 'end', 'ft_get_form_fields', 'form_id,infohash', 'infohash'),
(55, 'code', 'core', '/global/code/fields.php', 'end', 'ft_get_extended_field_settings', 'field_id,setting_name', 'settings'),
(56, 'code', 'core', '/global/code/fields.php', 'end', 'ft_delete_extended_field_settings', 'field_id', ''),
(57, 'code', 'core', '/global/code/fields.php', 'start', 'ft_update_form_fields', 'infohash,form_id', 'infohash'),
(58, 'code', 'core', '/global/code/fields.php', 'end', 'ft_update_field', 'field_id', 'success,message'),
(59, 'code', 'core', '/global/code/fields.php', 'start', 'ft_get_uploaded_files', 'form_id,field_ids', 'uploaded_files'),
(60, 'code', 'core', '/global/code/modules.php', 'end', 'ft_uninstall_module', 'module_id,success,message', 'success,message'),
(61, 'code', 'core', '/global/code/modules.php', 'end', 'ft_get_module_menu_items', 'menu_items,module_id,module_folder', 'menu_items'),
(62, 'code', 'core', '/global/code/modules.php', 'end', 'ft_get_module', 'module_id,result', 'result'),
(63, 'code', 'core', '/global/code/modules.php', 'start', 'ft_search_modules', 'search_criteria', 'search_criteria'),
(64, 'code', 'core', '/global/code/modules.php', 'start', 'ft_get_modules', 'modules_info', 'modules_info'),
(65, 'code', 'core', '/global/code/modules.php', 'end', 'ft_init_module_page', 'account_type,module_folder', ''),
(66, 'code', 'core', '/global/code/modules.php', 'end', 'ft_include_module', 'module_folder', ''),
(67, 'code', 'core', '/global/code/modules.php', 'start', 'ft_module_override_data', 'location,data', 'data'),
(68, 'code', 'core', '/global/code/files.php', 'end', 'ft_get_unique_filename', 'return_filename', 'return_filename'),
(69, 'code', 'core', '/global/code/files.php', 'start', 'ft_delete_submission_files', 'form_id,file_field_info', 'success,problems'),
(70, 'code', 'core', '/global/code/settings.php', 'end', 'ft_update_main_settings', 'settings', 'success,message'),
(71, 'code', 'core', '/global/code/settings.php', 'end', 'ft_update_account_settings', 'settings', 'success,message'),
(72, 'code', 'core', '/global/code/settings.php', 'end', 'ft_update_file_settings', 'infohash', 'success,message'),
(73, 'code', 'core', '/global/code/settings.php', 'end', 'ft_update_theme_settings', 'infohash', 'success,message'),
(74, 'code', 'core', '/global/code/general.php', 'end', 'ft_display_custom_page_message', 'flag', 'g_success,g_message'),
(75, 'code', 'core', '/global/code/general.php', 'end', 'ft_eval_smarty_string', 'output,placeholder_str,placeholders,theme', 'output'),
(76, 'code', 'core', '/global/code/general.php', 'end', 'ft_check_permission', 'account_type', 'boot_out_user,message_flag'),
(77, 'code', 'core', '/global/code/general.php', 'main', 'ft_check_client_may_view', 'client_id,form_id,view_id,permissions', 'permissions'),
(78, 'code', 'core', '/global/code/general.php', 'end', 'ft_generate_js_messages', 'js', 'js'),
(79, 'code', 'core', '/global/code/general.php', 'end', 'ft_get_submission_placeholders', 'placeholders', 'placeholders'),
(80, 'code', 'core', '/global/code/themes.php', 'end', 'ft_get_theme', 'theme_id,theme_info', 'theme_info'),
(81, 'code', 'core', '/global/code/themes.php', 'end', 'ft_get_theme_by_theme_folder', 'theme_folder,theme_info', 'theme_info'),
(82, 'code', 'core', '/global/code/themes.php', 'end', 'ft_get_themes', 'theme_info', 'theme_info'),
(83, 'code', 'core', '/global/code/themes.php', 'main', 'ft_display_page', 'g_smarty,template,page_vars', 'g_smarty'),
(84, 'code', 'core', '/global/code/themes.php', 'main', 'ft_display_module_page', 'g_smarty,template,page_vars', 'g_smarty'),
(85, 'code', 'core', '/global/code/forms.php', 'start', 'ft_client_update_form_settings', 'infohash', 'infohash'),
(86, 'code', 'core', '/global/code/forms.php', 'end', 'ft_client_update_form_settings', 'infohash,success,message', 'success,message'),
(87, 'code', 'core', '/global/code/forms.php', 'start', 'ft_delete_form', 'form_id', ''),
(88, 'code', 'core', '/global/code/forms.php', 'end', 'ft_finalize_form', 'form_id', ''),
(89, 'code', 'core', '/global/code/forms.php', 'end', 'ft_get_form', 'form_id,form_info', 'form_info'),
(90, 'code', 'core', '/global/code/forms.php', 'end', 'ft_get_form_clients', 'form_id,accounts', 'accounts'),
(91, 'code', 'core', '/global/code/forms.php', 'end', 'ft_set_form_main_settings', 'infohash,success,message', 'success,message'),
(92, 'code', 'core', '/global/code/forms.php', 'start', 'ft_set_form_field_types', 'info,form_id', 'info'),
(93, 'code', 'core', '/global/code/forms.php', 'start', 'ft_update_form_main_tab', 'infohash,form_id', 'infohash'),
(94, 'code', 'core', '/global/code/forms.php', 'end', 'ft_update_form_main_tab', 'infohash,form_id,success,message', 'success,message'),
(95, 'code', 'core', '/global/code/forms.php', 'start', 'ft_update_form_fields_tab', 'infohash,form_id', 'infohash'),
(96, 'code', 'core', '/global/code/forms.php', 'delete_fields', 'ft_update_form_fields_tab', 'deleted_field_ids,infohash,form_id', ''),
(97, 'code', 'core', '/global/code/forms.php', 'end', 'ft_update_form_fields_tab', 'infohash,field_info,form_id', 'success,message'),
(98, 'code', 'core', '/global/code/forms.php', 'end', '_ft_alter_table_column', 'table,old_col_name,new_col_name,col_type', ''),
(99, 'code', 'core', '/global/code/forms.php', 'start', 'ft_search_forms', 'account_id,is_admin,search_criteria', 'search_criteria'),
(100, 'code', 'core', '/global/code/forms.php', 'end', 'ft_search_forms', 'account_id,is_admin,search_criteria,form_info', 'form_info'),
(101, 'code', 'core', '/global/code/forms.php', 'end', 'ft_get_public_form_omit_list', 'clients_id,form_id', 'client_ids'),
(102, 'code', 'core', '/global/code/clients.php', 'start', 'ft_update_client', 'account_id,info', 'info'),
(103, 'code', 'core', '/global/code/clients.php', 'end', 'ft_update_client', 'account_id,info', 'success,message'),
(104, 'code', 'core', '/global/code/clients.php', 'end', 'ft_delete_client', 'account_id', 'success,message'),
(105, 'code', 'core', '/global/code/clients.php', 'end', 'ft_disable_client', 'account_id', ''),
(106, 'code', 'core', '/global/code/clients.php', 'start', 'ft_search_clients', 'search_criteria', 'search_criteria'),
(107, 'code', 'core', '/global/code/clients.php', 'end', 'ft_search_clients', 'search_criteria,clients', 'clients'),
(108, 'code', 'core', '/global/code/clients.php', 'end', 'ft_get_client_form_views', 'account_id,info', 'info'),
(109, 'code', 'core', '/global/code/administrator.php', 'start', 'ft_add_client', 'form_vals', 'form_vals'),
(110, 'code', 'core', '/global/code/administrator.php', 'end', 'ft_add_client', 'new_user_id,account_settings', 'success,message'),
(111, 'code', 'core', '/global/code/administrator.php', 'start', 'ft_admin_update_client', 'infohash,tab_num', 'infohash,tab_num'),
(112, 'code', 'core', '/global/code/administrator.php', 'end', 'ft_admin_update_client', 'infohash,tab_num', 'success,message'),
(113, 'code', 'core', '/global/code/administrator.php', 'main', 'ft_get_admin_info', 'admin_info', 'admin_info'),
(114, 'code', 'core', '/global/code/administrator.php', 'start', 'ft_update_admin_account', 'infohash,account_id', 'infohash'),
(115, 'code', 'core', '/global/code/administrator.php', 'end', 'ft_update_admin_account', 'infohash,account_id', 'success,message'),
(116, 'code', 'core', '/global/code/menus.php', 'end', 'ft_get_menus', 'return_hash', 'return_hash'),
(117, 'code', 'core', '/global/code/menus.php', 'end', 'ft_get_menu_list', 'menus', 'menus'),
(118, 'code', 'core', '/global/code/menus.php', 'end', 'ft_get_admin_menu', 'menu_info', 'menu_info'),
(119, 'code', 'core', '/global/code/menus.php', 'end', 'ft_get_client_menu', 'menu_info', 'menu_info'),
(120, 'code', 'core', '/global/code/menus.php', 'end', 'ft_get_menu_items', 'menu_items,menu_id', 'menu_items'),
(121, 'code', 'core', '/global/code/menus.php', 'middle', 'ft_get_admin_menu_pages_dropdown', 'select_lines', 'select_lines'),
(122, 'code', 'core', '/global/code/menus.php', 'middle', 'ft_get_client_menu_pages_dropdown', 'select_lines', 'select_lines'),
(123, 'code', 'core', '/global/code/menus.php', 'end', 'ft_update_admin_menu', 'success,message,info', 'success,message'),
(124, 'code', 'core', '/global/code/menus.php', 'end', 'ft_update_menu_order', 'menu_id', ''),
(125, 'code', 'core', '/global/code/menus.php', 'end', 'ft_update_client_menu', 'info', 'success,message'),
(126, 'code', 'core', '/global/code/menus.php', 'end', 'ft_get_page_url', 'page_identifier,params,full_url', 'full_url'),
(127, 'code', 'core', '/global/code/menus.php', 'start', 'ft_construct_page_url', 'url,page_identifier,custom_options,args', 'url'),
(128, 'code', 'core', '/global/code/menus.php', 'start', 'ft_delete_client_menu', 'menu_id', ''),
(129, 'code', 'api', '/global/api/api.php', 'start', 'ft_api_process_form', 'form_info,form_id,form_data', 'form_data'),
(130, 'code', 'api', '/global/api/api.php', 'manage_files', 'ft_api_process_form', 'form_id,submission_id,file_fields,namespace', 'success,message'),
(131, 'template', 'core', '/themes/default/admin/account/index.tpl', 'admin_account_top', '', '', ''),
(132, 'template', 'core', '/themes/default/admin/account/index.tpl', 'admin_account_bottom', '', '', ''),
(133, 'template', 'core', '/themes/default/admin/themes/index.tpl', 'admin_settings_themes_bottom', '', '', ''),
(134, 'template', 'core', '/themes/default/admin/forms/edit_submission.tpl', 'admin_edit_submission_top', '', '', ''),
(135, 'template', 'core', '/themes/default/admin/forms/edit_submission.tpl', 'admin_edit_submission_bottom', '', '', ''),
(136, 'template', 'core', '/themes/default/admin/forms/tab_edit_email_tab1.tpl', 'edit_template_tab1', '', '', ''),
(137, 'template', 'core', '/themes/default/admin/forms/tab_edit_email_tab1.tpl', 'edit_template_tab1_advanced', '', '', ''),
(138, 'template', 'core', '/themes/default/admin/forms/option_lists/tab_main.tpl', 'edit_option_list_main', '', '', ''),
(139, 'template', 'core', '/themes/default/admin/forms/option_lists/index.tpl', 'option_list_button_row', '', '', ''),
(140, 'template', 'core', '/themes/default/admin/forms/add/index.tpl', 'add_form_page', '', '', ''),
(141, 'template', 'core', '/themes/default/admin/forms/submissions.tpl', 'admin_submission_listings_top', '', '', ''),
(142, 'template', 'core', '/themes/default/admin/forms/submissions.tpl', 'admin_submission_listings_buttons1', '', '', ''),
(143, 'template', 'core', '/themes/default/admin/forms/submissions.tpl', 'admin_submission_listings_buttons2', '', '', ''),
(144, 'template', 'core', '/themes/default/admin/forms/submissions.tpl', 'admin_submission_listings_buttons3', '', '', ''),
(145, 'template', 'core', '/themes/default/admin/forms/submissions.tpl', 'admin_submission_listings_buttons4', '', '', ''),
(146, 'template', 'core', '/themes/default/admin/forms/submissions.tpl', 'admin_submission_listings_bottom', '', '', ''),
(147, 'template', 'core', '/themes/default/admin/forms/edit.tpl', 'admin_edit_form_content', '', '', ''),
(148, 'template', 'core', '/themes/default/admin/forms/tab_views.tpl', 'admin_edit_form_views_tab_button_row', '', '', ''),
(149, 'template', 'core', '/themes/default/admin/forms/tab_edit_email_tab2.tpl', 'edit_template_tab2', '', '', ''),
(150, 'template', 'core', '/themes/default/admin/forms/tab_edit_view__filters.tpl', 'admin_edit_view_client_map_filter_dropdown', '', '', ''),
(151, 'template', 'core', '/themes/default/admin/forms/tab_main.tpl', 'admin_edit_form_main_tab_form_type_dropdown', '', '', ''),
(152, 'template', 'core', '/themes/default/admin/forms/tab_main.tpl', 'admin_edit_form_main_tab_after_main_settings', '', '', ''),
(153, 'template', 'core', '/themes/default/admin/forms/tab_main.tpl', 'admin_edit_form_main_tab_button_row', '', '', ''),
(154, 'template', 'core', '/themes/default/admin/forms/tab_fields.tpl', 'admin_edit_form_fields_tab_button_row', '', '', ''),
(155, 'template', 'core', '/themes/default/admin/forms/index.tpl', 'admin_forms_list_top', '', '', ''),
(156, 'template', 'core', '/themes/default/admin/forms/index.tpl', 'admin_forms_form_type_label', '', '', ''),
(157, 'template', 'core', '/themes/default/admin/forms/index.tpl', 'admin_forms_list_bottom', '', '', ''),
(158, 'template', 'core', '/themes/default/admin/settings/tab_files.tpl', 'admin_settings_files_bottom', '', '', ''),
(159, 'template', 'core', '/themes/default/admin/settings/tab_accounts.tpl', 'admin_settings_client_settings_bottom', '', '', ''),
(160, 'template', 'core', '/themes/default/admin/settings/tab_edit_admin_menu.tpl', 'admin_settings_admin_menu_top', '', '', ''),
(161, 'template', 'core', '/themes/default/admin/settings/tab_edit_client_menu.tpl', 'admin_settings_client_menu_top', '', '', ''),
(162, 'template', 'core', '/themes/default/admin/settings/tab_main.tpl', 'admin_settings_main_tab_bottom', '', '', ''),
(163, 'template', 'core', '/themes/default/admin/settings/tab_menus.tpl', 'admin_settings_menus_top', '', '', ''),
(164, 'template', 'core', '/themes/default/admin/clients/tab_settings.tpl', 'admin_edit_client_settings_top', '', '', ''),
(165, 'template', 'core', '/themes/default/admin/clients/tab_settings.tpl', 'admin_edit_client_settings_bottom', '', '', ''),
(166, 'template', 'core', '/themes/default/admin/clients/edit.tpl', 'admin_edit_client_pages_top', '', '', ''),
(167, 'template', 'core', '/themes/default/admin/clients/edit.tpl', 'admin_edit_client_pages_bottom', '', '', ''),
(168, 'template', 'core', '/themes/default/admin/clients/tab_forms.tpl', 'admin_edit_client_forms_top', '', '', ''),
(169, 'template', 'core', '/themes/default/admin/clients/tab_forms.tpl', 'admin_edit_client_forms_bottom', '', '', ''),
(170, 'template', 'core', '/themes/default/admin/clients/add.tpl', 'admin_add_client_top', '', '', ''),
(171, 'template', 'core', '/themes/default/admin/clients/add.tpl', 'admin_add_client_bottom', '', '', ''),
(172, 'template', 'core', '/themes/default/admin/clients/tab_main.tpl', 'admin_edit_client_main_top', '', '', ''),
(173, 'template', 'core', '/themes/default/admin/clients/tab_main.tpl', 'admin_edit_client_main_middle', '', '', ''),
(174, 'template', 'core', '/themes/default/admin/clients/tab_main.tpl', 'admin_edit_client_main_bottom', '', '', ''),
(175, 'template', 'core', '/themes/default/admin/clients/index.tpl', 'admin_list_clients_top', '', '', ''),
(176, 'template', 'core', '/themes/default/admin/clients/index.tpl', 'admin_list_clients_bottom', '', '', ''),
(177, 'template', 'core', '/themes/default/header.tpl', 'head_top', '', '', ''),
(178, 'template', 'core', '/themes/default/header.tpl', 'head_bottom', '', '', ''),
(179, 'template', 'core', '/themes/default/clients/account/tab_settings.tpl', 'edit_client_settings_top', '', '', ''),
(180, 'template', 'core', '/themes/default/clients/account/tab_settings.tpl', 'edit_client_settings_bottom', '', '', ''),
(181, 'template', 'core', '/themes/default/clients/account/tab_main.tpl', 'edit_client_main_top', '', '', ''),
(182, 'template', 'core', '/themes/default/clients/account/tab_main.tpl', 'edit_client_main_middle', '', '', ''),
(183, 'template', 'core', '/themes/default/clients/account/tab_main.tpl', 'edit_client_main_bottom', '', '', ''),
(184, 'template', 'core', '/themes/default/clients/forms/edit_submission.tpl', 'client_edit_submission_top', '', '', ''),
(185, 'template', 'core', '/themes/default/clients/forms/edit_submission.tpl', 'client_edit_submission_bottom', '', '', ''),
(186, 'template', 'core', '/themes/default/clients/forms/index.tpl', 'client_submission_listings_top', '', '', ''),
(187, 'template', 'core', '/themes/default/clients/forms/index.tpl', 'client_submission_listings_buttons1', '', '', ''),
(188, 'template', 'core', '/themes/default/clients/forms/index.tpl', 'client_submission_listings_buttons2', '', '', ''),
(189, 'template', 'core', '/themes/default/clients/forms/index.tpl', 'client_submission_listings_buttons3', '', '', ''),
(190, 'template', 'core', '/themes/default/clients/forms/index.tpl', 'client_submission_listings_buttons4', '', '', ''),
(191, 'template', 'core', '/themes/default/clients/forms/index.tpl', 'client_submission_listings_bottom', '', '', ''),
(192, 'template', 'core', '/themes/default/modules_header.tpl', 'modules_head_top', '', '', ''),
(193, 'template', 'core', '/themes/default/modules_header.tpl', 'modules_head_bottom', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_hook_calls`
--

CREATE TABLE `ft_hook_calls` (
  `hook_id` mediumint(8) UNSIGNED NOT NULL,
  `hook_type` enum('code','template') NOT NULL DEFAULT 'code',
  `action_location` varchar(100) NOT NULL,
  `module_folder` varchar(255) NOT NULL,
  `function_name` varchar(255) NOT NULL,
  `hook_function` varchar(255) NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_hook_calls`
--

INSERT INTO `ft_hook_calls` (`hook_id`, `hook_type`, `action_location`, `module_folder`, `function_name`, `hook_function`, `priority`) VALUES
(1, 'template', 'admin_submission_listings_bottom', 'export_manager', '', 'exp_display_export_options', 50),
(2, 'template', 'client_submission_listings_bottom', 'export_manager', '', 'exp_display_export_options', 50),
(3, 'code', 'manage_files', 'field_type_file', 'ft_update_submission', 'ft_file_update_submission_hook', 50),
(4, 'code', 'manage_files', 'field_type_file', 'ft_process_form', 'ft_file_process_form_hook', 50),
(5, 'code', 'manage_files', 'field_type_file', 'ft_api_process_form', 'ft_file_api_process_form_hook', 50),
(6, 'code', 'start', 'field_type_file', 'ft_delete_submission_files', 'ft_file_delete_submissions_hook', 50),
(7, 'code', 'start', 'field_type_file', 'ft_get_uploaded_files', 'ft_file_get_uploaded_files_hook', 50),
(8, 'template', 'head_bottom', 'field_type_file', '', 'ft_file_include_js', 50),
(9, 'template', 'standalone_form_fields_head_bottom', 'field_type_file', '', 'ft_file_include_standalone_js', 50),
(10, 'template', 'add_form_page', 'form_builder', '', 'fb_display_add_form_option', 50),
(11, 'template', 'admin_edit_form_main_tab_form_type_dropdown', 'form_builder', '', 'fb_display_form_type_option', 50),
(12, 'template', 'admin_forms_form_type_label', 'form_builder', '', 'fb_display_form_builder_label', 50),
(13, 'code', 'start', 'form_builder', 'ft_module_override_data', 'fb_inline_data_override', 50),
(14, 'code', 'end', 'form_builder', 'ft_display_custom_page_message', 'fb_display_form_created_message', 50),
(15, 'template', 'admin_edit_form_content', 'form_builder', '', 'fb_display_publish_tab', 50),
(16, 'code', 'start', 'form_builder', 'ft_delete_form', 'fb_hook_delete_form', 50),
(17, 'code', 'end', 'form_builder', 'ft_delete_view', 'fb_hook_delete_view', 50),
(18, 'template', 'edit_template_tab2', 'swift_mailer', '', 'swift_display_extra_fields_tab2', 50),
(19, 'code', 'end', 'swift_mailer', 'ft_create_blank_email_template', 'swift_map_email_template_field', 50),
(20, 'code', 'end', 'swift_mailer', 'ft_delete_email_template', 'swift_delete_email_template_field', 50),
(21, 'code', 'end', 'swift_mailer', 'ft_update_email_template', 'swift_update_email_template_append_extra_fields', 50),
(22, 'code', 'end', 'swift_mailer', 'ft_get_email_template', 'swift_get_email_template_append_extra_fields', 50),
(23, 'template', 'head_bottom', 'field_type_tinymce', '', 'tinymce_include_files', 50),
(24, 'template', 'standalone_form_fields_head_bottom', 'field_type_tinymce', '', 'tinymce_include_standalone_files', 50),
(83, 'template', 'admin_forms_list_bottom', 'form_backup', '', 'fb_display_create_form_backup_button', 50),
(91, 'code', 'end', 'gflacso_graduados', 'ft_update_submission', 'gflacso_graduados_update_submission_hook', 50),
(92, 'code', 'start', 'gflacso_graduados', 'ft_update_submission', 'gflacso_graduados_update_submission_start_hook', 50),
(93, 'code', 'start', 'gflacso_graduados', 'ft_process_form', 'gflacso_graduados_process_form_start_hook', 50),
(94, 'template', 'admin_settings_main_tab_bottom', 'arbitrary_settings', '', 'as_display_settings', 50),
(95, 'code', 'end', 'arbitrary_settings', 'ft_update_main_settings', 'as_save_settings', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_list_groups`
--

CREATE TABLE `ft_list_groups` (
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  `group_type` varchar(50) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `custom_data` text NOT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_list_groups`
--

INSERT INTO `ft_list_groups` (`group_id`, `group_type`, `group_name`, `custom_data`, `list_order`) VALUES
(1, 'field_types', 'Standard Fields', '', 1),
(2, 'field_types', 'Special Fields', '', 2),
(12, 'field_types', 'Custom FIelds', '', 3),
(14, 'form_3_view_group', 'Vistas', '', 1),
(15, 'view_fields_3', 'Acceso', '1', 1),
(16, 'view_fields_3', 'Datos Personales', '2', 2),
(26, 'option_list_1', 'America', '', 1),
(27, 'option_list_1', 'Africa', '', 2),
(33, 'view_fields_3', 'Datos de Residencia', '2', 3),
(34, 'option_list_7', '', '', 1),
(35, 'option_list_8', '', '', 1),
(36, 'form_4_view_group', 'Views', '', 1),
(37, 'view_fields_5', 'Resetear Contraseña', '1', 1),
(38, 'option_list_9', '', '', 1),
(39, 'view_fields_3', 'Estado', '2', 4),
(40, 'option_list_2', '', '', 1),
(41, 'option_list_10', '', '', 1),
(43, 'view_fields_3', 'Terminos y Condiciones', '3', 5),
(44, 'form_5_view_group', 'Views', '', 1),
(45, 'view_fields_6', 'Cambiar Contraseña', '1', 1),
(46, 'form_6_view_group', 'Views', '', 1),
(47, 'view_fields_7', 'Datos Personales', '1', 1),
(48, 'form_7_view_group', 'Views', '', 1),
(49, 'view_fields_8', 'Resetear Contraseña', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_menus`
--

CREATE TABLE `ft_menus` (
  `menu_id` smallint(5) UNSIGNED NOT NULL,
  `menu` varchar(255) NOT NULL,
  `menu_type` enum('admin','client') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_menus`
--

INSERT INTO `ft_menus` (`menu_id`, `menu`, `menu_type`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Client Menu', 'client');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_menu_items`
--

CREATE TABLE `ft_menu_items` (
  `menu_item_id` mediumint(8) UNSIGNED NOT NULL,
  `menu_id` mediumint(8) UNSIGNED NOT NULL,
  `display_text` varchar(100) NOT NULL,
  `page_identifier` varchar(50) NOT NULL,
  `custom_options` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_submenu` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_new_sort_group` enum('yes','no') NOT NULL DEFAULT 'yes',
  `list_order` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_menu_items`
--

INSERT INTO `ft_menu_items` (`menu_item_id`, `menu_id`, `display_text`, `page_identifier`, `custom_options`, `url`, `is_submenu`, `is_new_sort_group`, `list_order`) VALUES
(1, 1, 'Forms', 'admin_forms', '', '/admin/forms/', 'no', 'yes', 1),
(2, 1, 'Add Form', 'add_form_choose_type', '', '/admin/forms/add/', 'yes', 'no', 2),
(3, 1, 'Option Lists', 'option_lists', '', '/admin/forms/option_lists/', 'yes', 'no', 3),
(4, 1, 'Clients', 'clients', '', '/admin/clients/', 'no', 'yes', 4),
(5, 1, 'Modules', 'modules', '', '/admin/modules/', 'no', 'yes', 5),
(6, 1, 'Themes', 'settings_themes', '', '/admin/themes/', 'no', 'yes', 6),
(7, 1, 'Settings', 'settings', '', '/admin/settings', 'no', 'yes', 7),
(8, 1, 'Main', 'settings_main', '', '/admin/settings/index.php?page=main', 'yes', 'no', 8),
(9, 1, 'Accounts', 'settings_accounts', '', '/admin/settings/index.php?page=accounts', 'yes', 'no', 9),
(10, 1, 'Files', 'settings_files', '', '/admin/settings/index.php?page=files', 'yes', 'no', 10),
(11, 1, 'Menus', 'settings_menus', '', '/admin/settings/index.php?page=menus', 'yes', 'no', 11),
(12, 1, 'Your Account', 'your_account', '', '/admin/account', 'no', 'yes', 12),
(13, 1, 'Logout', 'logout', '', '/index.php?logout', 'no', 'yes', 13),
(14, 2, 'Forms', 'client_forms', '', '/clients/index.php', 'no', 'yes', 1),
(15, 2, 'Account', 'client_account', '', '/clients/account/index.php', 'no', 'yes', 2),
(16, 2, 'Login Info', 'client_account_login', '', '/clients/account/index.php?page=main', 'yes', 'no', 3),
(17, 2, 'Settings', 'client_account_settings', '', '/clients/account/index.php?page=settings', 'yes', 'no', 4),
(18, 2, 'Logout', 'logout', '', '/index.php?logout', 'no', 'yes', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_modules`
--

CREATE TABLE `ft_modules` (
  `module_id` mediumint(8) UNSIGNED NOT NULL,
  `is_installed` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_enabled` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_premium` enum('yes','no') NOT NULL DEFAULT 'no',
  `module_key` varchar(15) DEFAULT NULL,
  `origin_language` varchar(50) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `module_folder` varchar(100) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `author_email` varchar(200) DEFAULT NULL,
  `author_link` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `module_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_modules`
--

INSERT INTO `ft_modules` (`module_id`, `is_installed`, `is_enabled`, `is_premium`, `module_key`, `origin_language`, `module_name`, `module_folder`, `version`, `author`, `author_email`, `author_link`, `description`, `module_date`) VALUES
(1, 'yes', 'yes', 'no', NULL, 'en_us', 'File Upload', 'field_type_file', '1.1.0', 'Ben Keen', 'ben.keen@gmail.com', 'http://www.formtools.org', 'This module provides a simple file upload field for use in your Form Tools fields.', '2012-05-16 00:00:00'),
(2, 'yes', 'yes', 'no', NULL, 'en_us', 'Export Manager', 'export_manager', '2.1.1', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'Define your own ways of exporting form submission data for view / download. Excel, Printer-friendly HTML, XML and CSV are included by default.', '2011-10-31 00:00:00'),
(3, 'yes', 'yes', 'no', NULL, 'en_us', 'Swift Mailer', 'swift_mailer', '1.1.2', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://modules.formtools.org', 'This module lets your configure your server''s SMTP settings for Swift Mailer, letting you override the default mail() functionality used to sent emails.', '2011-10-24 00:00:00'),
(4, 'yes', 'yes', 'no', NULL, 'en_us', 'TinyMCE Field', 'field_type_tinymce', '1.0.8', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This module lets you choose a TinyMCE rich-text editor for your form fields. 2.1.0 or later.', '2011-12-10 00:00:00'),
(5, 'yes', 'yes', 'no', NULL, 'en_us', 'System Check', 'system_check', '1.0.3', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This replaces the older Database Integrity module. It offers various tests to analyze and repair your Form Tools installation.', '2012-03-05 00:00:00'),
(6, 'yes', 'yes', 'no', NULL, 'en_us', 'Pages', 'pages', '1.2.6', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This module lets you define your own custom pages to link to from within the Form Tools UI. This lets you to add help pages, client splash pages or any other custom information.', '2011-10-24 00:00:00'),
(7, 'yes', 'no', 'no', NULL, 'en_us', 'Core Field Types', 'core_field_types', '1.0.2', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This module contains all the default field types available for your forms: input fields, textareas, radios, checkboxes, dropdowns, multi-select dropdowns, phone number fields, dates, times, and code/markup fields. This module cannot be uninstalled.', '2011-11-22 00:00:00'),
(8, 'yes', 'yes', 'no', NULL, 'en_us', 'Form Builder', 'form_builder', '1.0.7', 'Ben Keen', 'ben.keen@gmail.com', 'http://www.formtools.org', 'Publish any Form Tools form to make it publicly available on your website.', '2014-05-31 00:00:00'),
(9, 'yes', 'yes', 'no', NULL, 'en_us', 'Hooks Manager', 'hooks_manager', '1.1.3', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This module is for users who need to supplement the Form Tools core code with their own functionality. It lets you embed your own HTML/PHP or execute your own code at specific points/events in Form Tools.', '2012-03-02 00:00:00'),
(10, 'yes', 'yes', 'no', NULL, 'en_us', 'Custom Fields', 'custom_fields', '1.0.7', 'Ben Keen', 'ben.keen@gmail.com', 'http://www.formtools.org', 'This module lets you customize the field types available within Form Tools. By default there are the main types of fields: textboxes, dropdowns etc. but you can use this module to create any type of field you need.', '2014-05-30 00:00:00'),
(11, 'no', 'no', 'no', NULL, 'en_us', 'Hello Tabs!', 'hello_tabs', '1.0.1', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'A simple "Hello World" module to illustrate how to implement tabs in your modules.', '2011-05-26 00:00:00'),
(12, 'yes', 'yes', 'no', NULL, 'en_us', 'Hello World!', 'hello_world', '1.0.1', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://modules.formtools.org', 'A simple "Hello World" module to illustrate the components of a bare-bones module.', '2011-05-26 00:00:00'),
(16, 'yes', 'yes', 'no', NULL, 'en_us', 'Form Backup', 'form_backup', '1.1.4', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This module lets you backup an entire form, including individual components like Views, email templates and submission data. It''s also handy for making copies of forms if you want multiple, similar forms without having to add each separately.', '2011-10-19 00:00:00'),
(17, 'yes', 'yes', 'no', NULL, 'en_us', 'GFlacso Graduados', 'gflacso_graduados', '1.0.4', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://modules.formtools.org', 'Integracion de Form Builder con base de datos de Graduados para inscripciones', '2011-05-26 00:00:00'),
(18, 'yes', 'yes', 'no', NULL, 'en_us', 'Arbitrary Settings', 'arbitrary_settings', '1.0.0', 'Encore Web Studios', 'formtools@encorewebstudios.com', 'http://www.encorewebstudios.com', 'This simple module adds a section to the bottom of the Settings -> Main tab containing whatever additional settings you want. These settings can be accessed and used outside of Form Tools through custom PHP calls.', '2011-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_arbitrary_settings`
--

CREATE TABLE `ft_module_arbitrary_settings` (
  `sid` mediumint(8) UNSIGNED NOT NULL,
  `setting_label` varchar(255) NOT NULL,
  `setting_identifier` varchar(100) NOT NULL,
  `field_type` enum('textbox','textarea','password','radios','checkboxes','select','multi-select') NOT NULL,
  `field_orientation` enum('horizontal','vertical','na') NOT NULL DEFAULT 'na',
  `setting_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_arbitrary_settings`
--

INSERT INTO `ft_module_arbitrary_settings` (`sid`, `setting_label`, `setting_identifier`, `field_type`, `field_orientation`, `setting_order`) VALUES
(1, 'Web Services URL', 'WSURL', 'textbox', 'horizontal', 1),
(2, 'Web Service User', 'WSUser', 'textbox', 'horizontal', 2),
(3, 'Web Services Password', 'WSPassword', 'textbox', 'horizontal', 3),
(4, 'Terminos y Condiciones', 'GGTYC', 'textarea', 'horizontal', 4),
(5, 'Formulario Resetear Contraseña', 'GGResetPasswordForm', 'textbox', 'horizontal', 5),
(6, 'Formulario Cambiar Contraseña', 'GGChangePasswordForm', 'textbox', 'horizontal', 7),
(7, 'Formulario Nueva Cuenta', 'GGNewAccountForm', 'textbox', 'horizontal', 8),
(11, 'Formulario Inscripcion', 'GGInscriptionForm', 'textbox', 'horizontal', 9),
(12, 'Pais por defecto', 'GGDefaultCountry', 'textbox', 'horizontal', 10),
(13, 'Provincia por Defecto', 'GGDefaultProvince', 'textbox', 'horizontal', 11),
(14, 'Ciudad por Defecto', 'GGDefaultCity', 'textbox', 'horizontal', 12),
(15, 'Resetar Contraseña - Cambio', 'GGResetPasswordChangeForm', 'textbox', 'horizontal', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_arbitrary_setting_options`
--

CREATE TABLE `ft_module_arbitrary_setting_options` (
  `sid` mediumint(9) NOT NULL,
  `option_text` varchar(255) DEFAULT NULL,
  `field_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_export_groups`
--

CREATE TABLE `ft_module_export_groups` (
  `export_group_id` smallint(5) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `access_type` enum('admin','public','private') NOT NULL DEFAULT 'public',
  `form_view_mapping` enum('all','except','only') NOT NULL DEFAULT 'all',
  `forms_and_views` mediumtext,
  `visibility` enum('show','hide') NOT NULL DEFAULT 'show',
  `icon` varchar(100) NOT NULL,
  `action` enum('file','popup','new_window') NOT NULL DEFAULT 'popup',
  `action_button_text` varchar(255) NOT NULL DEFAULT 'Display',
  `popup_height` varchar(5) DEFAULT NULL,
  `popup_width` varchar(5) DEFAULT NULL,
  `headers` text,
  `smarty_template` mediumtext NOT NULL,
  `list_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_export_groups`
--

INSERT INTO `ft_module_export_groups` (`export_group_id`, `group_name`, `access_type`, `form_view_mapping`, `forms_and_views`, `visibility`, `icon`, `action`, `action_button_text`, `popup_height`, `popup_width`, `headers`, `smarty_template`, `list_order`) VALUES
(1, 'HTML / Printer-friendly', 'public', 'all', NULL, 'show', 'printer.png', 'popup', 'Display', '600', '800', '', '<html>\r\n<head>\r\n  <title>{$export_group_name}</title>\r\n\r\n  {* escape the CSS so it doesn''t confuse Smarty *}\r\n  {literal}\r\n  <style type="text/css">\r\n  body { margin: 0px; }\r\n  table, td, tr, div, span { \r\n    font-family: verdana; font-size: 8pt;\r\n  }\r\n  table { empty-cells: show }\r\n  #nav_row { background-color: #efefef; padding: 10px; }\r\n  #export_group_name { color: #336699; font-weight:bold }\r\n  .print_table { border: 1px solid #dddddd; }\r\n  .print_table th { \r\n    border: 1px solid #cccccc; \r\n    background-color: #efefef;\r\n    text-align: left;\r\n  }\r\n  .print_table td { border: 1px solid #cccccc; }\r\n  .one_item { margin-bottom: 15px; }\r\n  .page_break { page-break-after: always; }\r\n  </style>\r\n\r\n  <style type="text/css" media="print">\r\n  .no_print { display: none }\r\n  </style>\r\n  {/literal}\r\n\r\n</head>\r\n<body>\r\n\r\n<div id="nav_row" class="no_print">\r\n\r\n  <span style="float:right">{if $page_type != "file"}\r\n    {* if there''s more than one export type in this group, display the types in a dropdown *}\r\n    {if $export_types|@count > 1}\r\n      <select name="export_type_id" onchange="window.location=''{$same_page}?export_group_id={$export_group_id}&export_group_{$export_group_id}_results={$export_group_results}&export_type_id='' + this.value">\r\n      {foreach from=$export_types item=export_type}\r\n        <option value="{$export_type.export_type_id}" {if $export_type.export_type_id == $export_type_id}selected{/if}>{eval var=$export_type.export_type_name}</option>\r\n      {/foreach}\r\n      </select>\r\n    {/if}\r\n    {/if}\r\n    <input type="button" onclick="window.close()" value="{$LANG.word_close}" />\r\n    <input type="button" onclick="window.print()" value="{$LANG.word_print}" />\r\n  </span>\r\n\r\n  <span id="export_group_name">{eval var=$export_group_name}</span>\r\n</div>\r\n\r\n<div style="padding: 15px">\r\n  {$export_type_smarty_template}\r\n</div>\r\n\r\n</body>\r\n</html>', 1),
(2, 'Excel', 'public', 'all', NULL, 'show', 'xls.gif', 'new_window', 'Generate', '', '', 'Pragma: public\nCache-Control: max-age=0\nContent-Type: application/vnd.ms-excel; charset=utf-8\nContent-Disposition: attachment; filename={$filename}', '<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n{$export_type_smarty_template}\r\n\r\n</body>\r\n</html>', 2),
(3, 'XML', 'public', 'all', NULL, 'hide', 'xml.jpg', 'new_window', 'Generate', '', '', '', '<?xml version="1.0" encoding="utf-8" ?>\r\n\r\n{$export_type_smarty_template}', 4),
(4, 'CSV', 'public', 'all', NULL, 'hide', 'csv.gif', 'new_window', 'Generate', '', '', 'Content-type: application/xml; charset="octet-stream"\r\nContent-Disposition: attachment; filename={$filename}', '{$export_type_smarty_template}', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_export_group_clients`
--

CREATE TABLE `ft_module_export_group_clients` (
  `export_group_id` mediumint(8) UNSIGNED NOT NULL,
  `account_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_export_types`
--

CREATE TABLE `ft_module_export_types` (
  `export_type_id` mediumint(8) UNSIGNED NOT NULL,
  `export_type_name` varchar(255) NOT NULL,
  `export_type_visibility` enum('show','hide') NOT NULL DEFAULT 'show',
  `filename` varchar(255) NOT NULL,
  `export_group_id` smallint(6) DEFAULT NULL,
  `smarty_template` text NOT NULL,
  `list_order` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_export_types`
--

INSERT INTO `ft_module_export_types` (`export_type_id`, `export_type_name`, `export_type_visibility`, `filename`, `export_group_id`, `smarty_template`, `list_order`) VALUES
(1, 'Table format', 'show', 'submissions-{$M}.{$j}.html', 1, '<h1>{$form_name} - {$view_name}</h1>\r\n\r\n<table cellpadding="2" cellspacing="0" width="100%" class="print_table">\r\n<tr>\r\n  {foreach from=$display_fields item=column}\r\n    <th>{$column.field_title}</th>\r\n  {/foreach}\r\n</tr>\r\n{strip}\r\n{foreach from=$submissions item=submission}\r\n  {assign var=submission_id value=$submission.submission_id}\r\n  <tr>\r\n    {foreach from=$display_fields item=field_info}\r\n      {assign var=col_name value=$field_info.col_name}\r\n      {assign var=value value=$submission.$col_name}\r\n      <td>\r\n        {smart_display_field form_id=$form_id view_id=$view_id\r\n          submission_id=$submission_id field_info=$field_info\r\n          field_types=$field_types settings=$settings value=$value}\r\n      </td>\r\n    {/foreach}\r\n  </tr>\r\n{/foreach}\r\n{/strip}\r\n</table>', 1),
(2, 'One by one', 'show', 'submissions-{$M}.{$j}.html', 1, '<h1>{$form_name} - {$view_name}</h1>\r\n\r\n{strip}\r\n{foreach from=$submissions item=submission}\r\n  {assign var=submission_id value=$submission.submission_id}\r\n  <table cellpadding="2" cellspacing="0" width="100%" \r\n    class="print_table one_item">\r\n    {foreach from=$display_fields item=field_info}\r\n      {assign var=col_name value=$field_info.col_name}\r\n      {assign var=value value=$submission.$col_name}\r\n      <tr>\r\n        <th width="140">{$field_info.field_title}</th>\r\n        <td>\r\n          {smart_display_field form_id=$form_id view_id=$view_id\r\n            submission_id=$submission_id field_info=$field_info\r\n            field_types=$field_types settings=$settings value=$value}\r\n        </td>\r\n      </tr>\r\n    {/foreach}\r\n  </table>\r\n{/foreach}\r\n{/strip}', 2),
(3, 'One submission per page', 'show', 'submissions-{$M}.{$j}.html', 1, '<h1>{$form_name} - {$view_name}</h1>\r\n\r\n{foreach from=$submissions item=submission name=row}\r\n  {assign var=submission_id value=$submission.submission_id}\r\n  <table cellpadding="2" cellspacing="0" width="100%" \r\n    class="print_table one_item">\r\n    {foreach from=$display_fields item=field_info}\r\n      {assign var=col_name value=$field_info.col_name}\r\n      {assign var=value value=$submission.$col_name}\r\n      <tr>\r\n        <th width="140">{$field_info.field_title}</th>\r\n        <td>\r\n          {smart_display_field form_id=$form_id view_id=$view_id\r\n            submission_id=$submission_id field_info=$field_info\r\n            field_types=$field_types settings=$settings value=$value}\r\n        </td>\r\n      </tr>\r\n    {/foreach}\r\n  </table>\r\n\r\n  {if !$smarty.foreach.row.last}\r\n    <div class="no_print"><i>- {$LANG.phrase_new_page} -</i></div>\r\n    <br class="page_break" />\r\n  {/if}\r\n \r\n{/foreach}\r\n', 3),
(4, 'Table format', 'show', 'submissions-{$M}.{$j}.xls', 2, '<h1>{$form_name} - {$view_name}</h1>\r\n\r\n<table cellpadding="2" cellspacing="0" width="100%" class="print_table">\r\n<tr>\r\n  {foreach from=$display_fields item=column}\r\n    <th>{$column.field_title}</th>\r\n  {/foreach}\r\n</tr>\r\n{strip}\r\n{foreach from=$submissions item=submission}\r\n  {assign var=submission_id value=$submission.submission_id}\r\n  <tr>\r\n    {foreach from=$display_fields item=field_info}\r\n      {assign var=col_name value=$field_info.col_name}\r\n      {assign var=value value=$submission.$col_name}\r\n      <td>\r\n        {smart_display_field form_id=$form_id view_id=$view_id\r\n          submission_id=$submission_id field_info=$field_info\r\n          field_types=$field_types settings=$settings value=$value\r\n          escape="excel"}\r\n      </td>\r\n    {/foreach}\r\n  </tr>\r\n{/foreach}\r\n{/strip}\r\n</table>', 1),
(5, 'All submissions', 'show', 'form{$form_id}_{$datetime}.csv', 4, '{strip}\r\n  {foreach from=$display_fields item=column name=row}\r\n    {* workaround for absurd Microsoft Excel problem, in which the first\r\n       two characters of a file cannot be ID; see:\r\n       http://support.microsoft.com /kb/323626 *}\r\n    {if $smarty.foreach.row.first && $column.field_title == "ID"}\r\n      .ID\r\n    {else}\r\n      {$column.field_title|escape:''csv''}\r\n    {/if}\r\n    {if !$smarty.foreach.row.last},{/if}\r\n  {/foreach}\r\n{/strip}\r\n{foreach from=$submissions item=submission name=row}{strip}\r\n  {foreach from=$display_fields item=field_info name=col_row}\r\n    {assign var=col_name value=$field_info.col_name}\r\n    {assign var=value value=$submission.$col_name}\r\n    {smart_display_field form_id=$form_id view_id=$view_id\r\n      submission_id=$submission.submission_id field_info=$field_info\r\n      field_types=$field_types settings=$settings value=$value\r\n      escape="csv"}\r\n    {* if this wasn''t the last row, output a comma *}\r\n    {if !$smarty.foreach.col_row.last},{/if}\r\n  {/foreach}\r\n{/strip}\r\n{if !$smarty.foreach.row.last}\r\n{/if}\r\n{/foreach}', 1),
(6, 'All submissions', 'show', 'form{$form_id}_{$datetime}.xml', 3, '<export>\r\n  <export_datetime>{$datetime}</export_datetime>\r\n  <export_unixtime>{$U}</export_unixtime>\r\n  <form_info>\r\n    <form_id>{$form_id}</form_id>\r\n    <form_name><![CDATA[{$form_name}]]></form_name>\r\n    <form_url>{$form_url}</form_url>\r\n  </form_info>\r\n  <view_info>\r\n    <view_id>{$view_id}</view_id>\r\n    <view_name><![CDATA[{$view_name}]]></view_name>\r\n  </view_info>\r\n  <submissions>\r\n    {foreach from=$submissions item=submission name=row}      \r\n      <submission>\r\n       {foreach from=$display_fields item=field_info name=col_row}\r\n         {assign var=col_name value=$field_info.col_name}\r\n         {assign var=value value=$submission.$col_name}\r\n       <{$col_name}><![CDATA[{smart_display_field form_id=$form_id \r\n      view_id=$view_id submission_id=$submission.submission_id\r\n      field_info=$field_info field_types=$field_types \r\n      settings=$settings value=$value}]]></{$col_name}>\r\n        {/foreach}\r\n       </submission>\r\n    {/foreach}\r\n  </submissions>\r\n</export>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_forms`
--

CREATE TABLE `ft_module_form_builder_forms` (
  `published_form_id` mediumint(8) UNSIGNED NOT NULL,
  `is_online` enum('yes','no') NOT NULL,
  `is_published` enum('yes','no') NOT NULL,
  `form_id` mediumint(9) NOT NULL,
  `view_id` mediumint(9) NOT NULL,
  `set_id` mediumint(9) NOT NULL,
  `publish_date` datetime DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `folder_path` mediumtext NOT NULL,
  `folder_url` mediumtext NOT NULL,
  `include_review_page` enum('yes','no') NOT NULL,
  `include_thanks_page_in_nav` enum('yes','no') NOT NULL,
  `thankyou_page_content` mediumtext,
  `form_offline_page_content` mediumtext,
  `review_page_title` varchar(255) DEFAULT NULL,
  `thankyou_page_title` varchar(255) DEFAULT NULL,
  `offline_date` datetime NOT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_forms`
--

INSERT INTO `ft_module_form_builder_forms` (`published_form_id`, `is_online`, `is_published`, `form_id`, `view_id`, `set_id`, `publish_date`, `filename`, `folder_path`, `folder_url`, `include_review_page`, `include_thanks_page_in_nav`, `thankyou_page_content`, `form_offline_page_content`, `review_page_title`, `thankyou_page_title`, `offline_date`, `list_order`) VALUES
(5, 'yes', 'yes', 3, 3, 8, '2017-02-13 18:43:25', 'inscripcion_final.php', '/opt/lampp/htdocs/www/formtools/modules/form_builder/published', 'http://forms.coop/modules/form_builder/published', 'no', 'yes', '<h2 class="ts_heading">Thanks!</h2>\r\n\r\n<p>\r\n  Your form has been processed. Thanks for submitting the form.\r\n</p>\r\n\r\n<p>\r\n  <a href="?page=1">Click here</a> to put through another submission.\r\n</p>', '<h2 class="ts_heading">Sorry!</h2>\r\n\r\n<p>\r\n  The form is currently offline.\r\n</p>', 'Terminos y Condiciones', '', '0000-00-00 00:00:00', 1),
(6, 'yes', 'yes', 3, 3, 1, '2017-06-08 20:13:35', 'asd.php', '/opt/lampp/htdocs/www/formtools/modules/form_builder/published', 'http://forms.coop/modules/form_builder/published', 'yes', 'yes', '<h2 class="ts_heading">Thanks!</h2>\r\n\r\n<p>\r\n  Your form has been processed. Thanks for submitting the form.\r\n</p>\r\n\r\n<p>\r\n  <a href="?page=1">Click here</a> to put through another submission.\r\n</p>', '<h2 class="ts_heading">Sorry!</h2>\r\n\r\n<p>\r\n  The form is currently offline.\r\n</p>', 'Review', 'Thankyou', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_form_placeholders`
--

CREATE TABLE `ft_module_form_builder_form_placeholders` (
  `published_form_id` mediumint(9) NOT NULL,
  `placeholder_id` mediumint(9) NOT NULL,
  `placeholder_value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_form_placeholders`
--

INSERT INTO `ft_module_form_builder_form_placeholders` (`published_form_id`, `placeholder_id`, `placeholder_value`) VALUES
(5, 10, 'Azul'),
(5, 11, 'Texto header'),
(5, 12, '<span class="test">texto footer</test>'),
(5, 13, 'Roboto'),
(5, 14, '14px 11px'),
(5, 15, 'Logo Institucional'),
(5, 16, 'Reset'),
(5, 17, 'Change'),
(5, 18, 'Nueva cuenta'),
(6, 1, 'Blue-Grey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_form_templates`
--

CREATE TABLE `ft_module_form_builder_form_templates` (
  `published_form_id` mediumint(9) NOT NULL,
  `template_type` varchar(30) NOT NULL,
  `template_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_form_templates`
--

INSERT INTO `ft_module_form_builder_form_templates` (`published_form_id`, `template_type`, `template_id`) VALUES
(5, 'continue_block', 87),
(5, 'error_message', 86),
(5, 'footer', 89),
(5, 'form_offline_page', 92),
(5, 'form_page', 93),
(5, 'header', 80),
(5, 'navigation', 88),
(5, 'page_layout', 79),
(5, 'review_page', 90),
(5, 'thankyou_page', 91),
(6, 'continue_block', 9),
(6, 'error_message', 14),
(6, 'footer', 4),
(6, 'form_offline_page', 8),
(6, 'form_page', 5),
(6, 'header', 2),
(6, 'navigation', 11),
(6, 'page_layout', 1),
(6, 'review_page', 6),
(6, 'thankyou_page', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_templates`
--

CREATE TABLE `ft_module_form_builder_templates` (
  `template_id` mediumint(8) UNSIGNED NOT NULL,
  `set_id` mediumint(9) NOT NULL,
  `template_type` varchar(30) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `content` mediumtext,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_templates`
--

INSERT INTO `ft_module_form_builder_templates` (`template_id`, `set_id`, `template_type`, `template_name`, `content`, `list_order`) VALUES
(1, 1, 'page_layout', 'Page Layout', '{{header}}\n{{page}}\n{{footer}}', 1),
(2, 1, 'header', 'Header', '<html>\r\n<head>\r\n  <title>{{$form_name}}</title>\r\n  {{$required_resources}}\r\n  {{$R.styles}}\r\n</head>\r\n<body>\r\n  <div class="ts_page" style="width:900px">\r\n    <div class="ts_header">\r\n      <h1>{{$form_name}}</h1>\r\n    </div>\r\n    <div class="ts_content">\r\n      <div class="ts_content_inner">\r\n', 2),
(3, 1, 'header', 'No Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  {{$required_resources}}\n  {{$R.styles}}\n</head>\n<body>\n  <div class="ts_page" style="width:900px">\n    <div class="ts_content">\n      <div class="ts_content_inner">\n', 3),
(4, 1, 'footer', 'Footer', '    </div> <!-- ends class="ts_content_inner" div -->\n  </div> <!-- ends class="ts_content" div -->\n</div> <!-- ends class="ts_page" div -->\n\n</body>\n</html>', 4),
(5, 1, 'form_page', 'Form Page', '<div id="content">\r\n  <table cellspacing="0" cellpadding="0" width="100%">\r\n  <tr>\r\n    <td width="180" valign="top">\r\n      <div id="left_nav">\r\n        {{navigation}}\r\n      </div>\r\n    </td>\r\n    <td valign="top">\r\n      <div style="width:740px">\r\n        <div class="title margin_bottom_large">{{$page_name}}</div>\r\n\r\n        {{error_message}}\r\n\r\n        <form action="{{$page_url}}" method="post" enctype="multipart/form-data"\r\n          id="ts_form_element_id" name="edit_submission_form">\r\n          <input type="hidden" id="form_tools_published_form_id" value="{{$published_form_id}}" />\r\n        {{foreach from=$grouped_fields key=k item=curr_group name=row}}\r\n          {{assign var=group value=$curr_group.group}}\r\n          {{assign var=fields value=$curr_group.fields}}\r\n\r\n        <a name="s{{$group.group_id}}"></a>\r\n        {{if $group.group_name}}\r\n        <div class="subtitle underline margin_bottom_large">{{$group.group_name|upper}}</div>\r\n        {{/if}}\r\n\r\n        {{if $fields|@count > 0}}\r\n        <table class="list_table margin_bottom_large" cellpadding="1" cellspacing="1" \r\n          border="0" width="688">\r\n        {{/if}}\r\n    \r\n        {{foreach from=$fields item=curr_field name=i}}\r\n          {{assign var=field_id value=$field.field_id}}\r\n          <tr>\r\n            <td width="180" valign="top" class="pad_left_small">\r\n              {{$curr_field.field_title}}\r\n              <span class="req">{{if $curr_field.is_required}}*{{/if}}</span>\r\n            </td>\r\n            <td valign="top" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>\r\n              {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types\r\n              settings=$settings submission_id=$submission_id}}\r\n            </td>\r\n          </tr>\r\n        {{/foreach}}\r\n\r\n        {{if $fields|@count > 0}}\r\n          </table>  \r\n        {{/if}}\r\n\r\n      {{/foreach}}\r\n\r\n      {{continue_block}}\r\n\r\n      </form>\r\n\r\n      </div>\r\n    </td>\r\n  </tr>\r\n  </table>\r\n</div>', 5),
(6, 1, 'review_page', 'Review Page', '{{navigation}}\n\n<h2>{{$review_page_title}}</h2>\n\n<form action="{{$page_url}}" method="post" enctype="multipart/form-data">\n{{foreach from=$grouped_fields item=curr_group}}\n  {{assign var=group value=$curr_group.group}}\n  {{assign var=fields value=$curr_group.fields}}\n\n  {{if $fields|@count > 0}}\n    <h3>\n      <a href="?page={{$group.custom_data}}#s{{$group.group_id}}">EDIT</a>\n      {{$group.group_name}}\n    </h3>\n  \n    <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="798">\n  {{/if}}\n\n  {{foreach from=$fields item=curr_field}}\n    {{assign var=field_id value=$field.field_id}}\n    <tr>\n      <td width="200" class="pad_left_small" valign="top">{{$curr_field.field_title}}</td>\n      <td class="answer" valign="top">\n        <div class="pad_left">\n        {{edit_custom_field form_id=$form_id submission_id=$submission_id\n          field_info=$curr_field field_types=$field_types settings=$settings}}\n        </div>\n      </td>\n    </tr>\n  {{/foreach}}\n\n  {{if $fields|@count > 0}}\n    </table>    \n  {{/if}}\n{{/foreach}}\n\n{{continue_block}}\n\n</form>\n', 6),
(7, 1, 'thankyou_page', 'Thankyou Page', '{{navigation}}\n\n{{$thankyou_page_content}}\n', 7),
(8, 1, 'form_offline_page', 'Form Offline Page', '{{$form_offline_page_content}}', 8),
(9, 1, 'continue_block', 'Continue - Button Only', '<div class="ts_continue_button">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n</div>', 9),
(10, 1, 'continue_block', 'Continue - Detailed', '<div class="ts_continue_block">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n  This is page <b>{{$current_page}}</b> of <b>{{$num_pages}}</b>. You must complete \n  all steps in order for your submission to be processed. Please click continue.\n</div>\n\n', 10),
(11, 1, 'navigation', 'Navigation - Simple', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n      <li><a href="?page={{$i}}">{{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n      <li class="css_nav_current_page">{{$page_info.page_name}}</li>\n    {{else}}\n      <li>{{$page_info.page_name}}</li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 11),
(12, 1, 'navigation', 'Navigation - Numbered', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n      <li><a href="{{$filename}}?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n      <li class="css_nav_current_page">{{$i}}. {{$page_info.page_name}}</li>\n    {{else}}\n      <li>{{$i}}. {{$page_info.page_name}}</li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 12),
(13, 1, 'navigation', 'No Navigation', '\n', 13),
(14, 1, 'error_message', 'Error Message', '{{if $validation_error}}\n  <div class="fb_error">{{$validation_error}}</div>\n{{/if}}\n\n', 14),
(15, 2, 'page_layout', 'Page Layout', '{{header}}\n{{page}}\n{{footer}}', 1),
(16, 2, 'header', 'Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  {{$required_resources}}\n  {{$R.styles}}\n  <script>\n  $(function() {\n    $("input,textarea,select").bind("focus", function() {\n      $(this).closest("form").find(".ts_field").removeClass("ts_field_row_selected");\n      $(this).closest(".ts_field").addClass("ts_field_row_selected");\n    });\n    $(":text:visible:enabled:first").focus();\n  });\n  </script>\n</head>\n<body>\n  <div class="ts_page" style="width:800px">\n    <div class="ts_content">\n', 2),
(17, 2, 'footer', 'Footer', '  </div> <!-- ends class="ts_content" div -->\n</div> <!-- ends class="ts_page" div -->\n\n</body>\n</html>', 3),
(18, 2, 'form_page', 'Form Page', '{{navigation}}\n\n{{form_builder_edit_link}}\n\n<h2>{{$page_name}}</h2>\n\n{{error_message}}\n\n<form action="{{$page_url}}" method="post" enctype="multipart/form-data" \n  id="ts_form_element_id" name="edit_submission_form">\n  <input type="hidden" id="form_tools_published_form_id" value="{{$published_form_id}}" />\n{{foreach from=$grouped_fields key=k item=curr_group name=row}}\n  {{assign var=group value=$curr_group.group}}\n  {{assign var=fields value=$curr_group.fields}}\n  \n  <a name="s{{$group.group_id}}"></a>\n  {{if $group.group_name}}\n    <h3>{{$group.group_name|upper}}</h3>\n  {{else}}\n    <br />\n  {{/if}}\n\n  {{foreach from=$fields item=curr_field}}\n    {{assign var=field_id value=$field.field_id}}\n\n    <ul class="ts_field">\n      <li class="ts_field_label">\n        {{$curr_field.field_title}}\n        <span class="req">{{if $curr_field.is_required}}*{{/if}}</span>\n      </li>\n      <li>\n        {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types\n          settings=$settings submission_id=$submission_id}}\n      </li>\n    </ul>\n  {{/foreach}}\n\n  {{if $fields|@count > 0}}\n    <br />\n  {{/if}}\n{{/foreach}}\n\n{{continue_block}}\n    \n</form>', 4),
(19, 2, 'review_page', 'Review Page', '{{navigation}}\n\n{{form_builder_edit_link}}\n\n<h2>{{$review_page_title}}</h2>\n\n<p>\n  Please review the information below to confirm it is correct. If you need to edit any\n  values, just click the EDIT link at the top right of the section.\n</p>\n\n<form action="{{$page_url}}" method="post" enctype="multipart/form-data">\n{{foreach from=$grouped_fields item=curr_group}}\n  {{assign var=group value=$curr_group.group}}\n  {{assign var=fields value=$curr_group.fields}}\n\n  {{if $fields|@count > 0}}\n  <h3><a href="?page={{$group.custom_data|default:1}}#s{{$group.group_id}}">EDIT</a>{{$group.group_name|upper}}</h3>\n \n    <table class="ts_review_table" cellpadding="0" cellspacing="0" border="0" width="100%">\n  {{/if}}\n\n  {{foreach from=$fields item=curr_field}}\n    {{assign var=field_id value=$field.field_id}}\n    <tr>\n      <td valign="top" width="200">{{$curr_field.field_title}}</td>\n      <td valign="top">\n        {{edit_custom_field form_id=$form_id submission_id=$submission_id\n          field_info=$curr_field field_types=$field_types settings=$settings}}\n      </td>\n    </tr>\n  {{/foreach}}\n\n  {{if $fields|@count > 0}}\n    </table>\n    \n    <br />\n  {{/if}}\n{{/foreach}}\n\n{{continue_block}}\n\n</form>\n', 5),
(20, 2, 'thankyou_page', 'Thankyou Page', '{{navigation}}\n\n{{form_builder_edit_link}}\n\n{{$thankyou_page_content}}\n', 6),
(21, 2, 'form_offline_page', 'Form Offline Page', '{{$form_offline_page_content}}', 7),
(22, 2, 'continue_block', 'Continue - Simple', '<div>\n  <input type="submit" name="form_tools_continue" value="Continue" />\n</div>', 8),
(23, 2, 'continue_block', 'Continue - Detailed', '<div class="ts_continue_block">\n  <input type="submit" value="Continue" name="form_tools_continue">  \n  This is page <b>{{$current_page}}</b> of <b>{{$num_pages}}</b>. You must complete all steps in order for your submission to be processed. Please click continue.\n</div>\n', 9),
(24, 2, 'navigation', 'Navigation - 1', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n      <li><a href="?page={{$i}}">{{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n      <li class="css_nav_current_page">{{$page_info.page_name}}</li>\n    {{else}}\n      <li>{{$page_info.page_name}}</li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 10),
(25, 2, 'navigation', 'Navigation - 2', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n      <li><a href="{{$filename}}?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n      <li class="css_nav_current_page">{{$i}}. {{$page_info.page_name}}</li>\n    {{else}}\n      <li>{{$i}}. {{$page_info.page_name}}</li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 11),
(26, 2, 'navigation', 'Navigation - 3', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n      <li><a href="{{$filename}}?page={{$i}}">&raquo; {{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n      <li class="css_nav_current_page">&raquo; {{$page_info.page_name}}</li>\n    {{else}}\n      <li>&raquo; {{$page_info.page_name}}</li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 12),
(27, 2, 'navigation', 'Navigation - None', '', 13),
(28, 2, 'error_message', 'Error Message', '{{if $validation_error}}\n  <div class="fb_error">{{$validation_error}}</div>\n{{/if}}\n', 14),
(29, 3, 'page_layout', 'Page Layout', '{{header}}\n{{page}}\n{{footer}}', 1),
(30, 3, 'header', 'Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  <link href="http://fonts.googleapis.com/css?family={{$P.font|regex_replace:''/[ ]/'':''+''}}" rel=''stylesheet'' type=''text/css''>  \n  {{$required_resources}}\n  {{$R.styles}}\n</head>\n<body>\n  <div class="ts_page" style="width:900px">\n    <div class="ts_header">\n      {{form_builder_edit_link}}\n      <h1>{{$form_name}}</h1>\n    </div>\n\n', 2),
(31, 3, 'header', 'No Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  {{$required_resources}}\n  {{$R.styles}}\n</head>\n<body>\n  <div class="ts_page" style="width:900px">\n\n', 3),
(32, 3, 'footer', 'Footer', '  <div class="ts_footer">{{$P.footer_html}}</div>\n</div> <!-- ends class="ts_page" div -->\n\n</body>\n</html>', 4),
(33, 3, 'form_page', 'Form Page', '{{navigation}}\n\n<div class="ts_content">\n  <div class="ts_content_inner">\n\n  <h2>{{$page_name}}</h2>\n\n  {{error_message}}\n\n  <form action="{{$page_url}}" method="post" enctype="multipart/form-data"\n    id="ts_form_element_id" name="edit_submission_form">\n    <input type="hidden" id="form_tools_published_form_id" value="{{$published_form_id}}" />\n  {{foreach from=$grouped_fields key=k item=curr_group name=row}}\n    {{assign var=group value=$curr_group.group}}\n    {{assign var=fields value=$curr_group.fields}}\n\n      <a name="s{{$group.group_id}}"></a>\n    {{if $group.group_name}}\n      <h3>{{$group.group_name}}</h3>\n    {{else}}\n      <br />\n    {{/if}}\n\n    {{if $fields|@count > 0}}\n    <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="798">\n    {{/if}}\n    \n    {{foreach from=$fields item=curr_field}}\n      {{assign var=field_id value=$field.field_id}}\n      <tr>\n        <td width="180" valign="top">\n          {{$curr_field.field_title}}\n          <span class="req">{{if $curr_field.is_required}}*{{/if}}</span>\n        </td>\n        <td class="answer" valign="top">\n          <div class="pad_left">\n          {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types\n            settings=$settings submission_id=$submission_id}}\n          </div>\n        </td>\n      </tr>\n    {{/foreach}}\n\n    {{if $fields|@count > 0}}\n      </table>  \n    {{/if}}\n\n  {{/foreach}}\n\n  {{continue_block}}\n\n  </form>\n    \n  </div>\n</div>\n', 5),
(34, 3, 'review_page', 'Review Page', '{{navigation}}\n\n<div class="ts_content">\n  <div class="ts_content_inner">\n\n  <h2>{{$review_page_title}}</h2>\n\n  <form action="{{$page_url}}" method="post" enctype="multipart/form-data">\n  {{foreach from=$grouped_fields item=curr_group}}\n    {{assign var=group value=$curr_group.group}}\n    {{assign var=fields value=$curr_group.fields}}\n\n    {{if $fields|@count > 0}}\n      <h3>\n        <a href="?page={{$group.custom_data}}#s{{$group.group_id}}">EDIT</a>\n        {{$group.group_name}}\n      </h3>\n  \n      <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="798">\n    {{/if}}\n\n    {{foreach from=$fields item=curr_field}}\n      {{assign var=field_id value=$field.field_id}}\n      <tr>\n        <td width="200" class="pad_left_small" valign="top">{{$curr_field.field_title}}</td>\n        <td class="answer" valign="top">\n          <div class="pad_left">\n          {{edit_custom_field form_id=$form_id submission_id=$submission_id\n            field_info=$curr_field field_types=$field_types settings=$settings}}\n          </div>\n        </td>\n      </tr>\n    {{/foreach}}\n\n    {{if $fields|@count > 0}}\n      </table>    \n    {{/if}}\n  {{/foreach}}\n\n  {{continue_block}}\n\n  </form>\n\n  </div>\n</div>\n\n', 6),
(35, 3, 'thankyou_page', 'Thankyou Page', '{{navigation}}\n\n<div class="ts_content">\n  <div class="ts_content_inner">\n    {{$thankyou_page_content}}\n  </div>\n</div>\n', 7),
(36, 3, 'form_offline_page', 'Form Offline Page', '<div class="ts_content">\n  <div class="ts_content_inner">\n    {{$form_offline_page_content}}\n  </div>\n</div>\n', 8),
(37, 3, 'continue_block', 'Continue - Button Only', '<div class="ts_continue_button">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n</div>', 9),
(38, 3, 'continue_block', 'Continue - Detailed', '<div class="ts_continue_block">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n  This is page <b>{{$current_page}}</b> of <b>{{$num_pages}}</b>. You must complete \n  all steps in order for your submission to be processed. Please click continue.\n</div>\n\n', 10),
(39, 3, 'navigation', 'Navigation - Arrows', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{assign var=a value=" ', 11),
(40, 3, 'navigation', 'Navigation - Numbered', '<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n      <li class="completed_page"><a href="{{$filename}}?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>\n    {{elseif $i != $current_page && $current_page == $num_pages}}\n      <li class="completed_page"><span>{{$i}}. {{$page_info.page_name}}</span></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n      <li class="css_nav_current_page">{{$i}}. {{$page_info.page_name}}</li>\n    {{else}}\n      <li>{{$i}}. {{$page_info.page_name}}</li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 12),
(41, 3, 'navigation', 'No Navigation', '<ul id="css_nav">\n  <li><span></span></li>\n</ul>', 13),
(42, 3, 'error_message', 'Error Message', '{{if $validation_error}}\n  <div class="fb_error">{{$validation_error}}</div>\n{{/if}}\n\n', 14),
(43, 4, 'page_layout', 'Page Layout', '{{header}}\n{{page}}\n{{footer}}', 1),
(44, 4, 'header', 'Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  {{$required_resources}}\n  <link href="http://fonts.googleapis.com/css?family=Trykker" rel="stylesheet" type="text/css">\n  {{$R.styles}}\n</head>\n<body>\n  <div class="ts_head_bg"></div>\n  <div class="ts_page" style="width:960px">\n    <div class="ts_header"><h1>{{$form_name}}</h1></div>\n    {{form_builder_edit_link}}\n\n    <div class="ts_content">\n      \n\n', 2),
(45, 4, 'header', 'No Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  {{$required_resources}}\n  <link href="http://fonts.googleapis.com/css?family=Trykker" rel="stylesheet" type="text/css">\n  {{$R.styles}}\n</head>\n<body>\n  <div class="ts_page" style="width:960px">\n    {{form_builder_edit_link}}\n    <div class="ts_content">', 3),
(46, 4, 'footer', 'Footer', '<div class="clear"></div>\n\n  </div> <!-- ends class="ts_content" div -->\n</div> <!-- ends class="ts_page" div -->\n\n<div id="ts_footer">{{$P.footer_html}}</div>\n\n</body>\n</html>', 4),
(47, 4, 'form_page', 'Form Page', '{{navigation}}\n\n<div class="ts_page_content">\n\n<h2>{{$page_name}}</h2>\n\n{{error_message}}\n\n<form action="{{$page_url}}" method="post" enctype="multipart/form-data"\n  id="ts_form_element_id" name="edit_submission_form">\n  <input type="hidden" id="form_tools_published_form_id" value="{{$published_form_id}}" />\n{{foreach from=$grouped_fields key=k item=curr_group name=row}}\n  {{assign var=group value=$curr_group.group}}\n  {{assign var=fields value=$curr_group.fields}}\n\n  <a name="s{{$group.group_id}}"></a>\n  <fieldset>\n  {{if $group.group_name}}\n    <legend>{{$group.group_name}}</legend>\n  {{/if}}\n\n  {{if $fields|@count > 0}}\n  <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="688">\n  {{/if}}\n    \n  {{foreach from=$fields item=curr_field name=i}}\n    {{assign var=field_id value=$field.field_id}}\n    <tr>\n      <td width="180" valign="top" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>\n        {{$curr_field.field_title}}\n        <span class="req">{{if $curr_field.is_required}}*{{/if}}</span>\n      </td>\n      <td valign="top" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>\n        {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types\n          settings=$settings submission_id=$submission_id}}\n      </td>\n    </tr>\n  {{/foreach}}\n\n  {{if $fields|@count > 0}}\n    </table>  \n  {{/if}}\n\n  </fieldset>\n\n{{/foreach}}\n\n{{continue_block}}\n\n</form>\n  \n</div>\n', 5),
(48, 4, 'review_page', 'Review Page', '{{navigation}}\n\n<div class="ts_page_content">\n\n<h2>{{$review_page_title}}</h2>\n\n<form action="{{$page_url}}" method="post" enctype="multipart/form-data">\n{{foreach from=$grouped_fields item=curr_group}}\n  {{assign var=group value=$curr_group.group}}\n  {{assign var=fields value=$curr_group.fields}}\n\n  <fieldset>\n  {{if $fields|@count > 0}}\n    <legend>{{$group.group_name}} <span class="edit_link">(<a \n      href="?page={{$group.custom_data}}#s{{$group.group_id}}">EDIT</a>)</span>\n    </legend>\n\n    <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="668">\n  {{/if}}\n\n  {{foreach from=$fields item=curr_field name=i}}\n    {{assign var=field_id value=$field.field_id}}\n    <tr>\n      <td width="200" valign="top" \n        {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>{{$curr_field.field_title}}</td>\n      <td valign="top" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>\n        {{edit_custom_field form_id=$form_id submission_id=$submission_id\n          field_info=$curr_field field_types=$field_types settings=$settings}}\n      </td>\n    </tr>\n  {{/foreach}}\n\n  {{if $fields|@count > 0}}\n    </table>    \n  {{/if}}\n  </fieldset>\n\n{{/foreach}}\n\n{{continue_block}}\n\n</form>\n  \n</div>\n\n', 6),
(49, 4, 'thankyou_page', 'Thankyou Page', '{{navigation}}\n\n<div class="ts_page_content">\n{{$thankyou_page_content}}  \n</div>\n', 7),
(50, 4, 'form_offline_page', 'Form Offline Page', '{{$form_offline_page_content}}', 8),
(51, 4, 'continue_block', 'Continue - Button Only', '<div class="ts_continue_button">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n</div>', 9),
(52, 4, 'navigation', 'Navigation', '{{if $current_page == $num_pages}}\n\n<ul id="ts_css_nav">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $i != $num_pages}}\n  <li class="completed_page"><div>&raquo; {{$page_info.page_name}}</div></li>\n    {{else}}\n  <li class="css_nav_current_page"><div>&raquo; {{$page_info.page_name}}</div></li>\n    {{/if}}\n  {{/foreach}}\n</ul>\n\n{{else}}\n\n<ul id="ts_css_nav">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n  <li class="completed_page"><a href="?page={{$i}}">&raquo; {{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n  <li class="css_nav_current_page"><div>&raquo; {{$page_info.page_name}}</div></li>\n    {{else}}\n  <li><div>&raquo; {{$page_info.page_name}}</div></li>\n    {{/if}}\n  {{/foreach}}\n</ul>\n\n{{/if}}\n\n', 10),
(53, 4, 'navigation', 'Navigation - Numbered', '<ul id="ts_css_nav">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n  <li class="completed_page"><a href="?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i || $current_page == $num_pages}}\n  <li class="css_nav_current_page"><div>{{$i}}. {{$page_info.page_name}}</div></li>\n    {{else}}\n  <li><div>{{$i}}. {{$page_info.page_name}}</div></li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 11),
(54, 4, 'error_message', 'Error Message', '{{if $validation_error}}\n  <div class="fb_error">{{$validation_error}}</div>\n{{/if}}\n\n', 12),
(55, 5, 'page_layout', 'Page Layout', '{{header}}\n{{page}}\n{{footer}}', 1),
(56, 5, 'header', 'Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/global/css/main.css">\n  {{$required_resources}}\n  {{$R.styles}}\n  <link href=''http://fonts.googleapis.com/css?family=Lato'' rel=''stylesheet'' type=''text/css''>\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/themes/default/css/styles.css">\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/themes/default/css/swatch_{{$P.swatch|lower|regex_replace:''/[ ]/'':''_''}}.css">\n</head>\n<body>\n  <div id="container">\n    <div id="header">\n      {{form_builder_edit_link}}\n      <h1>{{$form_name|upper}}</h1>\n    </div>\n\n', 2),
(57, 5, 'header', 'No Header', '<html>\n<head>\n  <title>{{$form_name}}</title>\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/global/css/main.css">\n  {{$required_resources}}\n  {{$R.styles}}\n  <link href=''http://fonts.googleapis.com/css?family=Lato'' rel=''stylesheet'' type=''text/css''>\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/themes/default/css/styles.css">\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/themes/default/css/swatch_{{$P.swatch|lower|regex_replace:''/[ ]/'':''_''}}.css">\n</head>\n<body>\n  <div id="container">\n      {{form_builder_edit_link}}\n', 3),
(58, 5, 'footer', 'Footer', '      </div>\n    </td>\n  </tr>\n  </table>\n\n</div>\n\n</body>\n</html>', 4),
(59, 5, 'form_page', 'Form Page', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/form-page.tpl"}}\r\n', 5),
(60, 5, 'review_page', 'Review Page', '<div id="content">\n  <table cellspacing="0" cellpadding="0" width="100%">\n  <tr>\n    <td width="180" valign="top">\n      <div id="left_nav">\n        {{navigation}}\n      </div>\n    </td>\n    <td valign="top">\n      <div style="width:740px">\n        <div class="title margin_bottom_large">{{$review_page_title}}</div>\n\n        <form action="{{$page_url}}" method="post" enctype="multipart/form-data">\n        {{foreach from=$grouped_fields item=curr_group}}\n          {{assign var=group value=$curr_group.group}}\n          {{assign var=fields value=$curr_group.fields}}\n\n          {{if $fields|@count > 0}}\n            <div class="subtitle underline margin_bottom_large">\n              {{$group.group_name|upper|default:"&nbsp;"}}\n              <span class="edit_link">\n                <a href="?page={{$group.custom_data}}#s{{$group.group_id}}">EDIT</a>\n              </span>\n            </div>\n\n            <table class="list_table margin_bottom_large" cellpadding="1" cellspacing="1" \n              border="0" width="668">\n          {{/if}}\n\n          {{foreach from=$fields item=curr_field name=i}}\n            {{assign var=field_id value=$field.field_id}}\n            <tr>\n              <td class="pad_left_small" width="200" valign="top">{{$curr_field.field_title}}</td>\n              <td valign="top">\n                {{edit_custom_field form_id=$form_id submission_id=$submission_id\n                  field_info=$curr_field field_types=$field_types settings=$settings}}\n              </td>\n            </tr>\n          {{/foreach}}\n\n          {{if $fields|@count > 0}}\n            </table>    \n          {{/if}}\n \n        {{/foreach}}\n\n        {{continue_block}}\n\n      </form>\n\n      </div>\n    </td>\n  </tr>\n  </table>\n</div>\n', 6),
(61, 5, 'thankyou_page', 'Thankyou Page', '<div id="content">\n  <table cellspacing="0" cellpadding="0" width="100%">\n  <tr>\n    <td width="180" valign="top">\n      <div id="left_nav">\n        {{navigation}}\n      </div>\n    </td>\n    <td valign="top">\n      <div style="width:740px">\n      {{$thankyou_page_content}} \n      </div>\n    </td>\n  </tr>\n  </table>\n</div>\n\n', 7),
(62, 5, 'form_offline_page', 'Form Offline Page', '<div id="content">\n  {{$form_offline_page_content}}\n</div>', 8),
(63, 5, 'continue_block', 'Continue - Button Only', '<div class="ts_continue_button">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n</div>', 9),
(64, 5, 'navigation', 'Navigation', '<ul id="ts_css_nav">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n  \n  {{if $current_page > $i && $current_page != $num_pages}}\n  \n  <li class="nav_link_submenu completed_page"><a href="?page={{$i}}">{{$page_info.page_name}}</a></li>\n  \n  {{elseif $current_page == $i}}\n  \n  <li class="css_nav_current_page"><div>{{$page_info.page_name}}</div></li>\n    {{else}}\n  <li><div>{{$page_info.page_name}}</div></li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 10),
(65, 5, 'navigation', 'Navigation - Numbered', '<ul id="ts_css_nav">\n  {{foreach from=$nav_pages item=page_info name=row}}\n    {{assign var=i value=$smarty.foreach.row.iteration}}\n    {{if $current_page > $i && $current_page != $num_pages}}\n    <li class="nav_link_submenu completed_page"><a href="?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>\n    {{elseif $current_page == $i}}\n    <li class="css_nav_current_page"><div>{{$i}}. {{$page_info.page_name}}</div></li>\n    {{else}}\n    <li><div>{{$i}}. {{$page_info.page_name}}</div></li>\n    {{/if}}\n  {{/foreach}}\n</ul>', 11),
(66, 5, 'error_message', 'Error Message', '{{if $validation_error}}\n  <div class="ft_message error margin_bottom_large">\n    <div style="padding:8px">\n      {{$validation_error}}\n    </div>\n  </div>\n{{/if}}\n\n', 12),
(67, 6, 'page_layout', 'Page Layout', '{{header}}\n{{page}}\n{{footer}}', 1),
(68, 6, 'header', 'Header', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html dir="ltr">\n<head>\n  <title>{{$form_name}}</title>\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/global/css/main.css">\n  {{$required_resources}}\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/global/css/main.css">\n  <link type="text/css" rel="stylesheet" href="{{$g_root_url}}/themes/classicgrey/css/styles.css">  \n  {{$R.styles}}\n</head>\n<body>\n<div id="container">\n  <div id="header">\n    {{form_builder_edit_link}}\n    <h1>{{$form_name}}</h1>\n  </div>\n  <div id="header_row">\n    <div id="left_nav_top">\n    <div style="height: 20px"> </div>\n    </div>\n  </div>\n\n  <div class="outer">\n    <div class="inner">\n      <div class="float-wrap">\n      <div id="content">\n        <div class="content_wrap">\n          <div id="main_window">\n            <div id="page_content">\n\n', 2),
(69, 6, 'footer', 'Footer', '              </div>\n            </div>\n          </div>\n        </div>\n        <div id="left" class="pad_top_large">\n          {{navigation}}\n        </div>\n      </div>\n      <div class="clear"></div>\n    </div>\n  </div>\n</div>\n\n</body>\n</html>', 3),
(70, 6, 'form_page', 'Form Page', '        <div class="title margin_bottom_large">{{$page_name}}</div>\n\n        {{error_message}}\n\n        <form action="{{$page_url}}" method="post" enctype="multipart/form-data"\n          id="ts_form_element_id" name="edit_submission_form">\n          <input type="hidden" id="form_tools_published_form_id" value="{{$published_form_id}}" />\n        {{foreach from=$grouped_fields key=k item=curr_group name=row}}\n          {{assign var=group value=$curr_group.group}}\n          {{assign var=fields value=$curr_group.fields}}\n\n        <a name="s{{$group.group_id}}"></a>\n        {{if $group.group_name}}\n        <div class="subtitle underline margin_bottom_large">{{$group.group_name|upper}}</div>\n        {{/if}}\n\n        {{if $fields|@count > 0}}\n        <table class="list_table margin_bottom_large" cellpadding="1" cellspacing="1" \n          border="0" width="688">\n        {{/if}}\n    \n        {{foreach from=$fields item=curr_field name=i}}\n          {{assign var=field_id value=$field.field_id}}\n          <tr>\n            <td width="180" valign="top" class="pad_left_small">\n              {{$curr_field.field_title}}\n              <span class="req">{{if $curr_field.is_required}}*{{/if}}</span>\n            </td>\n            <td valign="top" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>\n              {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types\n              settings=$settings submission_id=$submission_id}}\n            </td>\n          </tr>\n        {{/foreach}}\n\n        {{if $fields|@count > 0}}\n          </table>  \n        {{/if}}\n\n      {{/foreach}}\n\n      {{continue_block}}\n\n      </form>\n\n\n', 4),
(71, 6, 'review_page', 'Review Page', '<div class="title margin_bottom_large">{{$review_page_title}}</div>\n\n<form action="{{$page_url}}" method="post" enctype="multipart/form-data">\n  {{foreach from=$grouped_fields item=curr_group}}\n    {{assign var=group value=$curr_group.group}}\n    {{assign var=fields value=$curr_group.fields}}\n\n    {{if $fields|@count > 0}}\n      <div class="subtitle underline margin_bottom_large">\n        {{$group.group_name|upper|default:"&nbsp;"}} \n        <span class="edit_link">\n          <a href="?page={{$group.custom_data}}#s{{$group.group_id}}">EDIT</a>\n        </span>\n      </div>\n\n      <table class="list_table margin_bottom_large" cellpadding="1" cellspacing="1" \n        border="0" width="668">\n    {{/if}}\n\n    {{foreach from=$fields item=curr_field name=i}}\n      {{assign var=field_id value=$field.field_id}}\n      <tr>\n        <td class="pad_left_small" width="200" valign="top">{{$curr_field.field_title}}</td>\n        <td valign="top">\n          {{edit_custom_field form_id=$form_id submission_id=$submission_id\n            field_info=$curr_field field_types=$field_types settings=$settings}}\n        </td>\n      </tr>\n    {{/foreach}}\n\n    {{if $fields|@count > 0}}\n      </table>    \n    {{/if}}\n \n  {{/foreach}}\n\n  {{continue_block}}\n\n</form>\n', 5),
(72, 6, 'thankyou_page', 'Thankyou Page', '{{$thankyou_page_content}} \n\n', 6),
(73, 6, 'form_offline_page', 'Form Offline Page', '{{$form_offline_page_content}}', 7),
(74, 6, 'continue_block', 'Continue - Button Only', '<div class="ts_continue_button">\n  <input type="submit" name="form_tools_continue" value="Continue" />\n</div>', 8),
(75, 6, 'navigation', 'Navigation', '{{if $page_type != "form_offline_page"}}\n  <ul id="ts_css_nav">\n    {{foreach from=$nav_pages item=page_info name=row}}\n      {{assign var=i value=$smarty.foreach.row.iteration}}\n \n      {{if $current_page > $i && $current_page != $num_pages}}\n        <li class="nav_link_submenu completed_page"><a \n          href="?page={{$i}}">{{$page_info.page_name}}</a></li>\n      {{elseif $current_page == $i}}\n        <li class="css_nav_current_page"><div>{{$page_info.page_name}}</div></li>\n      {{else}}\n        <li><div>{{$page_info.page_name}}</div></li>\n      {{/if}}\n    {{/foreach}}\n  </ul>\n{{/if}}\n', 9),
(76, 6, 'navigation', 'Navigation - Numbered', '{{if $page_type != "form_offline_page"}}\n  <ul id="ts_css_nav">\n    {{foreach from=$nav_pages item=page_info name=row}}\n      {{assign var=i value=$smarty.foreach.row.iteration}}\n \n      {{if $current_page > $i && $current_page != $num_pages}}\n        <li class="nav_link_submenu completed_page"><a\n          href="?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>\n      {{elseif $current_page == $i}}\n        <li class="css_nav_current_page"><div>{{$i}}. {{$page_info.page_name}}</div></li>\n      {{else}}\n        <li><div>{{$i}}. {{$page_info.page_name}}</div></li>\n      {{/if}}\n    {{/foreach}}\n  </ul>\n{{/if}}', 10),
(77, 6, 'error_message', 'Error Message', '{{if $validation_error}}\n  <div class="ft_message error margin_bottom_large">\n    <div style="padding:8px">\n      {{$validation_error}}\n    </div>\n  </div>\n{{/if}}\n\n', 11),
(78, 7, 'header', 'Header', 'Soy un header', 1),
(79, 8, 'page_layout', 'Base', '{{header}}\r\n{{page}}\r\n{{footer}}', 1),
(80, 8, 'header', 'Header: Logo + texto', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/header.tpl" headerLogo=true headerContent=true headerText=true}}', 2),
(82, 8, 'header', 'Solo texto', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/header.tpl" headerLogo=false headerContent=true headerText=true}}', 3),
(83, 8, 'header', 'Solo logo', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/header.tpl" headerLogo=true headerContent=true headerText=false}}', 4),
(84, 8, 'header', 'Sin header', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/header.tpl" headerLogo=false headerContent=false headerText=false}}', 5),
(85, 8, 'form_page', 'Form Page', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/form-page.tpl"}}', 6),
(86, 8, 'error_message', 'Error Message', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/block-error.tpl"}}', 8),
(87, 8, 'continue_block', 'Continue Block', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/block-continue.tpl"}}', 9),
(88, 8, 'navigation', 'Navigation', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/block-navigation.tpl"}}', 10),
(89, 8, 'footer', 'Footer: Logo + Texto', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/footer.tpl" footerLogo=true footerContent=true footerText=true}}', 11),
(90, 8, 'review_page', 'Review Page', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/review_page.tpl"}}', 12),
(91, 8, 'thankyou_page', 'Thankyou Page', '{{include file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/thankyou_page.tpl"}}', 13),
(92, 8, 'form_offline_page', 'Form Offline', '', 14),
(93, 8, 'form_page', 'Login Form Page', '{{include isLoginForm=true file="$g_root_dir/modules/gflacso_graduados/templates/template_sets/form-page.tpl"}}', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_template_sets`
--

CREATE TABLE `ft_module_form_builder_template_sets` (
  `set_id` mediumint(8) UNSIGNED NOT NULL,
  `set_name` varchar(255) NOT NULL,
  `version` varchar(20) NOT NULL,
  `description` mediumtext,
  `is_complete` enum('yes','no') NOT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_template_sets`
--

INSERT INTO `ft_module_form_builder_template_sets` (`set_id`, `set_name`, `version`, `description`, `is_complete`, `list_order`) VALUES
(1, 'Default Template Set', '1.1', 'A neutral, grey-themed set of templates that lets you choose a highlight colour to match your site. ', 'yes', 1),
(2, 'ProSimple', '1.2', 'A simple, professional-looking and attractive grey-themed Template Set without a header. It contains placeholders to let you choose the highlight colour, font and font size. Labels are placed directly above the fields to provide clear identification.', 'yes', 2),
(3, 'Conformist', '1.2', 'A clean blue Template Set with delicate CSS3 gradients and tab-like, top-row page navigation.', 'yes', 3),
(4, 'Illuminate', '1.1', 'A bold, bright-coloured theme with choice of colour set and footer content. Navigation is required and displayed as a left column. Uses the "Trykker" Google Web Font for a little extra snap!', 'yes', 4),
(5, 'Theme - Default', '1.1', 'A form template set based on the same styles as the default Form Tools user interface. Complete with choice of swatches!', 'yes', 5),
(6, 'Theme - Classic Grey', '1.1', 'A form template set based on the same styles as the default Form Tools user interface. Complete with choice of swatches!', 'yes', 6),
(7, 'Prueba', '1.0', NULL, 'no', 7),
(8, 'Flacso Posgrados', '1.0', NULL, 'yes', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_template_set_placeholders`
--

CREATE TABLE `ft_module_form_builder_template_set_placeholders` (
  `placeholder_id` mediumint(8) UNSIGNED NOT NULL,
  `set_id` mediumint(9) NOT NULL,
  `placeholder_label` varchar(255) NOT NULL,
  `placeholder` varchar(255) NOT NULL,
  `field_type` enum('textbox','textarea','password','radios','checkboxes','select','multi-select') NOT NULL,
  `field_orientation` enum('horizontal','vertical','na') NOT NULL,
  `default_value` varchar(255) DEFAULT NULL,
  `field_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_template_set_placeholders`
--

INSERT INTO `ft_module_form_builder_template_set_placeholders` (`placeholder_id`, `set_id`, `placeholder_label`, `placeholder`, `field_type`, `field_orientation`, `default_value`, `field_order`) VALUES
(1, 1, 'Highlight Colours', 'colours', 'select', 'na', 'Blue-Grey', 1),
(2, 2, 'Colour Palette', 'colours', 'select', 'na', 'Green', 1),
(3, 2, 'Font', 'font', 'select', 'na', 'Verdana', 2),
(4, 2, 'Font Size', 'font_size', 'select', 'na', '9pt', 3),
(5, 3, 'Title Font', 'font', 'select', 'na', 'Italianno', 1),
(6, 3, 'Title Font Size', 'font_size', 'select', 'na', '44px', 2),
(7, 4, 'Colours', 'colours', 'select', 'na', 'Orange', 1),
(8, 4, 'Footer HTML', 'footer_html', 'textarea', 'horizontal', '', 2),
(9, 5, 'Swatch', 'swatch', 'select', 'na', 'Orange', 1),
(10, 8, 'Combinacion Colores', 'customColors', 'select', 'na', 'Azul', 1),
(11, 8, 'Texto header', 'header_texto', 'textarea', 'horizontal', '', 2),
(12, 8, 'Texto footer', 'footer_texto', 'textarea', 'horizontal', '', 3),
(13, 8, 'Fuente', 'font_type', 'select', 'na', '', 4),
(14, 8, 'Tamaño fuente Header', 'headerFontSize', 'select', 'na', '14px 11px', 5),
(15, 8, 'Imagen Header', 'imagen_header', 'select', 'na', '', 6),
(16, 8, 'Texto final Resetar contraseña', 'ResetPasswordText', 'textarea', 'horizontal', '', 7),
(17, 8, 'Texto final cambiar contraseña', 'ChangePasswordText', 'textarea', 'horizontal', '', 8),
(18, 8, 'Texto final nueva cuenta', 'NewAccountText', 'textarea', 'horizontal', '', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_template_set_placeholder_opts`
--

CREATE TABLE `ft_module_form_builder_template_set_placeholder_opts` (
  `placeholder_id` mediumint(9) NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `field_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_template_set_placeholder_opts`
--

INSERT INTO `ft_module_form_builder_template_set_placeholder_opts` (`placeholder_id`, `option_text`, `field_order`) VALUES
(1, 'Red', 1),
(1, 'Orange', 2),
(1, 'Yellow', 3),
(1, 'Green', 4),
(1, 'Blue', 5),
(1, 'Blue-Grey', 6),
(1, 'Grey', 7),
(2, 'Blue', 1),
(2, 'Green', 2),
(2, 'Orange', 3),
(2, 'Purple', 4),
(3, 'Arial', 1),
(3, 'Georgia, Verdana', 2),
(3, '"Lucida Grande","Lucida Sans Unicode", Tahoma, sans-serif', 3),
(3, 'Tahoma', 4),
(3, 'Verdana', 5),
(4, '8pt', 1),
(4, '9pt', 2),
(4, '10pt', 3),
(4, '11pt', 4),
(4, '12pt', 5),
(5, 'Aladin', 1),
(5, 'Alegreya SC', 2),
(5, 'Alike Angular', 3),
(5, 'Almendra SC', 4),
(5, 'Chango', 5),
(5, 'Fredericka the Great', 6),
(5, 'Frijole', 7),
(5, 'Gudea', 8),
(5, 'Italianno', 9),
(5, 'Jim Nightshade', 10),
(5, 'Lustria', 11),
(5, 'Miss Fajardose', 12),
(5, 'Montez', 13),
(5, 'Telex', 14),
(5, 'Yesteryear', 15),
(6, '20px', 1),
(6, '22px', 2),
(6, '24px', 3),
(6, '26px', 4),
(6, '28px', 5),
(6, '30px', 6),
(6, '32px', 7),
(6, '34px', 8),
(6, '36px', 9),
(6, '38px', 10),
(6, '40px', 11),
(6, '42px', 12),
(6, '44px', 13),
(6, '46px', 14),
(6, '48px', 15),
(6, '50px', 16),
(6, '52px', 17),
(6, '54px', 18),
(6, '56px', 19),
(6, '58px', 20),
(6, '60px', 21),
(7, 'Red', 1),
(7, 'Orange', 2),
(7, 'Green', 3),
(7, 'Blue', 4),
(7, 'Black', 5),
(7, 'Grey', 6),
(7, 'White', 7),
(9, 'Aquamarine', 1),
(9, 'Blue', 2),
(9, 'Dark Blue', 3),
(9, 'Green', 4),
(9, 'Grey', 5),
(9, 'Light Brown', 6),
(9, 'Orange', 7),
(9, 'Purple', 8),
(9, 'Red', 9),
(9, 'Yellow', 10),
(10, 'Azul', 1),
(10, 'Celeste', 2),
(10, 'Magenta', 3),
(10, 'Naranja', 4),
(13, 'Helvetica Neue', 1),
(13, 'Open Sans', 2),
(13, 'Roboto', 3),
(14, '14px 11px', 1),
(14, '18px 14px', 2),
(14, '22px 16px', 3),
(15, 'Logo Institucional', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_form_builder_template_set_resources`
--

CREATE TABLE `ft_module_form_builder_template_set_resources` (
  `resource_id` mediumint(8) UNSIGNED NOT NULL,
  `resource_type` enum('css','js') NOT NULL,
  `template_set_id` mediumint(8) UNSIGNED NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `placeholder` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `last_updated` datetime NOT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_form_builder_template_set_resources`
--

INSERT INTO `ft_module_form_builder_template_set_resources` (`resource_id`, `resource_type`, `template_set_id`, `resource_name`, `placeholder`, `content`, `last_updated`, `list_order`) VALUES
(1, 'css', 1, 'General Styles', 'styles', 'body {\n  text-align: center;\n  padding: 0px;\n  margin: 0px;\n  background-color: #efefef;\n}\ntd, th, p, input, textarea, select,ul,li,div, span {\n  font-family: "Lucida Grande","Lucida Sans Unicode", Tahoma, sans-serif;\n  font-size: 12px;\n  color: #555555;\n}\ntd, th, p, textarea, ul,li, div {\n  line-height: 22px;\n}\na:link, a:visited {\n  color: #336699;\n}\ntable {\n  empty-cells: show;\n}\n\n/* page sections */\n.ts_page:after {\n  -moz-transform: translate(0pt, 0pt);\n  background: none repeat scroll 0 0 transparent;\n  border-radius: 20px 20px 20px 20px;\n  box-shadow: 15px 0 30px rgba(0, 0, 0, 0.2);\n  content: "";\n  left: 0;\n  position: absolute;\n  width: 100%;\n  z-index: -2;\n}\n.ts_page {\n  margin: 40px auto;\n  position: relative;\n  text-align: left;\n}\n.ts_header {\n  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);\n  border: 3px solid #CCCCCC;\n  height: 140px;\n  background: #3a3a3a; /* Old browsers */\n  background: -moz-linear-gradient(45deg,  #777777 0%, #999999 100%); /* FF3.6+ */\n  background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#777777), color-stop(100%,#999999)); /* Chrome,Safari4+ */\n  background: -webkit-linear-gradient(45deg,  #777777 0%,#999999 100%); /* Chrome10+,Safari5.1+ */\n  background: -o-linear-gradient(45deg,  #777777 0%,#999999 100%); /* Opera 11.10+ */\n  background: -ms-linear-gradient(45deg,  #777777 0%,#999999 100%); /* IE10+ */\n  background: linear-gradient(45deg,  #777777 0%,#999999 100%); /* W3C */\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#777777'', endColorstr=''#999999'',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */\n  box-shadow: 0 1px 12px rgba(0, 0, 0, 0.1);\n}\n.ts_header h1 {\n  margin: 56px 50px;\n  padding: 0px;\n  font-size: 20px;\n  color: white;\n}\n.ts_content {\n  background-color: white;\n  border: 1px solid #CCCCCC;\n  box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);\n  padding: 25px 50px;\n}\n.ts_continue_block {\n  margin-top: 16px;\n  background-color: #ffffdd;\n  padding: 8px;\n  box-shadow:1px 2px 2px #878787;\n}\n.ts_continue_block input {\n  float: right;\n}\n.ts_continue_button {\n  margin-top: 12px;\n}\n.highlighted_cell {\n  color: #990000;\n  background-color: #ffffee;\n  text-align: center;\n}\n.light_grey {\n  color: #999999;\n}\nh2 {\n  font-size: 24px;\n}\nh3 {\n  border-top-left-radius: 4px;\n  border-top-right-radius: 4px;\n  -webkit-border-top-left-radius: 4px;\n  -webkit-border-top-right-radius: 4px;\n  -moz-border-radius-topleft: 4px;\n  -moz-border-radius-topright: 4px;\n  font-size: 12px;\n  font-weight: normal;\n  margin-bottom: 0;\n  margin-right: 1px;\n  padding: 1px 0 0 5px;\n  width: 792px;\n  height: 22px;\n}\nh3 a:link, h3 a:visited {\n  background-color: white;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n  color: black;\n  float: right;\n  line-height: 17px;\n  margin-right: 3px;\n  margin-top: 2px;\n  padding: 0 8px;\n  text-decoration: none;\n}\nh3 a:hover {\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\n\n/* navigation */\nul#css_nav {\n  clear: both;\n  width:100%;\n  margin: 0px;\n  padding: 0px;\n  overflow: hidden;\n}\nul#css_nav li {\n  float: left;\n  background-color: #efefef;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n  list-style: none;\n  text-align:center;\n  margin: 0px 2px 20px 0px;\n  color: #666666;\n  font-size: 11px;\n  line-height: 20px;\n}\nul#css_nav li span {\n  font-size: 11px;\n  line-height: 20px;\n}\n\nul#css_nav li.css_nav_current_page {\n  background-color: #999999;\n  color: white;\n}\nul#css_nav li a:link, ul#css_nav li a:visited {\n  display: block;\n  text-decoration: none;\n  color: white;\n  background-color: #999999;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\nul#css_nav li a:hover {\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\n.nav_1_pages li {\n  width: 100%;\n}\n.nav_2_pages li {\n  width: 49.7%;\n}\n.nav_3_pages li {\n  width: 33%;\n}\n.nav_4_pages li {\n  width: 24.7%;\n}\n.nav_5_pages li {\n  width: 19.7%;\n}\n.nav_6_pages li {\n  width: 16.4%;\n}\n.nav_7_pages li {\n  width: 14%;\n}\n.nav_8_pages li {\n  width: 12.2%;\n}\n\n/* notifications */\n.notify {\n  border: 1px solid #336699;\n  background-color: #ffffee;\n  color: #336699;\n  padding: 8px;\n  width: 400px;\n}\n.notify li { color: #336699; }\n.error {\n  font-size: 8pt;\n  border: 1px solid #cc0000;\n  background-color: #ffffee;\n  color: #cc0000;\n  padding: 8px;\n  width: 550px;\n}\n.error span {\n  color: #cc0000;\n  font-weight: bold;\n  margin-bottom: 4px;\n}\n\n/* forms */\ntable.table_1 > tbody > tr > td {\n  border-bottom: 1px solid #dddddd;\n}\n.table_1_bg td {\n  padding: 1px;\n  padding-left: 1px;\n  background-color: #336699;\n  border-bottom: 1px solid #cccccc;\n}\ntd.answer {\n  background-color: #efefef;\n}\n.pad_left {\n  padding-left: 4px;\n}\n.req {\n  color: #aa0000;\n}\n.fb_error {\n  border: 1px solid #990000;\n  padding: 8px;\n  background-color: #ffefef;\n}\n\n/* for the code / markup editor */\n.editor {\n  background-color: white;\n  border: 1px solid #999999;\n  padding: 3px;\n}\n\n\n/* - - - "Highlight Colour" placeholder conditional CSS - - -*/\n{{if $P.colours == "Red"}}\nh3 {\n  background-color: #cc3131;\n  color: white;\n}\nul#css_nav li a:hover {\n  background-color: #861e1e;\n}\nh3 a:hover {\n  background-color: #fac1c1;\n  color: black;\n}\n{{elseif $P.colours == "Orange"}}\nh3 {\n  background-color: #ff9c00;\n  color: white;\n}\nul#css_nav li a:hover {\n  background-color: #4c3512;\n}\nh3 a:hover {\n  background-color: #ffefd5;\n  color: black;\n}\n{{elseif $P.colours == "Yellow"}}\nh3 {\n  background-color: #FAEC0C;\n  color: #777777;\n}\nul#css_nav li a:hover {\n  background-color: #595900;\n}\nh3 a:hover {\n  background-color: #444000;\n  color: #ffffcc;\n}\n{{elseif $P.colours == "Green"}}\nh3 {\n  background-color: #009211;\n  color: white;\n}\nul#css_nav li a:hover {\n  background-color: #004608;\n}\nh3 a:hover {\n  background-color: #daf4dd;\n  color: black;\n}\n{{elseif $P.colours == "Blue"}}\nh3 {\n  background-color: #2969c9;\n  color: white;\n}\nh3 a:hover {\n  background-color: #a6c8f0;\n  color: black;\n}\nul#css_nav li a:hover {\n  background-color: #1e4580;\n}\n{{elseif $P.colours == "Grey"}}\nh3 {\n  background-color: #777777;\n  color: white;\n}\nul#css_nav li a:hover {\n  background-color: #333333;\n}\nh3 a:hover {\n  background-color: #222222;\n  color: white;\n}\n{{else}}\nh3 {\n  background-color: #6D8AAC;\n  color: white;\n}\nul#css_nav li a:hover {\n  background-color: #2e425a;\n}\nh3 a:hover {\n  background-color: #c9e2ff;\n  color: black;\n}\n{{/if}}\n', '2012-01-31 23:07:47', 1),
(2, 'css', 2, 'General Styles', 'styles', '{{if $P.colours == "Blue"}}\n  {{assign var=header_bg value="#388ef4"}}\n  {{assign var=border_colour value="#C4DFFF"}}\n  {{assign var=selected_row_bg value="#d5e8ff"}}\n  {{assign var=selected_row_bottom value="#d5e8ff"}}\n  {{assign var=content_border value="#94c5fe"}}\n  {{assign var=continue_block_colour value="#f1f7ff"}}\n{{elseif $P.colours == "Green"}}\n  {{assign var=header_bg value="#0b9c00"}}\n  {{assign var=border_colour value="#e7ffe5"}}\n  {{assign var=selected_row_bg value="#d9f4cb"}}\n  {{assign var=selected_row_bottom value="#d9f4cb"}}\n  {{assign var=content_border value="#ade0aa"}}\n  {{assign var=continue_block_colour value="#E9F9E7"}}\n{{elseif $P.colours == "Purple"}}\n  {{assign var=header_bg value="#ac52ce"}}\n  {{assign var=border_colour value="#f7e0ff"}}\n  {{assign var=selected_row_bg value="#f6dfff"}}\n  {{assign var=selected_row_bottom value="#f6dfff"}}\n  {{assign var=content_border value="#e9c1f8"}}\n  {{assign var=continue_block_colour value="#ffffcc"}}\n{{elseif $P.colours == "Orange"}}\n  {{assign var=header_bg value="#ffa904"}}\n  {{assign var=border_colour value="#ffa904"}}\n  {{assign var=selected_row_bg value="#ffd789"}}\n  {{assign var=selected_row_bottom value="#ffa904"}}\n  {{assign var=content_border value="#CE911A"}}\n  {{assign var=continue_block_colour value="#f1f7ff"}}\n{{/if}}\n\nbody {\n  text-align: center;\n  padding: 0px;\n  margin: 0px;\n  background-color: #999999;\n}\ntd, th, p, input, textarea, select,ul,li,div, span {\n  font-family: {{$P.font}};\n  font-size: {{$P.font_size}};\n  color: #555555;\n}\ntd, th, p, textarea, ul,li, div {\n  line-height: 22px;\n}\na:link, a:visited {\n  color: #336699;\n}\ntable {\n  empty-cells: show;\n}\n#form_builder__edit_link {\n  float: right;\n}\n.req {\n  color: #aa0000;\n}\n.fb_error {\n  margin-top: 16px;\n  padding: 8px;\n  box-shadow: 1px 2px 2px #878787;\n  background-color: #ffefef;\n}\n\n\n/* page sections */\n.ts_page:after {\n  -moz-transform: translate(0pt, 0pt);\n  background: none repeat scroll 0 0 transparent;\n  border-radius: 20px 20px 20px 20px;\n  box-shadow: 15px 0 30px rgba(0, 0, 0, 0.2);\n  content: "";\n  left: 0;\n  position: absolute;\n  width: 100%;\n  z-index: -2;\n}\n.ts_page {\n  margin: 20px auto 0px;\n  background: #ccc;\n  position:relative;\n  box-shadow: 1px 6px 11px rgba(0, 0, 0, 0.36);\n  -moz-box-shadow: 1px 6px 11px rgba(0, 0, 0, 0.36);\n  -webkit-box-shadow: 1px 6px 11px rgba(0, 0, 0, 0.36);\n  text-align: left;\n  border: 5px solid {{$border_colour}};\n}\n.ts_header {\n  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);\n  border: 3px solid #CCCCCC;\n  height: 140px;\n  background: #3a3a3a; /* Old browsers */\n  background: -moz-linear-gradient(45deg,  #777777 0%, #999999 100%); /* FF3.6+ */\n  background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#3a3a3a), color-stop(100%,#4f4f4f)); /* Chrome,Safari4+ */\n  background: -webkit-linear-gradient(45deg,  #3a3a3a 0%,#4f4f4f 100%); /* Chrome10+,Safari5.1+ */\n  background: -o-linear-gradient(45deg,  #3a3a3a 0%,#4f4f4f 100%); /* Opera 11.10+ */\n  background: -ms-linear-gradient(45deg,  #3a3a3a 0%,#4f4f4f 100%); /* IE10+ */\n  background: linear-gradient(45deg,  #3a3a3a 0%,#4f4f4f 100%); /* W3C */\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#3a3a3a'', endColorstr=''#4f4f4f'',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */\n  box-shadow: 0 1px 12px rgba(0, 0, 0, 0.1);\n}\n.ts_header h1 {\n  margin: 56px 50px;\n  padding: 0px;\n  font-size: 20px;\n  color: white;\n}\n.ts_content {\n  background-color: white;\n  box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);\n  padding: 25px 50px;\n  border: 1px solid {{$content_border}};\n}\n.ts_continue_block {\n  margin-top: 16px;\n  padding: 8px;\n  box-shadow: 1px 2px 2px #878787;\n  background-color: {{$continue_block_colour}};\n}\n.ts_continue_block input {\n  float: right;\n}\n.ts_field_row_selected {\n  background-color: {{$selected_row_bg}};\n  border-bottom: 1px solid {{$selected_row_bottom}};\n}\n.ts_continue_button {\n  margin-top: 12px;\n}\n.highlighted_cell {\n  color: #990000;\n  background-color: #ffffee;\n  text-align: center;\n}\n.light_grey {\n  color: #999999;\n}\n.ts_field {\n  border-bottom: 1px solid #efefef;\n  padding: 10px 6px 15px;\n  list-style: none;\n  margin: 0px;\n}\n.ts_review_table td {\n  border-bottom: 1px solid #efefef;\n  padding: 3px 5px 2px;\n}\nh2 {\n  font-size: 24px;\n}\nh3 {\n  background-color: {{$header_bg}};\n  color: white;\n  font-size: 12px;\n  font-weight: normal;\n  margin-bottom: 0;\n  padding: 1px 0 0 5px;\n  height: 22px;\n}\nh3 a:link, h3 a:visited {\n  background-color: white;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n  color: black;\n  float: right;\n  line-height: 17px;\n  margin-right: 3px;\n  margin-top: 2px;\n  padding: 0 8px;\n  text-decoration: none;\n}\nh3 a:hover {\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\n\n/* navigation */\nul#css_nav {\n  clear: both;\n  width:100%;\n  margin: 0px;\n  padding: 0px;\n  overflow: hidden;\n}\nul#css_nav li {\n  float: left;\n  background-color: #efefef;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n  list-style: none;\n  text-align:center;\n  margin: 0px 2px 20px 0px;\n  color: #666666;\n  font-size: 11px;\n  line-height: 20px;\n}\nul#css_nav li.css_nav_current_page {\n  background-color: #999999;\n  color: white;\n}\nul#css_nav li a:link, ul#css_nav li a:visited {\n  display: block;\n  text-decoration: none;\n  color: white;\n  background-color: #999999;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\nul#css_nav li a:hover {\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\n.nav_1_pages li {\n  width: 100%;\n}\n.nav_2_pages li {\n  width: 50%;\n}\n.nav_3_pages li {\n  width: 33%;\n}\n.nav_4_pages li {\n  width: 24.7%;\n}\n.nav_5_pages li {\n  width: 19.5%;\n}\n.nav_6_pages li {\n  width: 16%;\n}\n.nav_7_pages li {\n  width: 13%;\n}\n.nav_8_pages li {\n  width: 12%;\n}\n\n/* notifications */\n.notify {\n  border: 1px solid #336699;\n  background-color: #ffffee;\n  color: #336699;\n  padding: 8px;\n  width: 400px;\n}\n.notify li { color: #336699; }\n.error {\n  font-size: 8pt;\n  border: 1px solid #cc0000;\n  background-color: #ffffee;\n  color: #cc0000;\n  padding: 8px;\n  width: 550px;\n}\n.error span {\n  color: #cc0000;\n  font-weight: bold;\n  margin-bottom: 4px;\n}\n\n/* for the code / markup editor */\n.editor {\n  background-color: white;\n  border: 1px solid #999999;\n  padding: 3px;\n}\nul#css_nav li a:hover {\n  background-color: #2e425a;\n}\nh3 a:hover {\n  background-color: #c9e2ff;\n  color: black;\n}\n\n', '2012-02-02 16:22:35', 1),
(3, 'css', 3, 'General Styles', 'styles', 'html {\n  height: 100%;\n}\nbody {\n  height: 100%;\n  text-align: center;\n  padding: 0px;\n  margin: 0px;\n  background: rgb(106,147,184);\n  background: -moz-linear-gradient(top,  rgba(106,147,184,1) 0%, rgba(115,151,183,1) 100%);\n  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(106,147,184,1)), color-stop(100%,rgba(115,151,183,1)));\n  background: -webkit-linear-gradient(top,  rgba(106,147,184,1) 0%,rgba(115,151,183,1) 100%);\n  background: -o-linear-gradient(top,  rgba(106,147,184,1) 0%,rgba(115,151,183,1) 100%);\n  background: -ms-linear-gradient(top,  rgba(106,147,184,1) 0%,rgba(115,151,183,1) 100%);\n  background: linear-gradient(top,  rgba(106,147,184,1) 0%,rgba(115,151,183,1) 100%);\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#6a93b8'', endColorstr=''#7397b7'',GradientType=0 );\n  background-repeat: no-repeat;\n  background-attachment: fixed;\n}\ntd, th, p, input, textarea, select,ul,li,div, span {\n  font-family: "Lucida Grande","Lucida Sans Unicode", Tahoma, sans-serif;\n  font-size: 12px;\n  color: #555555;\n}\ntd, th, p, textarea, ul, li, div {\n  line-height: 22px;\n}\na:link, a:visited {\n  color: #336699;\n}\ntable {\n  empty-cells: show;\n}\n\n/* page sections */\n.ts_page:after {\n  -moz-transform: translate(0pt, 0pt);\n  background: none repeat scroll 0 0 transparent;\n  border-radius: 20px 20px 20px 20px;\n  box-shadow: 15px 0 30px rgba(0, 0, 0, 0.2);\n  content: "";\n  left: 0;\n  position: absolute;\n  width: 100%;\n  z-index: -2;\n}\n.ts_page {\n  margin: 40px auto;\n  position: relative;\n  text-align: left;\n}\n.ts_header h1 {\n  margin: 0px 0px 42px 20px;\n  padding: 0px;\n  font-size: {{$P.font_size}};\n  color: white;\n  font-family: "{{$P.font}}", "Lucida Grande", Arial;\n  font-weight: normal;\n}\n.ts_footer {\n  background: rgb(64,86,107);\n  background: -moz-linear-gradient(top,  rgb(64,86,107) 0%, rgb(44,61,76) 100%);\n  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(64,86,107)), color-stop(100%,rgb(44,61,76)));\n  background: -webkit-linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  background: -o-linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  background: -ms-linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  background: linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#40566b'', endColorstr=''#2c3d4c'',GradientType=0 );\n  -webkit-border-bottom-left-radius: 6px;\n  -webkit-border-bottom-right-radius: 6px;\n  -moz-border-radius-bottomleft: 6px;\n  -moz-border-radius-bottomright: 6px;\n  border-bottom-left-radius: 6px;\n  border-bottom-right-radius: 6px;\n  padding: 10px 0px;\n  text-align: center;\n  color: #dddddd;\n  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);\n  height: 5px;\n}\n.ts_content {\n  background-color: white;\n  border: 1px solid #777777;\n  border-top: 0px;\n  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);\n  padding: 25px 50px;\n}\n.ts_continue_block {\n  margin-top: 16px;\n  background-color: #ffffdd;\n  padding: 8px;\n  box-shadow: 1px 2px 2px #878787;\n}\n.ts_continue_block input {\n  float: right;\n}\n.ts_continue_button {\n  margin-top: 12px;\n}\n.light_grey {\n  color: #999999;\n}\nh2 {\n  font-size: 20px;\n}\n.ts_heading {\n  font-size: 20px;\n}\n\nh3 {\n  border-top-left-radius: 4px;\n  border-top-right-radius: 4px;\n  -webkit-border-top-left-radius: 4px;\n  -webkit-border-top-right-radius: 4px;\n  -moz-border-radius-topleft: 4px;\n  -moz-border-radius-topright: 4px;\n  font-size: 12px;\n  font-weight: normal;\n  margin-bottom: 0;\n  margin-right: 1px;\n  padding: 1px 0 0 5px;\n  width: 792px;\n  background-color: #36485a;\n  color: white;\n  height: 22px;\n}\nh3 a:link, h3 a:visited {\n  background-color: white;\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n  color: black;\n  float: right;\n  line-height: 17px;\n  margin-right: 3px;\n  margin-top: 2px;\n  padding: 0 8px;\n  text-decoration: none;\n}\nh3 a:hover {\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\n\n/* navigation */\nul#css_nav {\n  clear: both;\n  margin: 0px;\n  padding: 0px 40px;\n  overflow: hidden;\n  background: rgb(64,86,107);\n  background: -moz-linear-gradient(top,  rgb(64,86,107) 0%, rgb(44,61,76) 100%);\n  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(64,86,107)), color-stop(100%,rgb(44,61,76)));\n  background: -webkit-linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  background: -o-linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  background: -ms-linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  background: linear-gradient(top,  rgb(64,86,107) 0%,rgb(44,61,76) 100%);\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#40566b'', endColorstr=''#2c3d4c'',GradientType=0 );\n  -webkit-border-top-left-radius: 6px;\n  -webkit-border-top-right-radius: 6px;\n  -moz-border-radius-topleft: 6px;\n  -moz-border-radius-topright: 6px;\n  border-top-left-radius: 6px;\n  border-top-right-radius: 6px;\n  height: 38px;\n}\nul#css_nav li {\n  float: left;\n  list-style: none;\n  text-align:center;\n  color: #dddddd;\n  font-size: 11px;\n  padding: 8px 0px;\n}\nul#css_nav li span {\n  font-size: 11px;\n}\n\nul#css_nav li.completed_page {\n  padding: 0px;\n}\nul#css_nav li.css_nav_current_page {\n  background: rgb(249,249,249);\n  background: -moz-linear-gradient(top, rgba(249,249,249,1) 0%, rgba(255,255,255,1) 100%);\n  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(249,249,249,1)), color-stop(100%,rgba(255,255,255,1)));\n  background: -webkit-linear-gradient(top, rgba(249,249,249,1) 0%,rgba(255,255,255,1) 100%);\n  background: -o-linear-gradient(top, rgba(249,249,249,1) 0%,rgba(255,255,255,1) 100%);\n  background: -ms-linear-gradient(top, rgba(249,249,249,1) 0%,rgba(255,255,255,1) 100%);\n  background: linear-gradient(top,  rgba(249,249,249,1) 0%,rgba(255,255,255,1) 100%);\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#f9f9f9'', endColorstr=''#ffffff'',GradientType=0 );\n  color: #000000;\n}\nul#css_nav li a:link, ul#css_nav li a:visited, ul#css_nav li span {\n  display: block;\n  text-decoration: none;\n  color: white;\n  background-color: #333333;\n  padding: 8px 0px;\n  opacity: 0.5;\n  filter: alpha(opacity=50);\n}\n ul#css_nav li a:hover {\n  background-color: #222222;\n  opacity: 0.9;\n  filter: alpha(opacity=90);\n}\n\n.nav_1_pages li {\n  width: 150px;\n}\n.nav_2_pages li {\n  width: 150px;\n}\n.nav_3_pages li {\n  width: 150px;\n}\n.nav_4_pages li {\n  width: 150px;\n}\n.nav_5_pages li {\n  width: 150px;\n}\n.nav_6_pages li {\n  width: 136px;\n}\n.nav_7_pages li {\n  width: 116px;\n}\n.nav_8_pages li {\n  width: 102px;\n}\n\n\n/* notifications */\n.notify {\n  border: 1px solid #336699;\n  background-color: #ffffee;\n  color: #336699;\n  padding: 8px;\n  width: 400px;\n}\n.notify li { color: #336699; }\n.error {\n  font-size: 8pt;\n  border: 1px solid #cc0000;\n  background-color: #ffffee;\n  color: #cc0000;\n  padding: 8px;\n  width: 550px;\n}\n.error span {\n  color: #cc0000;\n  font-weight: bold;\n  margin-bottom: 4px;\n}\n\n/* forms */\ntable.table_1 > tbody > tr > td {\n  border-bottom: 1px solid #dddddd;\n}\n.table_1_bg td {\n  padding: 1px;\n  padding-left: 1px;\n  background-color: #336699;\n  border-bottom: 1px solid #cccccc;\n}\ntd.answer {\n  background-color: #efefef;\n}\n.pad_left {\n  padding-left: 4px;\n}\n.req {\n  color: #aa0000;\n}\n.fb_error {\n  border: 1px solid #990000;\n  padding: 8px;\n  background-color: #ffefef;\n}\n\n/* for the code / markup editor */\n.editor {\n  background-color: white;\n  border: 1px solid #999999;\n  padding: 3px;\n}\n#form_builder__edit_link {\n  position: absolute;\n  right: 5px;\n  top: 0px;\n  text-decoration: none;\n}\n#form_builder__edit_link:hover {\n  color: #990000;\n  text-decoration: underline;\n}\n\n', '2012-02-03 17:42:30', 1),
(4, 'css', 4, 'General Styles', 'styles', '{{* This top section defines the colours, based on the selected Colour placeholder *}}\n{{assign var=header_colour value="#ffffff"}}\n{{assign var=header_shadow value="on"}}\n{{if $P.colours == "Red"}}\n  {{assign var=c1 value="#950000"}}\n  {{assign var=c2 value="#af0a0a"}}\n  {{assign var=link_colour value="#ffffcc"}}\n  {{assign var=line value="#670000"}}\n  {{assign var=fieldset_bg value="#780404"}}\n  {{assign var=fieldset_lines value="#660909"}}\n  {{assign var=fieldset_colour value="#FFFF99"}}\n  {{assign var=fieldset_shadow value="on"}}\n  {{assign var=font_colour value="#ffffff"}}\n  {{assign var=page_heading value="#000000"}}\n  {{assign var=nav_next_page value="#999999"}}\n  {{assign var=nav_prev_page_text value="#999999"}}\n  {{assign var=nav_prev_page_bg_over value="#D78B00"}}\n  {{assign var=nav_prev_page_border value="#999999"}}\n  {{assign var=submit_btn_over value="#ff3c00"}}\n  {{assign var=edit_link_colour value="#ffffff"}}\n{{elseif $P.colours == "Orange"}}\n  {{assign var=c1 value="#ffa500"}}\n  {{assign var=c2 value="#ffb12b"}}\n  {{assign var=link_colour value="#990000"}}\n  {{assign var=line value="#ffc558"}}\n  {{assign var=fieldset_bg value="#ef9c00"}}\n  {{assign var=fieldset_lines value="#d28900"}}\n  {{assign var=fieldset_colour value="#FFFF99"}}\n  {{assign var=fieldset_shadow value="on"}}\n  {{assign var=font_colour value="#333333"}}\n  {{assign var=page_heading value="#ffffff"}}\n  {{assign var=nav_next_page value="#555555"}}\n  {{assign var=nav_prev_page_text value="#AF8D4F"}}\n  {{assign var=nav_prev_page_bg_over value="#D78B00"}}\n  {{assign var=nav_prev_page_border value="#E69500"}}\n  {{assign var=submit_btn_over value="#ff3c00"}}\n  {{assign var=edit_link value="#990000"}}\n{{elseif $P.colours == "Green"}}\n  {{assign var=c1 value="#299a0b"}}\n  {{assign var=c2 value="#31a612"}}\n  {{assign var=link_colour value="#FFFF99"}}\n  {{assign var=line value="#1c7e00"}}\n  {{assign var=fieldset_bg value="#228a00"}}\n  {{assign var=fieldset_lines value="#1e7d00"}}\n  {{assign var=fieldset_colour value="#FFFF99"}}\n  {{assign var=fieldset_shadow value="on"}}\n  {{assign var=font_colour value="#eeeeee"}}\n  {{assign var=page_heading value="#333333"}}\n  {{assign var=nav_next_page value="#0f4f00"}}\n  {{assign var=nav_prev_page_text value="#136600"}}\n  {{assign var=nav_prev_page_bg_over value="#135205"}}\n  {{assign var=nav_prev_page_border value="#1e710b"}}\n  {{assign var=submit_btn_over value="#0093E8"}}\n  {{assign var=edit_link value="#990000"}}\n{{elseif $P.colours == "Blue"}}\n  {{assign var=c1 value="#0083cf"}}\n  {{assign var=c2 value="#0690e0"}}\n  {{assign var=link_colour value="#FFFF99"}}\n  {{assign var=line value="#0c5e8d"}}\n  {{assign var=fieldset_bg value="#0878b8"}}\n  {{assign var=fieldset_lines value="#0669a2"}}\n  {{assign var=fieldset_colour value="#FFFF99"}}\n  {{assign var=fieldset_shadow value="on"}}\n  {{assign var=font_colour value="#eeeeee"}}\n  {{assign var=page_heading value="#222222"}}\n  {{assign var=nav_next_page value="#333333"}}\n  {{assign var=nav_prev_page_text value="#efefef"}}\n  {{assign var=nav_prev_page_bg_over value="#3396e2"}}\n  {{assign var=nav_prev_page_border value="#cccccc"}}\n  {{assign var=submit_btn_over value="#621111"}}\n  {{assign var=edit_link value="#621111"}}\n{{elseif $P.colours == "Black"}}\n  {{assign var=c1 value="#222222"}}\n  {{assign var=c2 value="#333333"}}\n  {{assign var=link_colour value="#c8ebff"}}\n  {{assign var=line value="#444444"}}\n  {{assign var=fieldset_bg value="#353535"}}\n  {{assign var=fieldset_lines value="#444444"}}\n  {{assign var=fieldset_colour value="#c8ebff"}}\n  {{assign var=fieldset_shadow value="on"}}\n  {{assign var=font_colour value="#efefef"}}\n  {{assign var=page_heading value="#eeeeee"}}\n  {{assign var=nav_next_page value="#999999"}}\n  {{assign var=nav_prev_page_text value="#3a8ab8"}}\n  {{assign var=nav_prev_page_bg_over value="#3a8ab8"}}\n  {{assign var=nav_prev_page_border value="#4a99c7"}}\n  {{assign var=submit_btn_over value="#3a8ab8"}}\n  {{assign var=edit_link value="#c8ebff"}}\n{{elseif $P.colours == "Grey"}}\n  {{assign var=c1 value="#dddddd"}}\n  {{assign var=c2 value="#ffffff"}}\n  {{assign var=link_colour value="#0033cc"}}\n  {{assign var=line value="#cccccc"}}\n  {{assign var=fieldset_bg value="#f2f2f2"}}\n  {{assign var=fieldset_lines value="#aaaaaa"}}\n  {{assign var=fieldset_colour value="#888888"}}\n  {{assign var=fieldset_shadow value="off"}}\n  {{assign var=font_colour value="#333333"}}\n  {{assign var=page_heading value="#555555"}}\n  {{assign var=nav_next_page value="#999999"}}\n  {{assign var=nav_prev_page_text value="#888888"}}\n  {{assign var=nav_prev_page_bg_over value="#888888"}}\n  {{assign var=nav_prev_page_border value="#888888"}}\n  {{assign var=submit_btn_over value="#3a8ab8"}}\n  {{assign var=edit_link value="#c8ebff"}}\n{{elseif $P.colours == "White"}}\n  {{assign var=c1 value="#ffffff"}}\n  {{assign var=c2 value="#ffffff"}}\n  {{assign var=header_colour value="#222222"}}\n  {{assign var=header_shadow value="off"}}\n  {{assign var=link_colour value="#0093e8"}}\n  {{assign var=line value="#000000"}}\n  {{assign var=fieldset_bg value="#ffffff"}}\n  {{assign var=fieldset_lines value="#000000"}}\n  {{assign var=fieldset_colour value="#000000"}}\n  {{assign var=fieldset_shadow value="off"}}\n  {{assign var=font_colour value="#333333"}}\n  {{assign var=page_heading value="#555555"}}\n  {{assign var=nav_next_page value="#999999"}}\n  {{assign var=nav_prev_page_text value="#888888"}}\n  {{assign var=nav_prev_page_bg_over value="#888888"}}\n  {{assign var=nav_prev_page_border value="#888888"}}\n  {{assign var=submit_btn_over value="#0093e8"}}\n  {{assign var=edit_link value="#0093e8"}}\n{{/if}}\nhtml {\n  height: 100%;\n  margin: 0px;\n}\nbody {\n  height: 100%;\n  text-align: center;\n  padding: 0px;\n  margin: 0px;\n  background: {{$c2}}; /* Old browsers */\n  background: -moz-linear-gradient(top, {{$c1}} 0%, {{$c2}} 100%); /* FF3.6+ */\n  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,{{$c1}}), color-stop(100%,{{$c2}})); /* Chrome,Safari4+ */\n  background: -webkit-linear-gradient(top, {{$c1}} 0%,{{$c2}} 100%); /* Chrome10+,Safari5.1+ */\n  background: -o-linear-gradient(top, {{$c1}} 0%,{{$c2}} 100%); /* Opera 11.10+ */\n  background: -ms-linear-gradient(top, {{$c1}} 0%,{{$c2}} 100%); /* IE10+ */\n  background: linear-gradient(top, {{$c1}} 0%,{{$c2}} 100%); /* W3C */\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''{{$c1}}'', endColorstr=''{{$c2}}'',GradientType=0 ); /* IE6-9 */\n  background-repeat: no-repeat;\n  background-attachment: fixed;\n}\ntd, th, p, ul,li,div, span {\n  font-family: Trykker, "Lucida Grande", Georgia, serif;\n  font-size: 12px;\n  color: {{$font_colour}};\n}\ninput, textarea, select {\n  font-family: Trykker, "Lucida Grande", Georgia, serif;\n  font-size: 12px;\n}\ntd, th, p, textarea, ul,li, div, a {\n  line-height: 25px;\n}\ntable {\n  empty-cells: show;\n}\n.clear {\n  clear: both;\n}\na:link, a:visited {\n  color: {{$link_colour}};\n  text-decoration: none;\n}\na:hover {\n  text-decoration: underline;\n}\ndiv.ui-dialog div, div.ui-dialog li, div.ui-dialog span {\n  color: #333333;\n}\n\n/* page sections */\n.ts_page {\n  margin: 40px auto;\n  position: relative;\n  text-align: left;\n}\n.ts_head_bg {\n  height: 105px;\n  border-bottom: 1px solid {{$line}};\n  position: absolute;\n  top: 0px;\n  width: 100%;\n}\n.ts_header {\n  height: 70px;\n}\n.ts_header h1 {\n  margin: 20px 20px;\n  font-family: Trykker, "Lucida Grande", Georgia, serif;\n  font-weight: bold;\n  padding: 0px;\n  font-size: 30px;\n  color: {{$header_colour}};\n  {{if $header_shadow == "on"}}text-shadow: 2px 2px 5px #555555;{{/if}}\n}\nh2 {\n  font-size: 21px;\n  font-family: Trykker, "Lucida Grande", Georgia, serif;\n  color: {{$page_heading}};\n}\n\n/* navigation */\n#ts_css_nav {\n  width: 180px;\n  float: left;\n  list-style: none;\n  padding: 20px;\n  margin: 0px;\n}\n#ts_css_nav li {\n  list-style: none;\n  margin: 0px 0px 2px;\n  color: #666666;\n  font-size: 12px;\n  line-height: 20px;\n  text-align: left;\n}\n#ts_css_nav div {\n  color: {{$nav_next_page}};\n}\n#ts_css_nav li div, #ts_css_nav li a {\n  padding: 5px 0px 5px 12px;\n  display: block;\n}\nul#ts_css_nav li.completed_page {\n  -webkit-border-radius: 4px;\n  -moz-border-radius: 4px;\n  border-radius: 4px;\n  border: 1px solid {{$nav_prev_page_border}};\n}\nul#ts_css_nav li.completed_page div {\n  color: {{$nav_prev_page_text}};\n}\nul#ts_css_nav li.css_nav_current_page {\n  -webkit-border-radius: 4px;\n  -moz-border-radius: 4px;\n  border-radius: 4px;\n  border: 1px solid #ffffff;\n}\nul#ts_css_nav li.css_nav_current_page div {\n  background-color: #222222;\n  color: white;\n  margin: 1px;\n  -webkit-border-radius: 3px;\n  -moz-border-radius: 3px;\n  border-radius: 3px;\n}\nul#ts_css_nav li a {\n  margin: 1px;\n  -webkit-border-radius: 3px;\n  -moz-border-radius: 3px;\n  border-radius: 3px;\n}\nul#ts_css_nav li a:link, ul#ts_css_nav li a:visited {\n  text-decoration: none;\n  color: {{$nav_prev_page_text}};\n  -webkit-border-radius: 2px;\n  -moz-border-radius: 2px;\n  border-radius: 2px;\n}\nul#ts_css_nav li a:hover {\n  color: white;\n  background-color: {{$nav_prev_page_bg_over}};\n  -webkit-border-radius: 3px;\n  -moz-border-radius: 3px;\n  border-radius: 3px;\n}\n\n/* notifications */\n.notify {\n  border: 1px solid #336699;\n  background-color: #ffffee;\n  color: #336699;\n  padding: 8px;\n  width: 400px;\n}\n.notify li { color: #336699; }\n.error {\n  font-size: 8pt;\n  border: 1px solid #cc0000;\n  background-color: #ffffee;\n  color: #cc0000;\n  padding: 8px;\n  width: 550px;\n}\n.error span {\n  color: #cc0000;\n  font-weight: bold;\n  margin-bottom: 4px;\n}\n\n/* forms */\ntable.table_1 > tbody > tr > td {\n  border-bottom: 1px solid {{$fieldset_lines}};\n}\ntable.table_1 > tbody > tr > td.rowN {\n  border-bottom: none;\n}\n.req {\n  color: #aa0000;\n}\n.fb_error {\n  background-color: #FFFFCC;\n  border: 1px solid #CC0000;\n  color: #CC0000;\n  margin-bottom: 12px;\n  padding: 8px;\n}\n\n/* for the code / markup editor */\n.editor {\n  background-color: white;\n  border: 1px solid #999999;\n  padding: 3px;\n}\n.ts_page_content {\n  width: 720px;\n  float: right;\n}\nfieldset {\n  border: 1px solid {{$fieldset_lines}};\n  font-size: 11pt;\n  font-weight: bold;\n  color: {{$fieldset_colour}};\n  margin-bottom: 10px;\n  background-color: {{$fieldset_bg}};\n}\n{{if $fieldset_shadow == "on"}}\nfieldset legend {\n  text-shadow: 2px 2px 3px #333333;\n}\n{{/if}}\n.ts_continue_button input {\n  background-color: #222222;\n  color: white;\n  padding: 2px 10px;\n  border-radius: 3px;\n  border: 0px;\n  cursor: pointer;\n}\n.ts_continue_button input:hover {\n  background-color: {{$submit_btn_over}};\n}\n#ts_footer {\n  border-top: 1px solid {{$line}};\n  padding: 20px;\n  color: #222222;\n}\n.edit_link {\n  text-shadow: none;\n  margin-left: 12px;\n}\n.edit_link a {\n  color: {{$edit_link_colour}};\n  text-decoration: none;\n}\n.edit_link a:hover {\n  text-decoration: underline;\n}\n\n#form_builder__edit_link {\n  position: absolute;\n  right: 5px;\n  top: 5px;\n  padding: 2px 10px;\n  background-color: black;\n  border: 1px solid white;\n  color: white;\n  text-decoration: none;\n  border-radius: 4px;\n}\n#form_builder__edit_link:hover {\n  color: #06a4ff;\n}\n', '2012-01-18 23:06:16', 1),
(5, 'css', 5, 'Additional Styles', 'styles', '/**\n * The majority of styles for this Template Set are pulled directly from the Core''s default theme.\n * This supplements them for a few things that aren''t covered.\n */\nh1 {\n  margin: 0px;\n  padding: 28px 0px 0px 21px;\n  float: left;\n  font-family: ''Lato'', Arial;\n  color: white;\n  font-size: 20px;\n  font-weight: normal;\n}\n#ts_css_nav {\n  list-style:none;\n  margin: 0px;\n  padding: 0px;\n}\n#ts_css_nav li {\n  height: 27px;\n}\n#ts_css_nav li a, #ts_css_nav li div {\n  padding: 2px 0px 2px 4px;\n  width: 150px;\n}\n#ts_css_nav li.completed_page a:link, #ts_css_nav li.completed_page a:visited {\n  display: block;\n  text-underline: none;\n}\n#ts_css_nav li.css_nav_current_page div {\n  font-weight: bold;\n}\n.edit_link {\n  float: right;\n}\n.edit_link a:link, .edit_link a:visited {\n  padding: 0px 7px;\n  background-color: #aaaaaa;\n  color: white;\n  border-radius: 3px;\n  letter-spacing: 0px;\n}\n.edit_link a:hover {\n  background-color: #222222;\n  text-decoration: none;\n}\n#form_builder__edit_link {\n  background-color: #444444;\n  border-radius: 3px 3px 3px 3px;\n  color: white;\n  float: right;\n  margin: 25px;\n  padding: 0 8px;\n}\n#form_builder__edit_link:hover {\n  background-color: #000000;\n  text-decoration: none;\n}\n.ts_heading {\n  font: 17.6px/20px Verdana,sans-serif;\n  padding-bottom: 5px;\n  margin: 0px;\n}\n', '2012-02-03 17:47:10', 1),
(6, 'css', 6, 'Additional Styles', 'styles', '/**\n * The majority of styles for this Template Set are pulled directly from the Classic Grey theme.\n * This supplements them for a few things that aren''t covered.\n */\n#ts_css_nav {\n  list-style:none;\n  margin: 0px;\n  padding: 0px;\n}\n#ts_css_nav li {\n  height: 27px;\n}\n#ts_css_nav li a, #ts_css_nav li div {\n  padding: 4px 0px 4px 12px;\n  width: 188px;\n  border-bottom: 1px dotted #aaaaaa;\n}\n#ts_css_nav li.completed_page a:link, #ts_css_nav li.completed_page a:visited {\n  display: block;\n  text-underline: none;\n}\n#ts_css_nav li.css_nav_current_page div {\n  font-weight: bold;\n}\n.ts_heading {\n  font-size: 16px;\n  margin: 0px 0px 15px;\n}\n.edit_link {\n  float: right;\n}\n.edit_link a:link, .edit_link a:visited {\n  padding: 0px 7px;\n  background-color: #aaaaaa;\n  color: white;\n  border-radius: 3px;\n  letter-spacing: 0px;\n}\n.edit_link a:hover {\n  background-color: #222222;\n  text-decoration: none;\n}\n#form_builder__edit_link {\n  background-color: #444444;\n  border-radius: 3px 3px 3px 3px;\n  color: white;\n  float: right;\n  margin: 25px;\n  padding: 0 8px;\n}\n#form_builder__edit_link:hover {\n  background-color: #000000;\n  text-decoration: none;\n}\n#header {\n  background: #000000;\n  background: -moz-linear-gradient(left,  #000000 1%, #5b5b5b 100%);\n  background: -webkit-gradient(linear, left top, right top, color-stop(1%,#000000), color-stop(100%,#5b5b5b));\n  background: -webkit-linear-gradient(left,  #000000 1%,#5b5b5b 100%);\n  background: -o-linear-gradient(left,  #000000 1%,#5b5b5b 100%);\n  background: -ms-linear-gradient(left,  #000000 1%,#5b5b5b 100%);\n  background: linear-gradient(left,  #000000 1%,#5b5b5b 100%);\n  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=''#000000'', endColorstr=''#5b5b5b'',GradientType=1 );\n}\n#header h1 {\n  margin: 0px;\n  padding: 21px;\n  color: white;\n  font-size: 20px;\n  font-weight: normal;\n}\n', '2012-02-03 12:57:51', 1),
(7, 'css', 7, 'css', '', '', '2017-02-07 15:12:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_hooks_manager_rules`
--

CREATE TABLE `ft_module_hooks_manager_rules` (
  `hook_id` mediumint(9) NOT NULL,
  `is_custom_hook` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `rule_name` varchar(255) NOT NULL,
  `code` mediumtext NOT NULL,
  `hook_code_type` enum('na','php','html','smarty') NOT NULL DEFAULT 'na'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_menu_items`
--

CREATE TABLE `ft_module_menu_items` (
  `menu_id` mediumint(8) UNSIGNED NOT NULL,
  `module_id` mediumint(8) UNSIGNED NOT NULL,
  `display_text` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_submenu` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_module_menu_items`
--

INSERT INTO `ft_module_menu_items` (`menu_id`, `module_id`, `display_text`, `url`, `is_submenu`, `list_order`) VALUES
(1, 1, 'File Upload', '{$module_dir}/index.php', 'no', 1),
(2, 2, 'Export Manager', '{$module_dir}/index.php', 'no', 1),
(3, 2, 'Settings', '{$module_dir}/settings.php', 'yes', 2),
(4, 2, 'Reset to Defaults', '{$module_dir}/reset.php', 'yes', 3),
(5, 2, 'Help', '{$module_dir}/help.php', 'yes', 4),
(6, 3, 'Swift Mailer', 'index.php', 'no', 1),
(7, 3, 'Help', 'help.php', 'yes', 2),
(8, 4, 'TinyMCE Field', '{$module_dir}/index.php', 'no', 1),
(9, 4, 'Help', '{$module_dir}/help.php', 'no', 2),
(10, 5, 'System Check', '{$module_dir}/index.php', 'no', 1),
(11, 5, 'File Verification', '{$module_dir}/files.php', 'yes', 2),
(12, 5, 'Table Verification', '{$module_dir}/tables.php', 'yes', 3),
(13, 5, 'Hook Verification', '{$module_dir}/hooks.php', 'yes', 4),
(14, 5, 'Orphan Clean-up', '{$module_dir}/orphans.php', 'yes', 5),
(15, 5, 'Environment Info', '{$module_dir}/env.php', 'no', 6),
(16, 5, 'Help', '{$module_dir}/help.php', 'no', 7),
(17, 6, 'Pages', 'index.php', 'no', 1),
(18, 6, 'Add Page', 'add.php', 'yes', 2),
(19, 6, 'Settings', 'settings.php', 'no', 3),
(20, 6, 'Help', 'help.php', 'no', 4),
(21, 7, 'Core Field Types', '{$module_dir}/index.php', 'no', 1),
(22, 7, 'Help', '{$module_dir}/help.php', 'yes', 2),
(23, 8, 'Template Sets', '{$module_dir}/index.php', 'no', 1),
(24, 8, 'Settings', '{$module_dir}/settings.php', 'no', 2),
(25, 8, 'Help', '{$module_dir}/help.php', 'no', 3),
(26, 9, 'Hooks Manager', 'index.php', 'no', 1),
(27, 9, 'Settings', 'settings.php', 'no', 2),
(28, 9, 'Help', 'help.php', 'no', 3),
(29, 10, 'Custom Fields', '{$module_dir}/index.php', 'no', 1),
(30, 10, 'Shared Resources', '{$module_dir}/shared_resources/', 'no', 2),
(31, 10, 'Shared Characteristics', '{$module_dir}/shared_characteristics.php', 'no', 3),
(32, 10, 'License', '{$module_dir}/license.php', 'no', 4),
(33, 11, 'Hello Tabs!', 'index.php', 'no', 1),
(34, 12, 'Hello World!', 'index.php', 'no', 1),
(38, 16, 'Form Backup', 'index.php', 'no', 1),
(39, 16, 'Settings', 'settings.php', 'yes', 2),
(40, 16, 'Help', 'help.php', 'yes', 3),
(44, 17, 'GFlacso Graduados', 'templates/settings.php', 'no', 1),
(45, 18, 'Arbitrary Settings', '{$module_dir}/index.php', 'no', 1),
(46, 18, 'Labels', '{$module_dir}/labels.php', 'no', 2),
(47, 18, 'How to Use', '{$module_dir}/how_to_use.php', 'no', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_pages`
--

CREATE TABLE `ft_module_pages` (
  `page_id` mediumint(8) UNSIGNED NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `access_type` enum('admin','public','private') NOT NULL DEFAULT 'admin',
  `content_type` enum('html','php','smarty') NOT NULL DEFAULT 'html',
  `use_wysiwyg` enum('yes','no') NOT NULL DEFAULT 'yes',
  `heading` varchar(255) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_pages_clients`
--

CREATE TABLE `ft_module_pages_clients` (
  `page_id` mediumint(9) UNSIGNED NOT NULL,
  `client_id` mediumint(9) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_module_swift_mailer_email_template_fields`
--

CREATE TABLE `ft_module_swift_mailer_email_template_fields` (
  `email_template_id` mediumint(9) NOT NULL,
  `return_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_multi_page_form_urls`
--

CREATE TABLE `ft_multi_page_form_urls` (
  `form_id` mediumint(8) UNSIGNED NOT NULL,
  `form_url` varchar(255) NOT NULL,
  `page_num` tinyint(4) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_new_view_submission_defaults`
--

CREATE TABLE `ft_new_view_submission_defaults` (
  `view_id` mediumint(9) NOT NULL,
  `field_id` mediumint(9) NOT NULL,
  `default_value` text NOT NULL,
  `list_order` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_option_lists`
--

CREATE TABLE `ft_option_lists` (
  `list_id` mediumint(8) UNSIGNED NOT NULL,
  `option_list_name` varchar(100) NOT NULL,
  `is_grouped` enum('yes','no') NOT NULL,
  `original_form_id` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_option_lists`
--

INSERT INTO `ft_option_lists` (`list_id`, `option_list_name`, `is_grouped`, `original_form_id`) VALUES
(1, 'Paises', 'yes', NULL),
(2, 'Sexo', 'no', NULL),
(7, 'Tipos Documento', 'no', NULL),
(8, 'Si/No', 'no', NULL),
(9, 'Estados Inscripcion', 'no', NULL),
(10, 'TyC', 'no', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_public_form_omit_list`
--

CREATE TABLE `ft_public_form_omit_list` (
  `form_id` mediumint(8) UNSIGNED NOT NULL,
  `account_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_public_view_omit_list`
--

CREATE TABLE `ft_public_view_omit_list` (
  `view_id` mediumint(8) UNSIGNED NOT NULL,
  `account_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_sessions`
--

CREATE TABLE `ft_sessions` (
  `session_id` varchar(100) NOT NULL DEFAULT '',
  `session_data` text NOT NULL,
  `expires` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_settings`
--

CREATE TABLE `ft_settings` (
  `setting_id` mediumint(9) NOT NULL,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `module` varchar(100) NOT NULL DEFAULT 'core'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_settings`
--

INSERT INTO `ft_settings` (`setting_id`, `setting_name`, `setting_value`, `module`) VALUES
(1, 'program_version', '2.2.6', 'core'),
(2, 'release_date', '20130629', 'core'),
(3, 'release_type', 'main', 'core'),
(4, 'api_version', '1.1.4', 'core'),
(5, 'available_languages', 'en_us,English (US)|es,Spanish', 'core'),
(6, 'clients_may_edit_date_format', 'no', 'core'),
(7, 'clients_may_edit_footer_text', 'no', 'core'),
(8, 'clients_may_edit_logout_url', 'yes', 'core'),
(9, 'clients_may_edit_max_failed_login_attempts', 'no', 'core'),
(10, 'clients_may_edit_page_titles', 'no', 'core'),
(11, 'clients_may_edit_sessions_timeout', 'no', 'core'),
(12, 'clients_may_edit_theme', 'yes', 'core'),
(13, 'clients_may_edit_timezone_offset', 'yes', 'core'),
(14, 'clients_may_edit_ui_language', 'yes', 'core'),
(15, 'default_client_menu_id', '2', 'core'),
(16, 'default_client_swatch', 'green', 'core'),
(17, 'default_date_field_search_value', 'none', 'core'),
(18, 'default_date_format', 'M jS y, g:i A', 'core'),
(19, 'default_footer_text', '', 'core'),
(20, 'default_language', 'es', 'core'),
(21, 'default_login_page', 'client_forms', 'core'),
(22, 'default_logout_url', 'http://forms.coop/formtools', 'core'),
(23, 'default_max_failed_login_attempts', '', 'core'),
(24, 'default_num_submissions_per_page', '10', 'core'),
(25, 'default_page_titles', 'Form Tools - {$page}', 'core'),
(26, 'default_sessions_timeout', '30', 'core'),
(27, 'default_theme', 'default', 'core'),
(28, 'default_timezone_offset', '0', 'core'),
(29, 'edit_submission_shared_resources_js', '$(function() {\r\n  $(".fancybox").fancybox();\r\n});\r\n', 'core'),
(30, 'edit_submission_shared_resources_css', '/* used in the "Highlight" setting for most field types */\r\n.cf_colour_red { \r\n  background-color: #990000;\r\n  color: white;\r\n}\r\n.cf_colour_orange {\r\n  background-color: orange; \r\n}\r\n.cf_colour_yellow {\r\n  background-color: yellow; \r\n}\r\n.cf_colour_green {\r\n  background-color: green;\r\n  color: white; \r\n}\r\n.cf_colour_blue {\r\n  background-color: #336699; \r\n  color: white; \r\n}\r\n\r\n/* field comments */\r\n.cf_field_comments {\r\n  font-style: italic;\r\n  color: #999999;\r\n  clear: both;\r\n}\r\n\r\n/* column layouts for radios & checkboxes */\r\n.cf_option_list_group_label {\r\n  font-weight: bold;  \r\n  clear: both;\r\n  margin-left: 4px;\r\n}\r\n.cf_option_list_2cols, .cf_option_list_3cols, .cf_option_list_4cols {\r\n  clear: both; \r\n}\r\n.cf_option_list_2cols .column { \r\n  width: 50%;\r\n  float: left; \r\n}\r\n.cf_option_list_3cols .column { \r\n  width: 33%;\r\n  float: left;\r\n}\r\n.cf_option_list_4cols .column { \r\n  width: 25%;\r\n  float: left;\r\n}\r\n\r\n/* Used for the date and time pickers */\r\n.cf_date_group img {\r\n  margin-bottom: -4px;\r\n  padding: 1px;\r\n}\r\n\r\n', 'core'),
(31, 'edit_submission_onload_resources', '<script src="{$g_root_url}/global/codemirror/js/codemirror.js"></script>|<script src="{$g_root_url}/global/scripts/jquery-ui-timepicker-addon.js"></script>|<script src="{$g_root_url}/global/fancybox/jquery.fancybox-1.3.4.pack.js"></script> |<link rel="stylesheet" href="{$g_root_url}/global/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />', 'core'),
(32, 'field_type_settings_shared_characteristics', 'field_comments:textbox,comments`textarea,comments`password,comments`dropdown,comments`multi_select_dropdown,comments`radio_buttons,comments`checkboxes,comments`date,comments`time,comments`phone,comments`code_markup,comments`file,comments`google_maps_field,comments`tinymce,comments|data_source:dropdown,contents`multi_select_dropdown,contents`radio_buttons,contents`checkboxes,contents|column_formatting:checkboxes,formatting`radio_buttons,formatting|maxlength_attr:textbox,maxlength|colour_highlight:textbox,highlight|folder_path:file,folder_path|folder_url:file,folder_url|permitted_file_types:file,folder_url|max_file_size:file,max_file_size|date_display_format:date,display_format|apply_timezone_offset:date,apply_timezone_offset', 'core'),
(33, 'file_upload_dir', 'http://forms.coop/upload', 'core'),
(34, 'file_upload_filetypes', 'bmp,gif,jpg,jpeg,png,avi,mp3,mp4,doc,txt,pdf,xml,csv,swf,fla,xls,tif', 'core'),
(35, 'file_upload_url', 'http://forms.coop/upload', 'core'),
(36, 'file_upload_max_size', '200', 'core'),
(37, 'forms_page_default_message', '{$LANG.text_client_welcome}', 'core'),
(38, 'logo_link', 'http://www.formtools.org', 'core'),
(39, 'min_password_length', '', 'core'),
(40, 'num_clients_per_page', '10', 'core'),
(41, 'num_emails_per_page', '10', 'core'),
(42, 'num_forms_per_page', '10', 'core'),
(43, 'num_menus_per_page', '10', 'core'),
(44, 'num_modules_per_page', '10', 'core'),
(45, 'num_option_lists_per_page', '10', 'core'),
(46, 'num_password_history', '', 'core'),
(47, 'program_name', 'Form Tools', 'core'),
(48, 'required_password_chars', '', 'core'),
(49, 'timezone_offset', '0', 'core'),
(50, 'core_version_upgrade_track', '2.2.6', 'core'),
(53, 'file_upload_dir', '/opt/lampp/htdocs/www/formtools/upload', 'export_manager'),
(54, 'file_upload_url', 'http://forms.coop/upload', 'export_manager'),
(55, 'default_form_offline_page_content', '<h2 class="ts_heading">Sorry!</h2>\n\n<p>\n  The form is currently offline.\n</p>', 'form_builder'),
(56, 'scheduled_offline_form_behaviour', 'allow_completion', 'form_builder'),
(57, 'default_thankyou_page_content', '<h2 class="ts_heading">Thanks!</h2>\n\n<p>\n  Your form has been processed. Thanks for submitting the form.\n</p>\n\n<p>\n  <a href="?page=1">Click here</a> to put through another submission.\n</p>', 'form_builder'),
(58, 'default_published_folder_path', '/opt/lampp/htdocs/www/formtools/modules/form_builder/published', 'form_builder'),
(59, 'default_published_folder_url', 'http://forms.coop/modules/form_builder/published', 'form_builder'),
(60, 'review_page_title', 'Review', 'form_builder'),
(61, 'thankyou_page_title', 'Thankyou', 'form_builder'),
(62, 'form_builder_width', '1000', 'form_builder'),
(63, 'form_builder_height', '700', 'form_builder'),
(64, 'phrase_edit_in_form_builder_link_action', 'same_window', 'form_builder'),
(65, 'demo_mode', 'off', 'form_builder'),
(66, 'num_pages_per_page', '10', 'pages'),
(67, 'swiftmailer_enabled', 'no', 'swift_mailer'),
(68, 'smtp_server', '', 'swift_mailer'),
(69, 'port', '', 'swift_mailer'),
(70, 'requires_authentication', 'no', 'swift_mailer'),
(71, 'username', '', 'swift_mailer'),
(72, 'password', '', 'swift_mailer'),
(73, 'authentication_procedure', '', 'swift_mailer'),
(74, 'use_encryption', '', 'swift_mailer'),
(75, 'encryption_type', '', 'swift_mailer'),
(76, 'charset', 'UTF-8', 'swift_mailer'),
(77, 'server_connection_timeout', '15', 'swift_mailer'),
(78, 'use_anti_flooding', '', 'swift_mailer'),
(79, 'anti_flooding_email_batch_size', '', 'swift_mailer'),
(80, 'anti_flooding_email_batch_wait_time', '', 'swift_mailer'),
(81, 'admin_num_fields_per_page_1', 'all', 'core'),
(82, 'num_rules_per_page', '10', 'hooks_manager'),
(83, 'show_backup_form_button', 'yes', 'form_backup'),
(84, 'settings_title', 'Flacso Graduados', 'arbitrary_settings'),
(85, 'WSURL', 'https://sgaws.flacso.org.ar/server.php', 'arbitrary_settings'),
(86, 'WSUser', 'test_geneos', 'arbitrary_settings'),
(87, 'WSPassword', 'fl4cs02017', 'arbitrary_settings'),
(88, 'GGTYC', 'Confirmación\r\nADVERTENCIA PREVIA (Artículo 6 de la ley Argentina Nº 25.326)\r\n\r\na) Los datos personales que se requieren para inscribirse al sitio serán conservados bajo estricta confidencialidad y se destinarán a cumplir con las prestaciones del curso propuesto y para ofrecer otros cursos académicos que FLACSO considere que pueda ser de interés.\r\nb) Los datos serán almacenados bajo estrictas normas de seguridad y confidencialidad en las bases de datos de FLACSO, con domicilio en Ayacucho 555.\r\nc) No está obligado/a a entregarnos sus datos personales, simplemente son requeridos como condición para la inscripción al curso y poder brindar los servicios propuestos. Los campos resaltados son necesarios para una correcta inscripción.\r\nd) En caso de que los datos ingresados sean inexactos no podremos continuar con el trámite de inscripción.\r\ne) Cuando usted inicie el curso y acceda a la página, la navegación será automáticamente registrada para el buen desarrollo del curso y control administrativo.\r\nf) Es posible controlar la información personal contenida en la bases de datos de FLACSO, pedir su supresión. A tales fines dirigirse mediante email a <a href="#">secretariacademica@flacso.org.ar</a> o mediante correo postal a la sede de FLACSO Argentina en el domicilio arriba indicado.', 'arbitrary_settings'),
(89, 'GGResetPasswordForm', 'reset-password.php', 'arbitrary_settings'),
(90, 'GGChangePasswordForm', 'change-password.php', 'arbitrary_settings'),
(91, 'GGNewAccountForm', 'new-account.php', 'arbitrary_settings'),
(92, 'GGInscriptionForm', 'inscripcion.php', 'arbitrary_settings'),
(93, 'GGDefaultCountry', '13', 'arbitrary_settings'),
(94, 'GGDefaultProvince', '2', 'arbitrary_settings'),
(95, 'GGDefaultCity', '0', 'arbitrary_settings'),
(96, 'GGResetPasswordChangeForm', 'reset-password-change.php', 'arbitrary_settings');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_themes`
--

CREATE TABLE `ft_themes` (
  `theme_id` mediumint(8) UNSIGNED NOT NULL,
  `theme_folder` varchar(100) NOT NULL,
  `theme_name` varchar(50) NOT NULL,
  `uses_swatches` enum('yes','no') NOT NULL DEFAULT 'no',
  `swatches` mediumtext,
  `author` varchar(200) DEFAULT NULL,
  `author_email` varchar(255) DEFAULT NULL,
  `author_link` varchar(255) DEFAULT NULL,
  `theme_link` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `is_enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  `theme_version` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_themes`
--

INSERT INTO `ft_themes` (`theme_id`, `theme_folder`, `theme_name`, `uses_swatches`, `swatches`, `author`, `author_email`, `author_link`, `theme_link`, `description`, `is_enabled`, `theme_version`) VALUES
(1, 'classicgrey', 'Classic Grey', 'no', '', 'Encore Web Studios', NULL, NULL, 'http://themes.formtools.org/classicgrey/', 'A remodelling of the old grey-styled Form Tools 1.x theme.', 'no', '1.1.3'),
(2, 'default', 'Default', 'yes', 'red,{$LANG.word_red}|orange,{$LANG.word_orange}|yellow,{$LANG.word_yellow}|green,{$LANG.word_green}|aquamarine,{$LANG.word_aquamarine}|blue,{$LANG.word_blue}|dark_blue,{$LANG.phrase_dark_blue}|purple,{$LANG.word_purple}|grey,{$LANG.word_grey}|light_brown,{$LANG.phrase_light_brown}', 'Benjamin Keen', NULL, NULL, 'http://themes.formtools.org', 'The default Form Tools theme. It''s a fixed-width theme requiring 1024 minimum width screens, with a few different colour swatches to choose from.', 'yes', '1.0.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_views`
--

CREATE TABLE `ft_views` (
  `view_id` smallint(6) NOT NULL,
  `form_id` mediumint(8) UNSIGNED NOT NULL,
  `access_type` enum('admin','public','private','hidden') NOT NULL DEFAULT 'public',
  `view_name` varchar(100) NOT NULL,
  `view_order` smallint(6) NOT NULL DEFAULT '1',
  `is_new_sort_group` enum('yes','no') NOT NULL,
  `group_id` smallint(6) DEFAULT NULL,
  `num_submissions_per_page` smallint(6) NOT NULL DEFAULT '10',
  `default_sort_field` varchar(255) NOT NULL DEFAULT 'submission_date',
  `default_sort_field_order` enum('asc','desc') NOT NULL DEFAULT 'desc',
  `may_add_submissions` enum('yes','no') NOT NULL DEFAULT 'yes',
  `may_edit_submissions` enum('yes','no') NOT NULL DEFAULT 'yes',
  `may_delete_submissions` enum('yes','no') NOT NULL DEFAULT 'yes',
  `has_client_map_filter` enum('yes','no') NOT NULL DEFAULT 'no',
  `has_standard_filter` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_views`
--

INSERT INTO `ft_views` (`view_id`, `form_id`, `access_type`, `view_name`, `view_order`, `is_new_sort_group`, `group_id`, `num_submissions_per_page`, `default_sort_field`, `default_sort_field_order`, `may_add_submissions`, `may_edit_submissions`, `may_delete_submissions`, `has_client_map_filter`, `has_standard_filter`) VALUES
(3, 3, 'public', 'Inscripcion default', 1, 'yes', 14, 10, 'submission_date', 'desc', 'yes', 'yes', 'yes', 'no', 'no'),
(5, 4, 'public', 'Resetear Contraseña', 1, 'yes', 36, 10, 'submission_date', 'desc', 'yes', 'yes', 'yes', 'no', 'no'),
(6, 5, 'public', 'Form Builder View', 1, 'yes', 44, 10, 'submission_date', 'desc', 'yes', 'yes', 'yes', 'no', 'no'),
(7, 6, 'public', 'Form Builder View', 1, 'yes', 46, 10, 'submission_date', 'desc', 'yes', 'yes', 'yes', 'no', 'no'),
(8, 7, 'public', 'Resetear Contraseña', 1, 'yes', 48, 10, 'submission_date', 'desc', 'yes', 'yes', 'yes', 'no', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_view_columns`
--

CREATE TABLE `ft_view_columns` (
  `view_id` mediumint(9) NOT NULL,
  `field_id` mediumint(9) NOT NULL,
  `list_order` smallint(6) NOT NULL,
  `is_sortable` enum('yes','no') NOT NULL,
  `auto_size` enum('yes','no') NOT NULL DEFAULT 'yes',
  `custom_width` varchar(10) DEFAULT NULL,
  `truncate` enum('truncate','no_truncate') NOT NULL DEFAULT 'truncate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_view_columns`
--

INSERT INTO `ft_view_columns` (`view_id`, `field_id`, `list_order`, `is_sortable`, `auto_size`, `custom_width`, `truncate`) VALUES
(3, 18, 1, 'yes', 'no', '50', 'truncate'),
(3, 19, 2, 'yes', 'yes', '', 'truncate'),
(3, 20, 3, 'yes', 'yes', '', 'truncate'),
(3, 21, 4, 'yes', 'yes', '', 'truncate'),
(3, 24, 5, 'yes', 'no', '160', 'truncate'),
(5, 69, 1, 'yes', 'no', '50', 'truncate'),
(5, 70, 2, 'yes', 'yes', '', 'truncate'),
(5, 71, 3, 'yes', 'yes', '', 'truncate'),
(5, 75, 4, 'yes', 'no', '160', 'truncate'),
(6, 80, 1, 'yes', 'no', '50', 'truncate'),
(6, 81, 2, 'yes', 'yes', '', 'truncate'),
(6, 82, 3, 'yes', 'yes', '', 'truncate'),
(6, 83, 4, 'yes', 'yes', '', 'truncate'),
(6, 86, 5, 'yes', 'no', '160', 'truncate'),
(7, 89, 1, 'yes', 'no', '50', 'truncate'),
(7, 90, 2, 'yes', 'yes', '', 'truncate'),
(7, 91, 3, 'yes', 'yes', '', 'truncate'),
(7, 92, 4, 'yes', 'yes', '', 'truncate'),
(7, 95, 5, 'yes', 'no', '160', 'truncate'),
(8, 102, 1, 'yes', 'no', '50', 'truncate'),
(8, 103, 2, 'yes', 'yes', '', 'truncate'),
(8, 104, 3, 'yes', 'yes', '', 'truncate'),
(8, 105, 4, 'yes', 'no', '160', 'truncate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_view_fields`
--

CREATE TABLE `ft_view_fields` (
  `view_id` mediumint(8) UNSIGNED NOT NULL,
  `field_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(9) DEFAULT NULL,
  `is_editable` enum('yes','no') NOT NULL DEFAULT 'yes',
  `is_searchable` enum('yes','no') NOT NULL DEFAULT 'yes',
  `list_order` smallint(5) UNSIGNED DEFAULT NULL,
  `is_new_sort_group` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_view_fields`
--

INSERT INTO `ft_view_fields` (`view_id`, `field_id`, `group_id`, `is_editable`, `is_searchable`, `list_order`, `is_new_sort_group`) VALUES
(3, 18, 15, 'no', 'yes', 1, 'yes'),
(3, 19, 15, 'yes', 'yes', 2, 'yes'),
(3, 20, 15, 'yes', 'yes', 3, 'yes'),
(3, 21, 15, 'no', 'yes', 4, 'yes'),
(3, 22, 16, 'yes', 'yes', 3, 'yes'),
(3, 23, 16, 'yes', 'yes', 4, 'yes'),
(3, 24, 15, 'no', 'yes', 5, 'yes'),
(3, 25, 15, 'no', 'yes', 6, 'yes'),
(3, 26, 15, 'no', 'yes', 7, 'yes'),
(3, 27, 16, 'yes', 'no', 5, 'yes'),
(3, 28, 16, 'yes', 'no', 6, 'yes'),
(3, 29, 33, 'yes', 'yes', 7, 'yes'),
(3, 30, 33, 'yes', 'yes', 8, 'yes'),
(3, 31, 16, 'yes', 'yes', 8, 'yes'),
(3, 57, 16, 'yes', 'yes', 2, 'yes'),
(3, 58, 16, 'yes', 'yes', 1, 'yes'),
(3, 59, 16, 'yes', 'no', 7, 'yes'),
(3, 60, 33, 'yes', 'yes', 1, 'yes'),
(3, 61, 33, 'yes', 'yes', 2, 'yes'),
(3, 62, 33, 'yes', 'yes', 3, 'yes'),
(3, 63, 33, 'yes', 'yes', 4, 'yes'),
(3, 64, 33, 'yes', 'yes', 5, 'yes'),
(3, 65, 33, 'yes', 'yes', 6, 'yes'),
(3, 66, 16, 'yes', 'yes', 9, 'yes'),
(3, 67, 43, 'yes', 'yes', 1, 'yes'),
(3, 68, 39, 'yes', 'no', 2, 'yes'),
(3, 79, 39, 'yes', 'no', 1, 'yes'),
(5, 69, 37, 'no', 'yes', 1, 'yes'),
(5, 70, 37, 'yes', 'yes', 2, 'yes'),
(5, 71, 37, 'yes', 'yes', 3, 'yes'),
(5, 75, 37, 'no', 'yes', 4, 'yes'),
(5, 76, 37, 'no', 'yes', 5, 'yes'),
(5, 77, 37, 'no', 'yes', 6, 'yes'),
(6, 80, 45, 'no', 'yes', 1, 'yes'),
(6, 81, 45, 'yes', 'yes', 2, 'yes'),
(6, 82, 45, 'yes', 'yes', 3, 'yes'),
(6, 83, 45, 'yes', 'yes', 4, 'yes'),
(6, 84, 45, 'yes', 'yes', 5, 'yes'),
(6, 85, 45, 'yes', 'yes', 6, 'yes'),
(6, 86, 45, 'no', 'yes', 7, 'yes'),
(6, 87, 45, 'no', 'yes', 8, 'yes'),
(6, 88, 45, 'no', 'yes', 9, 'yes'),
(7, 89, 47, 'no', 'yes', 1, 'yes'),
(7, 90, 47, 'yes', 'yes', 2, 'yes'),
(7, 91, 47, 'yes', 'yes', 3, 'yes'),
(7, 92, 47, 'yes', 'yes', 4, 'yes'),
(7, 93, 47, 'yes', 'yes', 5, 'yes'),
(7, 94, 47, 'yes', 'yes', 6, 'yes'),
(7, 95, 47, 'no', 'yes', 7, 'yes'),
(7, 96, 47, 'no', 'yes', 8, 'yes'),
(7, 97, 47, 'no', 'yes', 9, 'yes'),
(7, 98, 47, 'yes', 'yes', 12, 'yes'),
(7, 99, 47, 'yes', 'yes', 13, 'yes'),
(7, 100, 47, 'yes', 'yes', 10, 'yes'),
(7, 101, 47, 'yes', 'yes', 11, 'yes'),
(8, 102, 49, 'no', 'yes', 1, 'yes'),
(8, 103, 49, 'yes', 'yes', 2, 'yes'),
(8, 104, 49, 'yes', 'yes', 3, 'yes'),
(8, 105, 49, 'no', 'yes', 4, 'yes'),
(8, 106, 49, 'no', 'yes', 5, 'yes'),
(8, 107, 49, 'no', 'yes', 6, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_view_filters`
--

CREATE TABLE `ft_view_filters` (
  `filter_id` mediumint(8) UNSIGNED NOT NULL,
  `view_id` mediumint(8) UNSIGNED NOT NULL,
  `filter_type` enum('standard','client_map') NOT NULL DEFAULT 'standard',
  `field_id` mediumint(8) UNSIGNED NOT NULL,
  `operator` enum('equals','not_equals','like','not_like','before','after') NOT NULL DEFAULT 'equals',
  `filter_values` mediumtext NOT NULL,
  `filter_sql` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ft_view_tabs`
--

CREATE TABLE `ft_view_tabs` (
  `view_id` mediumint(8) UNSIGNED NOT NULL,
  `tab_number` tinyint(3) UNSIGNED NOT NULL,
  `tab_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ft_view_tabs`
--

INSERT INTO `ft_view_tabs` (`view_id`, `tab_number`, `tab_label`) VALUES
(3, 1, 'Acceso'),
(3, 2, 'Datos Personales'),
(3, 3, 'Terminos y Condiciones'),
(3, 4, ''),
(3, 5, ''),
(3, 6, ''),
(5, 1, 'Resetear Contraseña'),
(5, 2, ''),
(5, 3, ''),
(5, 4, ''),
(5, 5, ''),
(5, 6, ''),
(6, 1, 'Page 1'),
(6, 2, ''),
(6, 3, ''),
(6, 4, ''),
(6, 5, ''),
(6, 6, ''),
(7, 1, 'Datos Personales'),
(7, 2, ''),
(7, 3, ''),
(7, 4, ''),
(7, 5, ''),
(7, 6, ''),
(8, 1, 'Resetear Contraseña'),
(8, 2, ''),
(8, 3, ''),
(8, 4, ''),
(8, 5, ''),
(8, 6, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ft_accounts`
--
ALTER TABLE `ft_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indices de la tabla `ft_account_settings`
--
ALTER TABLE `ft_account_settings`
  ADD PRIMARY KEY (`account_id`,`setting_name`);

--
-- Indices de la tabla `ft_client_forms`
--
ALTER TABLE `ft_client_forms`
  ADD PRIMARY KEY (`account_id`,`form_id`);

--
-- Indices de la tabla `ft_client_views`
--
ALTER TABLE `ft_client_views`
  ADD PRIMARY KEY (`account_id`,`view_id`);

--
-- Indices de la tabla `ft_email_templates`
--
ALTER TABLE `ft_email_templates`
  ADD PRIMARY KEY (`email_id`);

--
-- Indices de la tabla `ft_email_template_edit_submission_views`
--
ALTER TABLE `ft_email_template_edit_submission_views`
  ADD PRIMARY KEY (`email_id`,`view_id`);

--
-- Indices de la tabla `ft_email_template_recipients`
--
ALTER TABLE `ft_email_template_recipients`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indices de la tabla `ft_field_options`
--
ALTER TABLE `ft_field_options`
  ADD PRIMARY KEY (`list_id`,`list_group_id`,`option_order`);

--
-- Indices de la tabla `ft_field_settings`
--
ALTER TABLE `ft_field_settings`
  ADD PRIMARY KEY (`field_id`,`setting_id`);

--
-- Indices de la tabla `ft_field_types`
--
ALTER TABLE `ft_field_types`
  ADD PRIMARY KEY (`field_type_id`);

--
-- Indices de la tabla `ft_field_type_settings`
--
ALTER TABLE `ft_field_type_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indices de la tabla `ft_field_type_setting_options`
--
ALTER TABLE `ft_field_type_setting_options`
  ADD PRIMARY KEY (`setting_id`,`option_order`);

--
-- Indices de la tabla `ft_field_type_validation_rules`
--
ALTER TABLE `ft_field_type_validation_rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indices de la tabla `ft_field_validation`
--
ALTER TABLE `ft_field_validation`
  ADD UNIQUE KEY `rule_id` (`rule_id`,`field_id`);

--
-- Indices de la tabla `ft_forms`
--
ALTER TABLE `ft_forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indices de la tabla `ft_form_3`
--
ALTER TABLE `ft_form_3`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indices de la tabla `ft_form_4`
--
ALTER TABLE `ft_form_4`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indices de la tabla `ft_form_5`
--
ALTER TABLE `ft_form_5`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indices de la tabla `ft_form_6`
--
ALTER TABLE `ft_form_6`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indices de la tabla `ft_form_7`
--
ALTER TABLE `ft_form_7`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indices de la tabla `ft_form_email_fields`
--
ALTER TABLE `ft_form_email_fields`
  ADD PRIMARY KEY (`form_email_id`);

--
-- Indices de la tabla `ft_form_fields`
--
ALTER TABLE `ft_form_fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indices de la tabla `ft_hooks`
--
ALTER TABLE `ft_hooks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ft_hook_calls`
--
ALTER TABLE `ft_hook_calls`
  ADD PRIMARY KEY (`hook_id`);

--
-- Indices de la tabla `ft_list_groups`
--
ALTER TABLE `ft_list_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indices de la tabla `ft_menus`
--
ALTER TABLE `ft_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `ft_menu_items`
--
ALTER TABLE `ft_menu_items`
  ADD PRIMARY KEY (`menu_item_id`);

--
-- Indices de la tabla `ft_modules`
--
ALTER TABLE `ft_modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indices de la tabla `ft_module_arbitrary_settings`
--
ALTER TABLE `ft_module_arbitrary_settings`
  ADD PRIMARY KEY (`sid`);

--
-- Indices de la tabla `ft_module_arbitrary_setting_options`
--
ALTER TABLE `ft_module_arbitrary_setting_options`
  ADD PRIMARY KEY (`sid`,`field_order`);

--
-- Indices de la tabla `ft_module_export_groups`
--
ALTER TABLE `ft_module_export_groups`
  ADD PRIMARY KEY (`export_group_id`);

--
-- Indices de la tabla `ft_module_export_group_clients`
--
ALTER TABLE `ft_module_export_group_clients`
  ADD PRIMARY KEY (`export_group_id`,`account_id`);

--
-- Indices de la tabla `ft_module_export_types`
--
ALTER TABLE `ft_module_export_types`
  ADD PRIMARY KEY (`export_type_id`);

--
-- Indices de la tabla `ft_module_form_builder_forms`
--
ALTER TABLE `ft_module_form_builder_forms`
  ADD PRIMARY KEY (`published_form_id`);

--
-- Indices de la tabla `ft_module_form_builder_form_placeholders`
--
ALTER TABLE `ft_module_form_builder_form_placeholders`
  ADD UNIQUE KEY `published_form_id` (`published_form_id`,`placeholder_id`);

--
-- Indices de la tabla `ft_module_form_builder_form_templates`
--
ALTER TABLE `ft_module_form_builder_form_templates`
  ADD PRIMARY KEY (`published_form_id`,`template_type`);

--
-- Indices de la tabla `ft_module_form_builder_templates`
--
ALTER TABLE `ft_module_form_builder_templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indices de la tabla `ft_module_form_builder_template_sets`
--
ALTER TABLE `ft_module_form_builder_template_sets`
  ADD PRIMARY KEY (`set_id`);

--
-- Indices de la tabla `ft_module_form_builder_template_set_placeholders`
--
ALTER TABLE `ft_module_form_builder_template_set_placeholders`
  ADD PRIMARY KEY (`placeholder_id`);

--
-- Indices de la tabla `ft_module_form_builder_template_set_placeholder_opts`
--
ALTER TABLE `ft_module_form_builder_template_set_placeholder_opts`
  ADD PRIMARY KEY (`placeholder_id`,`field_order`);

--
-- Indices de la tabla `ft_module_form_builder_template_set_resources`
--
ALTER TABLE `ft_module_form_builder_template_set_resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indices de la tabla `ft_module_hooks_manager_rules`
--
ALTER TABLE `ft_module_hooks_manager_rules`
  ADD PRIMARY KEY (`hook_id`);

--
-- Indices de la tabla `ft_module_menu_items`
--
ALTER TABLE `ft_module_menu_items`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `ft_module_pages`
--
ALTER TABLE `ft_module_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indices de la tabla `ft_module_pages_clients`
--
ALTER TABLE `ft_module_pages_clients`
  ADD PRIMARY KEY (`page_id`,`client_id`);

--
-- Indices de la tabla `ft_module_swift_mailer_email_template_fields`
--
ALTER TABLE `ft_module_swift_mailer_email_template_fields`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indices de la tabla `ft_multi_page_form_urls`
--
ALTER TABLE `ft_multi_page_form_urls`
  ADD PRIMARY KEY (`form_id`,`page_num`);

--
-- Indices de la tabla `ft_new_view_submission_defaults`
--
ALTER TABLE `ft_new_view_submission_defaults`
  ADD PRIMARY KEY (`view_id`,`field_id`);

--
-- Indices de la tabla `ft_option_lists`
--
ALTER TABLE `ft_option_lists`
  ADD PRIMARY KEY (`list_id`);

--
-- Indices de la tabla `ft_public_form_omit_list`
--
ALTER TABLE `ft_public_form_omit_list`
  ADD PRIMARY KEY (`form_id`,`account_id`);

--
-- Indices de la tabla `ft_public_view_omit_list`
--
ALTER TABLE `ft_public_view_omit_list`
  ADD PRIMARY KEY (`view_id`,`account_id`);

--
-- Indices de la tabla `ft_sessions`
--
ALTER TABLE `ft_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indices de la tabla `ft_settings`
--
ALTER TABLE `ft_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indices de la tabla `ft_themes`
--
ALTER TABLE `ft_themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indices de la tabla `ft_views`
--
ALTER TABLE `ft_views`
  ADD PRIMARY KEY (`view_id`);

--
-- Indices de la tabla `ft_view_columns`
--
ALTER TABLE `ft_view_columns`
  ADD PRIMARY KEY (`view_id`,`field_id`,`list_order`);

--
-- Indices de la tabla `ft_view_fields`
--
ALTER TABLE `ft_view_fields`
  ADD PRIMARY KEY (`view_id`,`field_id`);

--
-- Indices de la tabla `ft_view_filters`
--
ALTER TABLE `ft_view_filters`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indices de la tabla `ft_view_tabs`
--
ALTER TABLE `ft_view_tabs`
  ADD PRIMARY KEY (`view_id`,`tab_number`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ft_accounts`
--
ALTER TABLE `ft_accounts`
  MODIFY `account_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ft_email_templates`
--
ALTER TABLE `ft_email_templates`
  MODIFY `email_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ft_email_template_recipients`
--
ALTER TABLE `ft_email_template_recipients`
  MODIFY `recipient_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ft_field_types`
--
ALTER TABLE `ft_field_types`
  MODIFY `field_type_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `ft_field_type_settings`
--
ALTER TABLE `ft_field_type_settings`
  MODIFY `setting_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `ft_field_type_validation_rules`
--
ALTER TABLE `ft_field_type_validation_rules`
  MODIFY `rule_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `ft_forms`
--
ALTER TABLE `ft_forms`
  MODIFY `form_id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ft_form_3`
--
ALTER TABLE `ft_form_3`
  MODIFY `submission_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
--
-- AUTO_INCREMENT de la tabla `ft_form_4`
--
ALTER TABLE `ft_form_4`
  MODIFY `submission_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `ft_form_5`
--
ALTER TABLE `ft_form_5`
  MODIFY `submission_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ft_form_6`
--
ALTER TABLE `ft_form_6`
  MODIFY `submission_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ft_form_7`
--
ALTER TABLE `ft_form_7`
  MODIFY `submission_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `ft_form_email_fields`
--
ALTER TABLE `ft_form_email_fields`
  MODIFY `form_email_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ft_form_fields`
--
ALTER TABLE `ft_form_fields`
  MODIFY `field_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT de la tabla `ft_hooks`
--
ALTER TABLE `ft_hooks`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT de la tabla `ft_hook_calls`
--
ALTER TABLE `ft_hook_calls`
  MODIFY `hook_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT de la tabla `ft_list_groups`
--
ALTER TABLE `ft_list_groups`
  MODIFY `group_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `ft_menus`
--
ALTER TABLE `ft_menus`
  MODIFY `menu_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ft_menu_items`
--
ALTER TABLE `ft_menu_items`
  MODIFY `menu_item_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `ft_modules`
--
ALTER TABLE `ft_modules`
  MODIFY `module_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `ft_module_arbitrary_settings`
--
ALTER TABLE `ft_module_arbitrary_settings`
  MODIFY `sid` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ft_module_export_groups`
--
ALTER TABLE `ft_module_export_groups`
  MODIFY `export_group_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ft_module_export_types`
--
ALTER TABLE `ft_module_export_types`
  MODIFY `export_type_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ft_module_form_builder_forms`
--
ALTER TABLE `ft_module_form_builder_forms`
  MODIFY `published_form_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ft_module_form_builder_templates`
--
ALTER TABLE `ft_module_form_builder_templates`
  MODIFY `template_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `ft_module_form_builder_template_sets`
--
ALTER TABLE `ft_module_form_builder_template_sets`
  MODIFY `set_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ft_module_form_builder_template_set_placeholders`
--
ALTER TABLE `ft_module_form_builder_template_set_placeholders`
  MODIFY `placeholder_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `ft_module_form_builder_template_set_resources`
--
ALTER TABLE `ft_module_form_builder_template_set_resources`
  MODIFY `resource_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ft_module_menu_items`
--
ALTER TABLE `ft_module_menu_items`
  MODIFY `menu_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `ft_module_pages`
--
ALTER TABLE `ft_module_pages`
  MODIFY `page_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ft_option_lists`
--
ALTER TABLE `ft_option_lists`
  MODIFY `list_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ft_settings`
--
ALTER TABLE `ft_settings`
  MODIFY `setting_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT de la tabla `ft_themes`
--
ALTER TABLE `ft_themes`
  MODIFY `theme_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ft_views`
--
ALTER TABLE `ft_views`
  MODIFY `view_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ft_view_filters`
--
ALTER TABLE `ft_view_filters`
  MODIFY `filter_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
