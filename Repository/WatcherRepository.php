<?php
namespace Repository;
require_once("../Config/Autoload.php");
use Models\Watcher as Watcher;

class WatcherRepository
{
    private $watcherList = array();
    private $fileName;

    function __construct()
    {
        $this->fileName = dirname(__DIR__)."/DATA/watchers.json";
    }
    public function add(Watcher $watcher)
    {
        $this->retrieveData();
        array_push($this->watcherList, $watcher);
        $this->saveData();
    }

    public function getAll()
    {
        $this->retrieveData();
        return $this->watcherList;
    }

    private function retrieveData()
    {
        $this->watcherList= array();
        if(file_exists($this->fileName))
        {
            $jsonContent= file_get_contents($this->fileName);
            $arrayToDecode= ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $valuesArray) {
                $watcher = new Watcher();
                $watcher->setReputation($valuesArray["reputation"]);
                $watcher->setPetType($valuesArray["petType"]);
                $watcher->setExpectedPay($valuesArray["expectedPay"]);
                $watcher->setName($valuesArray["name"]);
                $watcher->setLastName($valuesArray["lastName"]);
                $watcher->setBirthDay($valuesArray["birthDay"]);
                $watcher->setEmail($valuesArray["email"]);
                $watcher->setPassword($valuesArray["password"]);
                array_push($this->watcherList, $watcher);
            }
        }
    }

    private function saveData()
    {
        $arrayToEncode= array();
        foreach($this->watcherList as $watcher)
        {
            $valuesArray["name"]= $watcher->getName();
            $valuesArray["lastName"]= $watcher->getLastName();
            $valuesArray["birthDay"]= $watcher->getBirthDay();
            $valuesArray["email"]= $watcher->getEmail();
            $valuesArray["password"]= $watcher->getPassword();
            $valuesArray["petType"]= $watcher->getPetType();
            $valuesArray["expectedPay"] = $watcher->getExpectedPay();
            $valuesArray["reputation"]= $watcher->getReputation();
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent= json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);
    }
    
}
?>