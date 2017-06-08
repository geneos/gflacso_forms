<?php /* Smarty version 2.6.18, created on 2017-01-30 16:36:11
         compiled from /opt/lampp/htdocs/www/formtools/themes/default/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'show_page_load_time', '/opt/lampp/htdocs/www/formtools/themes/default/footer.tpl', 13, false),)), $this); ?>

      </div>
    </td>
  </tr>
  </table>

</div>

<?php if ($this->_tpl_vars['account']['settings']['footer_text'] != "" || $this->_tpl_vars['g_enable_benchmarking']): ?>
  <div class="footer">
    <?php echo $this->_tpl_vars['account']['settings']['footer_text']; ?>

    <?php echo smarty_function_show_page_load_time(array(), $this);?>

  </div>
<?php endif; ?>

</body>
</html>