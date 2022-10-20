<?php
    require_once("../Config/Autoload.php");
    use Models\Owner as Owner;
    use Repository\WatcherRepository as WatcherRepository;
    session_start();
    if(isset($_SESSION["loggedUser"]))
    {
        $loggedUser= $_SESSION["loggedUser"];
    }else{
        header("location:login.php");
    }
    $list= new WatcherRepository();
    
    foreach($list->getAll() as $watcher)
    {
        echo "<li>"."Nombre: " . $watcher->getName() ."</li>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Guardianes</title>
</head>
<body>
    <section>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de Mascota a cuidar</th>
                <th>Paga</th>
                <th>reputacion</th>
            </tr>
            <tr>
                <td>
                    <?php
                    echo $watcher->getName();
                    ?>
                </td>
            </tr>
            <?php
           /* for($x=0; $x<10;$x++){
                echo "<tr>". 
                "<td>". $watcher->getName()."</td>".
                "<td>". $watcher->getLastName()."</td>".
                "<td>". $watcher->getName()."</td>"
                ."</tr>";
            }
            */
            ?>
        </table>
    </section>
</body>
</html>