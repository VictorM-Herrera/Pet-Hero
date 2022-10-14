<?php
    require_once("../Config/Autoload.php");
    use Models\Owner as Owner;

    if($_POST)
    {
        if($_POST["password"] == $_POST["conf_password"])
        {
            $owner= new Owner();
            $owner->setName($_POST["firstName"]);
            $owner->setLastName($_POST["lastName"]);
            $owner->setBirthDay($_POST["birthday"]);
            $owner->setEmail($_POST["email"]);
            $owner->setPassword($_POST["password"]);
            //lo añado al json
            header("location:../index.php");//lo dirijo hacia el index
        }else{
            header("location: ../Visual/watcher-signin.php");
        }
    
    }
?>