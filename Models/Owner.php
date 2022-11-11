<?php 
namespace Models;

use Models\User as User;
use Models\Pet as Pet;

class Owner extends User{

 
    private $id;
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

  

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
?>