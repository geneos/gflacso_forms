	<div id="footer" class="row">
		{{if $footerContent}}
	    
	      	<div class="col-sm-8 col-sm-offset-2 ts_header">

		        <div class="col-sm-4">
		          {{if $footerLogo }}
		          <img  class="logo" src="{{$P.footer_logo}}" />
		          {{/if}}
		        </div>
		      
		      
		        <div class="col-sm-4">
		          {{if $footerText }}
		          <p>{{$P.footer_texto}}</p>
		          {{/if}}
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
	    {{/if}}
	</div>
</body>
</html>
