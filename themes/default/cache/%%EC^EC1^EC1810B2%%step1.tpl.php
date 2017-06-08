<?php /* Smarty version 2.6.18, created on 2017-01-30 18:36:14
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/admin/forms/add/step1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/add/step1.tpl', 1, false),array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/admin/forms/add/step1.tpl', 25, false),)), $this); ?>
<?php echo smarty_function_ft_include(array('file' => 'header.tpl'), $this);?>


  <table cellpadding="0" cellspacing="0" class="margin_bottom_large">
  <tr>
    <td width="45"><a href="../"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/icon_forms.gif" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="../"><?php echo $this->_tpl_vars['LANG']['word_forms']; ?>
</a> <span class="joiner">&raquo;</span>
      <a href="./"><?php echo $this->_tpl_vars['LANG']['phrase_add_form']; ?>
</a> <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['LANG']['phrase_external_form']; ?>

    </td>
  </tr>
  </table>

  <table cellpadding="0" cellspacing="0" width="100%" class="add_form_nav margin_bottom_large">
  <tr>
    <td class="selected"><?php echo $this->_tpl_vars['LANG']['word_start']; ?>
</td>
    <td class="unselected"><?php echo $this->_tpl_vars['LANG']['phrase_form_info']; ?>
</td>
    <td class="unselected"><?php echo $this->_tpl_vars['LANG']['phrase_test_submission']; ?>
</td>
    <td class="unselected"><?php echo $this->_tpl_vars['LANG']['phrase_database_setup']; ?>
</td>
    <td class="unselected"><?php echo $this->_tpl_vars['LANG']['phrase_field_types']; ?>
</td>
    <td class="unselected"><?php echo $this->_tpl_vars['LANG']['phrase_finalize_form']; ?>
</td>
  </tr>
  </table>

  <div class="subtitle underline">1. <?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['phrase_getting_started'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <p>
    <?php echo $this->_tpl_vars['LANG']['text_add_form_choose_integration_method']; ?>

  </p>

  <form method="post" action="<?php echo $this->_tpl_vars['same_page']; ?>
">
    <table width="100%">
      <tr>
        <td width="49%" valign="top">
          <div id="direct_box" class="<?php if ($this->_tpl_vars['form_info']['submission_type'] == 'direct'): ?>blue_box<?php else: ?>grey_box<?php endif; ?>">
            <span style="float:right"><input type="submit" class="blue bold" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_select'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
" name="direct" /></span>
            <div class="bold"><?php echo $this->_tpl_vars['LANG']['phrase_1_direct']; ?>
</div>
            <div class="medium_grey">&#8212; <?php echo $this->_tpl_vars['LANG']['text_add_form_step_3_text_2']; ?>
</div>
            <br />
            <div>
              <a href="#" onclick="return page_ns.show_section('method1_benefits')"><?php echo $this->_tpl_vars['LANG']['word_benefits']; ?>
</a> |
              <a href="#" onclick="return page_ns.show_section('method1_drawbacks')"><?php echo $this->_tpl_vars['LANG']['word_drawbacks']; ?>
</a>
            </div>
          </div>
        </td>
        <td width="2%"> </td>
        <td width="49%" valign="top">
          <div id="select_box" class="<?php if ($this->_tpl_vars['form_info']['submission_type'] == 'code'): ?>blue_box<?php else: ?>grey_box<?php endif; ?>">
            <span style="float:right"><input type="submit" class="blue bold" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['word_select'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
" name="code" /></span>
            <div class="bold"><?php echo $this->_tpl_vars['LANG']['phrase_2_code']; ?>
</div>
            <div class="medium_grey">&#8212; <?php echo $this->_tpl_vars['LANG']['text_add_form_step_3_text_3']; ?>
</div>
            <br />
            <div>
              <a href="#" onclick="return page_ns.show_section('method2_benefits')"><?php echo $this->_tpl_vars['LANG']['word_benefits']; ?>
</a> |
              <a href="#" onclick="return page_ns.show_section('method2_drawbacks')"><?php echo $this->_tpl_vars['LANG']['word_drawbacks']; ?>
</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">

          <div class="margin_top_large">
            <div class="box" id="method1_benefits" style="display:none">
              <?php echo $this->_tpl_vars['LANG']['text_add_form_direct_submission_benefits']; ?>

            </div>

            <div class="box" id="method1_drawbacks" style="display:none">
              <?php echo $this->_tpl_vars['LANG']['text_add_form_direct_submission_drawbacks']; ?>

            </div>

            <div class="box" id="method2_benefits" style="display:none">
              <?php echo $this->_tpl_vars['LANG']['text_add_form_code_submission_benefits']; ?>

            </div>

            <div class="box" id="method2_drawbacks" style="display:none">
              <?php echo $this->_tpl_vars['LANG']['text_add_form_code_submission_drawbacks']; ?>

            </div>
          </div>

        </td>
      </tr>
    </table>
  </form>

<?php echo smarty_function_ft_include(array('file' => 'footer.tpl'), $this);?>
