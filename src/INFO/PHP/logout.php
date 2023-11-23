<?php
session_start();

// Encerra a sessão (faz logout)
session_destroy();

header('Location: ../login.html'); // Redireciona para a página de login após o logout
exit();
?>