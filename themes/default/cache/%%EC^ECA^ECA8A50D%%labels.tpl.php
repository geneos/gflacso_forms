<?php /* Smarty version 2.6.18, created on 2017-05-11 19:35:46
         compiled from /opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/labels.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_arbitrary_settings.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="./"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['word_labels']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['module_description']; ?>

  </div>

  <form action="labels.php" method="post">

    <table cellspacing="0" cellpadding="0" class="list_table">
    <tr>
      <td class="pad_left_small" width="150"><?php echo $this->_tpl_vars['L']['phrase_settings_title']; ?>
</td>
      <td>
        <input type="text" name="settings_title" value="<?php echo $this->_tpl_vars['settings']['settings_title']; ?>
" style="width: 99%" />
        <div class="medium_grey">
          <?php echo $this->_tpl_vars['L']['text_settings_title_hint']; ?>

        </div>
      </td>
    </table>

    <p>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </p>
  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>