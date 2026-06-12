<?php
class UserView
{
    public function renderRegistro()
    {
        require_once 'app/template/header.phtml';
        require_once 'app/template/registro.phtml';
        require_once 'app/template/footer.phtml';
    }

    public function renderLogin()
    {
        require_once 'app/template/header.phtml';
        require_once 'app/template/login.phtml';
        require_once 'app/template/footer.phtml';
    }
}
