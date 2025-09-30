<?php


class QuartoModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO quartos (nome, numero, camaSolteiro, camaCasal,
            disponivel, preco) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("ssiibd", $data["nome"], $data["numero"], $data["camaCasal"],
            $data["camaSolteiro"], $data["disponivel"], $data["preco"]);
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

    
    public static function buscarDisponiveis($conn, $dataInicio, $dataFim, $quantidadePessoas){
        $MYsql = "SELECT
            quartos.id,
            quartos.nome,
            quartos.camaCasal,
            quartos.camaSolteiro,
            quartos.preco,
            quartos.numero,
            quartos.disponivel
        FROM
            quartos q
        WHERE
            q.id NOT IN (
                SELECT
                reservas.fk_quartos
                FROM
                reservas r
                WHERE
                (r.fim > ? AND r.inicio < ?)
            )   
        AND q.disponivel = true
        AND ( (q.camaCasal * 2) + q.camaSolteiro ) >= ?;
        ";

        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("iss"
            $data["quantidadePessoas"],
            $data["dataInicio"],
            $data["dataFim"],
        );
        $stmt=> execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}



?>