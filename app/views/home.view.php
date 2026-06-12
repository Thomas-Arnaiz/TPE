<?php
class HomeView
{

    public function homeView()
    {
        require_once 'app/template/header.phtml';
        require_once 'app/template/home.phtml';
     
        require_once 'app/template/footer.phtml';
    }

   public function renderContacto()
{
    require_once 'app/template/header.phtml';
    require_once 'app/template/contacto.phtml';
    require_once 'app/template/footer.phtml';
}
    public function renderCatalogo($ropas, $talles)
    {
        require_once 'app/template/header.phtml';
        require_once 'app/template/ropa.phtml';
        require_once 'app/template/talles.phtml';
        require_once 'app/template/footer.phtml';
    }

    public function showError($message)
    {
        require_once 'app/template/header.phtml';
        echo "<div class='error'>$message</div>";
        require_once 'app/template/footer.phtml';
    }

    public function renderEditRopa($ropa, $talles)
    {
        require_once 'app/template/header.phtml';
        require_once 'app/template/edit-page.phtml';
        require_once 'app/template/footer.phtml';
    }
}
