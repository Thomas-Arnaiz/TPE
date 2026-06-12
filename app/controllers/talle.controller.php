<?php

require_once __DIR__ . '/../models/talle.model.php';
require_once __DIR__ . '/../views/talle.view.php';
require_once __DIR__ . '/../helpers/auth.helper.php';

class TalleController
{
    private $tallemodel;
    private $talleview;

    public function __construct()
    {
        $this->tallemodel = new TalleModel();
        $this->talleview = new TalleView();
    }

    public function showAllTalles()
    {
        $talles = $this->tallemodel->getAllTalles();
        $this->talleview->showtalles($talles);
    }

    public function showRopaPorTalle($id = null)
    {
        if (!$id) {

            header("Location: " . BASE_URL . "talles");
            return;
        }

        $items = $this->tallemodel->getItemsByTalle($id);

        $this->talleview->renderRopaPorTalle($items);
    }

    public function viewEditTalle($id)
    {


        $talle = $this->tallemodel->getTallesPorId($id);

        $this->talleview->renderFormEdit($talle);
    }

    public function updateTalle()
    {


        $id = $_POST['talle_id'];
        $nombre = $_POST['nombre_talle'];
        $imagen = $_POST['imagen_url'];

        if (!empty($nombre)) {

            $this->tallemodel->editTalle($id, $nombre, $imagen);
            header("Location: " . BASE_URL . "home");
            exit();
        }
    }

    public function viewAddTalle()
    {


        $this->talleview->renderFormAlta();
    }

    public function addTalle()
    {


        if (!empty($_POST['nombre_talle'])) {

            $nombre = $_POST['nombre_talle'];
            $imagen = $_POST['imagen_url'];

            $this->tallemodel->insertTalle($nombre, $imagen);

            header("Location: " . BASE_URL . "home");
            exit();
        } else {

            echo "Error: El nombre es obligatorio";
        }
    }

    public function eliminarTalle($id)
    {


        $this->tallemodel->eliminarTalle($id);

        header("Location: " . BASE_URL . "home");
        exit();
    }
}
