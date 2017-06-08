<?php /* Smarty version 2.6.18, created on 2017-01-31 14:58:30
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_displaying.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_displaying.tpl', 1, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_displaying.tpl', 49, false),)), $this); ?>
  <div class="subtitle underline margin_top_large"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_display_settings'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'no' && ! $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <?php $this->assign('g_success', true); ?>
    <?php $this->assign('g_message', $this->_tpl_vars['L']['text_non_editable_field_type']); ?>
  <?php endif; ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">

    <div class="inner_tabset" id="custom_fields_edit_field_displaying">
      <div class="tab_row fourCols">
        <div class="inner_tab1 <?php if ($this->_tpl_vars['current_inner_tab'] == 1 || $this->_tpl_vars['current_inner_tab'] == ""): ?>selected="selected"<?php endif; ?>"><?php echo $this->_tpl_vars['L']['phrase_view_field']; ?>
</div>
        <div class="inner_tab2 <?php if ($this->_tpl_vars['current_inner_tab'] == 2): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['L']['phrase_edit_field']; ?>
</div>
        <div class="inner_tab3 <?php if ($this->_tpl_vars['current_inner_tab'] == 3): ?>selected<?php endif; ?>">CSS</div>
        <div class="inner_tab4 <?php if ($this->_tpl_vars['current_inner_tab'] == 4): ?>selected<?php endif; ?>">Javascript</div>
      </div>
      <div class="inner_tab_content">
        <div class="inner_tab_content1 <?php if ($this->_tpl_vars['current_inner_tab'] != 1 && $this->_tpl_vars['current_inner_tab'] != ""): ?>hidden<?php endif; ?>">

          <table width="100%">
          <tr>
            <td width="140" valign="top" rowspan="3"><?php echo $this->_tpl_vars['L']['phrase_rendering_type']; ?>
</td>
            <td width="80" class="italic green"><?php echo $this->_tpl_vars['L']['word_fastest']; ?>
</td>
            <td colspan="2">
              <input type="radio" name="rendering_type" id="rt1" value="none"
                <?php if ($this->_tpl_vars['field_type_info']['view_field_rendering_type'] == 'none'): ?>checked<?php endif; ?> />
                <label for="rt1"><?php echo $this->_tpl_vars['L']['phrase_output_db_value_directly']; ?>
</label>
            </td>
          </tr>
          <tr>
            <td width="80" class="italic green" valign="top"><?php echo $this->_tpl_vars['L']['word_fast']; ?>
</td>
            <td width="160" valign="top">
              <input type="radio" name="rendering_type" id="rt2" value="php"
                <?php if ($this->_tpl_vars['field_type_info']['view_field_rendering_type'] == 'php'): ?>checked<?php endif; ?> />
                <label for="rt2"><?php echo $this->_tpl_vars['L']['phrase_php_function']; ?>
</label>
            </td>
            <td>
              <select name="view_field_php_function_source">
                <option value="core" <?php if ($this->_tpl_vars['field_type_info']['view_field_php_function_source'] == 'core'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['L']['word_core']; ?>
</option>
                <optgroup label="<?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
">
                <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module_info']):
?>
                  <option value="<?php echo $this->_tpl_vars['module_info']['module_id']; ?>
" <?php if ($this->_tpl_vars['field_type_info']['view_field_php_function_source'] == $this->_tpl_vars['module_info']['module_id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['module_info']['module_name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </optgroup>
              </select><br />

              <input type="text" name="function_name" id="function_name" style="width:100%" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_type_info']['view_field_php_function'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
            </td>
          </tr>
          <tr>
            <td width="80" class="italic orange"><?php echo $this->_tpl_vars['L']['word_slower']; ?>
</td>
            <td colspan="2">
              <input type="radio" name="rendering_type" id="rt3" value="smarty"
                <?php if ($this->_tpl_vars['field_type_info']['view_field_rendering_type'] == 'smarty'): ?>checked<?php endif; ?> />
                <label for="rt3"><?php echo $this->_tpl_vars['L']['phrase_smarty_content']; ?>
</label>
            </td>
          </tr>
          </table>

          <div id="view_field_smarty_markup_section" <?php if ($this->_tpl_vars['field_type_info']['view_field_rendering_type'] != 'smarty'): ?>style="display: none"<?php endif; ?>>
            <div class="hint margin_bottom_large">
              <?php echo $this->_tpl_vars['L']['text_view_field_smarty_desc']; ?>

            </div>
            <div class="editor">
              <textarea id="view_field_smarty_markup" name="view_field_smarty_markup" style="height: 300px"><?php echo ((is_array($_tmp=$this->_tpl_vars['field_type_info']['view_field_smarty_markup'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
            </div>
            <script type="text/javascript">
              var view_field_smarty_markup_field = new CodeMirror.fromTextArea("view_field_smarty_markup", <?php echo '{'; ?>

                parserfile: ["parsexml.js"],
                path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
                stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/xmlcolors.css"
              <?php echo '});'; ?>

            </script>
            <?php $this->assign('context', 'view'); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../modules/custom_fields/templates/available_variables.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        </div>
        <div class="inner_tab_content2 <?php if ($this->_tpl_vars['current_inner_tab'] != 2): ?>hidden<?php endif; ?>">
          <div class="hint margin_bottom_large">
            <?php echo $this->_tpl_vars['L']['text_edit_field_smarty_desc']; ?>

          </div>
          <div class="editor">
            <textarea id="edit_field_smarty_markup" name="edit_field_smarty_markup" style="height: 300px"><?php echo ((is_array($_tmp=$this->_tpl_vars['field_type_info']['edit_field_smarty_markup'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
          </div>
          <script type="text/javascript">
            var edit_field_markup_field = new CodeMirror.fromTextArea("edit_field_smarty_markup", <?php echo '{'; ?>

              parserfile: ["parsexml.js"],
              path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
              stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/xmlcolors.css"
            <?php echo '});'; ?>

          </script>
          <?php $this->assign('context', 'edit'); ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../modules/custom_fields/templates/available_variables.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div class="inner_tab_content3 <?php if ($this->_tpl_vars['current_inner_tab'] != 3): ?>hidden<?php endif; ?>">
          <div class="hint margin_bottom_large"><?php echo $this->_tpl_vars['L']['text_css_desc']; ?>
</div>
          <div class="editor">
            <textarea id="resources_css" name="resources_css" style="height: 300px"><?php echo $this->_tpl_vars['field_type_info']['resources_css']; ?>
</textarea>
          </div>
          <script type="text/javascript">
            var include_css_field = new CodeMirror.fromTextArea("resources_css", <?php echo '{'; ?>

              parserfile: ["parsecss.js"],
              path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
              stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/csscolors.css"
            <?php echo '});'; ?>

          </script>
        </div>
        <div class="inner_tab_content4 <?php if ($this->_tpl_vars['current_inner_tab'] != 4): ?>hidden<?php endif; ?>">
          <div class="hint margin_bottom_large"><?php echo $this->_tpl_vars['L']['text_js_desc']; ?>
</div>
          <div class="editor">
            <textarea id="resources_js" name="resources_js" style="height: 300px"><?php echo $this->_tpl_vars['field_type_info']['resources_js']; ?>
</textarea>
          </div>
          <script type="text/javascript">
            var include_js_field = new CodeMirror.fromTextArea("resources_js", <?php echo '{'; ?>

              parserfile: ["tokenizejavascript.js", "parsejavascript.js"],
              path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
              stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css"
            <?php echo '});'; ?>

          </script>
        </div>
      </div>
    </div>

    <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'yes' || $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <div class="margin_top_large">
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </div>
    <?php endif; ?>

  </form>