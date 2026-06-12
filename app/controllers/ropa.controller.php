<?php
require_once 'app/views/home.view.php';
require_once 'app/models/ropa.model.php';
require_once 'app/models/talle.model.php';

class RopaController
{
    private $ropa_model, $talle_model, $view;

    public function __construct()
    {
        $this->view = new HomeView();
        $this->ropa_model = new RopaModel();
        $this->talle_model = new TalleModel();
    }

    public function home()
    {
        $ropas = $this->ropa_model->getAllRopaConTalles();
        $talles = $this->talle_model->getAllTalles();
        $this->view->renderCatalogo($ropas, $talles);
    }

    public function delete()
    {
        if ($_POST) {
            $ropaAEliminar = $_POST['ropa_id'];
        }

        if ($this->ropa_model->deleteRopa($ropaAEliminar)) {
            header("Location: " . BASE_URL);
        } else {
            $this->view->showError("No se pudo eliminar la ropa con ID $ropaAEliminar.");
        }
    }

    public function addRopa()
    {
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $talle_id = $_POST['select-talle'];

            $idNuevaRopa = $this->ropa_model->addRopa($nombre, $precio, $talle_id);
            if ($idNuevaRopa !== null) {
                header("Location: " . BASE_URL);
            } else {
                $this->view->showError("Error al agregar la ropa.");
            }
        }
    }

    public function viewEditRopa($ropa_id)
    {
        $ropa = $this->ropa_model->getRopa($ropa_id);
        $talles = $this->talle_model->getAllTalles();
        $this->view->renderEditRopa($ropa, $talles);
    }

    public function editRopa()
    {
        if ($_POST) {
            $id = $_POST['ropa_id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $talle_id = $_POST['select-talle'];
        }

        $this->ropa_model->editRopa($id, $nombre, $precio, $talle_id);
        header("Location: " . BASE_URL);
    }

    public function contacto()
{
    $this->view->renderContacto();
}
}
