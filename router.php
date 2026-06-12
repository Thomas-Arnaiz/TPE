<?php

require_once 'app/controllers/ropa.controller.php';
require_once 'app/controllers/user.controller.php';
require_once 'app/controllers/talle.controller.php';

session_start();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$ropaController = new RopaController();
$userController = new UserController();
$tallecontroller = new TalleController();

// Separar acción y parámetros
$params = explode('/', $action);

// --- RUTEO ---
switch ($params[0]) {

    case 'registro_new_user':
        $userController->registrarNuevoUsuario();
        break;
    case 'login-user':
        $userController->login();
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'registro':
        $userController->showRegistro();
        break;
    case 'home':
        $ropaController->home();
        break;
    case 'contacto':
        $ropaController->contacto();
        break;
    case 'delete':
        $ropaController->delete();
        break;
    case 'add-ropa':
        $ropaController->addRopa();
        break;

    case 'view-edit-ropa':
        if ($params[1] === 'edit-ropa') {
            $ropaController->editRopa();
        } else {
            $ropaController->viewEditRopa($params[1]);
        }
        break;

    case 'logout':
        $userController->logout();
        break;

    case 'talles':
        $tallecontroller->showAllTalles();
        break;
    case 'ver-ropa-talle':
        if (isset($params[1])) {
            $tallecontroller->showRopaPorTalle($params[1]);
        } else {
            $tallecontroller->showAllTalles();
        }
        break;

        // --- RUTAS DE ADMINISTRACIÓN (TALLES) ---
    case 'nuevo-talle': 
        $tallecontroller->viewAddTalle();
        break;
    case 'agregar-talle': 
        $tallecontroller->addTalle();
        break;
    case 'view-edit-talle': 
        if (isset($params[1])) {
            $tallecontroller->viewEditTalle($params[1]);
        }
        break;
    case 'update-talle':
        $tallecontroller->updateTalle();
        break;
    case 'eliminar-talle':
        
        $tallecontroller->eliminarTalle($params[1]);
        break;



    default:
        echo "404 Page Not Found";
        break;
}
