<?php
require("../class/simple_restclient.php");
require_once('../../../global/library.php');

$settings = ft_get_module_settings("", "arbitrary_settings");

$uid = $settings["WSUser"];
$pwd = $settings["WSPassword"];
$url = $settings["WSFileURL"];
$urlfile = chop($settings["WSFileURL"],'server.php');
$secret = $settings["WSFileSecret"];
$id_usuario = intval($_POST['gg_user_id']);


$clase = "FlacsoWs";
$client =new simple_restclient($url); 
$client->SetClass($clase);
$client->SetAuth($uid, $pwd);

$action = $_GET['action'];
if ($action == 'upload') {


    //Variable con toda la info del archivo para mandar al webservice
    $file = array_pop ( $_FILES );

    $file_path =$file['tmp_name'];
    $file_name = $file['name'];
    $file_content = base64_encode(fread(fopen($file_path, "r"), filesize($file_path)));

    $val = array(
        'id_alumno' => $id_usuario,
        'file_name' => $file_name,
        'file_description' => $_POST["description"],
        'file_content' => $file_content,
    );

    $client =new simple_restclient($url); 
    $client->SetClass($clase);
    $client->SetAuth($uid, $pwd);
    if($client->Service_Exists()){

        $client->Call->Method("file_upload",$val,$return);
        $salida = $return;
        if ($return &&  $return['transaction'] == SUCCESS) {
            $success = true;
            $message = $return['message'];
            $id_archivo = $return["id_archivo"];
            $token = hash_hmac('md5', $id_archivo, $secret);
            $salida =
            ['error' => '',
             'initialPreview' =>[
                $urlfile."get_file.php?id_archivo=$id_archivo&token=$token",],
             'initialPreviewConfig' => [
                    [
                    'caption'=> $file_name, 
                    'key'=> $message["id_archivo"],
                    'width'=> 50,
                ],
            ],
            'initialPreviewThumbTags' => [
                    ['{CUSTOM_TAG_DESCRIPTION}'=> '<textarea disabled="disabled"class="input_description">'.$_POST["description"].'</textarea>'],
                    ],
            ];

        }
        else {
            $salida =
            ['error' => $return['message'],];
        }

    }else{
        $salida =
            ['error' => "El servicio no esta diponible en $url",];
    }


    echo json_encode($salida); 

}
else if ($action == 'delete') {

   $id_archivo = $_POST["key"];

   $val = array(
    'id_archivo'=>intval($id_archivo)
    );


    if($client->Service_Exists()){
        $client->SetAuth($uid, $pwd);
        $client->Call->Method("file_delete",$val,$return);

        if ($return &&  $return['transaction'] == SUCCESS) {
            $ret['error'] = '';
            $ret['message'] = 'Archivo borrado';
            
        }
        else {
          $ret['error'] = $return['message'];
        }
 

    } else {
        $ret['error'] = "El servicio no esta diponible en $url";
    }
    echo json_encode($ret); 
}
else if ($action == 'get-files') {

    $val = array(
    'id_alumno'=>$id_usuario
    );


    if($client->Service_Exists()){
        $client->SetAuth($uid, $pwd);
        $client->Call->Method("get_archivos",$val,$return);
        $ret = [];

        if ($return &&  $return['transaction'] == SUCCESS) {
            $success = true;
            $message = $return['message'];
            foreach ($return['archivos'] as $key => $archivo){
                $ret[$key]['nombre'] = $archivo['nombre_archivo'];
                $ret[$key]['descripcion'] = $archivo['descripcion_archivo'];
                $ret[$key]['id'] = $archivo['id_archivo'];
                $token = hash_hmac('md5', $ret[$key]['id'], $secret);
                $id_archivo = $archivo['id_archivo'];
                $ret[$key]['url'] = $urlfile."get_file.php?id_archivo=$id_archivo&token=$token";
            }
        }
        else {
          $ret =
            ['error' => $return['message'],];
        }
 

    }else{
        $ret['error'] = "El servicio no esta diponible en $url";
    }
    echo json_encode($ret); 
}

?>