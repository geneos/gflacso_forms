<?php /* Smarty version 2.6.18, created on 2017-05-31 12:25:57
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/header.tpl', 7, false),array('modifier', 'replace', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/header.tpl', 22, false),)), $this); ?>
<html>
<head>
  <title><?php echo $this->_tpl_vars['form_name']; ?>
</title>
  <?php echo $this->_tpl_vars['required_resources']; ?>

  <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/gflacso_graduados/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/gflacso_graduados/templates/template_sets/css/general.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/gflacso_graduados/templates/template_sets/css/custom_<?php echo ((is_array($_tmp=$this->_tpl_vars['P']['customColors'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.css">
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/gflacso_graduados/templates/template_sets/js/general.js"></script>
   <script type="text/javascript" src="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/gflacso_graduados/templates/template_sets/js/spin.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

</head>
</head>
<body>
    <div id="loading"></div>
    <div class="container-fluid">
      <?php if ($this->_tpl_vars['headerContent']): ?>
      <div id="header" class="row">
        <div class="col-sm-8 col-sm-offset-2 ts_header">

            <?php if ($this->_tpl_vars['headerLogo']): ?>
              <?php $this->assign('temp_logo', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['P']['imagen_header'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '_') : smarty_modifier_replace($_tmp, ' ', '_'))); ?>

              <div class="col-sm-6">
                <img  class="logo" src="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/gflacso_graduados/templates/template_sets/images/<?php echo $this->_tpl_vars['temp_logo']; ?>
.png" />
              </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['headerText']): ?>
              <div class="col-sm-6">
                <h2><?php echo $this->_tpl_vars['P']['header_texto']; ?>
</h2>
              </div>
            <?php endif; ?>
          </div>
      </div>
      <?php endif; ?>

      <div class="row form-title">
        <div class="col-sm-8 col-sm-offset-2">
          <h1><?php echo $this->_tpl_vars['form_name']; ?>
</h1>
        </div>
      </div>
 