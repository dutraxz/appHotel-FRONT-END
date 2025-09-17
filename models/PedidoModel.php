<?php


class PedidoModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO pedidos (id_usuario_fk, id_cliente_fk, data, pagamento) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iii", $data["id_usuario_fk"],$data["id_cliente_fk"],$data["data"], $data["pagamento"]);
            return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM pedidos";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM pedidos WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM pedidos WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();

    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE pedidos SET id_usuario_fk = ?, id_cliente_fk = ?, data = ?, pagamento = ? WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iii",
            $data["id_usuario_fk"],
            $data["id_cliente_fk"],
            $data["data"],
            $data["pagamento"],
            $id
        );
        return $stmt->execute();

    }

    
    public static function buscarDisponiveis($conn){
        
    }


}

?>