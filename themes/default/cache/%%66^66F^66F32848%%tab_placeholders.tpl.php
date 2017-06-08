<?php /* Smarty version 2.6.18, created on 2017-01-30 16:44:14
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_placeholders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_placeholders.tpl', 1, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_placeholders.tpl', 11, false),array('function', 'display_placeholder_field_type', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_placeholders.tpl', 43, false),)), $this); ?>
  <div class="subtitle margin_top_large underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_placeholders'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_placeholders_intro']; ?>

  </div>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">

  <?php if (count($this->_tpl_vars['placeholders']) == 0): ?>

    <div class="notify yellow_bg" class="margin_bottom_large">
      <div style="padding:8px">
        <?php echo $this->_tpl_vars['L']['notify_no_template_set_placeholders']; ?>

      </div>
    </div>

  <?php else: ?>

    <div class="sortable placeholder_list" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
      <input type="hidden" class="sortable__custom_delete_handler" value="fb_ns.delete_placeholder" />
      <ul class="header_row">
        <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
        <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_placeholder_label']; ?>
</li>
        <li class="col3"><?php echo $this->_tpl_vars['L']['word_placeholder']; ?>
</li>
        <li class="col4"><?php echo $this->_tpl_vars['LANG']['phrase_field_type']; ?>
</li>
        <li class="col5 edit"></li>
        <li class="col6 colN del"></li>
      </ul>
      <div class="clear"></div>
      <ul class="rows">
      <?php $_from = $this->_tpl_vars['placeholders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['info']):
        $this->_foreach['row']['iteration']++;
?>
        <?php $this->assign('placeholder_id', $this->_tpl_vars['info']['placeholder_id']); ?>
        <li class="sortable_row">
          <div class="row_content">
            <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
              <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['info']['placeholder_id']; ?>
" />
              <ul>
				        <li class="col1 sort_col"><?php echo $this->_tpl_vars['info']['field_order']; ?>
</li>
				        <li class="col2"><?php echo $this->_tpl_vars['info']['placeholder_label']; ?>
</li>
				        <li class="col3 medium_grey"><?php echo '{{'; ?>
$P.<?php echo $this->_tpl_vars['info']['placeholder']; ?>
<?php echo '}}'; ?>
</li>
				        <li class="col4"><?php echo smarty_function_display_placeholder_field_type(array('type' => $this->_tpl_vars['info']['field_type']), $this);?>
</li>
				        <li class="col5 edit"><a href="?page=edit_placeholder&placeholder_id=<?php echo $this->_tpl_vars['placeholder_id']; ?>
"></a></li>
				        <li class="col6 colN del"></li>
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
      <?php if (count($this->_tpl_vars['placeholders']) > 1): ?>
        <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
      <?php endif; ?>
      <input type="button" value="<?php echo $this->_tpl_vars['L']['phrase_add_placeholder']; ?>
" onclick="window.location='?page=add_placeholder'" />
    </p>
  </form>