<?php
class RopaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'root', '');
    }

    public function getAllRopa()
    {
        $query = $this->db->prepare('SELECT * FROM ropa');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllRopaConTalles()
    {
        $query = $this->db->prepare('SELECT * FROM ropa JOIN talles ON ropa.talle_id = talles.talle_id');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRopa($id)
    {
        $query = $this->db->prepare('SELECT * FROM ropa WHERE ropa_id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function deleteRopa($id)
    {
        $query = $this->db->prepare('DELETE FROM ropa WHERE ropa_id = ?');
        $query->execute([$id]);

        if ($this->getRopa($id)) {
            return false; // No se pudo eliminar
        } else {
            return true; // Eliminación exitosa
        }
    }

    public function addRopa($nombre, $precio, $talle_id)
    {
        $query = $this->db->prepare('INSERT INTO ropa (nombre, precio, talle_id) VALUES (?, ?, ?)');
        $query->execute([$nombre, $precio, $talle_id]);
        return $this->db->lastInsertId();
    }

    public function editRopa($id, $nombre, $precio, $talle_id)
    {
        $query = $this->db->prepare('UPDATE ropa SET nombre = ?, precio = ?, talle_id = ? WHERE ropa_id = ?');
        $query->execute([$nombre, $precio, $talle_id, $id]);
    }
    
}
