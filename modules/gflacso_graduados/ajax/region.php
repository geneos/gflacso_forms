<?php
require("../class/simple_restclient.php");


$jsondata = array();

if( isset($_POST['action']) ) {

    if( $_POST['action'] == 'get_paises' ) {

        $uid    = "test_geneos";
        $pwd    = "fl4cs02017";

        $url = "https://sgaws.flacso.org.ar/server.php";
        $clase = "FlacsoWs";

        $client =new simple_restclient($url); 
        $client->SetClass($clase);


        if($client->Service_Exists()){
            $client->SetAuth($uid, $pwd);
            $client->Call->Method('get_paises',null,$return);
            
            $jsondata['message'] = 'Paises obtenidos con exito';
            $jsondata['success'] = true;
            $jsondata['data'] = $return;

        }else{
            $jsondata['success'] = false;
            $jsondata['message'] = 'El servicio no esta diponible en $url.';
        }

    } else 


        if( $_POST['action'] == 'get_provincias' ) {

            $uid    = "test_geneos";
            $pwd    = "fl4cs02017";

            $url = "https://sgaws.flacso.org.ar/server.php";
            $clase = "FlacsoWs";

            $val = array(
                'id_pais'=>$_POST['id_pais']
                );

            $client =new simple_restclient($url); 
            $client->SetClass($clase);


            if($client->Service_Exists()){
                $client->SetAuth($uid, $pwd);
                $client->Call->Method('get_provincias',$val,$return);
                
                $jsondata['message'] = 'Provincias obtenidos con exito';
                $jsondata['success'] = true;
                $jsondata['data'] = $return;

            }else{
                $jsondata['success'] = false;
                $jsondata['message'] = 'El servicio no esta diponible en $url.';
            }

        } else 

            if( $_POST['action'] == 'get_localidades' ) {

                $uid    = "test_geneos";
                $pwd    = "fl4cs02017";

                $url = "https://sgaws.flacso.org.ar/server.php";
                $clase = "FlacsoWs";

                $val = array(
                    'id_provincia'=>$_POST['id_provincia']
                    );

                $client =new simple_restclient($url); 
                $client->SetClass($clase);


                if($client->Service_Exists()){
                    $client->SetAuth($uid, $pwd);
                    $client->Call->Method('get_localidades',$val,$return);
                    
                    $jsondata['message'] = 'Localidades obtenidas con exito';
                    $jsondata['success'] = true;
                    array_unshift($return,array("id_localidad" => 0, "descripcion_localidad" => "-- Seleccionar --")) ;
                    $jsondata['data'] = $return; 

                }else{
                    $jsondata['success'] = false;
                    $jsondata['message'] = 'El servicio no esta diponible en $url.';
                }
            } else {

                $jsondata['success'] = false;
                $jsondata['message'] = 'Hola! El valor recibido no es correcto: '.$_POST['action'].'.';

            }

    //Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();
}
?>


