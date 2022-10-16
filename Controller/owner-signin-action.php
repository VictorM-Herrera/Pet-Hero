<?php
    require_once("../Config/Autoload.php");
    use Models\Owner as Owner;
    use Repository\OwnerRepository as OwnerRepository;
    //TO DO: comprobacion del repositorio para saber si el usuario ya existe
    if($_POST)
    {
        if($_POST["password"] == $_POST["conf_password"])
        {
            $owner= new Owner();
            $owner->setName($_POST["name"]);
            $owner->setLastName($_POST["lastName"]);
            $owner->setBirthDay($_POST["birthday"]);
            $owner->setEmail($_POST["email"]);
            $owner->setPassword($_POST["password"]);
            $list= new OwnerRepository();
            $list->add($owner);
            header("location:../index.php");//lo dirijo hacia el index
        }else{
            header("location: ../Visual/watcher-signin.php");
        }
    
    }
?>