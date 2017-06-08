<?php /* Smarty version 2.6.18, created on 2017-01-30 16:43:33
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_templates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_templates.tpl', 1, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_templates.tpl', 11, false),array('function', 'display_template_type', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_templates.tpl', 50, false),array('function', 'display_template_usage', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_templates.tpl', 55, false),array('function', 'template_types', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_templates.tpl', 111, false),)), $this); ?>
  <div class="subtitle margin_top_large underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_templates'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_template_list_desc']; ?>

  </div>

  <form method="post" action="<?php echo $this->_tpl_vars['same_page']; ?>
">

    <?php if (count($this->_tpl_vars['template_set_info']['templates']) == 0): ?>
      <div class="notify">
        <div style="padding: 6px">
          <?php echo $this->_tpl_vars['L']['notify_no_template_set_defined_click_button']; ?>

        </div>
      </div>
    <?php else: ?>

      <?php if ($this->_tpl_vars['missing_templates_str'] != ""): ?>
        <div class="error margin_bottom_large">
          <div style="padding: 6px">
            <?php echo $this->_tpl_vars['L']['phrase_templates_missing_str_c']; ?>

            <span class="medium_grey"><?php echo $this->_tpl_vars['missing_templates_str']; ?>
</span>
          </div>
        </div>
      <?php endif; ?>

      <div class="sortable template_list" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
        <input type="hidden" class="sortable__custom_delete_handler" value="fb_ns.delete_template" />
        <ul class="header_row">
          <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
          <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_template_name']; ?>
</li>
          <li class="col3"><?php echo $this->_tpl_vars['L']['phrase_template_type']; ?>
</li>
          <li class="col4"><?php echo $this->_tpl_vars['L']['phrase_where_used']; ?>
</li>
          <li class="col5 edit"></li>
          <li class="col6 colN del"></li>
        </ul>
        <div class="clear"></div>
        <ul class="rows">
        <?php $_from = $this->_tpl_vars['template_set_info']['templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
          <?php $this->assign('i', $this->_foreach['row']['iteration']); ?>
          <?php $this->assign('template_id', $this->_tpl_vars['template']['template_id']); ?>
          <li class="sortable_row">
            <div class="row_content">
              <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['template_id']; ?>
" />
                <ul>
                  <li class="col1 sort_col"><?php echo $this->_tpl_vars['i']; ?>
</li>
                  <li class="col2"><?php echo $this->_tpl_vars['template']['template_name']; ?>
</li>
                  <li class="col3"><?php echo smarty_function_display_template_type(array('type' => $this->_tpl_vars['template']['template_type']), $this);?>
</li>
                  <li class="col4">
                    <?php if ($this->_tpl_vars['template']['template_type'] == 'code_block'): ?>
                      <span class="pad_left light_grey">&#8212;</span>
                    <?php else: ?>
                      <?php echo smarty_function_display_template_usage(array('usage' => $this->_tpl_vars['template']['usage']), $this);?>

                    <?php endif; ?>
                  </li>
                  <li class="col5 edit"><a href="index.php?page=edit_template&template_id=<?php echo $this->_tpl_vars['template_id']; ?>
"></a></li>
                  <li class="col6 colN<?php if (count($this->_tpl_vars['template']['usage']) > 0): ?> info<?php else: ?> del<?php endif; ?>"></li>
                </ul>
              </div>
            </div>
            <div class="clear"></div>
          </li>
        <?php endforeach; endif; unset($_from); ?>
        </ul>
      </div>

      <div class="clear"></div>

    <?php endif; ?>

    <p>
      <input type="hidden" id="set_id" value="<?php echo $this->_tpl_vars['template_set_info']['set_id']; ?>
" />
      <?php if (count($this->_tpl_vars['template_set_info']['templates']) > 1): ?>
        <input type="submit" name="update_order" value="<?php echo $this->_tpl_vars['LANG']['phrase_update_order']; ?>
" />
      <?php endif; ?>
      <input type="button" id="create_new_template" value="<?php echo $this->_tpl_vars['L']['phrase_create_new_template']; ?>
" />
    </p>

  </form>

  <div class="hidden" id="create_new_template_dialog">
    <input type="hidden" id="has_templates" value="<?php if (count($this->_tpl_vars['template_set_info']['templates']) == 0): ?>no<?php else: ?>yes<?php endif; ?>" />
    <div id="create_error" class="margin_bottom_large" style="display:none"></div>
    <table style="width: 100%">
      <tr>
        <td width="200" class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_template_name']; ?>
</td>
        <td><input type="text" id="new_template_name" style="width: 100%;" /></td>
      </tr>
      <?php if (count($this->_tpl_vars['template_set_info']['templates']) > 0): ?>
      <tr>
        <td class="medium_grey">
          <input type="radio" name="new_template_source" id="nts1" value="existing_template" checked="checked" />
            <label for="nts1"><?php echo $this->_tpl_vars['L']['phrase_base_on_existing_template_c']; ?>
</label>
        </td>
        <td>
          <select name="source_template_id" id="source_template_id">
            <option value=""><?php echo $this->_tpl_vars['LANG']['phrase_please_select']; ?>
</option>
            <?php $_from = $this->_tpl_vars['template_set_info']['templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
              <option value="<?php echo $this->_tpl_vars['t']['template_id']; ?>
"><?php echo $this->_tpl_vars['t']['template_name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="medium_grey">
          <input type="radio" name="new_template_source" id="nts2" value="new_template">
            <label for="nts2"><?php echo $this->_tpl_vars['L']['phrase_new_template_select_type_c']; ?>
</label>
        </td>
        <td><?php echo smarty_function_template_types(array('name_id' => 'new_template_type','class' => 'has_templates_new_template_dropdown'), $this);?>
</td>
      </tr>
      <?php else: ?>
      <tr>
        <td class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_template_type']; ?>
</td>
        <td><?php echo smarty_function_template_types(array('name_id' => 'new_template_type'), $this);?>
</td>
      </tr>
      <?php endif; ?>
    </table>
  </div>
