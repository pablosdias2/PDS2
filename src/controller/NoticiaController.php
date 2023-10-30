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
        echo json_encode(array("message" => "Campo faltoso: 'titulo'"));
        return;
    }

    if (!isset($_POST["descricao"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'descricao'"));
        return;
    }

    if (!isset($_POST["texto"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'texto'"));
        return;
    }

    if (!isset($_POST["autor"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'autor'"));
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

if ($_SERVER["REQUEST_METHOD"] === "PUT") {

    $json = (array) json_decode(file_get_contents("php://input"));
    $_PUT = $json;

    if (!isset($_PUT["id"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'id'"));
        return;
    }

    if (!isset($_PUT["titulo"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'titulo'"));
        return;
    }

    if (!isset($_PUT["descricao"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'descricao'"));
        return;
    }

    if (!isset($_PUT["texto"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'texto'"));
        return;
    }

    if (!isset($_PUT["autor"])) {
        http_response_code(400);
        echo json_encode(array("message" => "Campo faltoso: 'autor'"));
        return;
    }

    $noticia = NoticiaService::getById($_PUT["id"]);

    if (isset($noticia)) {
        if ($noticia->getId() !== $_PUT["id"]) {
            http_response_code(401);

            echo json_encode(array("message" => "Proibido atualizar uma noticia terceira"));
            return;
        }

        $updatedNoticia = NoticiaService::updateNoticia($_PUT);

        if (isset($updatedNoticia)) {
            echo json_encode($updatedNoticia, JSON_UNESCAPED_UNICODE);
            return;
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Erro ao atualizar a noticia"), JSON_UNESCAPED_UNICODE);
            return;
        }
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Noticia inexistente"));
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    if (!isset($_DELETE["id"])) {
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
        echo json_encode(array("message" => "Erro ao deletar noticia"), JSON_UNESCAPED_UNICODE);
        return;
    }
}
