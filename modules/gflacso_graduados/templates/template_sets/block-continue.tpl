<div class="ts_continue_block">
  {{if $current_page > 2 && $current_page != $num_pages && $back_page != "" }}
  	<a href="{{$back_page}}" name="form_tools_back" class="btn btn-default">Atras</a>
  {{/if}}
  <input type="submit" name="form_tools_continue" value="Continuar" class="btn btn-default"/>
  {{if ($continueDetail) }}
  This is page <b>{{$current_page}}</b> of <b>{{$num_pages}}</b>. You must complete 
  all steps in order for your submission to be processed. Please click continue.
  {{/if}}
</div>


