<ul id="css_nav" class="nav_{{$nav_pages|@count}}_pages">
  {{foreach from=$nav_pages item=page_info name=row}}
    {{assign var=i value=$smarty.foreach.row.iteration}}
    {{if $current_page > $i && $current_page != $num_pages}}
      <li><a href="{{$filename}}?page={{$i}}">{{$i}}. {{$page_info.page_name}}</a></li>
    {{elseif $current_page == $i || $current_page == $num_pages}}
      <li class="css_nav_current_page">{{$i}}. {{$page_info.page_name}}</li>
    {{else}}
      <li>{{$i}}. {{$page_info.page_name}}</li>
    {{/if}}
  {{/foreach}}
</ul>
