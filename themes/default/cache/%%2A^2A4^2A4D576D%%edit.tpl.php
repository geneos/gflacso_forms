<?php /* Smarty version 2.6.18, created on 2017-05-11 19:35:26
         compiled from /opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/edit.tpl', 19, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/edit.tpl', 26, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/edit.tpl', 52, false),)), $this); ?>
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
      <?php echo $this->_tpl_vars['L']['phrase_edit_setting']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" onsubmit="return rsv.validate(this, rules)">
    <input type="hidden" name="num_rows" id="num_rows" value="<?php echo count($this->_tpl_vars['setting_info']['options']); ?>
" />
    <input type="hidden" name="field_order" id="field_order" value="<?php echo $this->_tpl_vars['setting_info']['field_order']; ?>
" />
    <input type="hidden" name="placeholder" value="" />

    <table cellspacing="1" cellpadding="1" border="0" class="margin_bottom_large">
    <tr>
      <td width="150"><?php echo $this->_tpl_vars['L']['phrase_setting_label']; ?>
</td>
      <td><input type="text" name="setting_label" style="width:589px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['setting_info']['setting_label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_setting_identifier']; ?>
</td>
      <td>
        <input type="text" name="setting_identifier" style="width:200px" maxlength="100" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['setting_info']['setting_identifier'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_setting_identifier_hint']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_field_type']; ?>
</td>
      <td>
        <select name="field_type" id="field_type" onchange="as_ns.change_field_type(this.value)">
          <option value="" <?php if ($this->_tpl_vars['setting_info']['field_type'] == ""): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['phrase_please_select']; ?>
</option>
          <option value="textbox" <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'textbox'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_textbox']; ?>
</option>
          <option value="textarea" <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'textarea'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_textarea']; ?>
</option>
          <option value="radios" <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'radios'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['phrase_radio_buttons']; ?>
</option>
          <option value="checkboxes" <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'checkboxes'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_checkboxes']; ?>
</option>
          <option value="select" <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'select'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_dropdown']; ?>
</option>
          <option value="multi-select" <?php if ($this->_tpl_vars['setting_info']['field_type'] == "multi-select"): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['phrase_multi_select']; ?>
</option>
        </select>
      </td>
    </tr>
    </table>

    <div id="field_options_div" <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'textbox' || $this->_tpl_vars['setting_info']['field_type'] == 'textarea' || $this->_tpl_vars['setting_info']['field_type'] == 'password'): ?>style="display:none"<?php endif; ?>>
      <div class="margin_bottom_large subtitle underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_field_options'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>
      <table>
        <tr>
          <td width="140"><?php echo $this->_tpl_vars['L']['word_orientation']; ?>
</td>
          <td>
            <input type="radio" name="field_orientation" id="fo1" value="horizontal"
              <?php if ($this->_tpl_vars['setting_info']['field_orientation'] == 'horizontal'): ?>checked<?php endif; ?>
              <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'select' || $this->_tpl_vars['setting_info']['field_type'] == "multi-select"): ?>disabled<?php endif; ?> />
              <label for="fo1"><?php echo $this->_tpl_vars['LANG']['word_horizontal']; ?>
</label>
            <input type="radio" name="field_orientation" id="fo2" value="vertical"
              <?php if ($this->_tpl_vars['setting_info']['field_orientation'] == 'vertical'): ?>checked<?php endif; ?>
              <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'select' || $this->_tpl_vars['setting_info']['field_type'] == "multi-select"): ?>disabled<?php endif; ?> />
              <label for="fo2"><?php echo $this->_tpl_vars['LANG']['word_vertical']; ?>
</label>
            <input type="radio" name="field_orientation" id="fo3" value="na"
              <?php if ($this->_tpl_vars['setting_info']['field_orientation'] == 'na'): ?>checked<?php endif; ?>
              <?php if ($this->_tpl_vars['setting_info']['field_type'] == 'radios' || $this->_tpl_vars['setting_info']['field_type'] == 'checkboxes'): ?>disabled<?php endif; ?> />
              <label for="fo3"><?php echo $this->_tpl_vars['LANG']['word_na']; ?>
</label>
          </td>
        </tr>
        <tr>
          <td width="140" valign="top"><?php echo $this->_tpl_vars['L']['phrase_field_option_source']; ?>
</td>
          <td>
                <table cellspacing="1" cellpadding="0" id="field_options_table" class="list_table" style="width: 448px">
                <tbody>
                  <tr>
                    <th width="40"> </th>
                    <th><?php echo $this->_tpl_vars['LANG']['phrase_display_text']; ?>
</th>
                    <th class="del"></th>
                  </tr>
                  <?php $_from = $this->_tpl_vars['setting_info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option']):
        $this->_foreach['row']['iteration']++;
?>
                    <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
                      <tr id="row_<?php echo $this->_tpl_vars['count']; ?>
">
                        <td class="medium_grey" align="center" id="field_option_<?php echo $this->_tpl_vars['count']; ?>
_order"><?php echo $this->_tpl_vars['count']; ?>
</td>
                        <td><input type="text" style="width:99%" name="field_option_text_<?php echo $this->_tpl_vars['count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
                        <td class="del"><a href="#" onclick="as_ns.delete_field_option(<?php echo $this->_tpl_vars['count']; ?>
)"></a></td>
                      </tr>
                    <?php endforeach; endif; unset($_from); ?>
                  </tbody>
                </table>

                <div>
                  <a href="#" onclick="as_ns.add_field_option(null, null)"><?php echo $this->_tpl_vars['LANG']['phrase_add_row']; ?>
</a>
                </div>

          </td>
        </tr>
      </table>
    </div>

    <p>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
      <input type="button" name="delete" value="<?php echo $this->_tpl_vars['LANG']['word_delete']; ?>
" class="red" onclick="page_ns.delete_field(<?php echo $this->_tpl_vars['setting_info']['sid']; ?>
)" />
    </p>

  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>