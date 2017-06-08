<?php /* Smarty version 2.6.18, created on 2017-01-30 17:17:16
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_form_fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_form_fields.tpl', 1, false),array('function', 'display_field_type_name', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_form_fields.tpl', 36, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_form_fields.tpl', 3, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_form_fields.tpl', 23, false),array('modifier', 'in_array', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/tab_form_fields.tpl', 31, false),)), $this); ?>
  <?php echo smarty_function_ft_include(array('file' => "messages.tpl"), $this);?>


  <?php if (count($this->_tpl_vars['form_fields']) == 0): ?>

    <div class="notify margin_bottom_large">
      <div style="padding:6px">
        <?php echo $this->_tpl_vars['LANG']['text_unused_option_list']; ?>

      </div>
    </div>

  <?php else: ?>

    <div class="margin_bottom_large">
      <?php echo $this->_tpl_vars['LANG']['text_used_option_list']; ?>

    </div>

    <table cellspacing="1" cellpadding="0" class="list_table margin_bottom_large">
    <tr>
      <th width="40"> </th>
      <th><?php echo $this->_tpl_vars['LANG']['word_form']; ?>
</th>
      <th><?php echo $this->_tpl_vars['LANG']['word_field']; ?>
</th>
      <th><?php echo $this->_tpl_vars['LANG']['phrase_field_type']; ?>
</th>
      <th width="100"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_edit_field'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</th>
    </tr>
    <?php $_from = $this->_tpl_vars['form_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field_info']):
        $this->_foreach['row']['iteration']++;
?>
      <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
      <tr>
        <td align="center" class="medium_grey"><?php echo $this->_tpl_vars['count']; ?>
</td>
        <td class="pad_left_small">
          <?php echo $this->_tpl_vars['field_info']['form_name']; ?>

          <?php if (((is_array($_tmp=$this->_tpl_vars['field_info']['form_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['incomplete_forms']) : in_array($_tmp, $this->_tpl_vars['incomplete_forms']))): ?>
            <span class="red">(<?php echo $this->_tpl_vars['LANG']['word_incomplete']; ?>
)</span>
          <?php endif; ?>
        </td>
        <td class="pad_left_small"><?php echo $this->_tpl_vars['field_info']['field_title']; ?>
</td>
        <td class="pad_left_small"><?php echo smarty_function_display_field_type_name(array('field_type_id' => $this->_tpl_vars['field_info']['field_type_id']), $this);?>
</td>
        <td align="center">
          <?php if (((is_array($_tmp=$this->_tpl_vars['field_info']['form_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['incomplete_forms']) : in_array($_tmp, $this->_tpl_vars['incomplete_forms']))): ?>
            <span class="light_grey"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_edit_field'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span>
          <?php else: ?>
            <a href="../edit.php?page=fields&field_id=<?php echo $this->_tpl_vars['field_info']['field_id']; ?>
&form_id=<?php echo $this->_tpl_vars['field_info']['form_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_edit_field'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>

  <?php endif; ?>