<?php

require_once("../service/NoticiasService.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $json = (array) json_decode(file_get_contents("php://input"));
    $_POST = $json;

    if (!isset($_POST["titulo"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'email'"));
        return;
    }

    if (!isset($_POST["descricao"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'senha'"));
        return;
    }

    if (!isset($_POST["texto"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'nome'"));
        return;
    }

    if (!isset($_POST["autor"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'username'"));
        return;
    }

    $novaNoticia = NoticiaService::handleCreateNewUser($_POST);

    if (isset($novaNoticia)) {
        echo json_encode($novaNoticia->toDataContract(), JSON_UNESCAPED_UNICODE);
        return;
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Erro ao criar nova noticia"), JSON_UNESCAPED_UNICODE);
        return;
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    if(!isset($_DELETE["id"])){
        http_response_code(400);
    echo json_encode(array("message" => "Campo faltoso: 'id'"));
    return;
    }

   $result = NoticiaService::deleteNoticia($_DELETE);

   if (isset($result)) {
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    return;
  } else {
    http_response_code(500);
    echo json_encode(array("message" => "Erro ao deletar usuario"), JSON_UNESCAPED_UNICODE);
    return;
  }

}