<?php /* Smarty version 2.6.18, created on 2017-01-30 16:43:59
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_template.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_template.tpl', 5, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_template.tpl', 18, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_template.tpl', 200, false),array('function', 'display_template_type', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_template.tpl', 24, false),)), $this); ?>

  <div class="underline margin_top_large">
    <div style="float:right; padding-right: 0px; margin-top: -4px;"><?php echo $this->_tpl_vars['previous_template_link']; ?>
 &nbsp; <?php echo $this->_tpl_vars['next_template_link']; ?>
</div>
    <div class="subtitle">
      <a href="?page=templates"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_templates'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a> &raquo; <?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_edit_template'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

    </div>
  </div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
    <input type="hidden" name="template_id" value="<?php echo $this->_tpl_vars['template_info']['template_id']; ?>
" />

	  <table class="margin_bottom_large">
	  <tr>
	    <td width="130"><?php echo $this->_tpl_vars['L']['phrase_template_name']; ?>
</td>
	    <td>
	      <input type="text" name="template_name" style="width:300px" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['template_info']['template_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	    </td>
	  </tr>
	  <tr>
	    <td><?php echo $this->_tpl_vars['L']['phrase_template_type']; ?>
</td>
	    <td class="medium_grey">
	      <?php echo smarty_function_display_template_type(array('type' => $this->_tpl_vars['template_info']['template_type']), $this);?>

	    </td>
	  </tr>
		<?php if ($this->_tpl_vars['template_info']['template_type'] == 'code_block'): ?>
		<tr>
		  <td><?php echo $this->_tpl_vars['L']['word_placeholder']; ?>
</td>
		  <td class="medium_grey">
		    <?php echo '{{code_block template_id='; ?>
<?php echo $this->_tpl_vars['template_info']['template_id']; ?>
<?php echo '}}'; ?>

		  </td>
		</tr>
		<?php endif; ?>
	  </table>

    <div style="border: 1px solid #666666; padding: 3px">
      <textarea id="template_content" name="template_content" style="width: 686px; height: 350px"><?php echo ((is_array($_tmp=$this->_tpl_vars['template_info']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
    </div>
    <script>
      var html_editor = new CodeMirror.fromTextArea("template_content", <?php echo '{'; ?>

      parserfile: ["parsexml.js", "parsecss.js", "tokenizejavascript.js", "parsejavascript.js",
                   "../contrib/php/js/tokenizephp.js", "../contrib/php/js/parsephp.js", "../contrib/php/js/parsephphtmlmixed.js"],
      stylesheet: ["<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/xmlcolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css",
                   "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/csscolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/contrib/php/css/phpcolors.css",
                   "<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/form_builder/global/css/codemirror.css"],
      path:       "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
      electricChars: false
      <?php echo '});'; ?>

    </script>

    <div class="grey_box margin_bottom_large template_type_placeholders">
      <div><a href="#" id="toggle_placeholders_link">Hide / show available templates and placeholders</a></div>
      <div id="placeholders_section" style="display:none">

        <div class="placeholder_group margin_bottom margin_top">
          <div><b><?php echo $this->_tpl_vars['L']['word_templates']; ?>
</b></div>

          <table cellspacing="0" cellpadding="1" width="100%">
		      <?php if ($this->_tpl_vars['template_info']['template_type'] == 'page_layout'): ?>
		        <tr>
		          <td valign="top" class="medium_grey" width="200"><?php echo '{{header}}'; ?>
</td>
		          <td>
		            Required. This includes the selected <b>Header</b> template.
		          </td>
		        </tr>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{footer}}'; ?>
</td>
		          <td>
		            Required. This includes the selected <b>Footer</b> template.
		          </td>
		        </tr>
		        <tr>
		          <td class="rowN medium_grey" valign="top"><?php echo '{{page}}'; ?>
</td>
		          <td class="rowN">
		            Required. This includes the appropriate page template (form page, offline form page, review page or
		            thankyou page), depending on what's appropriate.
		          </td>
		        </tr>
		      <?php elseif ($this->_tpl_vars['template_info']['template_type'] == 'form_page'): ?>
		        <tr>
		          <td valign="top" class="medium_grey" width="200"><?php echo '{{navigation}}'; ?>
</td>
		          <td>
		            This includes the selected <b>Navigation</b> template.
		          </td>
		        </tr>
		        <tr>
		          <td class="medium_grey" valign="top"><?php echo '{{continue_block}}'; ?>
</td>
		          <td>
		            This includes the selected <b>Continue Block</b> template.
		          </td>
		        </tr>
		        <tr>
		          <td class="rowN medium_grey" valign="top"><?php echo '{{error_message}}'; ?>
</td>
		          <td class="rowN">
		            This includes the <b>Error Message</b> block, used to display any server-side errors
		            after the user submits the form.
		          </td>
		        </tr>
		      <?php elseif ($this->_tpl_vars['template_info']['template_type'] == 'review_page' || $this->_tpl_vars['template_info']['template_type'] == 'thankyou_page'): ?>
		        <tr>
		          <td valign="top" class="medium_grey" width="200"><?php echo '{{navigation}}'; ?>
</td>
		          <td>
		            This includes the selected <b>Navigation</b> template.
		          </td>
		        </tr>
		        <tr>
		          <td class="rowN medium_grey" valign="top"><?php echo '{{continue_block}}'; ?>
</td>
		          <td class="rowN">
		            This includes the selected <b>Continue Block</b> template.
		          </td>
		        </tr>
		      <?php else: ?>
		        <tr>
		          <td class="rowN medium_grey">No required templates.</td>
		        </tr>
		      <?php endif; ?>
		      </table>

        </div>

        <div class="placeholder_group margin_bottom margin_top">
		      <div><b><?php echo $this->_tpl_vars['L']['word_placeholders']; ?>
</b></div>

	        <table cellspacing="0" cellpadding="1" width="100%">
		      <?php if ($this->_tpl_vars['template_info']['template_type'] == 'header'): ?>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$required_resources}}'; ?>
</td>
		          <td>
		            Required. This should be included in the &lt;head&gt;. It includes all the Core javascript
		            and CSS, plus anything defined for the field types.
		          </td>
		        </tr>
		      <?php elseif ($this->_tpl_vars['template_info']['template_type'] == 'form_page' || $this->_tpl_vars['template_info']['template_type'] == 'review_page'): ?>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$grouped_fields}}'; ?>
</td>
		          <td>
		            The fields that appear on the page, grouped as they are defined on the form's
		            Edit View -> Fields tab.
		          </td>
		        </tr>
		      <?php elseif ($this->_tpl_vars['template_info']['template_type'] == 'form_offline_page'): ?>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$form_offline_page_content}}'; ?>
</td>
		          <td>
		            Contains the custom HTML / text that should be displayed when the form is offline.
		          </td>
		        </tr>
		      <?php elseif ($this->_tpl_vars['template_info']['template_type'] == 'thankyou_page'): ?>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$thankyou_page_content}}'; ?>
</td>
		          <td>
		            Contains the custom HTML / text that should be displayed on the thankyou page.
		          </td>
		        </tr>
		      <?php elseif ($this->_tpl_vars['template_info']['template_type'] == 'navigation'): ?>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$pages}}'; ?>
</td>
		          <td>
		            Contains the list of pages to be included in the page navigation.
		          </td>
		        </tr>
		      <?php endif; ?>

		      
		        <tr>
		          <td width="200" valign="top" class="medium_grey"><?php echo '{{$form_name}}'; ?>
</td>
		          <td>The name of the form.</td>
		        </tr>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$form_id}}'; ?>
</td>
		          <td>The form ID.</td>
		        </tr>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$view_name}}'; ?>
</td>
		          <td>The name of the View.</td>
		        </tr>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$view_id}}'; ?>
</td>
		          <td>The view ID.</td>
		        </tr>
		        <tr>
		          <td valign="top" class="medium_grey"><?php echo '{{$num_pages}}'; ?>
</td>
		          <td>The number of pages in the form (includes review and thankyou pages)</td>
		        </tr>
		        <tr>
		          <td valign="top" class="rowN medium_grey"><?php echo '{{$num_form_pages}}'; ?>
</td>
		          <td class="rowN">The number of form pages only (doesn't include review or thankyou pages)</td>
		        </tr>
		      </table>

        </div>

        <div class="placeholder_group margin_bottom margin_top">
          <div><b><?php echo $this->_tpl_vars['L']['word_resources']; ?>
</b></div>

          <div class="medium_grey">
            <?php if (count($this->_tpl_vars['resources']) == 0): ?>
              <?php echo $this->_tpl_vars['L']['phrase_no_resources_defined']; ?>

            <?php else: ?>
              <?php $_from = $this->_tpl_vars['resources']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['resource_info']):
?>
                <?php if ($this->_tpl_vars['resource_info']['resource_type'] == 'css'): ?>
                  <?php echo '{{$R.'; ?>
<?php echo $this->_tpl_vars['resource_info']['placeholder']; ?>
<?php echo '}}'; ?>
<br />
                <?php else: ?>
                  <?php echo '{{$R.'; ?>
<?php echo $this->_tpl_vars['resource_info']['placeholder']; ?>
<?php echo '}}'; ?>
<br />
                <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
          </div>
  	    </div>

        <div class="placeholder_group margin_bottom margin_top">
          <div><b><?php echo $this->_tpl_vars['L']['phrase_custom_placeholders']; ?>
</b></div>
          <?php if (count($this->_tpl_vars['placeholders']) == 0): ?>
            <div class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_no_placeholders_defined']; ?>
</div>
          <?php else: ?>
            <?php $_from = $this->_tpl_vars['placeholders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
              <div class="medium_grey"><?php echo '{{$'; ?>
P.<?php echo $this->_tpl_vars['p']['placeholder']; ?>
<?php echo '}}'; ?>
</div>
            <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

	  <p>
	    <input type="submit" name="update_template" value="Update Template" />
	  </p>

  </form>