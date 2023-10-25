<?php

require_once("../service/UsuarioService.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] === "PUT") {

  $json = (array) json_decode(file_get_contents("php://input"));
  $_PUT = $json;

    if (!isset($_PUT["id"])) {
      http_response_code(400);
      echo json_encode(array("message" => "Campo faltoso: 'id'"));
      return;
    }
  
    if (isset($_PUT["email"])) {
      $_PUT["updateField"] ="email";
    }
  
    else if (isset($_PUT["nome"])) {
      $_PUT["updateField"] ="nome";
    }
  
    else if (isset($_PUT["senha"])) {
      $_PUT["updateField"] ="senha";
    }
    else{
      $_PUT["updateField"] = null;
    }
  
    if($_PUT["updateField"] == null){
      http_response_code(400);
        echo json_encode(array("message" => "Nenhum campo selecionado!"));
        return;
    }

    print_r($_PUT);

    $user = UsuarioService::getById($_PUT["id"]);
  
    if (isset($user)) {
      if ($user->getId() !== $_PUT["id"]) {
        http_response_code(401);
  
        echo json_encode(array("message" => "Proibido atualizar um user terceiro"));
        return;
      }

  
      $updatedUser = UsuarioService::updateUser($_PUT);
  
      if (isset($updatedUser)) {
        echo json_encode($updatedUser, JSON_UNESCAPED_UNICODE);
        return;
      } else {
        http_response_code(500);
        echo json_encode(array("message" => "Erro ao atualizar o user"), JSON_UNESCAPED_UNICODE);
        return;
      }
    } else {
      http_response_code(404);
      echo json_encode(array("message" => "User inexistente"));
      return;
    }
  }