<?php
namespace Models;
use Models\User as User;

class Watcher extends User
{
    private $petType;//tipo de mascota dispuesta a cuidar, ej: Juan perez, cuidador de loros(petType)
    private $expectedPay;//remuneracion que esperan cobrar (su precio)
    private $reputation;//reputacion del cuidador, indica si es bueno haciendo su trabajo. 
    
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
}
?>