<?php
namespace Repository;
require_once("..\Config\Autoload.php");

use Models\Watcher as Watcher;
use DAO\Irepository as Irepository;
class OwnerRepository implements IRepository
{
    private $WatcherList= array();
    private $FileName;
    public function _construct()
    {
        $this->FileName= dirname(__DIR__)."Data/Watcher.json";
    }
    public function Add(Watcher $Watcher)
    {
        $this->RetrieveData;
        array_push($this->WatcherList, $Watcher);
        $this->SaveData;
    }
    public function GetAll()
    {
        $this->RetrieveData();
        return $this->WatcherList;
    }
    public function SaveData()
    {
        $arraytoencode= array();
        foreach($this->WatcherList as $Watcher)
        {
           
            $valuesArray["name"]= $Watcher->getName();
            $valuesArray["lastName"]= $Watcher->getLastName();
            $valuesArray["birthDay"]= $Watcher->getBirthDay();
            $valuesArray["email"]= $Watcher->getEmail();
            $valuesArray["password"]= $Watcher->getPassword();
            $valuesArray["petType"]= $Watcher->getPetType();
            $valuesArray["expectedPay"]= $Watcher->getExpectedPay();
            $valuesArray["reputation"]= $Watcher->getReputation();
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
                $Watcher= new Watcher();
                $Watcher->setReputation($valuesArray["reputation"]);
                $Watcher->setExpectedPay($valuesArray["expectedPay"]);
                $Watcher->setPetType($valuesArray["petType"]);
                $Watcher->setName($valuesArray["name"]);
                $Watcher->setLastName($valuesArray["lastName"]);
                $Watcher->setBirthDay($valuesArray["birthDay"]);
                $Watcher->setEmail( $valuesArray["email"]);
                $Watcher->setPassword($valuesArray["password"]);

                array_push(this->WatcherList, $Watcher);


            }

        }
    }
}



?>