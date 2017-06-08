<?php /* Smarty version 2.6.18, created on 2017-02-07 15:12:47
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_resource.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_resource.tpl', 2, false),array('modifier', 'escape', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_edit_resource.tpl', 13, false),)), $this); ?>
  <div class="subtitle underline margin_top_large">
    <a href="?page=resources"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_resources'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a> &raquo; <?php echo ((is_array($_tmp=$this->_tpl_vars['L']['phrase_edit_resource'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

  </div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
    <input type="hidden" name="resource_id" id="resource_id" value="<?php echo $this->_tpl_vars['resource_id']; ?>
" />

    <table cellspacing="2" cellpadding="1" class="margin_bottom_large">
    <tr>
      <td width="180">Resource Name</td>
      <td><input type="text" name="resource_name" style="width:580px" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['resource_info']['resource_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
    </tr>
    <tr>
      <td valign="top"><?php echo $this->_tpl_vars['L']['word_placeholder']; ?>
</td>
      <td>
        <input type="text" name="placeholder" style="width:580px" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['resource_info']['placeholder'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
        <div class="hint"><?php echo $this->_tpl_vars['text_resource_placeholder_hint']; ?>
</div>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_resource_type']; ?>
</td>
      <td>
        <input type="radio" name="resource_type" id="rt1" value="css" <?php if ($this->_tpl_vars['resource_info']['resource_type'] == 'css'): ?>checked<?php endif; ?> />
          <label for="rt1">CSS</label>
        <input type="radio" name="resource_type" id="rt2" value="js" <?php if ($this->_tpl_vars['resource_info']['resource_type'] == 'js'): ?>checked<?php endif; ?> />
          <label for="rt2">JavaScript</label>
      </td>
    </tr>
    </table>

    <div style="border: 1px solid #666666; padding: 3px">
      <textarea id="resource_content" name="resource_content" style="width: 686px; height: 350px"><?php echo ((is_array($_tmp=$this->_tpl_vars['resource_info']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
    </div>

    <script>
      var html_editor = new CodeMirror.fromTextArea("resource_content", <?php echo '{'; ?>

    	parserfile: "parsecss.js",
    	stylesheet: ["<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/csscolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/form_builder/global/css/codemirror.css"],
      path:       "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
      <?php echo '});'; ?>

    </script>

    <p>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </p>

  </form>