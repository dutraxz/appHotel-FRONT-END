<?php


class ReservaModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO reservas (id_adicional_fk, id_quarto_fk, id_pedido_fk, dataInicio, dataFim) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iiiss",
            $data["id_adicional_fk"],
            $data["id_quarto_fk"],
            $data["id_pedido_fk"],
            $data["dataInicio"],
            $data["dataFim"]
        );
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
         $MYsql = "UPDATE reservas SET id_adicional_fk = ?, id_quarto_fk = ?, id_pedido_fk = ?, dataInicio = ?, dataFim = ? WHERE id = ? ";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iiissi",
            $data["id_adicional_fk"],
            $data["id_quarto_fk"],
            $data["id_pedido_fk"],
            $data["dataInicio"],
            $data["dataFim"],
            $id
        );
        return $stmt->execute();
    }
    
   public static function temConflito($conn, $id_quarto_fk, $dataInicio, $dataFim) {
            $MYsql = "SELECT 1 
            FROM reservas r
            WHERE r.id_quarto_fk = ? 
            AND (r.dataFim >= ? AND r.dataInicio <= ?) 
            LIMIT 1";
            
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iss", $idQuarto, $inicio, $fim);
            $stmt->execute();
            $linhaAfetada = $stmt->get_result()->num_rows > 0;
            $stmt->close();
            return $linhaAfetada;
}
    
        public static function listarPorPedido($conn, $id_pedido){
            $MYsql = "SELECT * FROM reservas WHERE id_pedido_fk = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("i", $id_pedido);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

    }
?>