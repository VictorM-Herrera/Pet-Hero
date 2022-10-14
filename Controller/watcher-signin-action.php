<?php
require_once("../Config/Autoload.php");
use Models\Watcher as Watcher;
if($_POST)
{
    if($_POST["password"] == $_POST["conf_password"])
    {
        $watcher= new Watcher();
        $watcher->setName($_POST["firstName"]);
        $watcher->setLastName($_POST["lastName"]);
        $watcher->setBirthDay($_POST["birthday"]);
        $watcher->setEmail($_POST["email"]);
        $watcher->setPassword($_POST["password"]);
        $watcher->setPetType($_POST["petType"]);
        $watcher->setExpectedPay($_POST["expectedPay"]);
        //lo añado al json
        header("location:../index.php");//lo dirijo hacia el index
    }else{
        header("location:../Visual/watcher-signin.php");
    }
    

}