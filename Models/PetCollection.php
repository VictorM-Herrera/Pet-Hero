<?php 
namespace Models;
require_once "DAO/IPetCollection.php";
require_once "Models/Pet.php";
class PetCollection implements IPetCollection
{
    private $petArray;

    function __construct()
    {
        $petArray= array();
    }

    public function add(Pet $pet)
    {
        array_push($this->petArray, $pet);
    }

    public function getAll()
    {
        return $this->petArray;
    }



    /**
     * añadir, modificar, borrar
     * buscar, mostrar
     */
}

?>