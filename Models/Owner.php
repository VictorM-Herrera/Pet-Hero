<?php 
namespace Models;
require_once "Models/User.php";
require_once "Models/PetCollection.php";
class Owner extends User{
    private $petList;
    private $reputation;//reputacion del dueño, (para saber si cumple con los pagos, y con los horarios)

    function __construct()
    {
        $petList = new PetCollection();
    }
    
}
?>