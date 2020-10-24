<?php
    $conn = mysqli_connect("localhost","root","","dbtcc");
    $nome = mysqli_real_escape_string($conn, $_POST['usuario']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telBar']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = md5(mysqli_real_escape_string($conn, $_POST['senha']));
    $confSenha = mysqli_real_escape_string($conn, $_POST['confSenha']);
    $nameBar = mysqli_real_escape_string($conn, $_POST['nameBar']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $cnpjBar = mysqli_real_escape_string($conn, $_POST['cnpjBar']);
    $ruaBar = mysqli_real_escape_string($conn, $_POST['ruaBar']);
    $nBar = mysqli_real_escape_string($conn, $_POST['nBar']);
    $bairroBar = mysqli_real_escape_string($conn, $_POST['bairroBar']);
    $cidadeBar = mysqli_real_escape_string($conn, $_POST['cidadeBar']);
    $ufBar = mysqli_real_escape_string($conn, $_POST['ufBar']);
    $cepBar = mysqli_real_escape_string($conn, $_POST['cepBar']);

    $queryCpf = "select cpf from usuario where cpf = '{$cpf}'";
    $resultCpf = mysqli_query($conn, $queryCpf);
    $rowCpf = mysqli_num_rows($resultCpf);
    //
    $queryEmail = "select email from usuario where email = '{$email}'";
    $resultEmail = mysqli_query($conn, $queryEmail);
    $rowEmail = mysqli_num_rows($resultEmail);

    if ($rowCpf == 1 || $rowEmail ==1 ) {
        echo '<script>window.alert("Houve algum erro no seu Cadastro.");</script>"';
    // }elseif(strlen($nome)<3 || strlen($telefone)<3 || strlen($email<3) || strlen($senha)<3 || strlen($datanasc)<3 || strlen($cpf)<3 ){
    //     echo '<script>window.alert("Houve algum erro no seu Cadastro.");</script>"';
    }else{
        $insert = ("INSERT INTO usuario (nome, email, senha, nome_Bar, cpf, telefone, cnpj, rua, numero, bairro, uf, cep, cidade) VALUES ('$nome', '$email', '$senha', '$nameBar', '$cpf', '$telefone', '$cnpjBar', '$ruaBar', '$nBar', '$bairroBar', '$ufBar', '$cepBar', '$cidadeBar')");

        $run_insert = mysqli_query($conn, $insert);
        require_once "conteudo/registro/sucesso.php";
        }

?>