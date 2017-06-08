<?php /* Smarty version 2.6.18, created on 2017-05-31 12:05:58
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/form-page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'error_message', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/form-page.tpl', 8, false),array('function', 'edit_custom_field', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/form-page.tpl', 57, false),array('function', 'continue_block', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/form-page.tpl', 86, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/form-page.tpl', 30, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/form-page.tpl', 32, false),)), $this); ?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="ts_content_inner">
          <div id="content">

                  <!--h2><?php echo $this->_tpl_vars['page_name']; ?>
</h2-->

                  <?php echo smarty_function_error_message(array(), $this);?>


                  <!-- Adds links to restore/change password and create user -->

                  <form action="<?php echo $this->_tpl_vars['page_url']; ?>
" method="post" enctype="multipart/form-data"
                    id="ts_form_element_id" name="edit_submission_form" class="bootstrap form-horizontal ">
                    <input type="hidden" id="form_tools_published_form_id" value="<?php echo $this->_tpl_vars['published_form_id']; ?>
" />
                    
                    <div class="row">
                  <?php $_from = $this->_tpl_vars['grouped_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['curr_group']):
        $this->_foreach['row']['iteration']++;
?>
                    <?php $this->assign('group', $this->_tpl_vars['curr_group']['group']); ?>
                    <?php $this->assign('fields', $this->_tpl_vars['curr_group']['fields']); ?>

                    <!-- Si es par cierro y abro otro row -->
                    <?php if ($this->_tpl_vars['k']%2 == 0): ?>
                    </div>
                    <div class="row">
                    <?php endif; ?>
                  <!--
                  <a name="s<?php echo $this->_tpl_vars['group']['group_id']; ?>
"></a>
                  
                  -->
                    <fieldset class="<?php if (count($this->_tpl_vars['grouped_fields']) > 1): ?>col-md-6<?php else: ?>col-md-8 col-md-offset-2<?php endif; ?>""> 
                    <?php if ($this->_tpl_vars['group']['group_name']): ?>
                      <legend><?php echo ((is_array($_tmp=$this->_tpl_vars['group']['group_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</legend>
                    <?php endif; ?>

                    <?php if ($this->_tpl_vars['current_page'] == 3): ?>
                      <?php 
                        $this->assign('filename',$GLOBALS["filename"]);
                        $this->assign('gg_settings',ft_get_module_settings("", "arbitrary_settings"));
                       ?>
                      <?php if ($this->_tpl_vars['filename'] == 'inscripcion.php'): ?>
                          <pre class="tyc"><?php echo $this->_tpl_vars['gg_settings']['GGTYC']; ?>
</pre>
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if (count($this->_tpl_vars['fields']) > 0): ?>
                    <!-- WRAPER STARTS HERE -->
                    <?php endif; ?>
                
                    <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['i'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['i']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['curr_field']):
        $this->_foreach['i']['iteration']++;
?>
                      <?php $this->assign('field_id', $this->_tpl_vars['field']['field_id']); ?>
                      <div class="form-group <?php if ($this->_tpl_vars['curr_field']['is_searchable'] == 'no'): ?>readonly<?php endif; ?>">
                        <label  class="control-label col-sm-4">
                          <?php echo $this->_tpl_vars['curr_field']['field_title']; ?>

                          <span class="req"><?php if ($this->_tpl_vars['curr_field']['is_required']): ?>*<?php endif; ?></span>
                        </label>
                        <div class="col-sm-8" <?php if (($this->_foreach['i']['iteration'] == $this->_foreach['i']['total'])): ?>class="rowN"<?php endif; ?>>
                          <?php echo smarty_function_edit_custom_field(array('form_id' => $this->_tpl_vars['form_id'],'field_info' => $this->_tpl_vars['curr_field'],'field_types' => $this->_tpl_vars['field_types'],'settings' => $this->_tpl_vars['settings'],'submission_id' => $this->_tpl_vars['submission_id']), $this);?>

                        </div>
                      </div>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php if (count($this->_tpl_vars['fields']) > 0): ?>
                    <!-- WRAPER ENDS HERE -->
                    <?php endif; ?>

                    </fieldset> 
                  <?php endforeach; endif; unset($_from); ?>
                  </div>
                  <!-- Adds links to restore/change password and create user -->
                  <?php if ($this->_tpl_vars['current_page'] == 1): ?>
                    <?php 
                    $this->assign('filename',$GLOBALS["filename"]);
                    $this->assign('gg_settings',ft_get_module_settings("", "arbitrary_settings"));
                     ?>
                    <?php if ($this->_tpl_vars['filename'] == 'inscripcion.php'): ?>
                      <ul class="list-unstyled col-sm-offset-4">
                        <li><a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/form_builder/published/<?php echo $this->_tpl_vars['gg_settings']['GGNewAccountForm']; ?>
?published_form_id=<?php if ($_GET['published_form_id']): ?><?php echo $_GET['published_form_id']; ?>
<?php else: ?><?php echo $_POST['published_form_id']; ?>
<?php endif; ?>&course_id=<?php if ($_GET['course_id']): ?><?php echo $_GET['course_id']; ?>
<?php else: ?><?php echo $_POST['course_id']; ?>
<?php endif; ?>">Crear nueva cuenta</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/form_builder/published/<?php echo $this->_tpl_vars['gg_settings']['GGResetPasswordForm']; ?>
?published_form_id=<?php if ($_GET['published_form_id']): ?><?php echo $_GET['published_form_id']; ?>
<?php else: ?><?php echo $_POST['published_form_id']; ?>
<?php endif; ?>">Recuperar contraseña</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/form_builder/published/<?php echo $this->_tpl_vars['gg_settings']['GGChangePasswordForm']; ?>
?published_form_id=<?php if ($_GET['published_form_id']): ?><?php echo $_GET['published_form_id']; ?>
<?php else: ?><?php echo $_POST['published_form_id']; ?>
<?php endif; ?>">Cambiar contraseña</a></li>
                      </ul>
                    <?php endif; ?>
                  <?php endif; ?>

                  <div class="" >
                    <?php echo smarty_function_continue_block(array(), $this);?>

                  </div>

                </form>

                



          </div>
        </div>
    </div>
</div>