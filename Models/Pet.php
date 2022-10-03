<?php
namespace Models;
 class Pet
 {
    private $name;
    private $age;
    private $id;
    private $specie;


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

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
     * Get the value of specie
     */ 
    public function getSpecie()
    {
        return $this->specie;
    }

    /**
     * Set the value of specie
     *
     * @return  self
     */ 
    public function setSpecie($specie)
    {
        $this->specie = $specie;

        return $this;
    }
 }


?>