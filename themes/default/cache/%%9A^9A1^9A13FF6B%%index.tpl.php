<?php /* Smarty version 2.6.18, created on 2017-01-30 17:54:22
         compiled from /opt/lampp/htdocs/www/formtools/modules/export_manager/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/export_manager/templates/index.tpl', 21, false),array('function', 'eval', '/opt/lampp/htdocs/www/formtools/modules/export_manager/templates/index.tpl', 52, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon_export.gif" border="0" width="34" height="34" /></a></td>
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
    <?php echo $this->_tpl_vars['L']['text_export_manager_intro']; ?>

  </div>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
    <?php if (count($this->_tpl_vars['export_groups']) == 0): ?>
      <div class="notify yellow_bg" class="margin_bottom_large">
        <div style="padding:8px">
          <?php echo $this->_tpl_vars['L']['notify_no_export_groups']; ?>

        </div>
      </div>
    <?php else: ?>
      <div class="sortable export_group_list" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
        <input type="hidden" class="sortable__custom_delete_handler" value="page_ns.delete_export_group" />
        <ul class="header_row">
          <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
          <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_export_group']; ?>
</li>
          <li class="col3"><?php echo $this->_tpl_vars['L']['word_icon']; ?>
</li>
          <li class="col4"><?php echo $this->_tpl_vars['L']['word_visibility']; ?>
</li>
          <li class="col5"><?php echo $this->_tpl_vars['LANG']['phrase_access_type']; ?>
</li>
          <li class="col6"><?php echo $this->_tpl_vars['L']['phrase_num_export_types']; ?>
</li>
          <li class="col7 edit"></li>
          <li class="col8 colN del"></li>
        </ul>
        <div class="clear"></div>
        <ul class="rows" id="rows">
        <?php $_from = $this->_tpl_vars['export_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['row']['iteration']++;
?>
          <?php $this->assign('index', ($this->_foreach['row']['iteration']-1)); ?>
          <?php $this->assign('count', $this->_foreach['row']['iteration']); ?>
          <?php $this->assign('export_group_id', $this->_tpl_vars['group']['export_group_id']); ?>
          <li class="sortable_row">
            <div class="row_content">
              <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
                <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['export_group_id']; ?>
" />
                <ul>
                  <li class="col1 sort_col"><?php echo $this->_tpl_vars['count']; ?>
</li>
                  <li class="col2"><?php echo smarty_function_eval(array('var' => $this->_tpl_vars['group']['group_name']), $this);?>
</li>
                  <li class="col3"><?php if ($this->_tpl_vars['group']['icon']): ?><img src="images/icons/<?php echo $this->_tpl_vars['group']['icon']; ?>
" /><?php endif; ?></li>
                  <li class="col4">
                    <?php if ($this->_tpl_vars['group']['visibility'] == 'show'): ?>
                      <span class="green"><?php echo $this->_tpl_vars['LANG']['word_show']; ?>
</span>
                    <?php else: ?>
                      <span class="red"><?php echo $this->_tpl_vars['LANG']['word_hide']; ?>
</span>
                    <?php endif; ?>
                  </li>
                  <li class="col5">
                    <?php if ($this->_tpl_vars['group']['access_type'] == 'admin'): ?>
                      <?php echo $this->_tpl_vars['LANG']['phrase_admin_only']; ?>

                    <?php elseif ($this->_tpl_vars['group']['access_type'] == 'public'): ?>
                      <?php echo $this->_tpl_vars['LANG']['word_public']; ?>

                    <?php elseif ($this->_tpl_vars['group']['access_type'] == 'private'): ?>
                      <?php echo $this->_tpl_vars['LANG']['word_private']; ?>

                    <?php endif; ?>
                  </li>
                  <li class="col6 check_area"><a href="export_groups/edit.php?page=export_types&export_group_id=<?php echo $this->_tpl_vars['export_group_id']; ?>
"><?php echo $this->_tpl_vars['group']['num_export_types']; ?>
</a></li>
                  <li class="col7 edit"><a href="export_groups/edit.php?page=main&export_group_id=<?php echo $this->_tpl_vars['export_group_id']; ?>
"></a></li>
                  <li class="col8 colN del"></li>
                </ul>
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
          </li>
        <?php endforeach; endif; unset($_from); ?>
        </ul>
      </div>
    <?php endif; ?>

    <p>
      <?php if (count($this->_tpl_vars['export_groups']) > 0): ?>
        <input type="submit" name="update" value="<?php echo $this->_tpl_vars['LANG']['phrase_update_order']; ?>
" />
      <?php endif; ?>
      <input type="button" value="<?php echo $this->_tpl_vars['L']['phrase_add_export_group']; ?>
" onclick="window.location='export_groups/add.php'" />
    </p>

  </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>