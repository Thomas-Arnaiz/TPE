<?php

require_once 'app/models/user.model.php';
require_once 'app/views/user.view.php';
require_once 'app/helpers/auth.helper.php';
class UserController
{

    private $user_model, $view;
    public function __construct()
    {
        $this->view = new UserView();
        $this->user_model = new UserModel();
    }

    public function registrarNuevoUsuario()
    {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                $this->view->showError("Las contraseñas no coinciden.");
                return;
            }

            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $registroExitoso = $this->user_model->registrarUsuario($username, $passwordHash);
            if ($registroExitoso) {
                header("Location: " . BASE_URL . "login");
            } else {
                $this->view->showError("Error al registrar el usuario.");
            }
        }
    }

    public function login()
    {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->user_model->obtenerUsuario($username);
            if ($user && password_verify($password, $user->password)) {
                AuthHelper::signIn($user);
                header("Location: " . BASE_URL . "home");
            } else {
                $this->view->showError("Credenciales inválidas.");
            }
        }
    }

    

    public function showRegistro()
    {
        $this->view->renderRegistro();
    }

    public function showLogin()
    {
        $this->view->renderLogin();

    }
    

    public function logout()
{
    AuthHelper::signOut();

    header("Location: " . BASE_URL . "home");
    exit();
}

}
