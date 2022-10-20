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
    <title>NewPet</title>
</head>
<body>
<form action="../Controller/pet-add-action.php" method="post">
    <div>
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre">
    </div>
    <label for="Especie">Especie</label>
    <input type="text" name="Especie">
    <div>
    <label for="Edad">Edad</label>
    <input type="number" name="Edad">
    </div>
    <button type="submit">Agregar</button>
    



</form>
    
</body>
</html>



