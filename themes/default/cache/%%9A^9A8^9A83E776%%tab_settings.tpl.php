<?php /* Smarty version 2.6.18, created on 2017-01-31 14:59:02
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_settings.tpl', 15, false),array('function', 'eval', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_settings.tpl', 44, false),)), $this); ?>
  <div class="subtitle underline margin_top_large">CUSTOMIZABLE SETTINGS</div>

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
" method="post">

    <div class="hint margin_bottom_large">
      <?php echo $this->_tpl_vars['L']['text_settings_tab_desc']; ?>

    </div>

    <?php if (count($this->_tpl_vars['field_type_settings']) == 0): ?>
      <div class="notify">
        <div style="padding: 6px"><?php echo $this->_tpl_vars['L']['notify_no_field_type_settings']; ?>
</div>
      </div>
      <p>
        <input type="button" value="<?php echo $this->_tpl_vars['L']['phrase_add_setting_rightarrow']; ?>
" onclick="window.location='?page=add_setting'" />
      </p>
    <?php else: ?>

      <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
        <input type="hidden" name="field_type_id" value="<?php echo $this->_tpl_vars['field_type_info']['field_type_id']; ?>
" />
        <div class="sortable list_settings" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
          <ul class="header_row">
            <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
            <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_setting_name']; ?>
</li>
            <li class="col3"><?php echo $this->_tpl_vars['LANG']['phrase_field_type']; ?>
</li>
            <li class="col4"><?php echo $this->_tpl_vars['L']['word_identifier']; ?>
</li>
            <li class="col5 edit"></li>
            <li class="col6 colN del"></li>
          </ul>
          <div class="clear"></div>
          <ul class="rows">
          <?php $_from = $this->_tpl_vars['field_type_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
        $this->_foreach['row']['iteration']++;
?>
            <li class="sortable_row">
              <div class="row_content">
                <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                  <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['i']['setting_id']; ?>
" />
                  <ul>
                    <li class="col1 sort_col"><?php echo $this->_tpl_vars['i']['list_order']; ?>
</li>
                    <li class="col2"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['i']['field_label']), $this);?>
</li>
                    <li class="col3">
                      <?php if ($this->_tpl_vars['i']['field_type'] == 'textbox'): ?>
                        <?php echo $this->_tpl_vars['LANG']['word_textbox']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == 'textarea'): ?>
                        <?php echo $this->_tpl_vars['LANG']['word_textarea']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == 'password'): ?>
                        <?php echo $this->_tpl_vars['LANG']['word_password']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == 'radios'): ?>
                        <?php echo $this->_tpl_vars['LANG']['phrase_radio_buttons']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == 'checkboxes'): ?>
                        <?php echo $this->_tpl_vars['LANG']['word_checkboxes']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == 'select'): ?>
                        <?php echo $this->_tpl_vars['LANG']['word_dropdown']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == "multi-select"): ?>
                        <?php echo $this->_tpl_vars['LANG']['phrase_multi_select']; ?>

                      <?php elseif ($this->_tpl_vars['i']['field_type'] == 'option_list_or_form_field'): ?>
                        <?php echo $this->_tpl_vars['LANG']['phrase_option_list']; ?>
 / <?php echo $this->_tpl_vars['LANG']['phrase_form_field']; ?>

                      <?php endif; ?>
                    </li>
                    <li class="col4"><?php echo $this->_tpl_vars['i']['field_setting_identifier']; ?>
</li>
                    <li class="col5 edit"><a href="edit.php?page=edit_setting&setting_id=<?php echo $this->_tpl_vars['i']['setting_id']; ?>
"></a></li>
                    <li class="col6 colN del"></li>
                  </ul>
                  <div class="clear"></div>
                </div>
              </div>
              <div class="clear"></div>
            </li>
          <?php endforeach; endif; unset($_from); ?>
          </ul>
          <div class="clear"></div>
        </div>

        <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'yes' || $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
        <p>
          <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
          <input type="button" value="<?php echo $this->_tpl_vars['L']['phrase_add_setting_rightarrow']; ?>
" onclick="window.location='?page=add_setting'" />
        </p>
        <?php endif; ?>

      </form>

    <?php endif; ?>

  </form>