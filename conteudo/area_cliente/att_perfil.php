<body class="sb-bg-black">
    <?php
        session_start(); 
        include "../../config/config.php";

        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']); 
        $dataNascimento = mysqli_real_escape_string($mysqli, $_POST['data-nascimento']);
        
        $queryUsuario = "CALL PROC_UP_USER('{$_SESSION["user_id"]}', '{$nome}', '{$telefone}', '{$dataNascimento}')";

        $mysqli->query($queryUsuario);
        $resultUsuario = $mysqli->affected_rows;
            
        if ($resultUsuario > 0) {
            include "msg/sucesso.php";
        }
        else{
            include "msg/erro.php";
        }
    ?>
</body>