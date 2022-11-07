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
    
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Guardianes</title>
    <link rel="stylesheet" href="./owner-style.css">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
</style>
</head>
<body>
    <section class="table-box">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de Mascota a cuidar</th>
                <th>Paga</th>
                <th>Reputacion</th>
                <th>Disponibilidad</th>
            </tr>
            <tbody>                  
                    
                 <?php
                    foreach ($list->getAll() as $guardian) { 
                         ?>
                         <tr>
                            <td><?php echo $guardian->getName()?></td>
                            <td><?php echo $guardian->getLastName()?></td>
                            <td><?php echo $guardian->getPetType()?></td>
                            <td><?php echo $guardian->getExpectedPay()?></td>
                            <td><?php if($guardian->getReputation()==NULL)
                            {echo "no calificado";}else{
                                echo $guardian->getReputation();
                            }
                            ?></td>
                            <td><?php if($guardian->getAvailability() == false){
                                    echo "Ocupado";
                                }else{
                                    echo "Disponible";
                                }?></td>
                         </tr>
                         <?php
                        }
                        ?>
                </tbody>
            <?php
           
            ?>
        </table>
    </section>
    <a href="mainOwner.php">Atrás</a>

</body>
</html>