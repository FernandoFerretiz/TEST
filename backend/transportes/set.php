<?php

require_once '../DB.php';

$env = json_decode(file_get_contents('../../env.json'),true);

$db = new DB('MYSQLi',$env['DB']);
$db->createConnection();

$id = intval($_POST['id']);

$s = $db->QueryRAW("SELECT * FROM cat_transportes WHERE id = '$id'");
if($s){

    $r = $db->getResults();

    $sAlias     = $_POST['sAlias'];
    $sMarca     = $_POST['sMarca'];
    $nModelo    = $_POST['nModelo'];
    $sPlacas    = $_POST['sPlacas'];

    if(count($r)){
        
        $sql = "UPDATE cat_transportes
                   SET  sAlias  = '$sAlias',
                        sMarca  = '$sMarca',
                        nModelo = '$nModelo',
                        sPlacas = '$sPlacas'
                 WHERE id = '$id'
                   ";
    }else{
        $sql = "INSERT INTO cat_transportes
                   SET  sAlias  = '$sAlias',
                        sMarca  = '$sMarca',
                        nModelo = '$nModelo',
                        sPlacas = '$sPlacas'
                   ";
    }

    $s = $db->QueryRAW($sql);

    print json_encode(['error'=>false, 'data'=>$id == 0 ? $db->getId() : $id]);

}else{
    print json_encode(['error'=> true,'mensaje'=>'Error al obtener datos']);
}