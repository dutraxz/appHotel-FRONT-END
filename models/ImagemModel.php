<?php
class ImagemModel {
    public static function criar($conn, $data){
    public static function criarRelacaoQuartos($conn, $data){
            $MYsql = "INSERT INTO quartoos_fotos (quartos_id, foto_id) VALUES (?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("ii", $data["caminho"]);
            if($stmt->execute()){
                return $conn->insert_id;
            }
            return false;
        }
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM imagens";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
    public static function buscarPorImagens($conn, $id){
        $MYsql = "SELECT f.nome
        FROM quartos_fotos qf
        JOIN fotos f ON  qf.foto_id = f.id
        WHERE qf.qaurtos_id = ?";

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
        $MYsql = "DELETE FROM imagens WHERE caminho = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function atualizar($conn, $id, $data){
            $MYsql = "UPDATE imagens SET caminho = ?WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("si",
            $data["caminho"],
            $id
        );
        return $stmt->execute();
        }
    }
}
?>