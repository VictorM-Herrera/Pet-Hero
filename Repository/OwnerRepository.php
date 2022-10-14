<?php
namespace Repository;
require_once("..\Config\Autoload.php");

use Models\Owner as Owner;
use DAO\Irepository as Irepository;
class OwnerRepository implements IRepository
{
    private $OwnerList= array();
    private $FileName;
    public function _construct()
    {
        $this->FileName= dirname(__DIR__)."Data/Owner.json";
    }
    public function Add(Owner $owner)
    {
        $this->RetrieveData;
        array_push($this->OwnerList, $owner);
        $this->SaveData;
    }
    public function GetAll()
    {
        $this->RetrieveData();
        return $this->OwnerList;
    }
    public function SaveData()
    {
        $arraytoencode= array();
        foreach($this->OwnerList as $Owner)
        {
           
            $valuesArray["name"]= $Owner->getName();
            $valuesArray["lastName"]= $Owner->getLastName();
            $valuesArray["birthDay"]= $Owner->getBirthDay();
            $valuesArray["email"]= $Owner->getEmail();
            $valuesArray["password"]= $Owner->getPassword();
            $valuesArray["petList"]= $Owner->getPetList();
            $valuesArray["reputation"]= $Owner->getReputation();
            array_push($arraytoencode,$valuesArray);
        }
        $jsoncontent= json_encode($arraytoencode, JSON_PRETTY_PRINT);
        file_put_contents($this->FileName,$jsoncontent);
    }
    public function RetrieveData()
    {
        $this->OwnerList= array();
        if(file_exists($this->FileName))
        {
            file_get_contents($this->FileName);
            $arraytodecode= ($jsoncontent) ? json_decode($jsoncontent, true) : array();
            foreach ($arraytodecode as $valuesArray) {
                $Owner= new Owner();
                $Owner->setReputation($valuesArray["reputation"]);
                $Owner->setPetList($valuesArray["petList"]);
                $Owner->setName($valuesArray["name"]);
                $Owner->setLastName($valuesArray["lastName"]);
                $Owner->setBirthDay($valuesArray["birthDay"]);
                $Owner->setEmail( $valuesArray["email"]);
                $Owner->setPassword($valuesArray["password"]);

                array_push(this->OwnerList, $Owner);


            }

        }
    }
}



?>