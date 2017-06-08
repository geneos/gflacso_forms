<?php /* Smarty version 2.6.18, created on 2017-01-30 20:58:40
         compiled from /opt/lampp/htdocs/www/formtools/modules/hooks_manager/templates/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><img src="images/icon.gif" width="34" height="34" /></td>
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

  <?php if ($this->_tpl_vars['num_results'] == 0): ?>

    <div class="notify" class="margin_bottom_large">
      <div style="padding:8px">
        <?php echo $this->_tpl_vars['L']['notify_no_rules']; ?>

      </div>
    </div>

  <?php else: ?>

    <?php echo $this->_tpl_vars['pagination']; ?>


    <table class="list_table" style="width:100%" cellpadding="1" cellspacing="1">
    <tr style="height: 20px;">
      <th><?php echo $this->_tpl_vars['L']['phrase_rule_name']; ?>
</th>
      <th><?php echo $this->_tpl_vars['L']['phrase_hook_type']; ?>
</th>
      <th><?php echo $this->_tpl_vars['L']['word_hook']; ?>
</th>
      <th width="100"><?php echo $this->_tpl_vars['LANG']['word_status']; ?>
</th>
      <th class="edit"></th>
      <th class="del"></th>
    </tr>

    <?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['result']):
        $this->_foreach['row']['iteration']++;
?>
      <?php $this->assign('hook_id', $this->_tpl_vars['result']['hook_id']); ?>
      <tr>
        <td><?php echo $this->_tpl_vars['result']['rule_name']; ?>
</td>
        <td class="pad_left_small">
          <?php if ($this->_tpl_vars['result']['is_custom_hook'] == 'yes'): ?>
            <span class=""><?php echo $this->_tpl_vars['LANG']['word_custom']; ?>
</span>
          <?php elseif ($this->_tpl_vars['result']['hook_type'] == 'code'): ?>
            <span class=""><?php echo $this->_tpl_vars['LANG']['word_code']; ?>
</span>
          <?php else: ?>
            <span class=""><?php echo $this->_tpl_vars['L']['word_template']; ?>
</span>
          <?php endif; ?>
        </td>
        <td>
	  <?php if ($this->_tpl_vars['result']['hook_type'] == 'code'): ?>
	    <?php echo $this->_tpl_vars['result']['function_name']; ?>
, <?php echo $this->_tpl_vars['result']['action_location']; ?>

	  <?php else: ?>
	    <?php echo $this->_tpl_vars['result']['action_location']; ?>

	  <?php endif; ?>
        </td>
        <td align="center">
          <?php if ($this->_tpl_vars['result']['status'] == 'enabled'): ?>
             <span class="green"><?php echo $this->_tpl_vars['LANG']['word_enabled']; ?>
</span>
          <?php else: ?>
             <span class="red"><?php echo $this->_tpl_vars['LANG']['word_disabled']; ?>
</span>
          <?php endif; ?>
        </td>
        <td class="edit"><a href="edit.php?hook_id=<?php echo $this->_tpl_vars['hook_id']; ?>
"></a></td>
        <td class="del"><a href="#" onclick="return page_ns.delete_rule(<?php echo $this->_tpl_vars['hook_id']; ?>
)"></a></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>

    </table>

  <?php endif; ?>

  <form action="add.php" method="post">
    <p>
      <input type="submit" value="<?php echo $this->_tpl_vars['L']['phrase_add_rule']; ?>
" />
    </p>
  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>