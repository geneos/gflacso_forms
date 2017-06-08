<?php /* Smarty version 2.6.18, created on 2017-02-13 19:08:12
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/block-navigation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/block-navigation.tpl', 1, false),)), $this); ?>
<ul id="css_nav" class="nav_<?php echo count($this->_tpl_vars['nav_pages']); ?>
_pages">
  <?php $_from = $this->_tpl_vars['nav_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page_info']):
        $this->_foreach['row']['iteration']++;
?>
    <?php $this->assign('i', $this->_foreach['row']['iteration']); ?>
    <?php if ($this->_tpl_vars['current_page'] > $this->_tpl_vars['i'] && $this->_tpl_vars['current_page'] != $this->_tpl_vars['num_pages']): ?>
      <li><a href="<?php echo $this->_tpl_vars['filename']; ?>
?page=<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['i']; ?>
. <?php echo $this->_tpl_vars['page_info']['page_name']; ?>
</a></li>
    <?php elseif ($this->_tpl_vars['current_page'] == $this->_tpl_vars['i'] || $this->_tpl_vars['current_page'] == $this->_tpl_vars['num_pages']): ?>
      <li class="css_nav_current_page"><?php echo $this->_tpl_vars['i']; ?>
. <?php echo $this->_tpl_vars['page_info']['page_name']; ?>
</li>
    <?php else: ?>
      <li><?php echo $this->_tpl_vars['i']; ?>
. <?php echo $this->_tpl_vars['page_info']['page_name']; ?>
</li>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
</ul>