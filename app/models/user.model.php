<?php
class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'root', '');
    }

    public function registrarUsuario($username, $passwordHash)
    {
        $query = $this->db->prepare('INSERT INTO usuarios (username, password) VALUES (?, ?)');
        $query->execute([$username, $passwordHash]);
        return $this->db->lastInsertId();
    }

    public function obtenerUsuario($username)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
