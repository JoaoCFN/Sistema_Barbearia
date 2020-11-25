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
    '/:id',
    function ($id) {
        require_once "../config/config.php";
        $select = "SELECT * FROM babearia where barbearia_id = '$id'";
        $query = $con->query($select);
        $row = mysqli_fetch_all($query);
        print_r($row);
        //echo ('O id passado é: '.$id);
    }
);

$app->get(
    '/',
    function () {
        require_once "../config/config.php";
        $id = 8;
        $select = "SELECT * FROM barbearia where barbearia_id  = $id";
        $query = $mysqli->query($select);
        $row = mysqli_fetch_assoc($query);
        print_r($row);
        //echo ('O id passado é: '.$id);
    }
);



$app->get(
    '/Sistema_barbearia/API/getuser/',
    function () {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            require_once "../config/config.php";
            $select = "SELECT * FROM barbearia where barbearia_id  = $id";
            $query = $mysqli->query($select);
            $row = mysqli_fetch_assoc($query);
            echo (json_encode($row));
        }else{
            $id = 8;
            require_once "../config/config.php";
            $select = "SELECT * FROM barbearia where barbearia_id  = $id";
            $query = $mysqli->query($select);
            $row = mysqli_fetch_assoc($query);
            echo (json_encode($row));
          
        }
    }
);

/*$app->get(
    '/Sistema_barbearia/API/getuser/',
    function () {
      $id = 8;
        require_once "../config/config.php";
        $select = "SELECT * FROM barbearia where barbearia_id  = $id";
        $query = $mysqli->query($select);
        $row = mysqli_fetch_assoc($query);
        print_r($row);

        echo ('Get User Works');
    }
);*/

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
