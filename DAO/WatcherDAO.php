<?php
 namespace DAO;
 use Models\Watcher as Watcher;
 use DAO\Connection as Connection;
 use \Exception as Exception;
 
 class WatcherDao
 { 
        
         
     private $connection;
 
     public function Add(Watcher $watcher)
     {
        try {
         $query= "INSERT INTO watchers (idwatchers, name, lastName, birthDay, email, dni, reputation, password, petType, expectedPay, sizecare) VALUES (:idwatchers, :name, :lastName, :birthDay, :email, :dni, :reputation, :password, :petType, :expectedPay, :sizecare);"
                         
             $parameters['idwatchers'] = $watcher->getId();
             $parameters['name'] = $watcher->getName();
             $parameters['lastName'] = $watcher->getLastName();
             $parameters['birthDay'] = $watcher->getBirthDay();
             $parameters['email'] = $watcher->getEmail();
             $parameters['dni'] = $watcher->getDni();         
             $parameters['reputation'] = $watcher->getReputation();
             $parameters['password'] = $watcher->getPassword();
             $parameters['petType'] = $watcher->getPetType();
             $parameters['expectedPay'] = $watcher->getExpectedPay();
             $parameters['sizecare'] = $watcher->getSizecare();
         
             $this->connection = Connection::GetInstance();
             $this->connection->ExecuteNonQuery($query, $parameters);
        }catch (Exception $e)
        {
            throw $e;
        }              
             
     }
     public function GetAll()
     {
         $watchersList = array();
 
         try
         {
             $this->connection = Connection::GetInstance();
             $query = "SELECT * FROM watchers";
             $resultSet = $this->connection->Execute($query);
                 
             foreach ($resultSet as $row) 
             {
                 $watcher= $this->LoadData($row);
                 array_push($watchersList, $watcher);
             }
             return $watchersList;    
         }
         catch (Exception $e)
         {
             throw $e;
         }
 
         
     }
     public function LoadData($resultSet)
     {
         $watcher = new Watcher();
         $watcher->setId($resultSet['idwatchers']);
         $watcher->setName($resultSet['name']);
         $watcher->setLastName($resultSet['lastName'] );
         $watcher->setBirthDay($resultSet['birthDay']);
         $watcher->setEmail($resultSet['email']);
         $watcher->setDni($resultSet['dni']);         
         $watcher->setReputation($resultSet['reputation']);
         $watcher->setPassword($resultSet['password']);
         $watcher->setPetType($parameters['petType']);
         $watcher->setExpectedPay($parameters['expectedPay']);
         $watcher->getSizecare($parameters['sizecare']);
         return $watcher;
     }
     public function GetById($id){
 
         $watchersList = array();
 
         try
         {
             $this->connection = Connection::GetInstance();
             $query = "SELECT * FROM watchers WHERE idwatchers ='$id'";
             $resultSet = $this->connection->Execute($query);
                 
             foreach ($resultSet as $row) 
             {
                 $watcher= $this->LoadData($row);
                 array_push($watchersList, $watcher);
             }
             return $watchersList[0];    
         }
         catch (Exception $e)
         {
             throw $e;
         }
     }
 }
 
 
     
 
 
 

    



?>