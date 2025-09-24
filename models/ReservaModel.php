<?php


class ReservaModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO reservas (id_adicional_fk, id_quarto_fk, id_pedido_fk) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iii", $data["id_adicional_fk"], $data["id_quarto_fk"], $data["id_pedido_fk"]);
            return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM reservas";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM reservas WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM reservas WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();

    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE reservas SET id_adicional_fk = ?, id_quarto_fk = ?, id_pedido_fk = ? WHERE id = ? ";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iii",
            $data["id_adicional_fk"],
            $data["id_quarto_fk"],
            $data["id_pedido_fk"],
            $id
        );
        return $stmt->execute();

    }

    
    public static function buscarDisponiveis($conn){
        
    }


}



?>