<?php
    require_once("../Config/Autoload.php");
    use Models\Owner as Owner;
    use Models\Watcher as Watcher;
    if($_POST)//si hay datos en el post
    {
        if($_POST["type"]== "Owner")
        {
            $owner= new Owner();
            $owner->setName($_POST["firstName"]);
            $owner->setLastName($_POST["lastName"]);
            $owner->setBirthDay($_POST["birthday"]);
            $owner->setEmail($_POST["email"]);
            $owner->setPassword($_POST["password"]);
            //añadirlo al json con su repositorio
        }else{
            //si se registra como guardia:
            $watcher= new Watcher();

        }
    }
?>