<!doctype html>
<html >
<head>
  <title>{{$form_name}}</title>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  {{$required_resources}}
  <link rel="stylesheet" type="text/css" href="{{$g_root_url}}/modules/gflacso_graduados/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/css/general.css">
  <link rel="stylesheet" type="text/css" href="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/css/custom_{{$P.customColors|lower}}.css">
  <script type="text/javascript" src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/general.js"></script>
   <script type="text/javascript" src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/spin.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
  
<!-- File upload -->
<link href="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


<!-- piexif.min.js is only needed if you wish to resize images before upload to restore exif data.
     This must be loaded before fileinput.min.js -->
<script src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/fileinput.min.js"></script>
<!-- bootstrap.js below is needed if you wish to zoom and view file content 
     in a larger detailed modal dialog -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<!-- optionally if you need a theme like font awesome theme you can include 
    it as mentioned below -->
<!--script src="path/to/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include 
    locale file as mentioned below -->
<script src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/locales/es.js"></script>

  {{$R.styles}}
<script>
jQuery.fn.extend({
    live: function (event, callback) {
       if (this.selector) {
            jQuery(document).on(event, this.selector, callback);
        }
    }
});

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();

</script>
</head>
<body>
    <div id="loading"></div>
    <div class="container-fluid">
      {{if $headerContent}}
      <div id="header" class="row">
        <div class="col-sm-8 col-sm-offset-2 ts_header">

            {{if $headerLogo }}
              {{assign var=temp_logo value=$P.imagen_header|lower|replace:" ":"_"}}

              <div class="col-sm-6">
                <img  class="logo" src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/images/{{$temp_logo}}.png" />
              </div>
            {{/if}}
            {{if $headerText }}
              <div class="col-sm-6">
                <h2>{{$P.header_texto}}</h2>
              </div>
            {{/if}}
          </div>
      </div>
      {{/if}}

      <div class="row form-title">
        <div class="col-sm-8 col-sm-offset-2">
          <h1>{{$form_name}} {{$smarty.session.coursename}} </h1>
        </div>
      </div>
 