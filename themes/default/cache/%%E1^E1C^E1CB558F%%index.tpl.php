<?php /* Smarty version 2.6.18, created on 2017-01-31 14:56:01
         compiled from /opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eval', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/index.tpl', 42, false),array('function', 'field_sizes_dropdown', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/index.tpl', 71, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/index.tpl', 59, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/index.tpl', 100, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_custom_fields.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['module_name']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_module_intro']; ?>

  </div>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" id="custom_fields_form">
    <input type="hidden" name="update_page" value="1" />

        <input type="hidden" name="new_field_type_id" id="new_field_type_id" value="" />

    <div class="sortable_groups" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
      <input type="hidden" class="sortable__custom_delete_handler" value="cf_ns.delete_row" />
      <input type="hidden" class="sortable__delete_group_handler" value="cf_ns.delete_group" />
      <input type="hidden" class="sortable__class" value="edit_custom_fields" />
      <input type="hidden" class="sortable__edit_tooltip" value="<?php echo $this->_tpl_vars['L']['phrase_edit_field_type']; ?>
" />
      <input type="hidden" class="sortable__delete_tooltip" value="<?php echo $this->_tpl_vars['L']['phrase_delete_field_type']; ?>
" />
      <input type="hidden" class="sortable__new_group_name" value="<?php echo $this->_tpl_vars['LANG']['phrase_group_name']; ?>
" />

    <?php $_from = $this->_tpl_vars['grouped_field_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['curr_group_info']):
        $this->_foreach['group']['iteration']++;
?>
      <?php $this->assign('group_info', $this->_tpl_vars['curr_group_info']['group']); ?>
      <?php $this->assign('field_types', $this->_tpl_vars['curr_group_info']['field_types']); ?>

      <div class="sortable_group">
        <div class="sortable_group_header">
          <div class="sort"></div>
          <label><?php echo $this->_tpl_vars['LANG']['phrase_group_name']; ?>
</label>
          <input type="text" name="group_name_<?php echo $this->_tpl_vars['group_info']['group_id']; ?>
" class="group_name" value="<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['group_info']['group_name']), $this);?>
" />
          <div class="delete_group"></div>
          <input type="hidden" class="group_order" value="<?php echo $this->_tpl_vars['group_info']['group_id']; ?>
" />
          <div class="clear"></div>
        </div>
        <div class="sortable edit_custom_fields">
          <ul class="header_row">
            <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
            <li class="col2"><?php echo $this->_tpl_vars['LANG']['phrase_field_type']; ?>
</li>
            <li class="col3"><?php echo $this->_tpl_vars['L']['word_identifier']; ?>
</li>
            <li class="col4"><?php echo $this->_tpl_vars['L']['phrase_compatible_field_sizes']; ?>
</li>
            <li class="col5"><?php echo $this->_tpl_vars['LANG']['word_validation']; ?>
</li>
            <li class="col6"><?php echo $this->_tpl_vars['LANG']['word_settings']; ?>
</li>
            <li class="col7 edit"></li>
            <li class="col8 colN del"></li>
          </ul>
          <div class="clear"></div>
          <ul class="rows check_areas connected_sortable<?php if (count($this->_tpl_vars['field_types']) > 0): ?> has_rows_onload<?php endif; ?>">
            <li class="sortable_row empty_group<?php if (count($this->_tpl_vars['field_types']) != 0): ?> hidden<?php endif; ?>"><div class="clear"></div></li>
            <?php $this->assign('previous_item', ""); ?>
            <?php $_from = $this->_tpl_vars['field_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
        $this->_foreach['row']['iteration']++;
?>
              <li class="sortable_row<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                <div class="row_content">
                  <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                    <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['i']['field_type_id']; ?>
" />
                    <ul>
                      <li class="col1 sort_col"><?php echo $this->_tpl_vars['i']['list_order']; ?>
</li>
                      <li class="col2"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['i']['field_type_name']), $this);?>
</li>
                      <li class="col3"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['i']['field_type_identifier']), $this);?>
</li>
                      <li class="col4"><?php echo smarty_function_field_sizes_dropdown(array('name' => 'compatible_field_sizes','field_type_id' => $this->_tpl_vars['i']['field_type_id']), $this);?>
</li>
                      <li class="col5 check_area"><a href="edit.php?page=validation&field_type_id=<?php echo $this->_tpl_vars['i']['field_type_id']; ?>
"><?php echo count($this->_tpl_vars['i']['validation']); ?>
</a></li>
                      <li class="col6 check_area"><a href="edit.php?page=settings&field_type_id=<?php echo $this->_tpl_vars['i']['field_type_id']; ?>
"><?php echo count($this->_tpl_vars['i']['settings']); ?>
</a></li>
                      <li class="col7 edit"><a href="edit.php?field_type_id=<?php echo $this->_tpl_vars['i']['field_type_id']; ?>
"></a></li>
                      <li class="col8 colN <?php if ($this->_tpl_vars['i']['is_editable'] == 'yes'): ?> del<?php endif; ?><?php if ($this->_tpl_vars['i']['non_editable_info']): ?> info<?php endif; ?>"></li>
                    </ul>
                    <div class="clear"></div>
                  </div>
                </div>
                <div class="clear"></div>
              </li>
            <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>
        <div class="clear"></div>
        <div class="sortable_group_footer">
          <a href="#" class="add_field_link"><?php echo $this->_tpl_vars['L']['phrase_add_field_type_rightarrow']; ?>
</a>
        </div>
      </div>

      <div class="clear"></div>
    <?php endforeach; endif; unset($_from); ?>
    </div>

    <div class="margin_bottom_large">
      <a href="#" class="add_group_link"><?php echo $this->_tpl_vars['LANG']['phrase_add_new_group_rightarrow']; ?>
</a>
    </div>

    <div class="margin_bottom_large">
      <input type="submit" name="update" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_update'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
" />
    </div>

  </form>

  <div class="hidden" id="add_field_popup">
    <div class="add_field_error hidden error"></div>
    <table cellspacing="1" cellpadding="3" width="100%">
    <tr>
      <td width="140" valign="top"><?php echo $this->_tpl_vars['L']['phrase_field_name']; ?>
</td>
      <td><input type="text" class="field_type_name" /></td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_field_type_identifier']; ?>
</td>
      <td>
        <input type="text" class="field_type_identifier" />
        <div class="hint"><?php echo $this->_tpl_vars['L']['text_field_type_identifier_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['word_group']; ?>
</td>
      <td>
        <select class="group_id" id="original_field_group_id">
        <?php $_from = $this->_tpl_vars['field_type_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_info']):
?>
          <option value="<?php echo $this->_tpl_vars['group_info']['group_id']; ?>
"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['group_info']['group_name']), $this);?>
</option>
        <?php endforeach; endif; unset($_from); ?>
      </select>
      </td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_base_field_type_on']; ?>
</td>
      <td>
        <select class="original_field_type_id">
          <option value=""><?php echo $this->_tpl_vars['L']['phrase_new_field_b']; ?>
</option>
          <?php $_from = $this->_tpl_vars['grouped_field_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['curr_group_info']):
        $this->_foreach['group']['iteration']++;
?>
            <?php $this->assign('field_types', $this->_tpl_vars['curr_group_info']['field_types']); ?>
             <?php $_from = $this->_tpl_vars['field_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
        $this->_foreach['row']['iteration']++;
?>
              <option value="<?php echo $this->_tpl_vars['i']['field_type_id']; ?>
"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['i']['field_type_name']), $this);?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          <?php endforeach; endif; unset($_from); ?>
        </select>
      </td>
    </tr>
    </table>
  </div>

  <div class="hidden add_group_popup" id="add_group_popup">
    <input type="hidden" class="add_group_popup_title" value="<?php echo $this->_tpl_vars['L']['phrase_create_new_custom_field_group']; ?>
" />
    <input type="hidden" class="sortable__add_group_handler" value="cf_ns.create_new_group" />
    <div class="add_field_error hidden error"></div>
    <table cellspacing="1" cellpadding="3" width="100%">
    <tr>
      <td width="140"><?php echo $this->_tpl_vars['LANG']['phrase_group_name']; ?>
</td>
      <td><input type="text" class="new_group_name" /></td>
    </tr>
    </table>
  </div>

  <!-- for the add group functionality -->
  <div id="sortable__new_group_header" class="hidden">
    <ul class="header_row">
      <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
      <li class="col2"><?php echo $this->_tpl_vars['LANG']['phrase_field_type']; ?>
</li>
      <li class="col3"><?php echo $this->_tpl_vars['L']['word_identifier']; ?>
</li>
      <li class="col4"><?php echo $this->_tpl_vars['L']['phrase_compatible_field_sizes']; ?>
</li>
      <li class="col5"><?php echo $this->_tpl_vars['LANG']['word_validation']; ?>
</li>
      <li class="col6"><?php echo $this->_tpl_vars['LANG']['word_settings']; ?>
</li>
      <li class="col7 edit"></li>
      <li class="col8 colN del"></li>
    </ul>
  </div>
  <div id="sortable__new_group_footer" class="hidden">
    <div class="sortable_group_footer">
      <a href="#" class="add_field_link"><?php echo $this->_tpl_vars['L']['phrase_add_field_type_rightarrow']; ?>
</a>
    </div>
  </div>

  <div id="delete_group_popup" class="hidden">
    <?php echo $this->_tpl_vars['LANG']['phrase_please_wait']; ?>

  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>