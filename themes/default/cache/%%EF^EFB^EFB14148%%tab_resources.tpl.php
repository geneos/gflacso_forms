<?php /* Smarty version 2.6.18, created on 2017-01-30 16:44:11
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_resources.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_resources.tpl', 1, false),array('modifier', 'count', '/opt/lampp/htdocs/www/formtools/themes/default/../../modules/form_builder/templates/template_sets/tab_resources.tpl', 10, false),)), $this); ?>
  <div class="subtitle margin_top_large underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['L']['word_resources'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="margin_bottom_large"><?php echo $this->_tpl_vars['L']['text_resources_tab_intro']; ?>
</div>

  <form action="<?php echo $this->_tpl_vars['same_page']; ?>
" method="post">
    <input type="hidden" name="set_id" id="set_id" value="<?php echo $this->_tpl_vars['set_id']; ?>
" />

  <?php if (count($this->_tpl_vars['resources']) == 0): ?>
    <div class="notify yellow_bg" class="margin_bottom_large">
      <div style="padding:8px">
        <?php echo $this->_tpl_vars['L']['notify_no_template_set_resources']; ?>

      </div>
    </div>
  <?php else: ?>
    <div class="sortable resources_list margin_bottom_large" id="<?php echo $this->_tpl_vars['sortable_id']; ?>
">
      <input type="hidden" class="sortable__custom_delete_handler" value="fb_ns.delete_resource" />
      <ul class="header_row">
        <li class="col1"><?php echo $this->_tpl_vars['LANG']['word_order']; ?>
</li>
        <li class="col2"><?php echo $this->_tpl_vars['L']['phrase_resource_name']; ?>
</li>
        <li class="col3"><?php echo $this->_tpl_vars['L']['word_placeholder']; ?>
</li>
        <li class="col4"><?php echo $this->_tpl_vars['L']['phrase_resource_type']; ?>
</li>
        <li class="col5 edit"></li>
        <li class="col6 colN del"></li>
      </ul>
      <div class="clear"></div>
      <ul class="rows">
      <?php $_from = $this->_tpl_vars['resources']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['info']):
        $this->_foreach['row']['iteration']++;
?>
        <?php $this->assign('resource_id', $this->_tpl_vars['info']['resource_id']); ?>
        <li class="sortable_row">
          <div class="row_content">
            <div class="row_group<?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?> rowN<?php endif; ?>">
              <input type="hidden" class="sr_order" value="<?php echo $this->_tpl_vars['info']['resource_id']; ?>
" />
              <ul>
                <li class="col1 sort_col"><?php echo $this->_foreach['row']['iteration']; ?>
</li>
                <li class="col2"><?php echo $this->_tpl_vars['info']['resource_name']; ?>
</li>
                <li class="col3 medium_grey"><?php echo '{{'; ?>
$R.<?php echo $this->_tpl_vars['info']['placeholder']; ?>
<?php echo '}}'; ?>
</li>
                <li class="col4"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['resource_type'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</li>
                <li class="col5 edit"><a href="?page=edit_resource&resource_id=<?php echo $this->_tpl_vars['resource_id']; ?>
"></a></li>
                <li class="col6 colN del"></li>
              </ul>
            </div>
          </div>
          <div class="clear"></div>
        </li>
      <?php endforeach; endif; unset($_from); ?>
      </ul>
    </div>
    <div class="clear"></div>
  <?php endif; ?>

    <div class="margin_top_large">
      <?php if (count($this->_tpl_vars['resources']) > 1): ?>
        <input type="submit" name="update_order" value="<?php echo $this->_tpl_vars['LANG']['phrase_update_order']; ?>
" />
      <?php endif; ?>
      <input type="button" id="add_resource" value="<?php echo $this->_tpl_vars['L']['phrase_add_resource']; ?>
"  />
    </div>
  </form>

  <div id="add_resource_dialog" class="hidden">
    <table width="100%">
    <tr>
      <td class="medium_grey" width="150"><?php echo $this->_tpl_vars['L']['phrase_resource_name']; ?>
</td>
      <td>
        <input type="text" id="resource_name" style="width:100%" />
      </td>
    </tr>
    <tr>
      <td valign="top" class="medium_grey"><?php echo $this->_tpl_vars['L']['phrase_resource_placeholder']; ?>
</td>
      <td>
        <input type="text" id="placeholder" style="width:100%" />
        <div class="hint">
          <?php echo $this->_tpl_vars['L']['phrase_resource_placeholder_desc']; ?>

        </div>
      </td>
    </tr>
    <tr>
      <td class="medium_grey">Resource Type</td>
      <td>
        <input type="radio" name="resource_type" id="rt1" value="css" checked="checked" />
          <label for="rt1">CSS</label>
        <input type="radio" name="resource_type" id="rt2" value="js" />
          <label for="rt2">JavaScript</label>
      </td>
    </tr>
    </table>
  </div>
