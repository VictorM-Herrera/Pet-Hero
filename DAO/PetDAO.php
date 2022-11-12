<?php
    namespace DAO;
    use Models\Pet as Pet;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class PetDAO
    {
        
        private $connection;
        
        
        public function Add(Pet $pet)
        {
            try
            {
                $query = "INSERT INTO pets (idpets, name, idowners, age, specie, size) VALUES (:id_pets, :name, :idowners, :age, :specie, :size)";

                $parameters['idpets'] = $pet->getId();
                $parameters['name'] = $pet->getName();
                $parameters['idowners'] = $pet->getOwner_id();
                $parameters['age'] = $pet->getAge();
                $parameters['specie'] = $pet->getSpecie();
                $parameters['size'] = $pet->getSize();
                
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (Exception $e)
            {
                throw $e;
            }
        }
    
        public function GetAll()
        {
            $petList = array();

            try
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM pets";
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row) 
                {
                    $pet = $this->LoadData($row);
                    array_push($petList, $pet);
                }
                return $petList;
            }
            catch (Exception $e) 
            {
                throw $e;
            }

           
        }
    
        public function GetById($id){
           
            $petList = array();

            try 
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM pets WHERE idpets = '$id' ";
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row) 
                {
                    $pet = $this->LoadData($row);
                    array_push($petList, $pet);
                }

                return $petList[0];
            } 
            catch (Exception $e) 
            {
                throw $e;
            }
            
        }
        public function LoadData($resultSet)
        {
            $pet = new Pet();
            $pet->setId($resultSet['idpets']);
            $pet->setName($resultSet['name']);
            $pet->setOwner_Id($resultSet['idowners']);
            $pet->setAge($resultSet['age']);
            $pet->setSpecie($resultSet['specie']);
            $pet->setSize($resultSet['size']);           
    
            return $pet;
        }
    
    
    
        
    }
?>    