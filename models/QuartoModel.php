<?php


class QuartoModel{

    public static function listarTodos($conn){
        $sql = "usuarios.id, usuarios.email, usuarios.nome, usuarios.senha, permissao.nome AS Cargo
        FROM usuarios 
        JOIN permissao ON permissao.id = usuarios.id_perm_fk 
        WHERE usuarios.email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
    }

    public static function buscarPorld($conn){

    }

    public static function criar($conn){
        $sql INSET

    }

    public static function atualizar($conn){

    }

    public static function deletar($conn){
        
    }
    
    public static function buscarDisponiveis($conn){
        
    }


}



?>