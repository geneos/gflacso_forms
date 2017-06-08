<?php /* Smarty version 2.6.18, created on 2017-05-09 18:54:20
         compiled from /opt/lampp/htdocs/www/formtools/modules/pages/templates/view.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/pages/edit.php?page_id=<?php echo $this->_tpl_vars['page_id']; ?>
" style="float:right" title="<?php echo $this->_tpl_vars['phrase_edit_page']; ?>
"><img src="<?php echo $this->_tpl_vars['theme_url']; ?>
/images/admin_edit.png" border="0" /></a>

  <div class="title margin_bottom_large"><?php echo $this->_tpl_vars['page_info']['heading']; ?>
</div>

  <?php echo $this->_tpl_vars['content']; ?>


  <p>
    <a href="index.php">&laquo; <?php echo $this->_tpl_vars['L']['phrase_back_to_pages']; ?>
</a>
  </p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>