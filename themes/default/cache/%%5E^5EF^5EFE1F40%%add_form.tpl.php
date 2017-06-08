<?php /* Smarty version 2.6.18, created on 2017-01-30 16:37:24
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/admin/add_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ft_include', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/admin/add_form.tpl', 1, false),array('function', 'clients_dropdown', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/admin/add_form.tpl', 75, false),)), $this); ?>
<?php echo smarty_function_ft_include(array('file' => 'header.tpl'), $this);?>


  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="../"><img src="<?php echo $this->_tpl_vars['images_url']; ?>
/icon_forms.gif" border="0" width="34" height="34" /></a></td>
    <td class="title">
      <a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/admin/forms/"><?php echo $this->_tpl_vars['LANG']['word_forms']; ?>
</a> <span class="joiner">&raquo;</span>
      <a href="<?php echo $this->_tpl_vars['g_root_url']; ?>
/admin/forms/add/"><?php echo $this->_tpl_vars['LANG']['phrase_add_form']; ?>
</a> <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['module_name']; ?>

    </td>
  </tr>
  </table>

  <?php echo smarty_function_ft_include(array('file' => "messages.tpl"), $this);?>


  <div class="margin_bottom_large">
    <?php echo $this->_tpl_vars['L']['text_add_form_intro']; ?>

  </div>

  <form action="add_form.php" id="create_form_builder_form" method="post">

    <table cellspacing="1" cellpadding="0" class="list_table">
    <tr>
      <td width="15" align="center" class="red">*</td>
      <td class="pad_left_small" width="180"><?php echo $this->_tpl_vars['LANG']['phrase_form_name']; ?>
</td>
      <td>
        <input type="text" name="form_name" id="form_name" style="width: 99%" />
      </td>
    </tr>
    <tr>
      <td width="15" align="center" class="red">*</td>
      <td class="pad_left_small"><?php echo $this->_tpl_vars['LANG']['phrase_num_fields']; ?>
</td>
      <td>
        <input type="text" name="num_fields" style="width: 50px" value="5" />
        <div class="hint">
          <?php echo $this->_tpl_vars['L']['text_add_form_num_fields_hint']; ?>

        </div>
      </td>
    </tr>
    <tr>
      <td class="red" valign="top" align="center">*</td>
      <td class="pad_left_small" valign="top"><?php echo $this->_tpl_vars['LANG']['word_access']; ?>
</td>
      <td>

        <table cellspacing="1" cellpadding="0" >
        <tr>
          <td>
            <input type="radio" name="access_type" id="at1" value="admin" checked />
              <label for="at1"><?php echo $this->_tpl_vars['LANG']['phrase_admin_only']; ?>
</label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="radio" name="access_type" id="at2" value="public" />
              <label for="at2"><?php echo $this->_tpl_vars['LANG']['word_public']; ?>
 <span class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_all_clients_have_access']; ?>
</span></label>
          </td>
        </tr>
        <tr>
          <td>
            <input type="radio" name="access_type" id="at3" value="private" />
              <label for="at3"><?php echo $this->_tpl_vars['LANG']['word_private']; ?>
 <span class="light_grey"><?php echo $this->_tpl_vars['LANG']['phrase_only_specific_clients_have_access']; ?>
</span></label>
          </td>
        </tr>
        </table>

        <div id="custom_clients" <?php if ($this->_tpl_vars['form_info']['access_type'] != 'private'): ?>style="display:none"<?php endif; ?> class="margin_top">
          <table cellpadding="0" cellspacing="0" class="subpanel">
          <tr>
            <td class="medium_grey"><?php echo $this->_tpl_vars['LANG']['phrase_available_clients']; ?>
</td>
            <td></td>
            <td class="medium_grey"><?php echo $this->_tpl_vars['LANG']['phrase_selected_clients']; ?>
</td>
          </tr>
          <tr>
            <td>
              <?php echo smarty_function_clients_dropdown(array('name_id' => "available_client_ids[]",'multiple' => 'true','multiple_action' => 'hide','clients' => $this->_tpl_vars['selected_client_ids'],'size' => '4','style' => "width: 205px"), $this);?>

            </td>
            <td align="center" valign="middle" width="100">
              <input type="button" value="<?php echo $this->_tpl_vars['LANG']['word_add_uc_rightarrow']; ?>
"
                onclick="ft.move_options(this.form['available_client_ids[]'], this.form['selected_client_ids[]']);" /><br />
              <input type="button" value="<?php echo $this->_tpl_vars['LANG']['word_remove_uc_leftarrow']; ?>
"
                onclick="ft.move_options(this.form['selected_client_ids[]'], this.form['available_client_ids[]']);" />
            </td>
            <td>
              <?php echo smarty_function_clients_dropdown(array('name_id' => "selected_client_ids[]",'multiple' => 'true','multiple_action' => 'show','clients' => $this->_tpl_vars['selected_client_ids'],'size' => '4','style' => "width: 205px"), $this);?>

            </td>
          </tr>
          </table>
        </div>

        <div class="hint">
          <?php echo $this->_tpl_vars['L']['text_add_form_access_hint']; ?>

        </div>

      </td>
    </tr>
    </table>

    <p>
      <input type="submit" name="add_form" class="add_form" value="<?php echo $this->_tpl_vars['LANG']['phrase_add_form']; ?>
" />
    </p>
  </form>

<?php echo smarty_function_ft_include(array('file' => 'footer.tpl'), $this);?>