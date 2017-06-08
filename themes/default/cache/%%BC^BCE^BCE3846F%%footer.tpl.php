<?php /* Smarty version 2.6.18, created on 2017-05-09 16:01:46
         compiled from /opt/lampp/htdocs/www/formtools/modules/gflacso_graduados/templates/template_sets/footer.tpl */ ?>
	<div id="footer" class="row">
		<?php if ($this->_tpl_vars['footerContent']): ?>
	    
	      	<div class="col-sm-8 col-sm-offset-2 ts_header">

		        <div class="col-sm-4">
		          <?php if ($this->_tpl_vars['footerLogo']): ?>
		          <img  class="logo" src="<?php echo $this->_tpl_vars['P']['footer_logo']; ?>
" />
		          <?php endif; ?>
		        </div>
		      
		      
		        <div class="col-sm-4">
		          <?php if ($this->_tpl_vars['footerText']): ?>
		          <p><?php echo $this->_tpl_vars['P']['footer_texto']; ?>
</p>
		          <?php endif; ?>
		        </div>

		        <div class="col-sm-4">
		        	<ul class="list-unstyled">
			         	<li>Tucumán 1966 (C1050AAN)</li>
						<li>Ciudad Autónoma de Buenos Aires, Argentina.</li>
						<li>+ 54 11 5238 9300</li>
						<li><a href="http://flacso.org.ar">http://flacso.org.ar</li>
					</ul>
		        </div>

	    	</div>
	    <?php endif; ?>
	</div>
</body>
</html>