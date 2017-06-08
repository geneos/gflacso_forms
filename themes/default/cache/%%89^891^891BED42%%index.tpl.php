<?php /* Smarty version 2.6.18, created on 2017-05-11 19:26:53
         compiled from /opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/index.tpl', 22, false),array('modifier', 'ucwords', '/opt/lampp/htdocs/www/formtools/modules/arbitrary_settings/templates/index.tpl', 52, false),)), $this); ?>
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
      <?php echo $this->_tpl_vars['L']['module_name']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['module_description']; ?>

  </div>

  <form action="index.php" method="post">

  <?php if (count($this->_tpl_vars['results']) == 0): ?>

    <div class="notify yellow_bg" class="margin_bottom_large">
      <div style="padding:8px">
        <?php echo $this->_tpl_vars['L']['notify_no_settings']; ?>

      </div>
    </div>

  <?php else: ?>

    <?php echo $this->_tpl_vars['pagination']; ?>


    <table class="list_table" style="width:100%" cellpadding="1" cellspacing="1">
    <tr style="height: 20px;">
      <?php if (count($this->_tpl_vars['results']) > 1): ?><th width="40"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</th><?php endif; ?>
      <th><?php echo $this->_tpl_vars['L']['phrase_setting_label']; ?>
</th>
      <th><?php echo $this->_tpl_vars['LANG']['phrase_field_type']; ?>
</th>
      <th><?php echo $this->_tpl_vars['L']['phrase_setting_identifier']; ?>
</th>
      <th class="edit"></th>
      <th class="del"></th>
    </tr>

    <?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['setting']):
        $this->_foreach['row']['iteration']++;
?>
      <?php $this->assign('index', ($this->_foreach['row']['iteration']-1)); ?>
      <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
      <?php $this->assign('id', $this->_tpl_vars['setting']['sid']); ?>

      <tr>
        <?php if (count($this->_tpl_vars['results']) > 1): ?><td align="center"><input type="text" name="setting_<?php echo $this->_tpl_vars['id']; ?>
_order" size="3" value="<?php echo $this->_tpl_vars['setting']['setting_order']; ?>
" /></td><?php endif; ?>
        <td class="pad_left_small"><?php echo $this->_tpl_vars['setting']['setting_label']; ?>
</td>
        <td class="pad_left_small"><?php echo ((is_array($_tmp=$this->_tpl_vars['setting']['field_type'])) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
</td>
        <td class="pad_left_small medium_grey"><?php echo $this->_tpl_vars['setting']['setting_identifier']; ?>
</td>
        <td class="edit"><a href="edit.php?sid=<?php echo $this->_tpl_vars['id']; ?>
"></a></td>
        <td class="del"><a href="#" onclick="return page_ns.delete_field(<?php echo $this->_tpl_vars['id']; ?>
)"></a></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>

  <?php endif; ?>

    <p>
      <?php if (count($this->_tpl_vars['results']) > 1): ?>
        <input type="submit" name="update_order" value="<?php echo $this->_tpl_vars['LANG']['phrase_update_order']; ?>
" />
      <?php endif; ?>
      <input type="submit" name="add_field" value="<?php echo $this->_tpl_vars['L']['phrase_add_setting']; ?>
" />
    </p>
  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>