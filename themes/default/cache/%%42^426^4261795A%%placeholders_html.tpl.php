<?php /* Smarty version 2.6.18, created on 2017-01-30 16:41:24
         compiled from ../../modules/form_builder/smarty/placeholders_html.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '../../modules/form_builder/smarty/placeholders_html.tpl', 1, false),array('modifier', 'escape', '../../modules/form_builder/smarty/placeholders_html.tpl', 13, false),array('modifier', 'explode', '../../modules/form_builder/smarty/placeholders_html.tpl', 30, false),array('modifier', 'in_array', '../../modules/form_builder/smarty/placeholders_html.tpl', 34, false),)), $this); ?>
  <?php if (count($this->_tpl_vars['placeholders']) == 0): ?>
    <div class="medium_grey"><?php echo $this->_tpl_vars['L']['notify_no_placeholders']; ?>
</div>
  <?php endif; ?>

	<?php $_from = $this->_tpl_vars['placeholders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
    <?php $this->assign('pid', $this->_tpl_vars['info']['placeholder_id']); ?>
	  <input type="hidden" name="placeholder_ids[]" class="pids" value="<?php echo $this->_tpl_vars['pid']; ?>
" />

    <div>
	    <label><?php echo $this->_tpl_vars['info']['placeholder_label']; ?>
</label>
      <div>
        <?php if ($this->_tpl_vars['info']['field_type'] == 'textbox'): ?>
          <input type="text" name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="full" />
        <?php elseif ($this->_tpl_vars['info']['field_type'] == 'textarea'): ?>
          <textarea name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
" style="width:98%; height: 60px"><?php echo $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]; ?>
</textarea>
        <?php elseif ($this->_tpl_vars['info']['field_type'] == 'password'): ?>
          <input type="password" name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="20" />
        <?php elseif ($this->_tpl_vars['info']['field_type'] == 'radios'): ?>

        <?php $_from = $this->_tpl_vars['info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
        $this->_foreach['row']['iteration']++;
?>
          <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
          <input type="radio" name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
" id="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
            <?php if ($this->_tpl_vars['option']['option_text'] == $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]): ?>checked<?php endif; ?> />
            <label for="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</label>
            <?php if ($this->_tpl_vars['info']['field_orientation'] == 'vertical'): ?><br /><?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

        <?php elseif ($this->_tpl_vars['info']['field_type'] == 'checkboxes'): ?>

          <?php $this->assign('selected_els', ((is_array($_tmp="|")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]) : explode($_tmp, $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]))); ?>
            <?php $_from = $this->_tpl_vars['info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
        $this->_foreach['row']['iteration']++;
?>
              <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
              <input type="checkbox" name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
[]" id="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                <?php if (((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['selected_els']) : in_array($_tmp, $this->_tpl_vars['selected_els']))): ?>checked="checked"<?php endif; ?> />
                <label for="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
_<?php echo $this->_tpl_vars['count']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</label>
              <?php if ($this->_tpl_vars['info']['field_orientation'] == 'vertical'): ?><br /><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>

        <?php elseif ($this->_tpl_vars['info']['field_type'] == 'select'): ?>

          <select name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
" class="full">
            <?php $_from = $this->_tpl_vars['info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
?>
              <?php $this->assign('escaped_value', ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
              <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" <?php if ($this->_tpl_vars['escaped_value'] == $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['option']['option_text']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </select>
        <?php elseif ($this->_tpl_vars['info']['field_type'] == "multi-select"): ?>
          <?php $this->assign('selected_els', ((is_array($_tmp="|")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]) : explode($_tmp, $this->_tpl_vars['placeholder_hash'][$this->_tpl_vars['pid']]))); ?>
          <select name="placeholder_<?php echo $this->_tpl_vars['pid']; ?>
[]" multiple size="4" class="full">
            <?php $_from = $this->_tpl_vars['info']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['option']):
?>
              <?php $this->assign('escaped_value', ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
              <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
              <?php if (((is_array($_tmp=$this->_tpl_vars['option']['option_text'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['selected_els']) : in_array($_tmp, $this->_tpl_vars['selected_els']))): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['option']['option_text']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </select>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; endif; unset($_from); ?>

  <input type="hidden" id="placeholders_loaded" />