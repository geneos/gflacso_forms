<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="ts_content_inner">
          <div id="content">
                 {{error_message}}
                 
                 {{if !$error_on_init}} 
                  <!--h2>{{$page_name}}</h2-->

                  

                  <!-- Adds links to restore/change password and create user -->

                  <form action="{{$page_url}}" method="post" enctype="multipart/form-data"
                    id="ts_form_element_id" name="edit_submission_form" class="bootstrap form-horizontal ">
                    <input type="hidden" id="form_tools_published_form_id" value="{{$published_form_id}}" />
                    
                    <div class="row">
                  {{foreach from=$grouped_fields key=k item=curr_group name=row}}
                    {{assign var=group value=$curr_group.group}}
                    {{assign var=fields value=$curr_group.fields}}

                    <!-- Si es par cierro y abro otro row -->
                    {{if $k%2 == 0}}
                    </div>
                    <div class="row">
                    {{/if}}
                  <!--
                  <a name="s{{$group.group_id}}"></a>
                  
                  -->
                    <fieldset class="{{if $grouped_fields|@count > 1}}col-md-6{{else}}col-md-8 col-md-offset-2{{/if}}""> 
                    {{if $group.group_name}}
                      <legend>{{$group.group_name|upper}}</legend>
                    {{/if}}

                    <!-- Last form page ? then print TyC -->
                    {{if ($num_form_pages - $current_page) == 0}}
                      {{php}}
                        $this->assign('filename',$GLOBALS["filename"]);
                        $this->assign('gg_settings',ft_get_module_settings("", "arbitrary_settings"));
                      {{/php}}
                      {{if $filename == $gg_settings.GGInscriptionForm}}
                          <pre class="tyc">{{$gg_settings.GGTYC}}</pre>
                      {{/if}}
                    {{/if}}

                    {{if $fields|@count > 0}}
                    <!-- WRAPER STARTS HERE -->
                    {{/if}}
                
                    {{foreach from=$fields item=curr_field name=i}}
                      {{assign var=field_id value=$field.field_id}}

                      <div class="form-group {{if $curr_field.is_searchable == 'no'}}readonly{{/if}}">
                        {{if $curr_field.field_type_id == "19" }}
                          <div class="col-sm-12" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>
                            {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types
                            settings=$settings submission_id=$submission_id}}
                          </div>
                        {{else}}
                          <label  class="control-label col-sm-4">
                            {{$curr_field.field_title}}
                            <span class="req">{{if $curr_field.is_required}}*{{/if}}</span>
                          </label>
                          <div class="col-sm-8" {{if $smarty.foreach.i.last}}class="rowN"{{/if}}>
                            {{edit_custom_field form_id=$form_id field_info=$curr_field field_types=$field_types
                            settings=$settings submission_id=$submission_id}}
                          </div>
                        {{/if}}
                      </div>
                    {{/foreach}}

                    </fieldset> 
                  {{/foreach}}
                  </div>
                  <!-- Adds links to restore/change password and create user -->
                  {{if $current_page == 1}}
                    {{php}}
                    $this->assign('filename',$GLOBALS["filename"]);
                    $this->assign('gg_settings',ft_get_module_settings("", "arbitrary_settings"));
                    {{/php}}
                    {{if $filename == $gg_settings.GGInscriptionForm}}
                      <ul class="list-unstyled col-sm-offset-4">
                        <li><a href="{{$g_root_url}}/modules/form_builder/published/{{$gg_settings.GGNewAccountForm}}?published_form_id={{if $smarty.get.published_form_id}}{{$smarty.get.published_form_id}}{{else}}{{$smarty.post.published_form_id}}{{/if}}&course_id={{if $smarty.get.course_id}}{{$smarty.get.course_id}}{{else}}{{$smarty.post.course_id}}{{/if}}">Crear nueva cuenta</a></li>
                        <li><a href="{{$g_root_url}}/modules/form_builder/published/{{$gg_settings.GGResetPasswordForm}}?published_form_id={{if $smarty.get.published_form_id}}{{$smarty.get.published_form_id}}{{else}}{{$smarty.post.published_form_id}}{{/if}}">Recuperar contraseña</a></li>
                        <li><a href="{{$g_root_url}}/modules/form_builder/published/{{$gg_settings.GGChangePasswordForm}}?published_form_id={{if $smarty.get.published_form_id}}{{$smarty.get.published_form_id}}{{else}}{{$smarty.post.published_form_id}}{{/if}}">Cambiar contraseña</a></li>
                      </ul>
                    {{/if}}
                  {{/if}}

                  <div class="" >
                    {{continue_block}}
                  </div>

                </form>
                {{/if}}
          </div>
        </div>
    </div>
</div>
