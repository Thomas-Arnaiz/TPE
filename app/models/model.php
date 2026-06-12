<?php
require_once 'config.php';

class Model {
    protected $db;

    public function __construct() {
        // Conectamos al servidor SIN elegir la base de datos todavía
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        
        // Creamos la base si no existe y le decimos a PDO que la empiece a usar
        $this->db->query("CREATE DATABASE IF NOT EXISTS " . MYSQL_DB);
        $this->db->query("USE " . MYSQL_DB);
        
        // Ejecutamos la función enseñada en las diapositivas
        $this->_deploy();
    }

    private function _deploy() {
        // Lógica de la cátedra: vemos si hay tablas. Si está vacío (count == 0), las creamos.
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        
        if (count($tables) == 0) {
            $sql =<<<END
            CREATE TABLE `talles` (
              `talle_id` int(11) NOT NULL AUTO_INCREMENT,
              `nombre_talle` varchar(3) NOT NULL,
              `imagen_url` text NOT NULL,
              PRIMARY KEY (`talle_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            CREATE TABLE `ropa` (
              `ropa_id` int(11) NOT NULL AUTO_INCREMENT,
              `nombre` varchar(64) NOT NULL,
              `precio` int(11) NOT NULL,
              `talle_id` int(11) NOT NULL,
              PRIMARY KEY (`ropa_id`),
              CONSTRAINT `ropa_ibfk_1` FOREIGN KEY (`talle_id`) REFERENCES `talles` (`talle_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            CREATE TABLE `usuarios` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(50) NOT NULL,
              `password` varchar(255) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            INSERT INTO `usuarios` (`username`, `password`) VALUES
            ('webadmin', '\$2y\$10\$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm');
END;
            $this->db->query($sql);
        }
    }
}