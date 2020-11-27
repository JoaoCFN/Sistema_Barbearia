<?php
$base_url = "../barbeiro/";
session_start();
if(empty($_SESSION)) {
	header('Location: ../index.php');
	exit();
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url ?>css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>css/navbar.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>css/global.css">

    <title>House of Barbers</title>
