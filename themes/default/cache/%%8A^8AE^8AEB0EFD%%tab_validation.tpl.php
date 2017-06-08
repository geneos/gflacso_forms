<?php /* Smarty version 2.6.18, created on 2017-01-31 14:58:59
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_validation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_validation.tpl', 1, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_validation.tpl', 17, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_validation.tpl', 45, false),array('function', 'display_rsv_rule_name', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_validation.tpl', 43, false),array('function', 'eval', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_validation.tpl', 44, false),)), $this); ?>
  <div class="subtitle underline margin_top_large"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_validation'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
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
" method="post">
    <input type="hidden" name="field_type_id" value="<?php echo $this->_tpl_vars['field_type_info']['field_type_id']; ?>
" />

    <div class="margin_bottom_large hint">
      <?php echo $this->_tpl_vars['L']['text_validation_tab_intro']; ?>

    </div>

    <?php if (count($this->_tpl_vars['field_type_info']['validation']) == 0): ?>
      <div class="notify margin_bottom">
        <div style="padding: 6px;">
          <?php echo $this->_tpl_vars['L']['text_no_validation_rules_defined']; ?>

        </div>
      </div>
    <?php else: ?>
      <div class="sortable validation_rules" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
        <input type="hidden" class="sortable__custom_delete_handler" value="cf_ns.delete_validation_rule" />
        <ul class="header_row">
          <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
          <li class="col2"><?php echo $this->_tpl_vars['LANG']['phrase_validation_rule']; ?>
</li>
          <li class="col3"><?php echo $this->_tpl_vars['L']['word_label']; ?>
</li>
          <li class="col4"><?php echo $this->_tpl_vars['L']['phrase_default_error_message']; ?>
</li>
          <li class="col5 edit"></li>
          <li class="col6 colN del"></li>
        </ul>
        <div class="clear"></div>
        <ul class="rows">
          <?php $_from = $this->_tpl_vars['field_type_info']['validation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
        $this->_foreach['row']['iteration']++;
?>
            <li class="sortable_row">
              <div class="row_content">
                <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                  <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['i']['rule_id']; ?>
" />
                  <ul>
                    <li class="col1 sort_col"><?php echo $this->_tpl_vars['i']['list_order']; ?>
</li>
                    <li class="col2"><?php echo smarty_function_display_rsv_rule_name(array('rule' => $this->_tpl_vars['i']['rsv_rule']), $this);?>
</li>
                    <li class="col3"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['i']['rule_label']), $this);?>
</li>
                    <li class="col4"><?php echo smarty_function_eval(array('var' => ((is_array($_tmp=$this->_tpl_vars['i']['default_error_message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>
</li>
                    <li class="col5 edit"><a href="?page=edit_validation_rule&field_type_id=<?php echo $this->_tpl_vars['field_type_id']; ?>
&rule_id=<?php echo $this->_tpl_vars['i']['rule_id']; ?>
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
    <?php endif; ?>

    <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'yes' || $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <p>
      <?php if (count($this->_tpl_vars['field_type_info']['validation']) > 1): ?>
        <input type="submit" name="update_order" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
      <?php endif; ?>
      <input type="button" value="<?php echo $this->_tpl_vars['L']['phrase_add_validation_rule_rightarrow']; ?>
" onclick="window.location='?page=add_validation_rule'" />
    </p>
    <?php endif; ?>

  </form>