<?php
namespace Repository;
require_once("..\Config\Autoload.php");

use Models\Owner as Owner;
use Models\Pet as Pet;
class OwnerRepository
{
    private $ownerList = array();
    private $fileName;

    public function __construct()
    {
        $this->fileName= dirname(__DIR__)."/DATA/owners.json";
    }
    public function add(Owner $owner)
    {
        $this->retrieveData();
        array_push($this->ownerList, $owner);
        $this->saveData();
    }
    public function getAll()
    {
        $this->retrieveData();
        return $this->ownerList;
    }
    //MODIFICAR JSON
    public function modify($owner)//llega el usuario ya modificado y lo almaceno donde estaba el otro
    {
        $this->retrieveData();
        //var_dump($this->ownerList);
        for($x=0; $x< count($this->ownerList);$x++){
            if($this->ownerList[$x]->getEmail() == $owner->getEmail())
            {
                $this->ownerList[$x] = $owner;
            }
        }
        $this->saveData();

    }
    //PHP TO JSON
    private function saveData()
    {
        $arrayToEncode= array();
        foreach($this->ownerList as $Owner)
        {
           
            $valuesArray["name"]= $Owner->getName();
            $valuesArray["lastName"]= $Owner->getLastName();
            $valuesArray["birthDay"]= $Owner->getBirthDay();
            $valuesArray["email"]= $Owner->getEmail();
            $valuesArray["password"]= $Owner->getPassword();
            $valuesArray["petList"]= array();
            foreach($Owner->getPetList() as $petOwned)
            {
                
                $petArray["name"]= $petOwned->getName();
                $petArray["age"]= $petOwned->getAge();
                $petArray["specie"]= $petOwned->getSpecie();
                array_push($valuesArray["petList"], $petArray);
            }                
            

            $valuesArray["reputation"]= $Owner->getReputation();
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent= json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);
    }
    //JSON TO PHP
    private function retrieveData()
    {
        $this->ownerList= array();
        if(file_exists($this->fileName))
        {
            $jsonContent= file_get_contents($this->fileName);
            $arrayToDecode= ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $valuesArray) {
                $Owner= new Owner();
                $Owner->setReputation($valuesArray["reputation"]);
                
                foreach($valuesArray["petList"] as $petOwned)
                {
                    $petAux= new Pet();
                    $petAux->setName($petOwned["name"]);
                    $petAux->setAge($petOwned["age"]);
                    $petAux->setSpecie($petOwned["specie"]);
                    $Owner->addPet($petAux);
                }
                $Owner->setName($valuesArray["name"]);
                $Owner->setLastName($valuesArray["lastName"]);
                $Owner->setBirthDay($valuesArray["birthDay"]);
                $Owner->setEmail( $valuesArray["email"]);
                $Owner->setPassword($valuesArray["password"]);
                array_push($this->ownerList, $Owner);
            }
        }
    }
}



?>