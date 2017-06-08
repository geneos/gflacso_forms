<?php /* Smarty version 2.6.18, created on 2017-05-11 19:35:45
         compiled from /opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/how_to_use.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_arbitrary_settings.png" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="./"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['phrase_how_to_use']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_how_to_use1']; ?>

  </div>

  <div style="border: 1px solid #666666; padding: 3px" class="margin_bottom_large">
    <textarea name="code_field" id="code_field" style="width:100%; height:80px"><?php echo '<?php'; ?>

require_once("<?php echo $this->_tpl_vars['g_root_dir']; ?>
/global/library.php");
$settings = ft_get_module_settings("", "arbitrary_settings");
<?php echo '?>'; ?>
</textarea>
  </div>

  <script>
    var html_editor = new CodeMirror.fromTextArea("code_field", <?php echo '{'; ?>

    parserfile: ["parsexml.js", "parsecss.js", "tokenizejavascript.js", "parsejavascript.js",
                 "../contrib/php/js/tokenizephp.js", "../contrib/php/js/parsephp.js", "../contrib/php/js/parsephphtmlmixed.js"],
    stylesheet: ["<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/xmlcolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css",
                 "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/csscolors.css", "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/contrib/php/css/phpcolors.css"],
    path:       "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/"
    <?php echo '});'; ?>

  </script>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_how_to_use2']; ?>

  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>