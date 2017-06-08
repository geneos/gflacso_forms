<?php /* Smarty version 2.6.18, created on 2017-01-30 16:41:24
         compiled from ../../modules/form_builder/smarty/templates_html.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '../../modules/form_builder/smarty/templates_html.tpl', 7, false),)), $this); ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['page_layout']) > 1): ?>
  <div>
    <label for="page_layout_template_id"><?php echo $this->_tpl_vars['L']['phrase_page_layout']; ?>
</label>
    <div>
      <select name="page_layout_template_id" id="page_layout_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['page_layout']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['page_layout'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="page_layout_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['page_layout']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['header']) > 1): ?>
  <div>
    <label for="header_template_id"><?php echo $this->_tpl_vars['L']['word_header']; ?>
</label>
    <div>
      <select name="header_template_id" id="header_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['header']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['header'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="header_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['header']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['footer']) > 1): ?>
  <div>
    <label for="footer_template_id"><?php echo $this->_tpl_vars['L']['word_footer']; ?>
</label>
    <div>
      <select name="footer_template_id" id="footer_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['footer'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="footer_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['footer']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['form_page']) > 1): ?>
  <div>
    <label for="form_page_template_id"><?php echo $this->_tpl_vars['L']['phrase_form_page']; ?>
</label>
    <div>
      <select name="form_page_template_id" id="form_page_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['form_page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['form_page'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="form_page_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['form_page']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['review_page']) > 1): ?>
  <div>
    <label for="review_page_template_id"><?php echo $this->_tpl_vars['L']['phrase_review_page']; ?>
</label>
    <div>
      <select name="review_page_template_id" id="review_page_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['review_page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['review_page'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="review_page_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['review_page']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['thankyou_page']) > 1): ?>
  <div>
    <label for="review_page_template_id"><?php echo $this->_tpl_vars['L']['phrase_thankyou_page']; ?>
</label>
    <div>
      <select name="thankyou_page_template_id" id="thankyou_page_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['thankyou_page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['thankyou_page'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="thankyou_page_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['thankyou_page']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['form_offline_page']) > 1): ?>
  <div>
    <label for="form_offline_page_template_id"><?php echo $this->_tpl_vars['L']['phrase_form_offline_page']; ?>
</label>
    <div>
      <select name="form_offline_page_template_id" id="form_offline_page_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['form_offline_page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['form_offline_page'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="form_offline_page_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['form_offline_page']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['navigation']) > 1): ?>
  <div>
    <label for="navigation_template_id"><?php echo $this->_tpl_vars['L']['word_navigation']; ?>
</label>
    <div>
      <select name="navigation_template_id" id="navigation_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['navigation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['navigation'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="navigation_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['navigation']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['continue_block']) > 1): ?>
  <div>
    <label for="continue_block_template_id"><?php echo $this->_tpl_vars['L']['phrase_continue_block']; ?>
</label>
    <div>
      <select name="continue_block_template_id" id="continue_block_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['continue_block']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['continue_block'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="continue_block_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['continue_block']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <?php if (count($this->_tpl_vars['grouped_templates']['error_message']) > 1): ?>
  <div>
    <label for="error_message_template_id"><?php echo $this->_tpl_vars['L']['phrase_error_message']; ?>
</label>
    <div>
      <select name="error_message_template_id" id="error_message_template_id" class="full">
      <?php $_from = $this->_tpl_vars['grouped_templates']['error_message']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['row']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['template']['template_id']; ?>
" <?php if ($this->_tpl_vars['selected_templates']['error_message'] == $this->_tpl_vars['template']['template_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template']['template_name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
    </div>
  </div>
  <?php else: ?>
    <input type="hidden" name="error_message_template_id" value="<?php echo $this->_tpl_vars['grouped_templates']['error_message']['0']['template_id']; ?>
" />
  <?php endif; ?>

  <input type="hidden" id="templates_loaded" />