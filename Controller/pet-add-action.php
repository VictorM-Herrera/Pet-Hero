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
if($_POST)
{
    $nombre = $_POST["name"];
    $especie = $_POST["specie"];
    $edad = $_POST["age"];

    $newPet= new Pet();
    $newPet->setName($nombre);
    $newPet->setSpecie($especie);
    $newPet->setAge($edad);

    $ownerRepo= new OwnerRepository();
    foreach($ownerRepo->getAll() as $owner)
    {
        if($owner->getEmail() == $loggedUser->getEmail())
        {
            $owner->addPet($newPet);
            $ownerRepo->modify($owner);
        }
    }
    header("location:../Visual/mainOwner.php");
}