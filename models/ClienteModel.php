<?php


class ClienteModel{
    public static function criar($conn, $data){
            $MYsql = "INSERT INTO clientes (nome, email, cpf, telefone,
            senha) VALUES (?, ?, ?, ?, ? )";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sssss",
            $data["nome"],
            $data["email"],
            $data["cpf"],
            $data["telefone"],
            $data["senha"]
        );
        return $stmt->execute();
    }
    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM clientes";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }
    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();

    }
    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();

    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE clientes SET nome = ?, email = ?, cpf = ?, telefone = ?, senha = ? WHERE id = ? ";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("sssssi",
            $data["nome"],
            $data["email"],
            $data["cpf"],
            $data["telefone"],
            $data["senha"],
            $id
        );
        return $stmt->execute();

    }

    
    public static function validandoCliente($conn, $email, $senha){
        $MYsql = "SELECT clientes.id, clientes.nome, clientes.email, clientes.senha, permissao.nome AS cargo
        FROM clientes
        JOIN permissao ON clientes.id_cargo_fk = permissao.id
        WHERE clientes.email = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($cliente = $result->fetch_assoc()) {

            if(passwordController::validateHash($senha, $cliente['senha'])) {
                unset($cliente['senha']);
                return $cliente;
            }
            return false;
        }
    }
}
?>