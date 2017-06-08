<?php /* Smarty version 2.6.18, created on 2017-01-30 18:39:06
         compiled from /opt/lampp/htdocs/www/formtools/modules/pages/templates/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/modules/pages/templates/edit.tpl', 29, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/pages/templates/edit.tpl', 153, false),array('function', 'clients_dropdown', '/opt/lampp/htdocs/www/formtools/modules/pages/templates/edit.tpl', 125, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/pages/view.php?page_id=<?php echo $this->_tpl_vars['page_id']; ?>
" style="float:right" title="<?php echo $this->_tpl_vars['L']['phrase_view_page']; ?>
"><img src="<?php echo $this->_tpl_vars['theme_url']; ?>
/images/admin_view.png" border="0" /></a>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="./"><img src="images/icon_pages.gif" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="./"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['phrase_edit_page']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="edit.php" method="post" name="pages_form" onsubmit="return rsv.validate(this, rules)">
    <input type="hidden" name="page_id" value="<?php echo $this->_tpl_vars['page_id']; ?>
" />
    <input type="hidden" name="use_wysiwyg_hidden" id="use_wysiwyg_hidden" value="" />
    <input type="hidden" id="tinymce_available" value="<?php echo $this->_tpl_vars['tinymce_available']; ?>
" />

    <table cellspacing="1" cellpadding="1" border="0" width="100%">
    <tr>
      <td width="140" valign="top"><?php echo $this->_tpl_vars['L']['phrase_page_name']; ?>
</td>
      <td>
      	<input type="text" name="page_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['page_info']['page_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:200px" maxlength="50" />
      	<div class="light_grey"><?php echo $this->_tpl_vars['L']['text_page_name_desc']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_page_heading']; ?>
</td>
      <td><input type="text" name="heading" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['page_info']['heading'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:100%" /></td>
    </tr>
    <tr>
      <td>Content type</td>
      <td>
      	<input type="radio" name="content_type" value="html" id="ct1" <?php if ($this->_tpl_vars['page_info']['content_type'] == 'html'): ?>checked<?php endif; ?>
      	  onclick="pages_ns.change_content_type(this.value)" />
      	  <label for="ct1">HTML</label>
      	<input type="radio" name="content_type" value="php" id="ct2" <?php if ($this->_tpl_vars['page_info']['content_type'] == 'php'): ?>checked<?php endif; ?>
      	  onclick="pages_ns.change_content_type(this.value)" />
      	  <label for="ct2">PHP</label>
      	<input type="radio" name="content_type" value="smarty" id="ct3" <?php if ($this->_tpl_vars['page_info']['content_type'] == 'smarty'): ?>checked<?php endif; ?>
      	  onclick="pages_ns.change_content_type(this.value)" />
      	  <label for="ct3">Smarty</label>
      </td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_page_content']; ?>
</td>
      <td>

      	<div id="wysiwyg_div" <?php if ($this->_tpl_vars['page_info']['content_type'] != 'html' || $this->_tpl_vars['page_info']['use_wysiwyg'] == 'no'): ?>style="display:none"<?php endif; ?>>
      	  <textarea name="wysiwyg_content" id="wysiwyg_content" style="width:100%; height:300px"><?php echo $this->_tpl_vars['page_info']['content']; ?>
</textarea>
      	</div>

        <!-- CodeMirror is used for everything except the WYSIWYG editor -->
      	<div id="codemirror_div" <?php if ($this->_tpl_vars['page_info']['use_wysiwyg'] == 'yes' && $this->_tpl_vars['page_info']['content_type'] == 'html'): ?>style="display: none"<?php endif; ?>>
      	  <div style="border: 1px solid #666666; padding: 3px">
      	    <textarea name="codemirror_content" id="codemirror_content" style="width:100%; height:300px"><?php echo ((is_array($_tmp=$this->_tpl_vars['page_info']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
      	  </div>

      	  <script>
      	        	  var html_editor = new CodeMirror.fromTextArea("codemirror_content", <?php echo '{'; ?>

        	  parserfile: ["parsexml.js", "parsecss.js", "tokenizejavascript.js", "parsejavascript.js",
                         "../contrib/php/js/tokenizephp.js", "../contrib/php/js/parsephp.js", "../contrib/php/js/parsephphtmlmixed.js"],
            stylesheet: ["<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/xmlcolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css",
                         "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/csscolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/contrib/php/css/phpcolors.css"],
            path:        "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/"
      	  <?php echo '});'; ?>

      	  </script>
      	</div>

       <div <?php if ($this->_tpl_vars['tinymce_available'] == 'no'): ?>class="hidden"<?php endif; ?>>
      	<input type="checkbox" id="uwe" name="use_wysiwyg"
      	  <?php if ($this->_tpl_vars['page_info']['use_wysiwyg'] == 'yes'): ?>checked<?php endif; ?>
      	  <?php if ($this->_tpl_vars['page_info']['content_type'] != 'html'): ?>disabled<?php endif; ?>
      	  onchange="pages_ns.toggle_wysiwyg_field(this.checked)" />
      	  <label for="uwe">Use WYSIWYG editor</label>
      	</div>
      	<br />
      </td>
    </tr>
    <tr>
      <td valign="top">Who can access?</td>
      <td>

      	<table cellspacing="1" cellpadding="0" >
      	<tr>
      	  <td>
      	    <input type="radio" name="access_type" id="at1" value="admin" <?php if ($this->_tpl_vars['page_info']['access_type'] == 'admin'): ?>checked<?php endif; ?>
      	      onclick="pages_ns.toggle_access_type(this.value)" />
      	      <label for="at1"><?php echo $this->_tpl_vars['LANG']['phrase_admin_only']; ?>
</label>
      	  </td>
      	</tr>
      	<tr>
      	  <td>
      	    <input type="radio" name="access_type" id="at2" value="public" <?php if ($this->_tpl_vars['page_info']['access_type'] == 'public'): ?>checked<?php endif; ?>
      	      onclick="pages_ns.toggle_access_type(this.value)" />
      	      <label for="at2"><?php echo $this->_tpl_vars['LANG']['word_public']; ?>
 <span class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_all_clients_have_access']; ?>
</span></label>
      	  </td>
      	</tr>
      	<tr>
      	  <td>
      	    <input type="radio" name="access_type" id="at3" value="private" <?php if ($this->_tpl_vars['page_info']['access_type'] == 'private'): ?>checked<?php endif; ?>
      	      onclick="pages_ns.toggle_access_type(this.value)" />
      	      <label for="at3"><?php echo $this->_tpl_vars['LANG']['word_private']; ?>
 <span class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_only_specific_clients_have_access']; ?>
</span></label>
      	  </td>
      	</tr>
      	</table>

      	<div id="custom_clients" <?php if ($this->_tpl_vars['page_info']['access_type'] != 'private'): ?>style="display:none"<?php endif; ?> class="margin_top">

      	  <table cellpadding="0" cellspacing="0" width="100%" class="list_table">
      	  <tr>
      	    <td class="medium_grey"><?php echo $this->_tpl_vars['LANG']['phrase_available_clients']; ?>
</td>
      	    <td></td>
      	    <td class="medium_grey"><?php echo $this->_tpl_vars['LANG']['phrase_selected_clients']; ?>
</td>
      	  </tr>
      	  <tr>
      	    <td>
      	      <?php echo smarty_function_clients_dropdown(array('name_id' => "available_client_ids[]",'multiple' => 'true','multiple_action' => 'hide','clients' => $this->_tpl_vars['page_info']['clients'],'size' => '4','style' => "width: 220px"), $this);?>

      	    </td>
      	    <td align="center" valign="middle" width="100">
      	      <input type="button" value="<?php echo $this->_tpl_vars['LANG']['word_add_uc_rightarrow']; ?>
"
                onclick="ft.move_options(this.form['available_client_ids[]'], this.form['selected_client_ids[]']);" /><br />
      	      <input type="button" value="<?php echo $this->_tpl_vars['LANG']['word_remove_uc_leftarrow']; ?>
"
                onclick="ft.move_options(this.form['selected_client_ids[]'], this.form['available_client_ids[]']);" />
      	    </td>
      	    <td>
      	      <?php echo smarty_function_clients_dropdown(array('name_id' => "selected_client_ids[]",'multiple' => 'true','multiple_action' => 'show','clients' => $this->_tpl_vars['page_info']['clients'],'size' => '4','style' => "width: 220px"), $this);?>

      	    </td>
      	  </tr>
      	  </table>

      	</div>

      	<div class="light_grey">
      	  Note that pages still need to be assigned to a client via their menu or a hardcoded link in order to be seen. This
      	  setting is for security purposes only.
      	</div>

      </td>
    </tr>
    </table>

    <p>
      <input type="submit" name="update_page" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_update'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
" />
    </p>

  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>