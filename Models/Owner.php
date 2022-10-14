<?php 
namespace Models;

use Models\User as User;
use Models\PetCollection as PetCollection;

class Owner extends User{
    private $petList;
    private $reputation;//reputacion del dueño, (para saber si cumple con los pagos, y con los horarios)

    function __construct()
    {
        $petList = new PetCollection();
    }

    public function getReputation()
    {
        return $this->reputation;
    }
 
    public function setReputation($reputation)
    {
        $this->reputation = $reputation;

        return $this;
    }

    public function getPetList()
    {
        return $this->petList;
    }

    public function setPetList($petList)
    {
        $this->petList = $petList;

        return $this;
    }
}
?>