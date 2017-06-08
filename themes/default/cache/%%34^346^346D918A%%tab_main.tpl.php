<?php /* Smarty version 2.6.18, created on 2017-01-30 17:15:16
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl', 6, false),array('function', 'eval', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl', 48, false),array('function', 'template_hook', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl', 154, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl', 20, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl', 43, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_main.tpl', 183, false),)), $this); ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" id="option_list_form" method="post">
    <input type="hidden" name="update_page" value="1" />
    <input type="hidden" name="num_rows" id="num_rows" value="<?php echo $this->_tpl_vars['total_options']; ?>
" />

    <?php echo smarty_function_ft_include(array('file' => 'messages.tpl'), $this);?>


    <?php if ($this->_tpl_vars['num_fields_using_option_list'] > 1): ?>
      <div class="hint margin_bottom_large">
        <?php echo $this->_tpl_vars['text_option_list_used_by_fields']; ?>

      </div>
    <?php endif; ?>

    <table cellspacing="1" cellpadding="1" class="margin_bottom_large">
    <tr>
      <td valign="top" width="160" class="pad_left_small">
        <label for="option_list_name"><?php echo $this->_tpl_vars['LANG']['phrase_option_list_name']; ?>
</label>
      </td>
      <td>
        <input type="text" name="option_list_name" id="option_list_name" maxlength="100" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_info']['option_list_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
        <div class="light_grey"><?php echo $this->_tpl_vars['LANG']['text_group_name_explanation']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td valign="top" class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_group_options_q']; ?>
</td>
      <td>
        <input type="radio" name="is_grouped" id="go1" value="yes" <?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'yes'): ?>checked<?php endif; ?> />
          <label for="go1"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</label>
        <input type="radio" name="is_grouped" id="go2" value="no" <?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'no'): ?>checked<?php endif; ?> />
          <label for="go2"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</label>
        <div class="light_grey"><?php echo $this->_tpl_vars['LANG']['text_option_list_group_explanation']; ?>
</div>
      </td>
    </tr>
    </table>

    <div class="sortable_groups" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
      <input type="hidden" class="sortable__class" value="edit_option_list groupable" />
      <input type="hidden" class="sortable__delete_tooltip" value="<?php echo $this->_tpl_vars['L']['phrase_delete_row']; ?>
" />
      <input type="hidden" class="sortable__new_group_name" value="<?php echo $this->_tpl_vars['LANG']['phrase_group_name']; ?>
" />
      <input type="hidden" class="sortable__delete_group_handler" value="sf_ns.delete_group" />

            <?php if (count($this->_tpl_vars['list_info']['options']) == 0): ?>
        <div class="sortable_group">
          <div class="sortable_group_header<?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'no'): ?> hidden<?php endif; ?>">
            <div class="sort"></div>
            <label><?php echo $this->_tpl_vars['LANG']['phrase_group_name']; ?>
</label>
            <input type="text" name="group_name_NEW1" class="group_name" value="<?php if ($this->_tpl_vars['group_info']['group_name']): ?><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['group_info']['group_name']), $this);?>
<?php endif; ?>" />
            <div class="delete_group"></div>
            <input type="hidden" class="group_order" value="NEW1" />
            <div class="clear"></div>
          </div>
          <div class="sortable groupable edit_option_list">
            <ul class="header_row">
              <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
              <li class="col2"><?php echo $this->_tpl_vars['LANG']['phrase_field_value']; ?>
</li>
              <li class="col3"><?php echo $this->_tpl_vars['LANG']['phrase_display_text']; ?>
</li>
              <li class="col4 colN del"></li>
            </ul>
            <div class="clear"></div>
            <ul class="rows">
              <li class="sortable_row empty_group"><div class="clear"></div></li>
            </ul>
          </div>
          <div class="sortable_group_footer padded_footer<?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'no'): ?> hidden<?php endif; ?>">
            <div class="right pad_right pad_bottom">
              <?php echo $this->_tpl_vars['LANG']['word_add']; ?>
 <input type="text" class="num_rows_to_add_to_group" size="3" value="1" />
              <input type="button" class="add_rows_to_group_button" value="<?php echo $this->_tpl_vars['LANG']['word_field_sp']; ?>
" />
              <div class="clear"></div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php $this->assign('running_row_count', 0); ?>
      <?php $_from = $this->_tpl_vars['list_info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['curr_group_info']):
        $this->_foreach['group']['iteration']++;
?>
        <?php $this->assign('group_info', $this->_tpl_vars['curr_group_info']['group_info']); ?>
        <?php $this->assign('options', $this->_tpl_vars['curr_group_info']['options']); ?>

        <div class="sortable_group">
          <div class="sortable_group_header<?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'no'): ?> hidden<?php endif; ?>">
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
          <div class="sortable groupable edit_option_list">
            <ul class="header_row">
              <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
              <li class="col2"><?php echo $this->_tpl_vars['LANG']['phrase_field_value']; ?>
</li>
              <li class="col3"><?php echo $this->_tpl_vars['LANG']['phrase_display_text']; ?>
</li>
              <li class="col4 colN del"></li>
            </ul>
            <div class="clear"></div>
            <ul class="rows connected_sortable">
            <li class="sortable_row empty_group<?php if (count($this->_tpl_vars['options']) != 0): ?> hidden<?php endif; ?>"><div class="clear"></div></li>
            <?php $this->assign('previous_item', ""); ?>
            <?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option']):
        $this->_foreach['row']['iteration']++;
?>
              <?php $this->assign('running_row_count', $this->_tpl_vars['running_row_count']+1); ?>
              <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
                <?php if ($this->_tpl_vars['option']['is_new_sort_group'] == 'yes'): ?>
                  <?php if ($this->_tpl_vars['previous_item'] != ""): ?>
                    </div>
                    <div class="clear"></div>
                  </li>
                  <?php endif; ?>
                  <li class="sortable_row">
                   <?php $this->assign('next_item_is_new_sort_group', $this->_tpl_vars['options'][$this->_foreach['row']['iteration']]['is_new_sort_group']); ?>
                   <div class="row_content<?php if ($this->_tpl_vars['next_item_is_new_sort_group'] == 'no'): ?> grouped_row<?php endif; ?>">
                <?php endif; ?>

                <?php $this->assign('previous_item', $this->_tpl_vars['i']); ?>

                <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                  <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['running_row_count']; ?>
" />
                  <ul>
                    <li class="col1 sort_col"><?php echo $this->_tpl_vars['count']; ?>
</li>
                    <li class="col2"><input type="text" name="field_option_value_<?php echo $this->_tpl_vars['running_row_count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></li>
                    <li class="col3"><input type="text" name="field_option_text_<?php echo $this->_tpl_vars['running_row_count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></li>
                    <li class="col4 colN del"></li>
                  </ul>
                  <div class="clear"></div>
                </div>

              <?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?>
                </div>
                <div class="clear"></div>
              </li>
              <?php endif; ?>

            <?php endforeach; endif; unset($_from); ?>
            </ul>
            <div class="clear"></div>
          </div>
          <div class="sortable_group_footer padded_footer<?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'no'): ?> hidden<?php endif; ?>">
            <div class="right pad_right pad_bottom">
              <?php echo $this->_tpl_vars['LANG']['word_add']; ?>
 <input type="text" class="num_rows_to_add_to_group" size="3" value="1" />
              <input type="button" class="add_rows_to_group_button" value="<?php echo $this->_tpl_vars['LANG']['word_field_sp']; ?>
" />
            </div>
          </div>
        </div>
      <?php endforeach; endif; unset($_from); ?>
      <div class="clear"></div>
    </div>

    <div class="add_group_section <?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'no'): ?> hidden<?php endif; ?>">
      <a href="#" class="add_group_link"><?php echo $this->_tpl_vars['LANG']['phrase_add_new_group_rightarrow']; ?>
</a>
    </div>

    <div style="float: left" class="margin_top_large">
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
      <?php echo smarty_function_template_hook(array('location' => 'edit_option_list_main'), $this);?>

    </div>
  </form>

  <div class="margin_top right add_ungrouped_rows<?php if ($this->_tpl_vars['list_info']['is_grouped'] == 'yes'): ?> hidden<?php endif; ?>">
    <form action="" method="post">
      <?php echo $this->_tpl_vars['LANG']['word_add']; ?>
 <input type="text" id="num_rows_to_add" size="3" value="1" />
      <input type="submit" id="add_rows_button" value="<?php echo $this->_tpl_vars['LANG']['word_field_sp']; ?>
" />
    </form>
  </div>


  <div class="clear"></div>

  <div class="grey_box margin_top_large">
    <div><a href="#" id="option_lists_advanced_settings_link"><?php echo $this->_tpl_vars['LANG']['phrase_import_option_list_rightarrow']; ?>
</a></div>
    <div class="hidden" id="option_lists_advanced_settings">
      <div id="smart_fill_messages"></div>
      <table cellspacing="1" cellpadding="0" width="100%" class="margin_bottom_large" height="40">
      <tr>
        <td> </td>
        <td class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_form_field_name']; ?>
</td>
        <td class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_form_url']; ?>
</td>
        <td colspan="2"> </td>
      </tr>
      <tr>
        <td nowrap><?php echo $this->_tpl_vars['LANG']['phrase_smart_fill_fields_from_c']; ?>
</td>
        <td><input type="text" id="smart_fill_source_form_field" style="width:150px" /></td>
        <td><input type="text" id="smart_fill_source_url" style="width:250px" /></td>
        <td><input type="button" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_smart_fill'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
" onclick="sf_ns.smart_fill_field()" /></td>
        <td width="50" align="center">
          <div id="ajax_activity" style="display:none"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/ajax_activity_light_grey.gif" /></div>
          <div id="ajax_no_activity"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/ajax_no_activity_light_grey.gif" /></div>
        </td>
      </tr>
      </table>

      <div class="margin_top_large">
        <div style="float:right"><a href="http://docs.formtools.org/userdoc2_1/index.php?page=fog_editing" target="_blank"><?php echo $this->_tpl_vars['LANG']['phrase_smart_fill_user_documentation']; ?>
</a></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>

  <div id="upload_files_text" style="display:none">
    <?php echo $this->_tpl_vars['LANG']['text_smart_fill_option_list_problem']; ?>


    <form action="<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/code/actions.php?action=upload_scraped_page_for_smart_fill"
      target="hidden_iframe" method="post" enctype="multipart/form-data"
      onsubmit="return sf_ns.validate_upload_file(this)">
      <input type="hidden" name="num_pages" value="1" />

      <table cellspacing="0" cellpadding="0" class="margin_top margin_bottom">
      <tr>
        <td width="90"><?php echo $this->_tpl_vars['LANG']['word_page']; ?>
</td>
        <td><input type="file" name="form_page_1" /></td>
      </tr>
      <tr>
        <td> </td>
        <td><input type="submit" value="<?php echo $this->_tpl_vars['LANG']['phrase_upload_file']; ?>
" class="margin_top_small" /></td>
      </tr>
      </table>
    </form>
  </div>

  <div class="hidden add_group_popup" id="add_group_popup">
    <input type="hidden" class="add_group_popup_title" value="<?php echo $this->_tpl_vars['LANG']['phrase_create_new_option_list_group']; ?>
" />
    <input type="hidden" class="sortable__add_group_handler" value="sf_ns.add_group" />
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
      <li class="col2"><?php echo $this->_tpl_vars['LANG']['phrase_field_value']; ?>
</li>
      <li class="col3"><?php echo $this->_tpl_vars['LANG']['phrase_display_text']; ?>
</li>
      <li class="col4 colN del"></li>
    </ul>
  </div>
  <div id="sortable__new_group_footer" class="hidden">
    <div class="sortable_group_footer padded_footer">
	    <div class="right pad_right pad_bottom">
	      <?php echo $this->_tpl_vars['LANG']['word_add']; ?>
 <input type="text" class="num_rows_to_add_to_group" size="3" value="1" />
	      <input type="button" class="add_rows_to_group_button" value="<?php echo $this->_tpl_vars['LANG']['word_field_sp']; ?>
" />
	    </div>
    </div>
  </div>

  <iframe name="hidden_iframe" id="hidden_iframe" src="" style="width: 0px; height: 0px" frameborder="0"
    onload="sf_ns.log_form_page_as_loaded()"></iframe>
