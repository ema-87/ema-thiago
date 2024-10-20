<?php

function sessionAuthMiddleware($res) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();  // Solo inicia la sesión si aún no está activa
    }
    if (isset($_SESSION['ID_USER'])) {
        $res->user = new stdClass();
        $res->user->id = $_SESSION['ID_USER'];
        $res->user->email = $_SESSION['EMAIL_USER'];
        return;
    } else {
        header('Location: ' . BASE_URL . 'IniciarSesion');
        die();
    }
}
?>