<?php /* Smarty version 2.6.18, created on 2017-01-30 17:15:16
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/option_lists/edit.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_ft_include(array('file' => 'header.tpl'), $this);?>


  <table cellpadding="0" cellspacing="0" class="margin_bottom_large">
  <tr>
    <td width="45"><a href="./"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/icon_option_lists.gif" width="34" height="34" border="0" /></a></td>
    <td class="title">
      <a href="./"><?php echo $this->_tpl_vars['LANG']['phrase_option_lists']; ?>
</a> <span class="joiner">&raquo;</span> <?php echo $this->_tpl_vars['list_info']['option_list_name']; ?>

    </td>
  </tr>
  </table>

  <?php echo smarty_function_ft_include(array('file' => 'tabset_open.tpl'), $this);?>


    <?php if ($this->_tpl_vars['page'] == 'main'): ?>
      <?php echo smarty_function_ft_include(array('file' => 'admin/forms/option_lists/tab_main.tpl'), $this);?>

    <?php elseif ($this->_tpl_vars['page'] == 'form_fields'): ?>
      <?php echo smarty_function_ft_include(array('file' => 'admin/forms/option_lists/tab_form_fields.tpl'), $this);?>

    <?php else: ?>
      <?php echo smarty_function_ft_include(array('file' => 'admin/forms/option_lists/tab_main.tpl'), $this);?>

    <?php endif; ?>

  <?php echo smarty_function_ft_include(array('file' => 'tabset_close.tpl'), $this);?>


<?php echo smarty_function_ft_include(array('file' => 'footer.tpl'), $this);?>