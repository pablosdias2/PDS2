<?php

require_once("../service/UsuarioService.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $json = (array) json_decode(file_get_contents("php://input"));
    $_POST = $json;

    print_r($_POST);
    if (!isset($_POST["email"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'email'"));
        return;
    }

    if (!isset($_POST["senha"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'senha'"));
        return;
    }

    if (!isset($_POST["nome"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'nome'"));
        return;
    }

    if (!isset($_POST["username"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'username'"));
        return;
    }

    $userAlreadyExists = UsuarioService::getByEmail($_POST["email"]);

    if (isset($userAlreadyExists)) {
        http_response_code(400);

        echo json_encode(array("message" => "E-mail utilizado por outro user"));
        return;
    }
 
    $newUser = UsuarioService::handleCreateNewUser($_POST);

    if (isset($newUser)) {
        echo json_encode($newUser->toDataContract(), JSON_UNESCAPED_UNICODE);
        return;
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Erro ao criar novo user"), JSON_UNESCAPED_UNICODE);
        return;
    }
}
