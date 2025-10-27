<?php
class ImagemModel {
    public static function create($conn, $name){
        $MYsql = "INSERT INTO imagens (nome) VALUES (?)";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("s", $name);
        if ($stmt->execute()){
            return $conn->insert_id;
        }
        return false;
    }

    public static function criarRelacaoQuartos($conn, $idQuartos, $data){
            $MYsql = "INSERT INTO imagens_quartos (quartos_id, fotos_id) VALUES (?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("ii", $data["caminho"]);
            if($stmt->execute()){
                return $conn->insert_id;
            }
            return false;
        }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM imagens";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM imagens WHERE id=?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public static function buscarIdQuarto($conn, $id){
        $MYsql = "SELECT i.nome
        FROM imagens_quartos iq
        JOIN imagens i ON  iq.fotos_id = i.id
        WHERE iq.quarto_id = ?";

        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
        $photos = [];
        while ( $row = $result->fetch_assoc()){
            $photos[] = $row['nome'];
        }
        return $photos;
    }

    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM imagens WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function atualizar($conn, $id, $data){
            $MYsql = "UPDATE imagens SET nome = ? WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }
}
?>