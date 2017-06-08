<?php /* Smarty version 2.6.18, created on 2017-05-18 18:35:07
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/thankyou_page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/thankyou_page.tpl', 38, false),array('function', 'edit_custom_field', '/opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/thankyou_page.tpl', 54, false),)), $this); ?>



<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="ts_content_inner">
          <div id="content">
            <div class="row">
              <div class="col-sm-12">
              <?php echo $this->_tpl_vars['thankyou_page_content']; ?>

              </div>
            </div>

            <?php 
              $this->assign('filename',$GLOBALS["filename"]);
              $this->assign('gg_settings',ft_get_module_settings("", "arbitrary_settings"));
             ?>

            <!-- Crear cuenta -->
            <?php if ($this->_tpl_vars['filename'] == $this->_tpl_vars['gg_settings']['GGNewAccountForm']): ?>
            <div class="row">
              <div class="col-sm-12">
              Para continuar con la inscripción por favor diríjase al siguiente link: <a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/modules/form_builder/published/<?php echo $this->_tpl_vars['gg_settings']['GGInscriptionForm']; ?>
?published_form_id=<?php echo $_GET['published_form_id']; ?>
&course_id=<?php echo $_GET['course_id']; ?>
">Login</a>
              </div>
            </div>
            <?php endif; ?>

            <!-- Inscripcion -->
            <?php if ($this->_tpl_vars['filename'] == 'inscripcion.php'): ?>
              <div class="row">
              <div class="col-sm-12">
              <a href="javascript:imprSelec()" >Imprimir</a>
              <form id="comprobante" action="<?php echo $this->_tpl_vars['page_url']; ?>
" method="post" enctype="multipart/form-data">
                <?php $_from = $this->_tpl_vars['grouped_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_group']):
?>
                <?php $this->assign('group', $this->_tpl_vars['curr_group']['group']); ?>
                <?php $this->assign('fields', $this->_tpl_vars['curr_group']['fields']); ?>
                <?php if ($this->_tpl_vars['group']['custom_data'] != 1 && $this->_tpl_vars['group']['custom_data'] != ( $this->_tpl_vars['num_form_pages'] )): ?>
                <?php if (count($this->_tpl_vars['fields']) > 0): ?>

                <h3>
                  <?php echo $this->_tpl_vars['group']['group_name']; ?>

                </h3>


                <table class="table_1" style="margin:0 auto" cellpadding="1" cellspacing="1" border="0" width="798">
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

                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>


              </form>
              </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function imprSelec(){
    var muestra = "comprobante";
    var ficha=document.getElementById(muestra);
    var ventimp=window.open(' ','');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
  }
</script>