<?php


class PermissaoModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO permissao (nome) VALUES (?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("i", $data["nome"]);
            return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM permissao";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM permissao WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM permissao WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();

    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE permissao SET nome = ? WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("s",
            $data["nome"],
            $id
        );
        return $stmt->execute();

    }

    
    public static function buscarDisponiveis($conn){
        
    }


}



?>