<?php
namespace DAO;
use Models\Owner as Owner;
use DAO\Connection as Connection;
use \Exception as Exception;

class OwnerDao
{ 
       
        
    private $connection;

    public function Add(Owner $owner)
    {
       try {
        $query= "INSERT INTO owners (idowners, name, lastName, birthDay, email, dni, reputation, password) VALUES (:idowners, :name, :lastName, :birthDay, :email, :dni, :reputation, :password);"
                        
            $parameters['idowners'] = $owner->getId();
            $parameters['name'] = $owner->getName();
            $parameters['lastName'] = $owner->getLastName();
            $parameters['birthDay'] = $owner->getBirthDay();
            $parameters['email'] = $owner->getEmail();
            $parameters['dni'] = $owner->getDni();         
            $parameters['reputation'] = $owner->getReputation();
            $parameters['password'] = $owner->getPassword();
        
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
       }catch (Exception $e)
       {
           throw $e;
       }              
            
    }
    public function GetAll()
    {
        $ownersList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM owners";
            $resultSet = $this->connection->Execute($query);
                
            foreach ($resultSet as $row) 
            {
                $owner= $this->LoadData($row);
                array_push($ownersList, $owner);
            }
            return $ownersList;    
        }
        catch (Exception $e)
        {
            throw $e;
        }

        
    }
    public function LoadData($resultSet)
    {
        $owner = new Owner();
        $owner->setId($resultSet['idowners']);
        $owner->setName($resultSet['name']);
        $owner->setLastName($resultSet['lastName'] );
        $owner->setBirthDay($resultSet['birthDay']);
        $owner->setEmail($resultSet['email']);
        $owner->setDni($resultSet['dni']);         
        $owner->setReputation($resultSet['reputation']);
        $owner->setPassword($resultSet['password']);
        return $owner;
    }
    public function GetById($id){

        $ownersList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM owners WHERE idowners ='$id'";
            $resultSet = $this->connection->Execute($query);
                
            foreach ($resultSet as $row) 
            {
                $owner= $this->LoadData($row);
                array_push($ownersList, $owner);
            }
            return $ownersList[0];    
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
}


    





?>