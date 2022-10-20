<?php
namespace Models;
 class Pet
 {
    private $name;
    private $age;
    private $specie;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function getSpecie()
    {
        return $this->specie;
    }

    public function setSpecie($specie)
    {
        $this->specie = $specie;

        return $this;
    }
 }


?>