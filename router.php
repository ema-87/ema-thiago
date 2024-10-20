<?php
require_once 'app/libs/response.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/jugador.controller.php';
require_once 'app/controllers/clubes.controller.php';
require_once 'app/middlewares/session.auth.middleware.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'jugadores';
if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($params[0]){
    case 'jugadores':
        $controller = new jugadorController();
        $controller->showJugadores();
        break;
    case 'clubes':  
        $controller = new clubController();
        $controller->showClubes();
        break;
    case 'agregarJugador':
        sessionAuthMiddleware($res);
        $controller = new jugadorController();
        $controller->addJugador();
        break;
    case 'agregarClub':
        sessionAuthMiddleware($res);
        $controller = new clubController();
        $controller->addClub();
        break;
    case 'vermas':
        $controller = new jugadorController();
        $controller->verMas($params[1]);
        break;
    case 'editarJugador':
        sessionAuthMiddleware($res);
        $controller = new jugadorController();
        $controller->editarJugador($params[1]);
            break;        
    case 'eliminarJugador':
        sessionAuthMiddleware($res);
        $controller = new jugadorController();
        $controller->removeJugador($params[1]);
        break;
    case 'eliminarClub':
        sessionAuthMiddleware($res);
        $controller = new clubController();
        $controller->removeClub($params[1]);
        break;
    case 'editarClub':
        sessionAuthMiddleware($res);
        $controller = new clubController();
        $controller->editarClub($params[1]);
        break;  
    case 'IniciarSesion':
        $controller = new authController();
        $controller->showLogin();
        break; 
    case 'login':
        $controller = new authController();
        $controller->login();
        break; 
    case 'CerrarSesion':
        $controller = new authController();
        $controller->logout();   

        
    default:
        echo "accion no encontrada";
}

?>