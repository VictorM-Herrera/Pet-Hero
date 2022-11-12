<?php
namespace Models;
 class Pet
 {
    private $name;
    private $id;
    private $owner_id;
    private $age;
    private $specie;
    private $size;

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
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of owner_id
     */ 
    public function getOwner_id()
    {
        return $this->owner_id;
    }

    /**
     * Set the value of owner_id
     *
     * @return  self
     */ 
    public function setOwner_id($owner_id)
    {
        $this->owner_id = $owner_id;

        return $this;
    }
 }


?>