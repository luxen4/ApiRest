<?php
require_once('Database.class.php');


class Client{
    public static function create_client($email, $name, $city, $telefone){
        $database = new Database();
        $conn = $database->getConnection();

        $stmt  = $conn->prepare('INSERT INTO listado_clientes (email, name, city, telephone)
        VALUES (:email, :name, :city, :telephone)');

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':telephone', $telefone);
    
        if($stmt->execute()){
            header('HTTP/1.1 201 CLIENTE CREADO CORRECTAMENTE');
        }else{
            header('HTTP/1.1 404 CLIENTE NO SE HA CREADO CORRECTAMENTE');

        }
    }


// Función que elimina un cliente
    public static function delete_client($id){
        $database = new Database();
        $conn = $database->getConnection();

        $stmt  = $conn->prepare('DELETE FROM listado_clientes WHERE id=:id');
        $stmt->bindParam(':id', $id);
    
        if($stmt->execute()){
            header('HTTP/1.1 201 CLIENTE BORRADO CORRECTAMENTE');
        }else{
            header('HTTP/1.1 404 CLIENTE NO SE HA BORRADO CORRECTAMENTE');

        }
    }



// Función que devuelve todos los clientes
    public static function get_all_clients(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt  = $conn->prepare('SELECT * FROM listado_clientes;');
    
        if($stmt->execute()){
            $result = $stmt->fetchAll();
            echo json_encode($result);
            header('HTTP/1.1 201 CLIENTES');
        }else{
            header('HTTP/1.1 404 CLIENTE *ERROR ');

        }
    }
}