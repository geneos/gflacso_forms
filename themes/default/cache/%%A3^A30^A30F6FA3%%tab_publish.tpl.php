<?php /* Smarty version 2.6.18, created on 2017-01-30 16:41:13
         compiled from /opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 1, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 35, false),array('modifier', 'replace', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 82, false),array('modifier', 'date_format', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 85, false),array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 3, false),array('function', 'display_view_name', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 67, false),array('function', 'display_template_set_name', '/opt/lampp/htdocs/www/formtools/modules/form_builder/templates/admin/tab_publish.tpl', 68, false),)), $this); ?>
  <div class="underline margin_top_large subtitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_published_forms'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php echo smarty_function_ft_include(array('file' => "messages.tpl"), $this);?>


  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_publish_tab_intro']; ?>

  </div>

  <?php if ($this->_tpl_vars['demo_mode'] == 'on'): ?>
    <div class="error margin_bottom_large">
      <div style="padding: 6px">
        <?php echo $this->_tpl_vars['L']['notify_form_builder_demo_mode']; ?>

      </div>
    </div>
  <?php endif; ?>

    <input type="hidden" id="publish_tab_identifier" />

  <?php if ($this->_tpl_vars['form_info']['form_type'] != 'form_builder'): ?>

    <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
      <div class="notify margin_bottom_large">
        <div style="padding:6px">
          <div class="margin_bottom">
            <?php echo $this->_tpl_vars['text_non_form_builder_form']; ?>

          </div>
          <input type="submit" name="set_as_form_builder" value="<?php echo $this->_tpl_vars['L']['phrase_set_form_as_form_builder']; ?>
" />
        </div>
      </div>
    </form>

  <?php else: ?>

    <?php if (count($this->_tpl_vars['published_forms']['results']) == 0): ?>

      <div>
        <input type="button" id="publish_new_form" value="<?php echo $this->_tpl_vars['L']['phrase_publish_this_form']; ?>
" />
      </div>

    <?php else: ?>

      <form action="edit.php?page=publish" method="post">
		    <div class="sortable form_builder_form_list margin_bottom_large" id="form_builder_form_list">
	        <input type="hidden" class="sortable__custom_delete_handler" value="fb_ns.delete_form_configuration" />
		      <ul class="header_row">
		        <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
		        <li class="col2"><?php echo $this->_tpl_vars['LANG']['word_view']; ?>
</li>
		        <li class="col3"><?php echo $this->_tpl_vars['L']['phrase_template_set']; ?>
</li>
		        <li class="col4"><?php echo $this->_tpl_vars['L']['word_published']; ?>
</li>
		        <li class="col5"><?php echo $this->_tpl_vars['L']['word_online']; ?>
</li>
		        <li class="col6"><?php echo $this->_tpl_vars['L']['phrase_form_location']; ?>
</li>
		        <li class="col7 edit"></li>
		        <li class="col8 colN del"></li>
		      </ul>
		      <div class="clear"></div>
		      <ul class="rows">
		        <?php $_from = $this->_tpl_vars['published_forms']['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['info']):
        $this->_foreach['row']['iteration']++;
?>
	          <?php $this->assign('i', $this->_foreach['row']['iteration']); ?>
		        <li class="sortable_row">
		          <div class="row_content">
		            <div class="row_group rowN">
		              <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['info']['published_form_id']; ?>
" />
		              <input type="hidden" class="is_published" value="<?php echo $this->_tpl_vars['info']['is_published']; ?>
" />
		              <ul>
		                <li class="col1 sort_col"><?php echo $this->_tpl_vars['i']; ?>
</li>
		                <li class="col2"><a href="?page=edit_view&view_id=<?php echo $this->_tpl_vars['info']['view_id']; ?>
"><?php echo smarty_function_display_view_name(array('view_id' => $this->_tpl_vars['info']['view_id']), $this);?>
</a></li>
		                <li class="col3"><a href="../../modules/form_builder/template_sets/index.php?set_id=<?php echo $this->_tpl_vars['info']['set_id']; ?>
"><?php echo smarty_function_display_template_set_name(array('set_id' => $this->_tpl_vars['info']['set_id']), $this);?>
</a></li>
		                <li class="col4">
		                  <?php if ($this->_tpl_vars['info']['is_published'] == 'yes'): ?>
		                    <span class="green"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</span>
		                  <?php else: ?>
		                    <span class="red"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</span>
		                  <?php endif; ?>
		                </li>
		                <li class="col5">
		                  <?php if ($this->_tpl_vars['info']['is_published'] == 'no'): ?>
		                    <span class="light_grey">&#8212;</span>
		                  <?php elseif ($this->_tpl_vars['info']['is_online'] == 'yes'): ?>
		                    <span class="green"><?php echo $this->_tpl_vars['LANG']['word_yes']; ?>
</span>
		                    <?php if ($this->_tpl_vars['info']['offline_date'] != "0000-00-00 00:00:00"): ?>
		                      <?php $this->assign('d', ((is_array($_tmp=$this->_tpl_vars['info']['offline_date'])) ? $this->_run_mod_handler('replace', true, $_tmp, ':', '') : smarty_modifier_replace($_tmp, ':', ''))); ?>
		                      <?php $this->assign('d', ((is_array($_tmp=$this->_tpl_vars['d'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', ''))); ?>
		                      <?php $this->assign('d', ((is_array($_tmp=$this->_tpl_vars['d'])) ? $this->_run_mod_handler('replace', true, $_tmp, '-', '') : smarty_modifier_replace($_tmp, '-', ''))); ?>
		                      <span class="publish_tab_offline_date"><?php echo ((is_array($_tmp=$this->_tpl_vars['d'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %e, %Y %l:%M:%S %p") : smarty_modifier_date_format($_tmp, "%b %e, %Y %l:%M:%S %p")); ?>
</span>
		                    <?php endif; ?>
		                  <?php else: ?>
		                    <span class="red"><?php echo $this->_tpl_vars['LANG']['word_no']; ?>
</span>
		                  <?php endif; ?>
		                </li>
		                <li class="col6">
	                    <?php if ($this->_tpl_vars['info']['is_published'] == 'no'): ?>
		                    <div class="empty light_grey">&#8212;</span>
		                  <?php else: ?>
                        <a title="<?php echo $this->_tpl_vars['LANG']['phrase_open_form_in_dialog']; ?>
" target="_blank" class="show_form" href="<?php echo $this->_tpl_vars['info']['folder_url']; ?>
/<?php echo $this->_tpl_vars['info']['filename']; ?>
"></a>
		                    <div class="published_form_url"><?php echo $this->_tpl_vars['info']['filename']; ?>
</div>
		                  <?php endif; ?>
		                </li>
		                <li class="col7 edit"></li>
		                <li class="col8 colN del"></li>
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

	      <div>
	        <?php if (count($this->_tpl_vars['published_forms']['results']) > 1): ?>
	          <input type="submit" name="update_order" value="<?php echo $this->_tpl_vars['LANG']['phrase_update_order']; ?>
" />
	        <?php endif; ?>
	        <input type="button" id="publish_new_form" value="<?php echo $this->_tpl_vars['L']['phrase_publish_at_new_location']; ?>
" />
	      </div>

	      <div id="confirm_delete_form_configuration_not_published" style="display:none"><?php echo $this->_tpl_vars['L']['confirm_delete_form_configuration_not_published']; ?>
</div>

	      <div id="confirm_delete_form_configuration_published" style="display:none">
	        <span class="popup_icon popup_type_warning"></span>
          <div class="margin_bottom_large"><?php echo $this->_tpl_vars['L']['confirm_delete_published_form']; ?>
</div>
          <div>
            <input type="checkbox" checked="checked" id="delete_form_config" name="delete_form_config" />
              <label for="delete_form_config"><?php echo $this->_tpl_vars['L']['confirm_delete_published_form_config']; ?>
</label>
          </div>
	      </div>
	    </form>

    <?php endif; ?>

  <?php endif; ?>