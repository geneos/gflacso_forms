<?php /* Smarty version 2.6.18, created on 2017-01-31 14:58:30
         compiled from ../../modules/custom_fields/templates/available_variables.tpl */ ?>
          <table cellspacing="1" cellpadding="0" width="100%" class="var_list_table">
          <tr>
            <th width="50%"><?php echo $this->_tpl_vars['L']['phrase_core_variables']; ?>
</th>
            <th width="50%"><?php echo $this->_tpl_vars['L']['phrase_custom_field_setting_variables']; ?>
</th>
          </tr>
          <tr>
            <td valign="top">
              <table>
              <tr>
                <td width="120" class="blue">$FORM_ID</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_current_form_id']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$SUBMISSION_ID</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_current_submission_id']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$FIELD_ID</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_current_field_id']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$NAME</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_form_field_name']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$COLNAME</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_db_column_name']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$VALUE</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_value_stored_in_field']; ?>
</td>
              </tr>
                            <?php if ($this->_tpl_vars['context'] == 'view'): ?>
              <tr>
                <td class="blue">$CONTEXTPAGE</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_context_desc']; ?>
</td>
              </tr>
              <?php endif; ?>
              <tr>
                <td class="blue">$ACCOUNT_INFO</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_account_info_desc']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$g_root_dir</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_from_config_file']; ?>
</td>
              </tr>
              <tr>
                <td class="blue">$g_root_url</td>
                <td><?php echo $this->_tpl_vars['L']['phrase_from_config_file']; ?>
</td>
              </tr>
              </table>
            </td>
            <td valign="top">
              <table>
              <?php $_from = $this->_tpl_vars['field_type_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['setting']):
?>
              <tr>
                <td class="blue">$<?php echo $this->_tpl_vars['setting']['field_setting_identifier']; ?>
</td>
                <td></td>
              </tr>
              <?php endforeach; endif; unset($_from); ?>
              </table>
            </td>
          </tr>
          </tbody></table>