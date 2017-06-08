<?php /* Smarty version 2.6.18, created on 2017-01-30 17:54:58
         compiled from /opt/lampp/htdocs/www/formtools/modules/form_builder/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/index.tpl', 30, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/index.tpl', 71, false),array('function', 'display_template_set_usage', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/index.tpl', 68, false),array('function', 'template_sets', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/index.tpl', 114, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_form_builder.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['module_name']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_template_set_intro']; ?>

  </div>

  <?php if ($this->_tpl_vars['module_settings']['demo_mode'] == 'on'): ?>
    <div class="error margin_bottom_large">
      <div style="padding: 6px">
        <?php echo $this->_tpl_vars['L']['notify_form_builder_demo_mode']; ?>

      </div>
    </div>
  <?php endif; ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">

  <?php if (count($this->_tpl_vars['template_sets']) == 0): ?>
    <div class="notify">
      <div style="padding: 6px">
        <?php echo $this->_tpl_vars['L']['notify_no_template_sets_defined']; ?>

      </div>
    </div>
  <?php else: ?>

    <div class="sortable template_sets" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
      <input type="hidden" class="sortable__custom_delete_handler" value="fb_ns.delete_template_set" />
      <ul class="header_row">
        <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
        <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_template_set']; ?>
</li>
        <li class="col3"><?php echo $this->_tpl_vars['L']['phrase_where_used']; ?>
</li>
        <li class="col4"><?php echo $this->_tpl_vars['L']['phrase_is_complete']; ?>
</li>
        <li class="col5"><?php echo $this->_tpl_vars['L']['word_templates']; ?>
</li>
        <li class="col6"><?php echo $this->_tpl_vars['L']['word_resources']; ?>
</li>
        <li class="col7"><?php echo $this->_tpl_vars['L']['word_placeholders']; ?>
</li>
        <li class="col8 edit"></li>
        <li class="col9 colN del"></li>
      </ul>
      <div class="clear"></div>
      <ul class="rows check_areas">
      <?php $_from = $this->_tpl_vars['template_sets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template_set']):
        $this->_foreach['row']['iteration']++;
?>
        <?php $this->assign('i', $this->_foreach['row']['iteration']); ?>
        <?php $this->assign('set_id', $this->_tpl_vars['template_set']['set_id']); ?>
        <li class="sortable_row">
          <div class="row_content">
            <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
              <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['set_id']; ?>
" />
              <ul>
                <li class="col1 sort_col"><?php echo $this->_tpl_vars['i']; ?>
</li>
                <li class="col2">
                  <?php echo $this->_tpl_vars['template_set']['set_name']; ?>

                  <?php if ($this->_tpl_vars['template_set']['version']): ?>
                    <span class="medium_grey">(<?php echo $this->_tpl_vars['template_set']['version']; ?>
)</span>
                  <?php endif; ?>
                </li>
                <li class="col3"><?php echo smarty_function_display_template_set_usage(array('set_id' => $this->_tpl_vars['set_id'],'format' => 'dropdown'), $this);?>
</li>
                <li class="col4">
				          <?php if ($this->_tpl_vars['template_set']['is_complete'] == 'yes'): ?>
				            <span class="template_set_marker template_set_complete"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_yes'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span>
				          <?php else: ?>
				            <span class="template_set_marker template_set_incomplete"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_no'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</span>
				          <?php endif; ?>
                </li>
                <li class="col5 check_area"><a href="template_sets/index.php?page=templates&set_id=<?php echo $this->_tpl_vars['set_id']; ?>
"><?php echo count($this->_tpl_vars['template_set']['templates']); ?>
</a></li>
                <li class="col6 check_area"><a href="template_sets/index.php?page=resources&set_id=<?php echo $this->_tpl_vars['set_id']; ?>
"><?php echo count($this->_tpl_vars['template_set']['resources']); ?>
</a></li>
                <li class="col7 check_area"><a href="template_sets/index.php?page=placeholders&set_id=<?php echo $this->_tpl_vars['set_id']; ?>
"><?php echo count($this->_tpl_vars['template_set']['placeholders']); ?>
</a></li>
                <li class="col8 edit"><a href="template_sets/index.php?page=info&set_id=<?php echo $this->_tpl_vars['set_id']; ?>
"></a></li>
                <li class="col9 colN<?php if (count($this->_tpl_vars['template_set']['usage'])): ?> info<?php else: ?> del<?php endif; ?>">
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
    <?php if (count($this->_tpl_vars['template_sets']) > 1): ?>
      <input type="submit" name="update_order" value="<?php echo $this->_tpl_vars['L']['phrase_update_order']; ?>
" />
    <?php endif; ?>
    <input type="button" id="create_new_template_set" value="<?php echo $this->_tpl_vars['L']['phrase_create_new_template_set']; ?>
" />
  </p>

  </form>

  <div class="hidden" id="create_new_template_set_dialog">
    <div id="create_error" class="margin_bottom_large" style="display:none"></div>
	  <table style="width: 100%">
	    <tr>
	      <td width="180" class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_template_set_name']; ?>
</td>
	      <td><input type="text" id="new_template_name" style="width: 100%;" /></td>
	    </tr>
	    <?php if (count($this->_tpl_vars['template_sets']) > 0): ?>
	    <tr>
	      <td class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_base_new_template_set_on']; ?>
</td>
	      <td>
	        <?php echo smarty_function_template_sets(array('name_id' => 'original_set_id','only_return_complete' => false,'is_base_on_dropdown' => true), $this);?>

	      </td>
	    </tr>
	    <?php endif; ?>
	  </table>
  </div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>