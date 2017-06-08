<?php /* Smarty version 2.6.18, created on 2017-01-30 16:40:31
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/forms/tab_email_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/tab_email_settings.tpl', 5, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/tab_email_settings.tpl', 13, false),array('modifier', 'default', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/tab_email_settings.tpl', 24, false),array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/tab_email_settings.tpl', 7, false),array('function', 'dropdown', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/tab_email_settings.tpl', 39, false),)), $this); ?>
  <div class="previous_page_icon">
    <a href="edit.php?page=emails&form_id=<?php echo $this->_tpl_vars['form_id']; ?>
"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/up.jpg" title="<?php echo $this->_tpl_vars['LANG']['phrase_previous_page']; ?>
" alt="<?php echo $this->_tpl_vars['LANG']['phrase_previous_page']; ?>
" border="0" /></a>
  </div>

  <div class="subtitle underline margin_top_large"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_form_email_field_configuration'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php echo smarty_function_ft_include(array('file' => 'messages.tpl'), $this);?>


  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['LANG']['text_email_settings_intro']; ?>

  </div>

  <?php if (count($this->_tpl_vars['registered_form_emails']) > 0): ?>
    <table class="list_table margin_bottom_large" cellspacing="1" cellpadding="0">
    <tr>
      <th width="200" class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['word_email']; ?>
</th>
      <th class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_first_name']; ?>
</th>
      <th class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_name_or_last_name']; ?>
</th>
      <th class="del"></th>
    </tr>
    <?php $_from = $this->_tpl_vars['registered_form_emails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['email_info']):
?>
      <tr>
        <td class="pad_left_small"><?php echo $this->_tpl_vars['email_info']['email_field_label']; ?>
</td>
        <td class="pad_left_small"><?php echo ((is_array($_tmp=@$this->_tpl_vars['email_info']['first_name_field_label'])) ? $this->_run_mod_handler('default', true, $_tmp, '&#8212;') : smarty_modifier_default($_tmp, '&#8212;')); ?>
</td>
        <td class="pad_left_small"><?php echo ((is_array($_tmp=@$this->_tpl_vars['email_info']['last_name_field_label'])) ? $this->_run_mod_handler('default', true, $_tmp, '&#8212;') : smarty_modifier_default($_tmp, '&#8212;')); ?>
</td>
        <td class="del"><a href="#" onclick="return emails_ns.delete_form_email_field_config(<?php echo $this->_tpl_vars['email_info']['form_email_id']; ?>
)"></a></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['columns']) > 0): ?>
    <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" onsubmit="return rsv.validate(this, g.rules)">
      <input type="hidden" name="page" value="email_settings" />

      <table class="margin_bottom_large" cellspacing="1" cellpadding="0">
        <tr>
          <td width="140" class="pad_right_large"><?php echo $this->_tpl_vars['LANG']['word_email']; ?>
</td>
          <td width="120"><?php echo smarty_function_dropdown(array('options' => $this->_tpl_vars['columns'],'name' => 'email_field_id','tabindex' => '1'), $this);?>
</td>
          <td rowspan="3" align="center" width="120">
            <input type="submit" name="update_email_settings" value="<?php echo $this->_tpl_vars['LANG']['phrase_register_new_email']; ?>
" tabindex="4" />
          </td>
        </tr>
        <tr>
          <td class="pad_right_large"><?php echo $this->_tpl_vars['LANG']['phrase_first_name']; ?>
</td>
          <td><?php echo smarty_function_dropdown(array('options' => $this->_tpl_vars['columns'],'name' => 'first_name_field_id','blank_option_text' => $this->_tpl_vars['LANG']['word_na'],'tabindex' => '2'), $this);?>
</td>
        </tr>
        <tr>
          <td class="pad_right_large"><?php echo $this->_tpl_vars['LANG']['phrase_name_or_last_name']; ?>
</td>
          <td><?php echo smarty_function_dropdown(array('options' => $this->_tpl_vars['columns'],'name' => 'last_name_field_id','blank_option_text' => $this->_tpl_vars['LANG']['word_na'],'tabindex' => '3'), $this);?>
</td>
        </tr>
      </table>

    </form>
  <?php endif; ?>