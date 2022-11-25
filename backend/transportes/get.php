<?php

require_once '../DB.php';

$env = json_decode(file_get_contents('../../env.json'),true);

$db = new DB('MYSQLi',$env['DB']);
$db->createConnection();

$s = $db->QueryRAW("SELECT * FROM cat_transportes");
if($s){

    $r = $db->getResults();

    print json_encode(['error'=>false, 'data'=>$r]);

}else{
    print json_encode(['error'=> true,'mensaje'=>'Error al obtener datos']);
}