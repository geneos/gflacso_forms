<?php /* Smarty version 2.6.18, created on 2017-05-08 21:16:30
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/forms/delete_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/delete_form.tpl', 1, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/delete_form.tpl', 28, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/delete_form.tpl', 36, false),)), $this); ?>
<?php echo smarty_function_ft_include(array('file' => 'header.tpl'), $this);?>


  <table cellpadding="0" cellspacing="0" class="margin_bottom_large">
  <tr>
    <td width="45"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/icon_forms.gif" width="34" height="34" /></td>
    <td class="title">
	    <a href="./"><?php echo $this->_tpl_vars['LANG']['word_forms']; ?>
</a> <span class="joiner">&raquo;</span>
	    <a href="./"><?php echo $this->_tpl_vars['form_info']['form_name']; ?>
</a> (<span class="identifier"><?php echo $this->_tpl_vars['form_id']; ?>
</span>)
	    <span class="joiner">&raquo;</span>
	    <?php echo $this->_tpl_vars['LANG']['phrase_delete_form']; ?>

    </td>
  </tr>
  </table>

  <div class="error yellow_bg">
    <div style="padding: 8px;">
      <b><?php echo $this->_tpl_vars['LANG']['word_warning_c']; ?>
</b> <?php echo $this->_tpl_vars['LANG']['text_delete_form_warning']; ?>

    </div>
  </div>

  <?php echo smarty_function_ft_include(array('file' => "messages.tpl"), $this);?>


  <form method="post" action="<?php echo $this->_tpl_vars['same_page']; ?>
" onsubmit="return rsv.validate(this, rules)" id="delete_form_form">
    <input type="hidden" name="form_id" value="<?php echo $this->_tpl_vars['form_id']; ?>
" />
    <input type="checkbox" name="delete_form" id="delete_form" value="yes" />
    <label for="delete_form"><?php echo $this->_tpl_vars['LANG']['text_confirm_delete_form']; ?>
</label><br />

    <?php if (count($this->_tpl_vars['uploaded_files']) > 0): ?>
      <input type="checkbox" name="delete_files" id="delete_files" value="yes" />
      <label for="delete_files"><?php echo $this->_tpl_vars['LANG']['text_delete_all_forms']; ?>
</label>
      (<a href="#" onclick="page_ns.show_uploaded_files(); return false"><?php echo $this->_tpl_vars['LANG']['phrase_view_uploaded_files']; ?>
</a>)<br />
    <?php endif; ?>

    <br />
    <input type="button" name="sss" value="<?php echo $this->_tpl_vars['LANG']['phrase_return_form_list']; ?>
" onclick="window.location='index.php'" />
    <input type="submit" name="sss2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_delete_form'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
" class="bold" />
  </form>

  <?php if (count($this->_tpl_vars['uploaded_files']) > 0): ?>
    <div id="uploaded_files" style="display: none;">
      <br />
      <hr size="1" />
      <?php $_from = $this->_tpl_vars['uploaded_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file_info']):
?>
        <a href="<?php echo $this->_tpl_vars['file_info']['folder_url']; ?>
/<?php echo $this->_tpl_vars['file_info']['filename']; ?>
" target="_blank"><?php echo $this->_tpl_vars['file_info']['filename']; ?>
</a><br />
      <?php endforeach; endif; unset($_from); ?>
    </div>
  <?php endif; ?>

<?php echo smarty_function_ft_include(array('file' => 'footer.tpl'), $this);?>