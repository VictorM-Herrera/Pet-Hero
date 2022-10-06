<?php 
namespace Models;
/*require_once "Models/User.php";
require_once "Models/PetCollection.php";

use Models\PetCollection as PetCollection;*/

class Owner extends User{
    private $petList;
    private $reputation;//reputacion del dueño, (para saber si cumple con los pagos, y con los horarios)

    function __construct()
    {
        $petList = new PetCollection();
    }
    
    

    /**
     * Get the value of reputation
     */ 
    public function getReputation()
    {
        return $this->reputation;
    }

    /**
     * Set the value of reputation
     *
     * @return  self
     */ 
    public function setReputation($reputation)
    {
        $this->reputation = $reputation;

        return $this;
    }

    /**
     * Get the value of petList
     */ 
    public function getPetList()
    {
        return $this->petList;
    }

    /**
     * Set the value of petList
     *
     * @return  self
     */ 
    public function setPetList($petList)
    {
        $this->petList = $petList;

        return $this;
    }
}
?>