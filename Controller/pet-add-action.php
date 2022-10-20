<?php
require_once("roam-array.php");
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

if($_POST){
        $nombre = $_POST["Nombre"];
        $especie = $_POST["Especie"];
        $edad = $_POST["Edad"];
        
        $nuevaMascota= new Pet();
        $nuevaMascota->setName($nombre);
        $nuevaMascota->setSpecie($especie);
        $nuevaMascota->setAge($edad);
        
        $ownerRepo = new OwnerRepository();
        
        foreach($ownerRepo->getAll() as $user)
        {
            if($user->getEmail() == $loggedUser->getEmail() && $user->getPassword() == $loggedUser->getPassword())
            {
                $user->addPet($nuevaMascota);
                $ownerRepo->add($user);
                
            }
        }
        //header("location:../Visual/mainOwner.php");
        echo "<br>";
        print_r($ownerRepo->getAll());
    }

?>







