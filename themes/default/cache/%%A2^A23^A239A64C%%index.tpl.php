<?php /* Smarty version 2.6.18, created on 2017-01-30 16:43:33
         compiled from /opt/lampp/htdocs/www/formtools/modules/form_builder/templates/template_sets/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/template_sets/index.tpl', 5, false),array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/template_sets/index.tpl', 24, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div style="float:right">
    <?php if ($this->_tpl_vars['template_set_info']['is_complete'] == 'yes'): ?>
		  <span class="template_set_marker template_set_complete"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_complete'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span>
    <?php else: ?>
      <span class="template_set_marker template_set_incomplete"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_incomplete'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span>
    <?php endif; ?>
  </div>

  <table cellpadding="0" cellspacing="0" class="margin_bottom_large">
  <tr>
    <td width="45"><a href="../"><img src="../images/icon_form_builder.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="../"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['template_set_info']['set_name']; ?>

    </td>
  </tr>
  </table>

  <?php echo smarty_function_ft_include(array('file' => 'tabset_open.tpl'), $this);?>


    <?php if ($this->_tpl_vars['page'] == 'info'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_info.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'templates'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_templates.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'edit_template'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_edit_template.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'resources'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_resources.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'edit_resource'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_edit_resource.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'placeholders'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_placeholders.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'add_placeholder'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_add_placeholder.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'edit_placeholder'): ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_edit_placeholder.tpl'), $this);?>

    <?php else: ?>
      <?php echo smarty_function_ft_include(array('file' => '../../modules/form_builder/templates/template_sets/tab_info.tpl'), $this);?>

    <?php endif; ?>

  <?php echo smarty_function_ft_include(array('file' => 'tabset_close.tpl'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>