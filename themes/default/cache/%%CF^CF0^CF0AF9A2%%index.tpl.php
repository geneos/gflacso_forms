<?php /* Smarty version 2.6.18, created on 2017-01-30 17:55:35
         compiled from /opt/lampp/htdocs/www/formtools/modules/pages/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/pages/templates/index.tpl', 21, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/pages/templates/index.tpl', 35, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_pages.gif" border="0" width="34" height="34" /></a></td>
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
    <?php echo $this->_tpl_vars['L']['text_intro_para_1']; ?>

    <?php echo $this->_tpl_vars['text_intro_para_2']; ?>

  </div>

  <?php if (count($this->_tpl_vars['pages']) == 0): ?>

    <div class="notify yellow_bg" class="margin_bottom_large">
      <div style="padding:8px">
        <?php echo $this->_tpl_vars['L']['notify_no_pages']; ?>

      </div>
    </div>

  <?php else: ?>

    <?php echo $this->_tpl_vars['pagination']; ?>


    <table class="list_table" style="width:100%" cellpadding="1" cellspacing="1">
    <tr style="height: 20px;">
      <th width="20"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_id'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</th>
      <th><?php echo $this->_tpl_vars['L']['word_page']; ?>
</th>
      <th width="100">Page Type</th>
      <th width="120">Who can Access?</th>
      <th width="60"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_view'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</th>
      <th class="edit"></th>
      <th class="del"></th>
    </tr>

    <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page']):
        $this->_foreach['row']['iteration']++;
?>
      <?php $this->assign('index', ($this->_foreach['row']['iteration']-1)); ?>
      <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
      <?php $this->assign('page_id', $this->_tpl_vars['page']['page_id']); ?>
      <tr>
        <td align="center" class="light_grey"><?php echo $this->_tpl_vars['page_id']; ?>
</td>
        <td class="pad_left_small"><?php echo $this->_tpl_vars['page']['page_name']; ?>
</td>
        <td class="pad_left">
          <?php if ($this->_tpl_vars['page']['content_type'] == 'html'): ?>
            <span class=""><?php echo $this->_tpl_vars['LANG']['word_html']; ?>
</span>
          <?php elseif ($this->_tpl_vars['page']['content_type'] == 'php'): ?>
            <span class=""><?php echo $this->_tpl_vars['L']['word_php']; ?>
</span>
          <?php elseif ($this->_tpl_vars['page']['content_type'] == 'smarty'): ?>
            <span class=""><?php echo $this->_tpl_vars['L']['word_smarty']; ?>
</span>
          <?php endif; ?>
        </td>
        <td class="pad_left">
          <?php echo $this->_tpl_vars['page_info']['access_type']; ?>

          <?php if ($this->_tpl_vars['page']['access_type'] == 'admin'): ?>
            <span class="blue"><?php echo $this->_tpl_vars['LANG']['phrase_admin_only']; ?>
</span>
          <?php elseif ($this->_tpl_vars['page']['access_type'] == 'public'): ?>
            <span class="green"><?php echo $this->_tpl_vars['LANG']['word_public']; ?>
</span>
          <?php elseif ($this->_tpl_vars['page']['access_type'] == 'private'): ?>
            <span class="purple"><?php echo $this->_tpl_vars['LANG']['word_private']; ?>
</span>
          <?php endif; ?>
        </td>
        <td align="center"><a href="view.php?page_id=<?php echo $this->_tpl_vars['page_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_view'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
        <td class="edit"><a href="edit.php?page_id=<?php echo $this->_tpl_vars['page_id']; ?>
"></a></td>
        <td class="del"><a href="#" onclick="return pages_ns.delete_page(<?php echo $this->_tpl_vars['page_id']; ?>
)"></a></td>
      </tr>

    <?php endforeach; endif; unset($_from); ?>

    </table>

  <?php endif; ?>

  <form action="add.php" method="post">
    <p>
      <input type="submit" value="<?php echo $this->_tpl_vars['L']['phrase_add_page']; ?>
" />
    </p>
  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>