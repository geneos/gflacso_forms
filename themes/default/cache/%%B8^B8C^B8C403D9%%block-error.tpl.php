<?php /* Smarty version 2.6.18, created on 2017-05-17 16:06:46
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/block-error.tpl */ ?>
<?php if ($this->_tpl_vars['validation_error']): ?>
  <p class="bg-danger"><?php echo $this->_tpl_vars['validation_error']; ?>
</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['validation_warning']): ?>
  <p class="bg-warning"><?php echo $this->_tpl_vars['validation_warning']; ?>
</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['validation_success']): ?>
  <p class="bg-success"><?php echo $this->_tpl_vars['validation_success']; ?>
</p>
<?php endif; ?>

