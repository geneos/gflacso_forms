<?php /* Smarty version 2.6.18, created on 2017-03-02 22:23:47
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/block-continue.tpl */ ?>
<div class="ts_continue_block">
  <input type="submit" name="form_tools_continue" value="Continue" class="btn btn-default"/>
  <?php if (( $this->_tpl_vars['continueDetail'] )): ?>
  This is page <b><?php echo $this->_tpl_vars['current_page']; ?>
</b> of <b><?php echo $this->_tpl_vars['num_pages']; ?>
</b>. You must complete 
  all steps in order for your submission to be processed. Please click continue.
  <?php endif; ?>
</div>

