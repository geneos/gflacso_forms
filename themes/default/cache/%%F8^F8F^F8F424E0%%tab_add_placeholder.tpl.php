<?php /* Smarty version 2.6.18, created on 2017-02-08 21:03:54
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_add_placeholder.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_add_placeholder.tpl', 2, false),)), $this); ?>
  <div class="subtitle underline margin_top_large">
    <a href="?page=placeholders"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_placeholders'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a> &raquo; <?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_add_placeholder'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

  </div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" onsubmit="return rsv.validate(this, rules)">
    <input type="hidden" name="num_rows" id="num_rows" value="0" />

    <table cellspacing="2" cellpadding="1" class="margin_bottom_large">
    <tr>
      <td width="150"><?php echo $this->_tpl_vars['L']['phrase_placeholder_label']; ?>
</td>
      <td><input type="text" name="placeholder_label" style="width:580px" maxlength="255" /></td>
    </tr>
    <tr>
      <td valign="top" width="150"><?php echo $this->_tpl_vars['L']['word_placeholder']; ?>
</td>
      <td>
        <input type="text" name="placeholder" style="width:580px" maxlength="255" />
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_placeholder_hint']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_field_type']; ?>
</td>
      <td>
        <select name="field_type" id="field_type">
          <option value="" selected><?php echo $this->_tpl_vars['LANG']['phrase_please_select']; ?>
</option>
          <option value="textbox"><?php echo $this->_tpl_vars['LANG']['word_textbox']; ?>
</option>
          <option value="textarea"><?php echo $this->_tpl_vars['LANG']['word_textarea']; ?>
</option>
          <option value="radios"><?php echo $this->_tpl_vars['LANG']['phrase_radio_buttons']; ?>
</option>
          <option value="checkboxes"><?php echo $this->_tpl_vars['LANG']['word_checkboxes']; ?>
</option>
          <option value="select"><?php echo $this->_tpl_vars['LANG']['word_dropdown']; ?>
</option>
          <option value="multi-select"><?php echo $this->_tpl_vars['LANG']['phrase_multi_select']; ?>
</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_default_value']; ?>
</td>
      <td><input type="text" name="default_value" value="" style="width:580px" /></td>
    </tr>
    </table>

    <div id="field_options_div" style="display:none">
      <div class="margin_bottom_large subtitle underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_field_options'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>
      <table>
        <tr>
          <td width="140"><?php echo $this->_tpl_vars['L']['word_orientation']; ?>
</td>
          <td>
            <input type="radio" name="field_orientation" id="fo1" value="horizontal" checked />
              <label for="fo1"><?php echo $this->_tpl_vars['LANG']['word_horizontal']; ?>
</label>
            <input type="radio" name="field_orientation" id="fo2" value="vertical" />
              <label for="fo2"><?php echo $this->_tpl_vars['LANG']['word_vertical']; ?>
</label>
            <input type="radio" name="field_orientation" id="fo3" value="na" />
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
      <input type="submit" name="add_placeholder" value="<?php echo $this->_tpl_vars['L']['phrase_add_placeholder']; ?>
" />
    </p>

  </form>