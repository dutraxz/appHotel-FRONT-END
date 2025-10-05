<?php
class AdicionalModel {
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO adicionais (nome, preco) VALUES (?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sd", $data["nome"],$data["preco"]);
            return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM adicionais";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM adicionais WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM adicionais WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function atualizar($conn, $id, $data){
            $MYsql = "UPDATE adicionais SET nome = ?, preco = ? WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sdi",
            $data["nome"],
            $data["preco"],
            $id
        );
        return $stmt->execute();
    }
}
?>