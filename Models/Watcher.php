<?php
namespace Models;

class Watcher
{
    private $petType;//tipo de mascota dispuesta a cuidar, ej: Juan perez, cuidador de loros(petType)
    private $expectedPay;//remuneracion que esperan cobrar (su precio)
    private $reputation;//reputacion del cuidador, indica si es bueno haciendo su trabajo. 
    

    /**
     * Get the value of petType
     */ 
    public function getPetType()
    {
        return $this->petType;
    }

    /**
     * Set the value of petType
     *
     * @return  self
     */ 
    public function setPetType($petType)
    {
        $this->petType = $petType;

        return $this;
    }

    /**
     * Get the value of expectedPay
     */ 
    public function getExpectedPay()
    {
        return $this->expectedPay;
    }

    /**
     * Set the value of expectedPay
     *
     * @return  self
     */ 
    public function setExpectedPay($expectedPay)
    {
        $this->expectedPay = $expectedPay;

        return $this;
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
}
?>