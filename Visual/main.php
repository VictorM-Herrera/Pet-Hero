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
</head>
<body>
    <h1>FELICIDADES COMPLETASTE LOS REGISTROS Y EL LOGIN</h1>
</body>
</html>