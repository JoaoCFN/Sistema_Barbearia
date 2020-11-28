<?php

require_once "./classes/Database.php";

class UsuBarbearia {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function registrarUsuBarbearia($data){
        $nome = $data['usuario'];
        // --
        $nomeBar = $data['nameBar'];
        // --
        $cpf = $data['cpf'];
        // --
        $email = $data['email'];
        $email = strtolower($email);
        // --
        $senha = $data['senha'];
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $confSenha = $data['confSenha'];

        $telBar = $data['telBar'];

        $cepBar = $data['cepBar'];

        $cnpjBar = $data['cnpjBar'];

        $ruaBar = $data['ruaBar'];

        $nBar = $data['nBar'];

        $bairroBar = $data['bairroBar'];

        $cidadeBar = $data['cidadeBar'];

        $ufBar = $data['ufBar'];


        if ($ufBar == '' || $cidadeBar == '' || $bairroBar == '' || $nBar == '' || $ruaBar == '' || $cnpjBar == '' || $nome == '' || $telBar == '' || $cepBar == '' || $cpf == '' || $email == '' || $senha == ''){
            require "registro/alertGenerico.php";
        }
        else{
        $sql = "INSERT INTO barbearia (nome_dono, email_dono, senha_dono, nome_barbearia, cpf_dono, telefone, cnpj, rua, num_bar, bairro, uf, cep, cidade) VALUES (:nome, :email, :senha, :nomeBar, :cpf, :telefone, :cnpj, :rua, :numBar, :bairroBar, :uf, :cep, :cidadeBar)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':senha', $senha, PDO::PARAM_STR);
        $query->bindValue(':nomeBar', $nomeBar, PDO::PARAM_STR);
        $query->bindValue(':cpf', $cpf, PDO::PARAM_STR);
        $query->bindValue(':telefone', $telBar, PDO::PARAM_STR);
        $query->bindValue(':cnpj', $cnpjBar, PDO::PARAM_STR);
        $query->bindValue(':rua', $ruaBar, PDO::PARAM_STR);
        $query->bindValue(':numBar', $nBar, PDO::PARAM_STR);
        $query->bindValue(':bairroBar', $bairroBar, PDO::PARAM_STR);
        $query->bindValue(':uf', $ufBar, PDO::PARAM_STR);
        $query->bindValue(':cep', $cepBar, PDO::PARAM_STR);
        $query->bindValue(':cidadeBar', $cidadeBar, PDO::PARAM_STR);
        $query->execute();
        
        }

    }



}

?>