<?php /* Smarty version 2.6.18, created on 2017-02-02 18:05:58
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/modules/about.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0" height="35" class="margin_bottom_large">
  <tr>
    <td width="45"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/icon_modules.gif" width="34" height="34" /></td>
    <td class="title">
      <a href="./"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a> <span class="joiner">&raquo;</span> <?php echo $this->_tpl_vars['LANG']['phrase_module_info']; ?>

    </td>
  </tr>
  </table>


  <table cellspacing="1" cellpadding="1" class="list_table">
  <tr>
    <td width="140" class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['word_module']; ?>
</td>
    <td class="pad_left_small bold"><?php echo $this->_tpl_vars['module_info']['module_name']; ?>
</td>
  </tr>
  <?php if ($this->_tpl_vars['module_info']['is_premium'] == 'yes'): ?>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_license_key']; ?>
</td>
      <td class="pad_left_small">
        <?php if ($this->_tpl_vars['module_info']['module_key']): ?>
          <span class="medium_grey"><?php echo $this->_tpl_vars['module_info']['module_key']; ?>
</span>
        <?php else: ?>
          <span class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_not_entered_yet']; ?>
</span>
        <?php endif; ?>
      </td>
    </tr>
  <?php endif; ?>
  <tr>
    <td class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_module_description']; ?>
</td>
    <td class="pad_left_small"><?php echo $this->_tpl_vars['module_info']['description']; ?>
</td>
  </tr>
  <tr>
    <td class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['word_version']; ?>
</td>
    <td class="pad_left_small"><?php echo $this->_tpl_vars['module_info']['version']; ?>
</td>
  </tr>
  <tr>
    <td class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['word_author']; ?>
</td>
    <td class="pad_left_small"><?php echo $this->_tpl_vars['module_info']['author']; ?>

      <?php if ($this->_tpl_vars['module_info']['author_email'] != ''): ?>
        &#8212; <a href="mailto:<?php echo $this->_tpl_vars['module_info']['author_email']; ?>
"><?php echo $this->_tpl_vars['module_info']['author_email']; ?>
</a>
      <?php endif; ?>
    </td>
  </tr>
  <?php if ($this->_tpl_vars['module_info']['author_link'] != ''): ?>
    <tr>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_author_link']; ?>
</td>
      <td class="pad_left_small"><a href="<?php echo $this->_tpl_vars['module_info']['author_link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['module_info']['author_link']; ?>
</a></td>
    </tr>
  <?php endif; ?>
  </table>

  <p>
    <a href="index.php"><?php echo $this->_tpl_vars['LANG']['word_back_leftarrow']; ?>
</a>
  </p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>