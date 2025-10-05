<?php
class UserModel{
        public static function listarTodos($conn){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, permissao.nome AS cargo 
            FROM usuarios JOIN permissao ON usuarios.id_perm_fk = permissao.id"; 
            $result = $conn->query($MYsql);
            return $result->fetch_all(MYSQLI_ASSOC);           

        }
        public static function buscarPorId($conn, $id){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, permissao.nome AS cargo 
            FROM usuarios JOIN permissao ON usuarios.id_perm_fk = permissao.id WHERE usuarios.id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc(); 
        }
        public static function criar($conn, $data){
            $MYsql = "INSERT INTO usuarios(nome, email, senha, id_perm_fk)VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sssi", 
            $data["nome"],
            $data["email"],
            $data["senha"],
            $data["id_perm_fk"]
        );
            return $stmt->execute();
        }
        public static function atualizar($conn, $id, $data){
            $MYsql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, id_perm_fk = ? WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sssii", 
            $data["nome"],
            $data["email"],
            $data["senha"],
            $data["id_perm_fk"],
            $id
        );
            return $stmt->execute();

        }
        public static function deletar($conn, $id){
            $MYsql = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("i", $id);
            return $stmt->execute(); 
        }

        public static function validandoUsuario($conn, $email, $senha){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, permissao.nome AS cargo 
            FROM usuarios JOIN permissao ON usuarios.id_perm_fk = permissao.id
            WHERE usuarios.email = ?";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($user = $result->fetch_assoc()){
                if(passwordController::validateHash($senha, $user['senha'] )){
                    unset($user['senha']);
                    return $user;
                }
            }
        return false;
    }
}
?>
