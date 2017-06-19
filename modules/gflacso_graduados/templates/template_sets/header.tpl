<html>
<head>
  <title>{{$form_name}}</title>
  {{$required_resources}}
  <link rel="stylesheet" type="text/css" href="{{$g_root_url}}/modules/gflacso_graduados/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/css/general.css">
  <link rel="stylesheet" type="text/css" href="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/css/custom_{{$P.customColors|lower}}.css">
  <script type="text/javascript" src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/general.js"></script>
   <script type="text/javascript" src="{{$g_root_url}}/modules/gflacso_graduados/templates/template_sets/js/spin.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
  
  {{$R.styles}}

</head>
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
          <h1>{{$form_name}}</h1>
        </div>
      </div>
 