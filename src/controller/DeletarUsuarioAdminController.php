<?php

require_once("../service/UsuarioService.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    if(!isset($_DELETE["id"])){
        http_response_code(400);
    echo json_encode(array("message" => "Campo faltoso: 'id'"));
    return;
    }

   $result = UsuarioService::deleteUser($_DELETE);

   if (isset($resultado)) {
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    return;
  } else {
    http_response_code(500);
    echo json_encode(array("message" => "Erro ao deletar usuario"), JSON_UNESCAPED_UNICODE);
    return;
  }

}