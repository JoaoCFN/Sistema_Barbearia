<?php

/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
$app->get(
    '/',
    function () {
        require_once "../barbeiro/conteudo/header.php";
?>
    <link rel="stylesheet" href="../barbeiro/css/navbar.css">
    <link rel="stylesheet" href="../barbeiro/css/dashboard.css">
    </head>

    <body class="dashboard">
        <?php
        require_once "../barbeiro/config/config.php";
        require_once "../barbeiro/conteudo/navbar.php";
        require_once "../barbeiro/conteudo/dashboard.php";
        require_once "../barbeiro/conteudo/footer.php";
        require_once "../barbeiro/conteudo/scripts.php";
        ?>
        <script src="../barbeiro/js/charts/meus_charts.js"></script>
    </body>

    </html>
<?php

    }
);

$app->get(
    '/sistema_barbearia/barbeiro/minha-barbearia/',
    function () {


        require_once "../barbeiro/conteudo/header.php";
?>
    <link rel="stylesheet" href="../barbeiro/css/navbar.css">
    <link rel="stylesheet" href="../barbeiro/css/minha-barbearia.css">
    </head>

    <body class="minha-barbearia">
        <?php
        require_once "../barbeiro/conteudo/navbar.php";
        require_once "../barbeiro/conteudo/minha-barbearia.php";
        require_once "../barbeiro/conteudo/footer.php";
        require_once "../barbeiro/conteudo/scripts.php";
        ?>
    </body>

    </html>
<?php

    }
);

$app->get(
    '/sistema_barbearia/barbeiro/servicos-agendados/',
    function () {


        require_once "../barbeiro/conteudo/header.php";
?>
    <link rel="stylesheet" href="../barbeiro/css/navbar.css">
    <link rel="stylesheet" href="../barbeiro/css/servicos-agendados.css">
    </head>

    <body class="servicos-agendados">
        <?php
        require_once "../barbeiro/conteudo/navbar.php";
        require_once "../barbeiro/conteudo/servicos-agendados.php";
        require_once "../barbeiro/conteudo/footer.php";
        require_once "../barbeiro/conteudo/scripts.php";
        ?>
    </body>

    </html>
<?php

    }
);


$app->get(
    '/sistema_barbearia/barbeiro/cadastrar-servicos/',
    function () {


        require_once "../barbeiro/conteudo/header.php";
?>
    <link rel="stylesheet" href="../barbeiro/css/navbar.css">
    <link rel="stylesheet" href="../barbeiro/css/cadastrar-servicos.css">
    </head>

    <body class="cadastrar-servicos">
        <?php
        require_once "../barbeiro/conteudo/navbar.php";
        require_once "../barbeiro/conteudo/cadastrar-servicos.php";
        require_once "../barbeiro/conteudo/footer.php";
        require_once "../barbeiro/conteudo/scripts.php";
        ?>
    </body>

    </html>
<?php

    }
);


$app->post(
    '/sistema_barbearia/barbeiro/minha-barbearia',
    function () {
        if (isset($_POST['salvar'])) {
            $cep = $_POST['cep'];
            $nome_dono = $_POST['nome_dono'];
            $nome_barbearia = $_POST['nome_barbearia'];
            $email_dono = $_POST['email_dono'];
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $number = $_POST['number'];
            $id = $_POST['id'];


            $conn = mysqli_connect("localhost", "root", "", "dbtcc");
            $update = "UPDATE barbearia SET nome_dono='$nome_dono', nome_barbearia='$nome_barbearia', email_dono='$email_dono', uf='$uf', cidade='$cidade', cep='$cep', bairro='$bairro', num_bar='$number' WHERE barbearia_id='$id'";
            $result = $conn->query($update);
        }

        if (isset($_POST['sobre'])) {
            $id = $_POST['id'];
            $cep = $_POST['cep'];

            $conn = mysqli_connect("localhost", "root", "", "dbtcc");
            $update = "UPDATE barbearia SET sobre_barber='$_POST[sobreBarber]' WHERE barbearia_id='$id'";
            $result = mysqli_query($conn, $update);
        }

        if (isset($_POST['aplicar'])) {
            echo 'entrou if';
            $id = $_POST['aplicar'];

            $conn = mysqli_connect("localhost", "root", "", "dbtcc");
            $update = "UPDATE barbearia SET horario_abertura='$_POST[horario_abertura]', horario_fechamento='$_POST[horario_fechamento]', horario_abertura_final_semana='$_POST[horario_abertura_final_semana]', horario_fechamento_final_semana='$_POST[horario_fechamento_final_semana]' WHERE barbearia_id='$id'";
            $result = mysqli_query($conn, $update);
        }

        header('location:./minha-barbearia');
        exit;
    }
);

$app->post(
    '/sistema_barbearia/barbeiro/servicos-agendados',
    function () {
        $conn = mysqli_connect("localhost", "root", "", "dbtcc");
        $id = $_POST['gg'];
        $update = "UPDATE agendamento SET `status`= 'F' WHERE id_agendamento = '$id'";
        $query = $conn->query($update);
        if ($query){
            header('location:./servicos-agendados');
            exit;
        }else{
            echo ('Deu ruim');

        }
        

    }
);



$app->post(
    '/sistema_barbearia/barbeiro/minha-barbearia/teste',
    function () {
?>

<?php

    }
);

// POST route


$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
