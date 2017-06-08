<h2>{{$review_page_title}}</h2>

<form action="{{$page_url}}" method="post" enctype="multipart/form-data">
  {{foreach from=$grouped_fields item=curr_group}}
  {{assign var=group value=$curr_group.group}}
  {{assign var=fields value=$curr_group.fields}}

  {{if $fields|@count > 0}}
  <h3>
    <a href="?page={{$group.custom_data}}&published_form_id={{$smarty.get.published_form_id}}&course_id={{$smarty.get.course_id}}#s{{$group.group_id}}">EDIT</a>
    {{$group.group_name}}
  </h3>

  <table class="table_1" cellpadding="1" cellspacing="1" border="0" width="798">
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
  {{/foreach}}

  {{continue_block}}
</form>