<?php /* Smarty version 2.6.18, created on 2017-02-07 14:25:48
         compiled from /opt/lampp/htdocs/www/formtools/modules/form_backup/templates/step2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/modules/form_backup/templates/step2.tpl', 30, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/form_backup/templates/step2.tpl', 66, false),)), $this); ?>
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
    <div class="unselected">3. <?php echo $this->_tpl_vars['LANG']['word_complete']; ?>
</div>
  </div>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_choose_settings']; ?>

  </div>

  <form action="complete.php" method="post">
    <input type="hidden" name="form_id" value="<?php echo $this->_tpl_vars['form_id']; ?>
" />

    <table cellpadding="0" cellspacing="0" width="100%" class="form_backup_table">
    <tr>
      <td width="180" class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_new_form_name']; ?>
</td>
      <td><input type="text" name="form_name" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['form_info']['form_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
    </tr>
    <tr>
      <td class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_copy_submissions']; ?>
</td>
      <td>
        <input type="radio" name="copy_submissions" value="yes" id="cs1" checked />
          <label for="cs1"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</label>
        <input type="radio" name="copy_submissions" value="no" id="cs2" />
          <label for="cs2"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</label>
      </td>
    </tr>
    <tr>
      <td class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_disable_new_form']; ?>
</td>
      <td>
        <input type="radio" name="form_disabled" value="yes" id="fd1" checked />
          <label for="fd1"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</label>
        <input type="radio" name="form_disabled" value="no" id="fd2" />
          <label for="fd2"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</label>
      </td>
    </tr>
    <tr>
      <td class="medium_grey"><?php echo $this->_tpl_vars['LANG']['word_views']; ?>
</td>
      <td>
        <?php $_from = $this->_tpl_vars['views']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['view']):
?>
          <input type="checkbox" name="view_ids[]" value="<?php echo $this->_tpl_vars['view']['view_id']; ?>
" id="view_<?php echo $this->_tpl_vars['view']['view_id']; ?>
" checked />
            <label for="view_<?php echo $this->_tpl_vars['view']['view_id']; ?>
"><?php echo $this->_tpl_vars['view']['view_name']; ?>
</label><br />
        <?php endforeach; endif; unset($_from); ?>
      </td>
    </tr>
    <tr>
      <td class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_email_templates']; ?>
</td>
      <td>
        <?php $_from = $this->_tpl_vars['emails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['email']):
?>
          <input type="checkbox" name="email_ids[]" value="<?php echo $this->_tpl_vars['email']['email_id']; ?>
" id="email_<?php echo $this->_tpl_vars['email']['email_id']; ?>
" checked />
            <label for="email_<?php echo $this->_tpl_vars['email']['email_id']; ?>
"><?php echo $this->_tpl_vars['email']['email_template_name']; ?>
</label><br />
        <?php endforeach; endif; unset($_from); ?>
        <?php if (count($this->_tpl_vars['emails']) == 0): ?>
          <span class="light_grey">No email templates defined</span>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_form_permissions']; ?>
</td>
      <td>
        <input type="radio" name="form_permissions" value="same_permissions" id="fp1" checked />
          <label for="fp1"><?php echo $this->_tpl_vars['L']['phrase_same_permissions_as_base_form']; ?>
</label><br />
        <input type="radio" name="form_permissions" value="admin" id="fp2" />
          <label for="fp2"><?php echo $this->_tpl_vars['LANG']['phrase_admin_only']; ?>
</label>
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