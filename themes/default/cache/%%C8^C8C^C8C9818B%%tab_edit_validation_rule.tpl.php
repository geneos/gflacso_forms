<?php /* Smarty version 2.6.18, created on 2017-05-29 13:04:53
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_edit_validation_rule.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_edit_validation_rule.tpl', 1, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_edit_validation_rule.tpl', 23, false),array('function', 'rsv_rules', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_edit_validation_rule.tpl', 18, false),)), $this); ?>
  <div class="subtitle underline margin_top_large"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_edit_validation_rule'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'no' && ! $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <?php $this->assign('g_success', true); ?>
    <?php $this->assign('g_message', $this->_tpl_vars['L']['text_non_editable_field_type']); ?>
  <?php endif; ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" onsubmit="return rsv.validate(this, rules)">
    <input type="hidden" name="page" value="edit_validation_rule" />
    <input type="hidden" name="rule_id" value="<?php echo $this->_tpl_vars['rule']['rule_id']; ?>
" />
    <input type="hidden" name="field_type_id" value="<?php echo $this->_tpl_vars['field_type_info']['field_type_id']; ?>
" />

    <table cellspacing="1" cellpadding="1" border="0">
    <tr>
      <td width="150"><?php echo $this->_tpl_vars['LANG']['phrase_validation_rule']; ?>
</td>
      <td><?php echo smarty_function_rsv_rules(array('name_id' => 'rsv_rule','default' => $this->_tpl_vars['rule']['rsv_rule'],'omit' => $this->_tpl_vars['existing_validation_rules']), $this);?>
</td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['word_label']; ?>
</td>
      <td>
        <input type="text" name="rule_label" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['rule']['rule_label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="full_width" maxlength="100" />
        <div class="light_grey"><?php echo $this->_tpl_vars['L']['text_rule_label_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_default_error_message']; ?>
</td>
      <td>
        <input type="text" name="default_error_message" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['rule']['default_error_message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="full_width" />
        <div class="light_grey"><?php echo $this->_tpl_vars['L']['text_default_error_message_desc']; ?>
</div>
      </td>
    </tr>
    </table>

    <div id="custom_function_settings" <?php if ($this->_tpl_vars['rule']['rsv_rule'] != 'function'): ?>class="hidden"<?php endif; ?>>
      <table cellspacing="1" cellpadding="1" border="0">
      <tr>
        <td width="150" valign="top"><?php echo $this->_tpl_vars['L']['phrase_custom_function']; ?>
</td>
        <td><input type="text" name="custom_function" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['rule']['custom_function'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="100" class="full_width" /></td>
      </tr>
      <tr>
        <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_is_required_field_q']; ?>
</td>
        <td>
          <input type="radio" name="custom_function_required" id="cfe1" value="yes" <?php if ($this->_tpl_vars['rule']['custom_function_required'] == 'yes'): ?>checked="checked"<?php endif; ?> />
            <label for="cfe1"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</label>
          <input type="radio" name="custom_function_required" id="cfe2" value="no" <?php if ($this->_tpl_vars['rule']['custom_function_required'] != 'yes'): ?>checked="checked"<?php endif; ?> />
            <label for="cfe2"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</label>
          <div class="light_grey"><?php echo $this->_tpl_vars['L']['text_required_custom_function_desc']; ?>
</div>
        </td>
      </tr>
      </table>
    </div>

    <div id="standard_settings" <?php if ($this->_tpl_vars['rule']['rsv_rule'] == 'function'): ?>class="hidden"<?php endif; ?>>
      <table cellspacing="1" cellpadding="1" border="0">
      <tr>
        <td width="150" valign="top"><?php echo $this->_tpl_vars['L']['phrase_field_name']; ?>
</td>
        <td>
          <input type="text" name="rsv_field_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['rule']['rsv_field_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="255" class="full_width" />
          <div class="light_grey"><?php echo $this->_tpl_vars['L']['text_rsv_field_name_desc']; ?>
</div>
        </td>
      </tr>
      </table>
    </div>

    <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'yes' || $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <p>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </p>
    <?php endif; ?>

  </form>