<?php 
namespace Models;

use Models\User as User;
use Models\Pet as Pet;

class Owner extends User{
    private $petList = array();
    private $reputation;//reputacion del dueño, (para saber si cumple con los pagos, y con los horarios)

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
    public function addPet(Pet $pet)
    {
        array_push($this->petList, $pet);
    }
}
?>