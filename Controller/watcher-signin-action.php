<?php
require_once("../Config/Autoload.php");
use Models\Watcher as Watcher;
use Repository\WatcherRepository as WatcherRepository;
//TO DO: comprobacion del repositorio para saber si el usuario ya existe
if($_POST)
{
    if($_POST["password"] == $_POST["conf_password"])
    {
        $watcher= new Watcher();
        $watcher->setName($_POST["name"]);
        $watcher->setLastName($_POST["lastName"]);
        $watcher->setBirthDay($_POST["birthday"]);
        $watcher->setEmail($_POST["email"]);
        $watcher->setPassword($_POST["password"]);
        $watcher->setPetType($_POST["petType"]);
        $watcher->setExpectedPay($_POST["expectedPay"]);
        $list = new WatcherRepository();
        $list->add($watcher);
        //print_r($list->getAll());
        header("location:../index.php");//lo dirijo hacia el index
    }else{
        header("location:../Visual/watcher-signin.php");
    }
    

}