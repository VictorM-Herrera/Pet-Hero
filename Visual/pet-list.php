<?php
require_once("../Config/Autoload.php");
use Models\Pet as Pet;
use Models\Owner as Owner;
use Repository\OwnerRepository as OwnerRepository;
session_start();
    if(isset($_SESSION["loggedUser"]))
    {
        $loggedUser= $_SESSION["loggedUser"];
    }else{
        header("location:login.php");
    }
$ownerRepo= new OwnerRepository();
$petlist=array();   
foreach($ownerRepo->getAll() as $owner)
{
    if($owner->getEmail() == $loggedUser->getEmail())
    {
        foreach ($owner->getPetList() as $pet) {
           array_push($petlist,$pet);
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetList</title>
</head>
<body>
    
    <section>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    <?php
                    foreach ($petlist as $mascota) { 
                         ?>
                         <tr>
                            <td><?php echo $mascota->getName()?></td>
                            <td><?php echo $mascota->getSpecie()?></td>
                            <td><?php echo $mascota->getAge()?></td>



                         </tr>
                         <?php
                        }
                        ?>
   
                   
                </tbody>

            </table>

    </section>
    
    

    <a href="NewPet.php">Nueva Mascota</a>
    <a href="mainOwner.php">Atrás</a>
    
</body>
</html>