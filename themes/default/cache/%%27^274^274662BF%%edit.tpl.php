<?php /* Smarty version 2.6.18, created on 2017-01-31 14:57:44
         compiled from /opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eval', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/edit.tpl', 11, false),array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/edit.tpl', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0" class="margin_bottom_large">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_custom_fields.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="./"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo smarty_function_eval(array('var' => $this->_tpl_vars['field_type_info']['field_type_name'],'assign' => 'field_type_name'), $this);?>

      <?php echo $this->_tpl_vars['field_type_name']; ?>

    </td>
  </tr>
  </table>

  <?php echo smarty_function_ft_include(array('file' => 'tabset_open.tpl'), $this);?>

  <?php if ($this->_tpl_vars['page'] == 'main'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_main.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'displaying'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_displaying.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'saving'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_saving.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'validation'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_validation.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'add_validation_rule'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_add_validation_rule.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'edit_validation_rule'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_edit_validation_rule.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'settings'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_settings.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'add_setting'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_add_setting.tpl'), $this);?>

  <?php elseif ($this->_tpl_vars['page'] == 'edit_setting'): ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_edit_setting.tpl'), $this);?>

  <?php else: ?>
    <?php echo smarty_function_ft_include(array('file' => '../../modules/custom_fields/templates/tab_main.tpl'), $this);?>

  <?php endif; ?>
  <?php echo smarty_function_ft_include(array('file' => 'tabset_close.tpl'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>