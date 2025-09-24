<?php


class ClienteModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO clientes (nome, email, cpf, telefone,
            senha, id_cargo_fk) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sssssi", $data["nome"], $data["email"], $data["cpf"],
            $data["telefone"], $data["senha"], $data["id_cargo_fk"]);
            return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM clientes";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();

    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE clientes SET nome = ?, email = ?, cpf = ?, telefone = ?, senha = ?, id_cargo_fk = ? WHERE id = ? ";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sssssii",
            $data["nome"],
            $data["email"],
            $data["cpf"],
            $data["telefone"],
            $data["senha"],
            $data["id_cargo_fk"],
            $id
        );
        return $stmt->execute();

    }

    
    public static function buscarDisponiveis($conn){
        
    }


}



?>