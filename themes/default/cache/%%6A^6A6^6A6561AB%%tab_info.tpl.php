<?php /* Smarty version 2.6.18, created on 2017-02-07 15:01:49
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_info.tpl', 1, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_info.tpl', 23, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_info.tpl', 49, false),)), $this); ?>
  <div class="subtitle margin_top_large underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_template_set_info'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
    <input type="hidden" name="set_id" id="set_id" value="<?php echo $this->_tpl_vars['set_id']; ?>
" />

	  <table class="list_table margin_bottom_large">
		<tr>
		  <td width="140" class="pad_left_small medium_grey" valign="top"><?php echo $this->_tpl_vars['L']['phrase_is_complete']; ?>
</td>
		  <td>
		    <?php if ($this->_tpl_vars['template_set_info']['is_complete'] == 'yes'): ?>
		      <span class="template_set_marker template_set_complete"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_yes'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span>
		    <?php else: ?>
		      <span class="template_set_marker template_set_incomplete"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_no'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span> <?php echo $this->_tpl_vars['L']['phrase_missing_templates_c']; ?>

		      <span class="medium_grey"><?php echo $this->_tpl_vars['missing_templates_str']; ?>
</span>
		    <?php endif; ?>
		  </td>
		</tr>
		<tr>
		  <td class="pad_left_small medium_grey"><?php echo $this->_tpl_vars['L']['phrase_template_set_name']; ?>
</td>
		  <td>
		    <input type="text" style="width: 200px" name="set_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['template_set_info']['set_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="255" />
		  </td>
		</tr>
		<tr>
		  <td class="pad_left_small medium_grey"><?php echo $this->_tpl_vars['LANG']['word_version']; ?>
</td>
		  <td>
		    <input type="text" name="version" size="5" maxlength="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['template_set_info']['version'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
		  </td>
		</tr>
		<tr>
		  <td class="pad_left_small medium_grey"><?php echo $this->_tpl_vars['L']['word_description']; ?>
</td>
		  <td>
        <textarea name="description" style="width:99%; height: 100px"><?php echo ((is_array($_tmp=$this->_tpl_vars['template_set_info']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
		  </td>
		</tr>
	  </table>

	  <div>
	    <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </div>
  </form>

  <br />

  <div class="subtitle margin_bottom underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_usage'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php if (count($this->_tpl_vars['usage']) == 0): ?>
    <span class="medium_grey"><?php echo $this->_tpl_vars['L']['text_template_set_not_used']; ?>
</span>
  <?php else: ?>
    <div class="margin_bottom_large">
      <?php echo $this->_tpl_vars['L']['text_template_set_usage_intro']; ?>

    </div>
    <table class="list_table margin_bottom_large">
    <tr>
      <th><?php echo $this->_tpl_vars['LANG']['word_form']; ?>
</th>
      <th><?php echo $this->_tpl_vars['LANG']['word_view']; ?>
</th>
      <th><?php echo $this->_tpl_vars['L']['phrase_form_location']; ?>
</th>
    </tr>
    <?php $_from = $this->_tpl_vars['usage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['form_id'] => $this->_tpl_vars['data']):
?>
      <?php $_from = $this->_tpl_vars['data']['usage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
      <tr>
        <td class="pad_left_small"><a href="../../../admin/forms/edit.php?form_id=<?php echo $this->_tpl_vars['form_id']; ?>
&page=publish"><?php echo $this->_tpl_vars['data']['form_name']; ?>
</a></td>
        <td class="pad_left_small"><a href="../../../admin/forms/edit.php?form_id=<?php echo $this->_tpl_vars['i']['view_name']; ?>
&page=publish"><?php echo $this->_tpl_vars['i']['view_name']; ?>
</a></td>
        <td class="pad_left_small">
          <a title="<?php echo $this->_tpl_vars['LANG']['phrase_open_form_in_dialog']; ?>
" target="_blank" class="show_form" href="<?php echo $this->_tpl_vars['i']['full_url']; ?>
"></a>
          <div class="published_form_url"><?php echo $this->_tpl_vars['i']['filename']; ?>
</div>
        </td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
    </table>
  <?php endif; ?>