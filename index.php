<?php
require_once("Config\Autoload.php");
use Repository\OwnerRepository as OwnerRepository;
use Models\Owner as Owner;
$repo= new OwnerRepository();
$ow1= new Owner();
$ow1->setName("qwe");
$ow1->setLastName("rsq");
$ow1->setEmail("asd@qwe");


$repo->Add($ow1);
var_dump($repo->GetAll());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="Visual/normalize.css">
    <link rel="icon" href="Visual/favicon.ico">
    
</head>
<body>
    
    <a href="Visual/login.php">LogIn</a> <a href="Visual/signin.php">Sing In</a>
</body>
</html>