<?php


class UserModel{

    public static function validateUser($conn, $email, $password, ){
        $sql = "SELECT usuarios.id, usuarios.email, usuarios.nome, usuarios.senha, permissao.nome AS Cargo
        FROM usuarios 
        JOIN permissao ON permissao.id = usuarios.id_perm_fk 
        WHERE usuarios.email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($user = $result->fetch_assoc()){
            if(passwordController::validateHash($password, $user['senha'])){
                unset($user['senha']);
                return $user;
        }
    }
    return false;
    }
}

?>
