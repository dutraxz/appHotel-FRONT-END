<?php

class QuartoModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO quartos (nome, numero, camaSolteiro, camaCasal,
            disponivel, preco) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("ssiibd",
            $data["nome"],
            $data["numero"],
            $data["camaCasal"],
            $data["camaSolteiro"],
            $data["disponivel"],
            $data["preco"]
        );
        return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM quartos";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM quartos WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM quartos WHERE id = ? ";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE quartos SET nome = ?, numero = ?, camaSolteiro = ?, camaCasal = ?, disponivel = ?, preco = ? WHERE id = ? ";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("ssiibd",
            $data["nome"],
            $data["numero"],
            $data["camaCasal"],
            $data["camaSolteiro"],
            $data["disponivel"],
            $data["preco"],
            $id
        );
        return $stmt->execute();
    }
    public static function buscarDisponiveis ($conn, $data){

        // Conflito inclusivo: existe conflito quando (r.dataFim >= dataInicio) 
        // AND (r.dataInicio <= dataFim)

        $MYsql =
        "SELECT *
        FROM quartos q WHERE q.disponivel = 1 AND ((q.camaCasal * 2) + q.camaSolteiro) >= ?
        AND q.id NOT IN (
        SELECT reservas.id_quarto_fk
        FROM reservas
        WHERE (reservas.dataFim >= ? AND reservas.dataInicio <= ?)
        )";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("iss",
            $data["qtd"],
            $data["dataFim"],
            $data["dataInicio"]
        );
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function bloquearPorId($connect, $id){
        // Seleciona a linha do quarto e aplica lock na transação atual
        $sql = "SELECT id FROM quartos WHERE id = ? FOR UPDATE";
        $stmt = $connect->prepare($sql);
        if(!$stmt){
                return false;
        }
        $stmt->bind_param("i", $id);
        $liberado = $stmt->execute();
            if(!$liberado){
                $stmt->close();
                return false;
            }
            $resultado = $stmt->get_result();
            $rowExists = $resultado && $resultado->num_rows > 0;
            $stmt->close();
            return $rowExists;
    }
}
?>