<?php /* Smarty version 2.6.18, created on 2017-01-31 14:58:56
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/custom_fields/templates/tab_saving.tpl */ ?>
  <div class="subtitle underline margin_top_large">STORAGE SETTINGS</div>

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

    <div class="hint margin_bottom_large">
      <?php echo $this->_tpl_vars['L']['text_saving_desc']; ?>

    </div>

    <div class="editor">
      <textarea id="php_processing" name="php_processing" style="width: 100%; height: 280px"><?php echo $this->_tpl_vars['field_type_info']['php_processing']; ?>
</textarea>
    </div>
    <script type="text/javascript">
      var codemirror_field = new CodeMirror.fromTextArea("php_processing", <?php echo '{'; ?>

        parserfile: ["../contrib/php/js/tokenizephp.js", "../contrib/php/js/parsephp.js"],
        path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
        stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/contrib/php/css/phpcolors.css"
      <?php echo '});'; ?>

    </script>

    <?php if ($this->_tpl_vars['field_type_info']['is_editable'] == 'yes' || $this->_tpl_vars['g_cf_allow_editing_of_non_editable_fields']): ?>
    <div class="margin_top_large">
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['word_update']; ?>
" />
    </div>
    <?php endif; ?>

  </form>