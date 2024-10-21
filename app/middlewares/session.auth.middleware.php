<?php

function sessionAuthMiddleware($res) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['ID_USER'])) {
        $res->user = new stdClass();
        $res->user->id = $_SESSION['ID_USER'];
        $res->user->email = $_SESSION['USER'];
        return;
    } else {
        header('Location: ' . BASE_URL . 'IniciarSesion');
        die();
    }
}
?>