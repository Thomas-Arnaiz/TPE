<?php
class TalleModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'root', '');
    }

    public function getAllTalles() {
        $query = $this->db->prepare('SELECT * FROM talles');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTallesPorId($id) {
        $query = $this->db->prepare('SELECT * FROM talles WHERE talle_id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getItemsByTalle($id) {
        $query = $this->db->prepare('SELECT * FROM ropa WHERE talle_id = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function eliminarTalle($id) {
        $query = $this->db->prepare('DELETE FROM talles WHERE talle_id = ?');
        $query->execute([$id]);
    }

    public function insertTalle($nombre, $imagen) {
        $query = $this->db->prepare('INSERT INTO talles (nombre_talle, imagen_url) VALUES (?, ?)');
        $query->execute([$nombre, $imagen]);
        return $this->db->lastInsertId();
    }

    public function editTalle($id, $nombre, $imagen) {
        $query = $this->db->prepare('UPDATE talles SET nombre_talle = ?, imagen_url = ? WHERE talle_id = ?');
        return $query->execute([$nombre, $imagen, $id]);
    }
}