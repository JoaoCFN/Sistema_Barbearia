<?php
    include "msg.php";
    session_start(); 

    $conn2 = mysqli_connect("localhost", "root", "", "dbtcc");

    $nome = mysqli_real_escape_string($conn2, $_POST['nome']);
    $telefone = mysqli_real_escape_string($conn2, $_POST['telefone']); 
    $dataNascimento = mysqli_real_escape_string($conn2, $_POST['data-nascimento']);
    
    echo $nome, $telefone, $dataNascimento, $_SESSION['user_id'];
    // $queryUsuario = "CALL PROC_UP_USER({$_SESSION['user_id']}, {$nome}, {$telefone}, {$dataNascimento})";
    $queryUsuario = "update user
        set nome = $nome, 
            telefone = $telefone,
            data_de_nascimento = $dataNascimento 
        where user.user_id = {$_SESSION['user_id']}
    ";

    $resultUsuario = mysqli_query($conn2, $queryUsuario);
    
    $rowUsuario = mysqli_num_rows($resultUsuario);
    // echo $resultUsuario;

    // print_r($rowUsuario);

    // if ($resultUsuario == true) {
    //     echo "Passou";
    //     msg("success", "Parabéns", "Seu cadastro foi atualizado com sucesso!","area_cliente.php");
    // }
    // else{
    //     echo "Não Passou";
    //     msg("error", "Oops...", "Houve um problema na atualização do seu cadastro, tente novamente mais tarde!", "area_cliente.php");
    // }
?>