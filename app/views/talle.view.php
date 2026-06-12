<?php
class talleview {
    public function showtalles($talles) {
        $count = count($talles);
        require_once 'app/template/talles.phtml';
    }

    
    public function showItemsByTalle($items) {
        require_once 'app/template/items_por_talle.phtml';
    }
    public function renderRopaPorTalle($items) {
       
        require 'app/template/ropaPorTalle.phtml'; 
    }
    public function renderFormEdit($talle) {
    require 'app/template/formEditTalle.phtml';
}
public function renderFormAlta() {
    require 'app/template/formAltaTalle.phtml';
}
}