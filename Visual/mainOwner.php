<?php
    session_start();
    if(isset($_SESSION["loggedUser"]))
    {
        $loggedUser= $_SESSION["loggedUser"];
    }else{
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="owner-style.css">
</head>
<body>
    <div class="header-box">
        <header>
            <div class="nav-box">
                <nav>
                    <a href="watcher-list.php">Listado de Guardianes</a>
                    <a href="pet-list.php">Lista Mascotas</a>
                    <a href="#">ejemplo</a>
                </nav>
            </div>
        </header>
    </div>
</body>
</html>