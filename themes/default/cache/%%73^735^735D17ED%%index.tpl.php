<?php /* Smarty version 2.6.18, created on 2017-02-07 14:25:42
         compiled from /opt/lampp/htdocs/www/formtools/modules/form_backup/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'forms_dropdown', '/opt/lampp/htdocs/www/formtools/modules/form_backup/templates/index.tpl', 29, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0" class="margin_bottom_large">
  <tr>
    <td width="45"><a href="index.php"><img src="images/form_backup.gif" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['module_name']; ?>

    </td>
  </tr>
  </table>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_module_intro']; ?>

  </div>

  <div id="form_copier_nav">
    <div>1. <?php echo $this->_tpl_vars['L']['phrase_select_form']; ?>
</div>
    <div class="unselected">2. <?php echo $this->_tpl_vars['LANG']['word_settings']; ?>
</div>
    <div class="unselected">3. <?php echo $this->_tpl_vars['LANG']['word_complete']; ?>
</div>
  </div>

  <form action="step2.php" method="post">

    <table cellspacing="0" cellpadding="0" class="form_backup_table">
    <tr>
      <td width="140"><?php echo $this->_tpl_vars['L']['phrase_select_form']; ?>
</td>
      <td><?php echo smarty_function_forms_dropdown(array('name_id' => 'form_id'), $this);?>
</td>
    </tr>
    </table>

    <p>
      <input type="submit" value="<?php echo $this->_tpl_vars['L']['word_continue']; ?>
" />
    </p>
  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>