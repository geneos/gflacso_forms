<?php /* Smarty version 2.6.18, created on 2017-02-08 20:50:05
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_placeholder.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_placeholder.tpl', 2, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_placeholder.tpl', 13, false),)), $this); ?>
  <div class="subtitle underline margin_top_large">
    <a href="?page=placeholders"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_placeholders'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a> &raquo; <?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_edit_placeholder'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

  </div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" onsubmit="return rsv.validate(this, rules)">
    <input type="hidden" name="placeholder_id" id="placeholder_id" value="<?php echo $this->_tpl_vars['placeholder_id']; ?>
" />

    <table cellspacing="2" cellpadding="1" class="margin_bottom_large">
    <tr>
      <td width="180"><?php echo $this->_tpl_vars['L']['phrase_placeholder_label']; ?>
</td>
      <td><input type="text" name="placeholder_label" style="width:550px" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['placeholder_info']['placeholder_label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['word_placeholder']; ?>
</td>
      <td>
        <input type="text" name="placeholder" style="width:550px" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['placeholder_info']['placeholder'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
        <div class="hint"><?php echo $this->_tpl_vars['text_placeholder_hint']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_field_type']; ?>
</td>
      <td>
        <select name="field_type" id="field_type">
          <option value="" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['phrase_please_select']; ?>
</option>
          <option value="textbox" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'textbox'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_textbox']; ?>
</option>
          <option value="textarea" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'textarea'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_textarea']; ?>
</option>
          <option value="radios" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'radios'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['phrase_radio_buttons']; ?>
</option>
          <option value="checkboxes" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'checkboxes'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_checkboxes']; ?>
</option>
          <option value="select" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'select'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['word_dropdown']; ?>
</option>
          <option value="multi-select" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == "multi-select"): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['phrase_multi_select']; ?>
</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_default_value']; ?>
</td>
      <td><input type="text" name="default_value" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['placeholder_info']['default_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:550px" /></td>
    </tr>
    </table>

    <div id="field_options_div" <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'textbox' || $this->_tpl_vars['placeholder_info']['field_type'] == 'textarea' || $this->_tpl_vars['placeholder_info']['field_type'] == 'password'): ?>style="display:none"<?php endif; ?>>
      <div class="margin_bottom_large subtitle underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_field_options'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>
      <table>
        <tr>
          <td width="140"><?php echo $this->_tpl_vars['L']['word_orientation']; ?>
</td>
          <td>
            <input type="radio" name="field_orientation" id="fo1" value="horizontal"
              <?php if ($this->_tpl_vars['placeholder_info']['field_orientation'] == 'horizontal'): ?>checked="checked"<?php endif; ?>
              <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'select' || $this->_tpl_vars['placeholder_info']['field_type'] == "multi-select"): ?>disabled="disabled"<?php endif; ?> />
              <label for="fo1"><?php echo $this->_tpl_vars['LANG']['word_horizontal']; ?>
</label>
            <input type="radio" name="field_orientation" id="fo2" value="vertical"
              <?php if ($this->_tpl_vars['placeholder_info']['field_orientation'] == 'vertical'): ?>checked="checked"<?php endif; ?>
              <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'select' || $this->_tpl_vars['placeholder_info']['field_type'] == "multi-select"): ?>disabled="disabled"<?php endif; ?> />
              <label for="fo2"><?php echo $this->_tpl_vars['LANG']['word_vertical']; ?>
</label>
            <input type="radio" name="field_orientation" id="fo3" value="na"
              <?php if ($this->_tpl_vars['placeholder_info']['field_orientation'] == 'na'): ?>checked="checked"<?php endif; ?>
              <?php if ($this->_tpl_vars['placeholder_info']['field_type'] == 'checkboxes' || $this->_tpl_vars['placeholder_info']['field_type'] == 'radios'): ?>disabled="disabled"<?php endif; ?> />
              <label for="fo3"><?php echo $this->_tpl_vars['LANG']['word_na']; ?>
</label>
          </td>
        </tr>
        <tr>
          <td valign="top"><?php echo $this->_tpl_vars['LANG']['word_options']; ?>
</td>
          <td>
            <div class="sortable placeholder_option_list" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
              <ul class="header_row">
                <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
                <li class="col2"><?php echo $this->_tpl_vars['LANG']['word_option']; ?>
</li>
                <li class="col3 colN del"></li>
              </ul>
              <div class="clear"></div>
              <ul class="rows">
                <?php $_from = $this->_tpl_vars['placeholder_info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option_info']):
?>
                <li class="sortable_row">
                  <div class="row_content">
                    <div class="row_group">
                      <ul>
                        <li class="col1 sort_col"><?php echo $this->_tpl_vars['option_info']['field_order']; ?>
</li>
                        <li class="col2">
                          <input type="text" name="placeholder_options[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option_info']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                        </li>
                        <li class="col3 colN del"></li>
                      </ul>
                    </div>
                  </div>
                  <div class="clear"></div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
              </ul>
            </div>
            <div class="clear"></div>
            <div>
              <a href="#" onclick="return fb_ns.add_placeholder_row()"><?php echo $this->_tpl_vars['LANG']['phrase_add_row']; ?>
</a>
            </div>
          </td>
        </tr>
      </table>
    </div>

    <p>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </p>

  </form>