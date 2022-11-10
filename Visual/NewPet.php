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
    <title>Agregar Mascota</title>
    <link rel="stylesheet" href="./owner-style.css">
</head>
<body>
    <div>
        <form action="../Controllers/pet-add-action.php" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="specie">Especie</label>
            <select name="specie" id="specie">
                <option value="cat">gato</option>
                <option value="dog">perro</option>
            </select>           
        </div>
        <div>
            <label for="age">Edad</label>
            <input type="number" name="age" id="age">
        </div>
        <div>
            <button type="submit">Enviar</button>
            <button type="reset">Resetear</button>
        </div>
        <a href="pet-list.php">Atrás</a>
        </form>
    </div>
</body>
</html>