<?php /* Smarty version 2.6.18, created on 2017-05-15 08:46:50
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/review_page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/review_page.tpl', 8, false),array('function', 'edit_custom_field', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/review_page.tpl', 23, false),array('function', 'continue_block', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/review_page.tpl', 35, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['review_page_title']; ?>
</h2>

<form action="<?php echo $this->_tpl_vars['page_url']; ?>
" method="post" enctype="multipart/form-data">
  <?php $_from = $this->_tpl_vars['grouped_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_group']):
?>
  <?php $this->assign('group', $this->_tpl_vars['curr_group']['group']); ?>
  <?php $this->assign('fields', $this->_tpl_vars['curr_group']['fields']); ?>

  <?php if (count($this->_tpl_vars['fields']) > 0): ?>
  <h3>
    <a href="?page=<?php echo $this->_tpl_vars['group']['custom_data']; ?>
&published_form_id=<?php echo $_GET['published_form_id']; ?>
&course_id=<?php echo $_GET['course_id']; ?>
#s<?php echo $this->_tpl_vars['group']['group_id']; ?>
">EDIT</a>
    <?php echo $this->_tpl_vars['group']['group_name']; ?>

  </h3>

  <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="798">
    <?php endif; ?>

    <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_field']):
?>
    <?php $this->assign('field_id', $this->_tpl_vars['field']['field_id']); ?>
    <tr>
      <td width="200" class="pad_left_small" valign="top"><?php echo $this->_tpl_vars['curr_field']['field_title']; ?>
</td>
      <td class="answer" valign="top">
        <div class="pad_left">
          <?php echo smarty_function_edit_custom_field(array('form_id' => $this->_tpl_vars['form_id'],'submission_id' => $this->_tpl_vars['submission_id'],'field_info' => $this->_tpl_vars['curr_field'],'field_types' => $this->_tpl_vars['field_types'],'settings' => $this->_tpl_vars['settings']), $this);?>

        </div>
      </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>

    <?php if (count($this->_tpl_vars['fields']) > 0): ?>
  </table>
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>

  <?php echo smarty_function_continue_block(array(), $this);?>

</form>