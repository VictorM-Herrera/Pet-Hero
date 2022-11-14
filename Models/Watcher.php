<?php
namespace Models;
use Models\User as User;

class Watcher extends User
{
    private $petType;//tipo de mascota dispuesta a cuidar, ej: Juan perez, cuidador de loros(petType)
    private $expectedPay;//remuneracion que esperan cobrar (su precio)
    private $reputation;//reputacion del cuidador, indica si es bueno haciendo su trabajo. 
    private $id;
    private $sizecare;
    public function getPetType()
    {
        return $this->petType;
    }

    public function setPetType($petType)
    {
        $this->petType = $petType;

        return $this;
    }

    public function getExpectedPay()
    {
        return $this->expectedPay;
    }

    public function setExpectedPay($expectedPay)
    {
        $this->expectedPay = $expectedPay;

        return $this;
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

    /**
     * Get the value of sizecare
     */ 
    public function getSizecare()
    {
        return $this->sizecare;
    }

    /**
     * Set the value of sizecare
     *
     * @return  self
     */ 
    public function setSizecare($sizecare)
    {
        $this->sizecare = $sizecare;

        return $this;
    }
}
?>