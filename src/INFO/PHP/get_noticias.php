<?php

function obterNoticiasDestaque($conn) {
    $sql = "SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT 5";
    $result = $conn->query($sql);

    $noticias = [];

    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }

    return $noticias;
}
function obterNoticiasPrincipais($conn) {
    $sql = "SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT 3";
    $result = $conn->query($sql);

    $noticias = [];

    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }

    return $noticias;
}
function obterDetalhesNoticia($conn, $id) {
    $sql = "SELECT * FROM noticias WHERE id = $id";
    $result = $conn->query($sql);

    return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
}
?>
