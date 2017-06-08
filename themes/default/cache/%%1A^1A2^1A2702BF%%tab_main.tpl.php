<?php /* Smarty version 2.6.18, created on 2017-01-31 14:57:44
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_main.tpl', 1, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_main.tpl', 14, false),array('function', 'eval', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_main.tpl', 28, false),array('function', 'field_sizes_dropdown', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_main.tpl', 56, false),)), $this); ?>
  <div class="subtitle underline margin_top_large"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_main_settings'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
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

  <form action="<?php echo $this->_tpl_vars['samepage']; ?>
" method="post">
    <table cellspacing="1" cellpadding="0" class="list_table main_tab_table margin_bottom_large">
    <tr>
      <td class="pad_left_small" valign="top" width="200"><?php echo $this->_tpl_vars['L']['phrase_field_type_name']; ?>
</td>
      <td>
        <input type="text" name="field_type_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_type_info']['field_type_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="full_width" />
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_field_type_name_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td class="pad_left_small" valign="top"><?php echo $this->_tpl_vars['L']['phrase_field_type_identifier']; ?>
</td>
      <td class="medium_grey"><?php echo $this->_tpl_vars['field_type_info']['field_type_identifier']; ?>
</td>
    </tr>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['L']['phrase_field_type_group']; ?>
</td>
      <td>
        <select name="group_id">
          <?php $_from = $this->_tpl_vars['field_type_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_info']):
?>
            <option value="<?php echo $this->_tpl_vars['group_info']['group_id']; ?>
"
              <?php if ($this->_tpl_vars['field_type_info']['group_id'] == $this->_tpl_vars['group_info']['group_id']): ?>selected<?php endif; ?>><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['group_info']['group_name']), $this);?>
</option>
          <?php endforeach; endif; unset($_from); ?>
        </select>
      </td>
    </tr>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['L']['phrase_is_file_field']; ?>
</td>
      <td>
        <input type="radio" name="is_file_field" value="yes" id="iff1" <?php if ($this->_tpl_vars['field_type_info']['is_file_field'] == 'yes'): ?>checked<?php endif; ?>
          /><label for="iff1"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</label>
        <input type="radio" name="is_file_field" value="no" id="iff2" <?php if ($this->_tpl_vars['field_type_info']['is_file_field'] == 'no'): ?>checked<?php endif; ?>
          /><label for="iff2"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</label>
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_file_field_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['L']['phrase_is_date_field']; ?>
</td>
      <td>
        <input type="radio" name="is_date_field" value="yes" id="idf1" <?php if ($this->_tpl_vars['field_type_info']['is_date_field'] == 'yes'): ?>checked<?php endif; ?>
          /><label for="idf1"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</label>
        <input type="radio" name="is_date_field" value="no" id="idf2" <?php if ($this->_tpl_vars['field_type_info']['is_date_field'] == 'no'): ?>checked<?php endif; ?>
          /><label for="idf2"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</label>
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_date_field_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['L']['phrase_compatible_field_sizes']; ?>
</td>
      <td>
        <?php echo smarty_function_field_sizes_dropdown(array('name' => "compatible_field_sizes[]",'multiple' => 'true','size' => '5','default' => $this->_tpl_vars['compatible_field_sizes']), $this);?>

        <div class="hint"><?php echo $this->_tpl_vars['L']['text_field_size_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['L']['phrase_raw_field_type_map']; ?>
</td>
      <td>
        <select name="raw_field_type_map" id="raw_field_type_map">
          <option value=""><?php echo $this->_tpl_vars['LANG']['word_na']; ?>
</option>
          <optgroup label="<?php echo $this->_tpl_vars['LANG']['phrase_field_types']; ?>
">
            <?php $_from = $this->_tpl_vars['raw_field_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
              <option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if ($this->_tpl_vars['k'] == $this->_tpl_vars['field_type_info']['raw_field_type_map']): ?>selected<?php endif; ?>><?php echo smarty_function_eval(array('var' => ($this->_tpl_vars['LANG'][$this->_tpl_vars['i']])), $this);?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </optgroup>
        </select>

        <select name="raw_field_type_map_multi_select_id" id="raw_field_type_map_multi_select_id"
        <?php if ($this->_tpl_vars['field_type_info']['raw_field_type_map'] != "radio-buttons" && $this->_tpl_vars['field_type_info']['raw_field_type_map'] != 'checkboxes' && $this->_tpl_vars['field_type_info']['raw_field_type_map'] != 'select' && $this->_tpl_vars['field_type_info']['raw_field_type_map'] != "multi-select"): ?>class="hidden"<?php endif; ?>>
          <option value=""><?php echo $this->_tpl_vars['L']['phrase_select_setting_containing_option_list']; ?>
</option>
          <?php $_from = $this->_tpl_vars['field_type_info']['settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['setting_info']):
?>
            <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'option_list_or_form_field'): ?>
              <option value="<?php echo $this->_tpl_vars['setting_info']['setting_id']; ?>
"
                <?php if ($this->_tpl_vars['field_type_info']['raw_field_type_map_multi_select_id'] == $this->_tpl_vars['setting_info']['setting_id']): ?>selected="selected"<?php endif; ?>><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['setting_info']['field_label']), $this);?>
</option>
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
        </select>
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_raw_field_type_desc']; ?>
</div>
      </td>
    </tr>
    </table>

    <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'yes' || $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <div>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </div>
    <?php endif; ?>

  </form>