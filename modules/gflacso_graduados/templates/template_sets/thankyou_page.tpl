


<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="ts_content_inner">
          <div id="content">
            <div class="row">
              <div class="col-sm-12">
              {{$thankyou_page_content}}
              </div>
            </div>

            {{php}}
              $this->assign('filename',$GLOBALS["filename"]);
              $this->assign('gg_settings',ft_get_module_settings("", "arbitrary_settings"));
            {{/php}}

            <!-- Crear cuenta -->
            {{if $filename == $gg_settings.GGNewAccountForm}}
            <div class="row">
              <div class="col-sm-12">
              Para continuar con la inscripción por favor diríjase al siguiente link: <a href="{{$g_root_url}}/modules/form_builder/published/{{$gg_settings.GGInscriptionForm}}?published_form_id={{$smarty.get.published_form_id}}&course_id={{$smarty.get.course_id}}">Login</a>
              </div>
            </div>
            {{/if}}

            <!-- Inscripcion -->
            {{if $filename == 'inscripcion.php'}}
            <div class="row">
              <div class="col-sm-12">
              Para continuar con la inscripción por favor diríjase al siguiente link: <a href="{{$url_salida}}">Siguiente</a>
              </div>
            </div>
              <!--div class="row">
              <div class="col-sm-12">
              <a href="javascript:imprSelec()" >Imprimir</a>
              <form id="comprobante" action="{{$page_url}}" method="post" enctype="multipart/form-data">
                {{foreach from=$grouped_fields item=curr_group}}
                {{assign var=group value=$curr_group.group}}
                {{assign var=fields value=$curr_group.fields}}
                {{if $group.custom_data != 1 and $group.custom_data != ($num_form_pages) }}
                {{if $fields|@count > 0}}

                <h3>
                  {{$group.group_name}}
                </h3>


                <table class="table_1" style="margin:0 auto" cellpadding="1" cellspacing="1" border="0" width="798">
                  {{/if}}

                  {{foreach from=$fields item=curr_field}}
                  {{assign var=field_id value=$field.field_id}}
                  <tr>
                    <td width="200" class="pad_left_small" valign="top">{{$curr_field.field_title}}</td>
                    <td class="answer" valign="top">
                      <div class="pad_left">
                        {{edit_custom_field form_id=$form_id submission_id=$submission_id
                        field_info=$curr_field field_types=$field_types settings=$settings}}
                      </div>
                    </td>
                  </tr>
                  {{/foreach}}

                  {{if $fields|@count > 0}}
                </table>
                {{/if}}

                {{/if}}
                {{/foreach}}


              </form>
              </div>
              </div -->
            {{/if}}
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function imprSelec(){
    var muestra = "comprobante";
    var ficha=document.getElementById(muestra);
    var ventimp=window.open(' ','');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
  }
</script>
