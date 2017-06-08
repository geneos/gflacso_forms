<?php /* Smarty version 2.6.18, created on 2017-01-30 20:58:45
         compiled from /opt/lampp/htdocs/www/formtools/modules/hooks_manager/templates/add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <table cellpadding="0" cellspacing="0">
  <tr>
    <td width="45"><a href="index.php"><img src="images/icon.gif" border="0" width="34" height="34" /></a></td>
    <td class="title"><a href="index.php">
      <a href="../../admin/modules"><?php echo $this->_tpl_vars['LANG']['word_modules']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <a href="index.php"><?php echo $this->_tpl_vars['L']['module_name']; ?>
</a>
      <span class="joiner">&raquo;</span>
      <?php echo $this->_tpl_vars['L']['phrase_add_rule']; ?>

    </td>
  </tr>
  </table>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'messages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <form action="edit.php" method="post" onsubmit="return rsv.validate(this, rules)">

    <table cellspacing="1" cellpadding="1" border="0" width="100%">
    <tr>
      <td width="120"><?php echo $this->_tpl_vars['LANG']['word_status']; ?>
</td>
      <td>
        <input type="radio" name="status" value="enabled" id="status1" checked />
          <label for="status1" class="green"><?php echo $this->_tpl_vars['LANG']['word_enabled']; ?>
</label>
        <input type="radio" name="status" value="disabled" id="status2" />
          <label for="status2" class="red"><?php echo $this->_tpl_vars['LANG']['word_disabled']; ?>
</label>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_rule_name']; ?>
</td>
      <td><input type="text" name="rule_name" value="" style="width:100%" maxlength="255" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['word_priority']; ?>
</td>
      <td>
        <select name="priority">
          <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=100) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
            <option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_sections['foo']['index'] == 50): ?>selected<?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option>
          <?php endfor; endif; ?>
        </select>
        <span class="medium_grey"><?php echo $this->_tpl_vars['L']['text_priority_desc']; ?>
</span>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['L']['phrase_hook_type']; ?>
</td>
      <td>
        <input type="radio" name="hook_type" value="code" id="ht1" checked onclick="hm.select_hook_type('code')" />
          <label for="ht1"><?php echo $this->_tpl_vars['L']['phrase_code_hook']; ?>
</label>
        <input type="radio" name="hook_type" value="template" id="ht2" onclick="hm.select_hook_type('template')" />
          <label for="ht2"><?php echo $this->_tpl_vars['L']['phrase_template_hook']; ?>
</label>
        <input type="radio" name="hook_type" value="custom" id="ht3" onclick="hm.select_hook_type('custom')" />
          <label for="ht3"><?php echo $this->_tpl_vars['L']['phrase_custom_hook']; ?>
</label>
      </td>
    </tr>
    </table>

    <div class="grey_box margin_top" id="code_hook_fields">
      <table cellspacing="1" cellpadding="1" border="0" width="100%">
      <tr>
        <td width="120" valign="top"><?php echo $this->_tpl_vars['L']['phrase_code_hook']; ?>
</td>
        <td>
          <select name="code_hook_dropdown" onchange="hm.select_hook(this.value)" onkeyup="hm.select_hook(this.value)">
            <option value=""><?php echo $this->_tpl_vars['LANG']['phrase_please_select']; ?>
</option>
            <?php $_from = $this->_tpl_vars['code_hooks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['hook']):
        $this->_foreach['row']['iteration']++;
?>
              <option value="<?php echo $this->_tpl_vars['hook']['function_name']; ?>
,<?php echo $this->_tpl_vars['hook']['action_location']; ?>
"><?php echo $this->_tpl_vars['hook']['function_name']; ?>
, <?php echo $this->_tpl_vars['hook']['action_location']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </select>
        </td>
      </tr>
      <tr>
        <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_php_code']; ?>
</td>
        <td>
          <div style="border: 1px solid #666666; background: #ffffff; padding: 3px">
            <textarea name="code_hook_code" id="code_hook_code" style="width:100%; height:240px"></textarea>
          </div>
          <script>
          var html_editor = new CodeMirror.fromTextArea("code_hook_code", <?php echo '{'; ?>

          parserfile: ["parsejavascript.js", "tokenizejavascript.js"],
          path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
          stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css"
          <?php echo '});'; ?>

          </script>
          <table cellspacing="1" cellpadding="0" width="100%" class="hook_param_table">
          <tr>
            <th width="50%"><?php echo $this->_tpl_vars['L']['phrase_available_variables']; ?>
</th>
            <th width="50%"><?php echo $this->_tpl_vars['L']['phrase_overridable_variables']; ?>
</th>
          </tr>
          <tr>
            <td valign="top">
              <div id="code_hook_params">&#8212;</div>
            </td>
            <td valign="top">
              <div id="code_hook_overridable_values">&#8212;</div>
            </td>
          </tr>
          </table>

        </td>
      </tr>
      </table>

      <p>
        <input type="submit" name="add_rule" value="<?php echo $this->_tpl_vars['L']['phrase_add_rule']; ?>
" />
      </p>
    </div>

    <div id="template_hook_fields" style="display:none">
      <div class="grey_box margin_top">
        <table cellspacing="1" cellpadding="1" border="0" width="100%">
        <tr>
          <td width="120" valign="top"><?php echo $this->_tpl_vars['L']['phrase_template_hook']; ?>
</td>
          <td>
            <select name="template_hook_dropdown">
              <option value=""><?php echo $this->_tpl_vars['LANG']['phrase_please_select']; ?>
</option>
              <?php $_from = $this->_tpl_vars['template_hooks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['hook']):
        $this->_foreach['row']['iteration']++;
?>
                <option value="<?php echo $this->_tpl_vars['hook']['action_location']; ?>
"><?php echo $this->_tpl_vars['hook']['filepath']; ?>
 - <?php echo $this->_tpl_vars['hook']['action_location']; ?>
</option>
              <?php endforeach; endif; unset($_from); ?>
            </select>
          </td>
        </tr>
        <tr>
          <td><?php echo $this->_tpl_vars['L']['phrase_content_type']; ?>
</td>
          <td>
            <input type="radio" name="template_hook_code_type" value="html" id="thct1" />
              <label for="thct1"><?php echo $this->_tpl_vars['LANG']['word_html']; ?>
</label>
            <input type="radio" name="template_hook_code_type" value="php" id="thct2" />
              <label for="thct2"><?php echo $this->_tpl_vars['L']['word_php']; ?>
</label>
            <input type="radio" name="template_hook_code_type" value="smarty" id="thct3" />
              <label for="thct3"><?php echo $this->_tpl_vars['L']['word_smarty']; ?>
</label>
          </td>
        </tr>
        <tr>
          <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_php_code']; ?>
</td>
          <td>
            <div style="border: 1px solid #666666; background: #ffffff; padding: 3px">
              <textarea name="template_hook_code" id="template_hook_code" style="width:100%; height:240px"></textarea>
            </div>
            <script>
            var html_editor = new CodeMirror.fromTextArea("template_hook_code", <?php echo '{'; ?>

            parserfile: ["parsejavascript.js", "tokenizejavascript.js"],
            path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
            stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css"
            <?php echo '});'; ?>

            </script>
          </td>
        </tr>
        </table>
      </div>

      <p>
        <input type="submit" name="add_rule" value="<?php echo $this->_tpl_vars['L']['phrase_add_rule']; ?>
" />
      </p>

    </div>

    <div id="custom_hook_fields" style="display:none">
      <div class="grey_box margin_top">
        <table cellspacing="1" cellpadding="1" border="0" width="100%">
        <tr>
          <td width="120" valign="top"><?php echo $this->_tpl_vars['L']['phrase_custom_hook']; ?>
</td>
          <td>
            <input type="text" name="custom_hook" id="custom_hook" onkeyup="hm.generate_custom_hook()" style="width: 240px" />
            <span class="medium_grey"><?php echo $this->_tpl_vars['L']['text_custom_hook_desc']; ?>
</span>
          </td>
        </tr>
        <tr>
          <td><?php echo $this->_tpl_vars['L']['phrase_smarty_code']; ?>
</td>
          <td>
            <div id="custom_hook_smarty_code"></div>
          </td>
        </tr>
        <tr>
          <td><?php echo $this->_tpl_vars['L']['phrase_content_type']; ?>
</td>
          <td>
            <input type="radio" name="custom_hook_code_type" value="html" id="chct1" />
              <label for="chct1"><?php echo $this->_tpl_vars['LANG']['word_html']; ?>
</label>
            <input type="radio" name="custom_hook_code_type" value="php" id="chct2" />
              <label for="chct2"><?php echo $this->_tpl_vars['L']['word_php']; ?>
</label>
            <input type="radio" name="custom_hook_code_type" value="smarty" id="chct3" />
              <label for="chct3"><?php echo $this->_tpl_vars['L']['word_smarty']; ?>
</label>
          </td>
        </tr>
        <tr>
          <td valign="top"><?php echo $this->_tpl_vars['L']['phrase_php_code']; ?>
</td>
          <td>
            <div style="border: 1px solid #666666; background: #ffffff; padding: 3px">
              <textarea name="custom_hook_code" id="custom_hook_code" style="width:100%; height:240px"></textarea>
            </div>
            <script type="text/javascript">
            var html_editor = new CodeMirror.fromTextArea("custom_hook_code", <?php echo '{'; ?>

            parserfile: ["parsejavascript.js", "tokenizejavascript.js"],
            path: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/js/",
            stylesheet: "<?php echo $this->_tpl_vars['g_root_url']; ?>
/global/codemirror/css/jscolors.css"
            <?php echo '});'; ?>

            </script>
          </td>
        </tr>
        </table>

      </div>
      <p>
        <input type="submit" name="add_rule" value="<?php echo $this->_tpl_vars['L']['phrase_add_rule']; ?>
" />
      </p>
    </div>

  </form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>