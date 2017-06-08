<?php /* Smarty version 2.6.18, created on 2017-01-30 16:43:33
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/module_menu.tpl */ ?>

  <div class="menu_items">
  <?php $_from = $this->_tpl_vars['module_nav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
    <?php if ($this->_tpl_vars['i']['is_submenu'] == 'no'): ?>
      <div class="nav_link"><a href="<?php echo $this->_tpl_vars['i']['url']; ?>
"<?php echo $this->_tpl_vars['link_id']; ?>
><?php echo $this->_tpl_vars['i']['display_text']; ?>
</a></div>
    <?php else: ?>
      <div class="nav_link_submenu"><a href="<?php echo $this->_tpl_vars['i']['url']; ?>
">&#8212; <?php echo $this->_tpl_vars['i']['display_text']; ?>
</a></div>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  </div>