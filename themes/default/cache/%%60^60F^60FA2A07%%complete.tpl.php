<?php /* Smarty version 2.6.18, created on 2017-02-07 14:28:12
         compiled from /opt/lampp/htdocs/www/formtools/modules/form_backup/templates/complete.tpl */ ?>
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

  <div id="form_copier_nav">
    <div><a href="index.php">1. <?php echo $this->_tpl_vars['L']['phrase_select_form']; ?>
</a></div>
    <div>2. <?php echo $this->_tpl_vars['LANG']['word_settings']; ?>
</div>
    <div>3. <?php echo $this->_tpl_vars['LANG']['word_complete']; ?>
</div>
  </div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <p>
    <input type="button" onclick="window.location='index.php'" value="<?php echo $this->_tpl_vars['L']['phrase_backup_another_form']; ?>
" />
  </p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>