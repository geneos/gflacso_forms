<?php /* Smarty version 2.6.18, created on 2017-05-11 19:35:09
         compiled from /opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/smarty/section_html.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/smarty/section_html.tpl', 16, false),array('modifier', 'in_array', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/smarty/section_html.tpl', 36, false),)), $this); ?>
</table>

<?php if ($this->_tpl_vars['title']): ?>
  <p class="subtitle underline margin_bottom_large"><?php echo $this->_tpl_vars['title']; ?>
</p>
<?php else: ?>
  <div class="margin_bottom_large"> </div>
<?php endif; ?>

<table class="list_table margin_bottom_large" cellpadding="0" cellspacing="1">
<?php $_from = $this->_tpl_vars['settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['setting']):
        $this->_foreach['row']['iteration']++;
?>
  <?php $this->assign('sid', $this->_tpl_vars['setting']['sid']); ?>
  <tr>
    <td class="pad_left_small" width="200"><?php echo $this->_tpl_vars['setting']['setting_label']; ?>
</td>
    <td>
      <?php if ($this->_tpl_vars['setting']['field_type'] == 'textbox'): ?>
        <input type="text" name="arbitrary_setting_<?php echo $this->_tpl_vars['sid']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['setting']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="50" />
      <?php elseif ($this->_tpl_vars['setting']['field_type'] == 'textarea'): ?>
        <textarea name="arbitrary_setting_<?php echo $this->_tpl_vars['sid']; ?>
" style="width:98%; height: 60px"><?php echo $this->_tpl_vars['setting']['content']; ?>
</textarea>
      <?php elseif ($this->_tpl_vars['setting']['field_type'] == 'radios'): ?>

        <?php $_from = $this->_tpl_vars['setting']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
        $this->_foreach['row']['iteration']++;
?>
          <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
          <?php $this->assign('escaped_value', $this->_tpl_vars['option']['option_text']); ?>
          <input type="radio" name="arbitrary_setting_<?php echo $this->_tpl_vars['sid']; ?>
" id="sid_<?php echo $this->_tpl_vars['sid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
            <?php if ($this->_tpl_vars['escaped_value'] == $this->_tpl_vars['setting']['content']): ?>checked="checked"<?php endif; ?> />
            <label for="sid_<?php echo $this->_tpl_vars['sid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</label>
            <?php if ($this->_tpl_vars['setting']['field_orientation'] == 'vertical'): ?><br /><?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

      <?php elseif ($this->_tpl_vars['setting']['field_type'] == 'checkboxes'): ?>

        <?php $_from = $this->_tpl_vars['setting']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
        $this->_foreach['row']['iteration']++;
?>
          <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
          <?php $this->assign('escaped_value', ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
          <input type="checkbox" name="arbitrary_setting_<?php echo $this->_tpl_vars['sid']; ?>
[]" id="sid_<?php echo $this->_tpl_vars['sid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
            <?php if (((is_array($_tmp=$this->_tpl_vars['escaped_value'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['setting']['content']) : in_array($_tmp, $this->_tpl_vars['setting']['content']))): ?>checked="checked"<?php endif; ?> />
            <label for="sid_<?php echo $this->_tpl_vars['sid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</label>
            <?php if ($this->_tpl_vars['setting']['field_orientation'] == 'vertical'): ?><br /><?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

      <?php elseif ($this->_tpl_vars['setting']['field_type'] == 'select'): ?>

        <select name="arbitrary_setting_<?php echo $this->_tpl_vars['sid']; ?>
">
          <?php $_from = $this->_tpl_vars['setting']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
?>
            <?php $this->assign('escaped_value', ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
            <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" <?php if ($this->_tpl_vars['escaped_value'] == $this->_tpl_vars['setting']['content']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['option']['option_text']; ?>
</option>
           <?php endforeach; endif; unset($_from); ?>
        </select>

      <?php elseif ($this->_tpl_vars['setting']['field_type'] == "multi-select"): ?>

        <select name="arbitrary_setting_<?php echo $this->_tpl_vars['sid']; ?>
[]" multiple size="4">
          <?php $_from = $this->_tpl_vars['setting']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
?>
            <?php $this->assign('escaped_value', ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
            <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
              <?php if (((is_array($_tmp=$this->_tpl_vars['escaped_value'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['setting']['content']) : in_array($_tmp, $this->_tpl_vars['setting']['content']))): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['option']['option_text']; ?>
</option>
           <?php endforeach; endif; unset($_from); ?>
        </select>

      <?php endif; ?>
    </td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
