<?php /* Smarty version 2.6.18, created on 2017-02-13 21:05:17
         compiled from /opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/shared_resources/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/shared_resources/index.tpl', 73, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/custom_fields/templates/shared_resources/index.tpl', 82, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="../images/icon_custom_fields.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="../"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['phrase_shared_resources']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_shared_resources_intro']; ?>

  </div>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post" id="shared_resources_form">
    <div class="inner_tabset" id="shared_resources">
	    <div class="tab_row threeCols">
	      <div class="inner_tab1 <?php if ($this->_tpl_vars['current_inner_tab'] == 1 || $this->_tpl_vars['current_inner_tab'] == ""): ?>selected<?php endif; ?>">CSS</div>
	      <div class="inner_tab2 <?php if ($this->_tpl_vars['current_inner_tab'] == 2): ?>selected<?php endif; ?>">JavaScript</div>
	      <div class="inner_tab3 <?php if ($this->_tpl_vars['current_inner_tab'] == 3): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['L']['phrase_included_files']; ?>
</div>
	    </div>
	    <div class="inner_tab_content">
	      <div class="inner_tab_content1 <?php if ($this->_tpl_vars['current_inner_tab'] != 1 && $this->_tpl_vars['current_inner_tab'] != ""): ?>hidden<?php endif; ?>">
			    <div class="editor">
			      <textarea id="edit_submission_shared_resources_css" name="edit_submission_shared_resources_css"
			        style="height: 400px"><?php echo $this->_tpl_vars['edit_submission_shared_resources_css']; ?>
</textarea>
			    </div>
			    <script type="text/javascript">
			      var edit_submission_shared_resources_css_field = new CodeMirror.fromTextArea("edit_submission_shared_resources_css", <?php echo '{'; ?>

			        parserfile: ["parsecss.js"],
			        path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
			        stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/csscolors.css"
			      <?php echo '});'; ?>

			    </script>
			  </div>
	      <div class="inner_tab_content2 <?php if ($this->_tpl_vars['current_inner_tab'] != 2): ?>hidden<?php endif; ?>">
			    <div class="editor">
			      <textarea id="edit_submission_shared_resources_js" name="edit_submission_shared_resources_js"
			        style="height: 400px"><?php echo $this->_tpl_vars['edit_submission_shared_resources_js']; ?>
</textarea>
			    </div>
			    <script type="text/javascript">
			      var edit_submission_shared_resources_js_field = new CodeMirror.fromTextArea("edit_submission_shared_resources_js", <?php echo '{'; ?>

			        parserfile: ["tokenizejavascript.js", "parsejavascript.js"],
			        path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
			        stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css"
			      <?php echo '});'; ?>

			    </script>
	      </div>
	      <div class="inner_tab_content3 <?php if ($this->_tpl_vars['current_inner_tab'] != 3): ?>hidden<?php endif; ?>">
	        <div class="sortable shared_resources_included_files margin_bottom" id="shared_resources_included_files">
	          <ul class="header_row">
	            <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
	            <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_path_to_resource']; ?>
</li>
	            <li class="col3 colN del"></li>
	          </ul>
	          <div class="clear"></div>
	          <ul class="rows">
	            <?php $_from = $this->_tpl_vars['edit_submission_onload_resources']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i']):
        $this->_foreach['row']['iteration']++;
?>
	              <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
	              <li class="sortable_row<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
	                <div class="row_content">
	                  <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
	                    <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['count']; ?>
" />
	                    <ul>
	                      <li class="col1 sort_col"><?php echo $this->_tpl_vars['count']; ?>
</li>
	                      <li class="col2"><input type="text" name="resources[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></li>
	                      <li class="col3 colN del"></li>
	                    </ul>
	                    <div class="clear"></div>
	                  </div>
	                </div>
	                <div class="clear"></div>
	              </li>
	            <?php endforeach; endif; unset($_from); ?>
	            <?php if (count($this->_tpl_vars['edit_submission_onload_resources']) == 0): ?>
	              <li class="sortable_row">
	                <div class="row_content">
	                  <div class="row_group rowN">
	                    <input type="hidden" class="sr_order" value="1" />
	                    <ul>
	                      <li class="col1 sort_col">1</li>
	                      <li class="col2"><input type="text" name="resources[]" /></li>
	                      <li class="col3 colN del"></li>
	                    </ul>
	                    <div class="clear"></div>
	                  </div>
	                </div>
	                <div class="clear"></div>
	              </li>
	            <?php endif; ?>
	          </ul>
	        </div>

	        <div>
	          <a href="#" onclick="return cf_ns.add_shared_resource()"><?php echo $this->_tpl_vars['LANG']['phrase_add_row']; ?>
</a>
	        </div>
	      </div>
	    </div>
	  </div>

    <div class="margin_top_large">
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </div>

  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>