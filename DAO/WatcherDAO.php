<?php
    namespace DAO;

    use DAO\ReviewDAO as ReviewDAO;
    use Models\Guardian as Guardian;
    use Models\Review as Review;
    // use to bdd
    use DAO\Connection as Connection;
    use Exception;
    use PDOException;

    class WatcherDAO
    {
        private $guardianList = array();
        private $fileName = ROOT . "Data/Guardianes.json";

        private $connection;

        public function Add(Guardian $guardian)
        {
            try
            {
                $this->connection = Connection::GetInstance();

                $query = "INSERT INTO guardians (first_name, last_name, dni, telephone, address, email, pass, id_size_care, cost)
                      VALUES (:first_name, :last_name, :dni, :telephone, :address, :email, :pass, :id_size_care, :cost)";

                $parameters['first_name'] = $guardian->getName();
                $parameters['last_name'] = $guardian->getLast_name();
                $parameters['dni'] = $guardian->getDni();
                $parameters['telephone'] = $guardian->getTelephone();
                $parameters['address'] = $guardian->getAddress();
                $parameters['email'] = $guardian->getEmail();
                $parameters['pass'] = $guardian->getPassword();
                $parameters['id_size_care'] = $guardian->getSizeCare();
                $parameters['cost'] = $guardian->getCost();

            $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (Exception $e)
            {
                throw $e;
            }
        }

        public function GetAll()
        {
            $guardList = array();

            try
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM guardians";
                $rta = $this->connection->Execute($query);
            }
            catch (Exception $e) 
            {
                throw $e;
            }

            if(!empty($rta))
            {
                foreach ($rta as $row) 
                {
                    $guardian = $this->map($row);
                    array_push($guardList, $guardian);
                }
            }

            return $guardList;
        }

        public function GetById($id){

            $guardList = array();

            try {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM guardians WHERE id_guardian = '$id' ";
                $rta = $this->connection->Execute($query);
            } 
            catch (Exception $e) 
            {
                throw $e;
            }

            if(!empty($rta))
            {
                foreach ($rta as $row) 
                {
                    $guardian = $this->map($row);
                    array_push($guardList, $guardian);
                }

                return $guardList[0];  
            }
            else
            {
                return null;
            }
        }

        public function GetByDni($dni){

            $guardList = array();

            try {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM guardians WHERE dni = '$dni' ";
                $rta = $this->connection->Execute($query);
            } 
            catch (Exception $e) 
            {
                throw $e;
            }

            if(!empty($rta))
            {
                foreach ($rta as $row) 
                {
                    $guardian = $this->map($row);
                    array_push($guardList, $guardian);
                }

                return $guardList[0];  
            }
            else
            {
                return null;
            }
        }

        public function GetByEmail($email){
            
            $guardList = array();

            try {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM guardians WHERE email = '$email' ";
                $rta = $this->connection->Execute($query);
            } 
            catch (Exception $e) 
            {
                throw $e;
            }

            if(!empty($rta))
            {
                foreach ($rta as $row) 
                {
                    $guardian = $this->map($row);
                    array_push($guardList, $guardian);
                }

                return $guardList[0];  
            }
            else
            {
                return null;
            }
        }

        public function GetIdSize($size)
        {
            try 
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT id_size FROM sizes WHERE size = '$size' ";
                $rta = $this->connection->Execute($query);
            } 
            catch (Exception $e) 
            {
                throw $e;
            }

            if (!empty($rta))
            {
                return $rta[0][0];
            }
        }

        public function GetSize($id)
        {
            try 
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT size FROM sizes WHERE id_size = '$id' ";
                $rta = $this->connection->Execute($query);
            } 
            catch (Exception $e) 
            {
                throw $e;
            }

            if (!empty($rta))
            {
                return $rta[0][0];
            }
        }

        public function Update($id, Guardian $guardian)
        {
            try
            {
                $this->connection = Connection::GetInstance();

                $query = "UPDATE guardians SET first_name=:first_name, last_name=:last_name, telephone=:telephone, address=:address, pass=:pass, id_size_care=:id_size_care, cost=:cost
                            WHERE id_guardian = '$id'";

                $parameters['first_name'] = $guardian->getName();
                $parameters['last_name'] = $guardian->getLast_name();
                $parameters['telephone'] = $guardian->getTelephone();
                $parameters['address'] = $guardian->getAddress();
                $parameters['pass'] = $guardian->getPassword();

                if (($guardian->getSizeCare() != 1) || ($guardian->getSizeCare() != 2) || ($guardian->getSizeCare() != 3))
                {
                    $parameters['id_size_care'] = $this->GetIdSize($guardian->getSizeCare());
                }
                else
                {
                    $parameters['id_size_care'] = $guardian->getSizeCare();
                }

                $parameters['cost'] = $guardian->getCost();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (Exception $e)
            {
                throw $e;
            }
        }

        public function Remove($id)
        {
            try {
                $this->connection = Connection::GetInstance();
                $query = "DELETE FROM guardians WHERE id_guardian = '$id' ";
                $rta = $this->connection->ExecuteNonQuery($query);
                
                return $rta;
            } 
            catch (Exception $e) 
            {
                throw $e;
            }
        }

        protected function map ($rta)
        {
            $guardian = new Guardian;

            $guardian->setId_guardian($rta['id_guardian']);
            $guardian->setName($rta['first_name']);
            $guardian->setLast_name($rta['last_name']);
            $guardian->setDni($rta['dni']);
            $guardian->setTelephone($rta['telephone']);
            $guardian->setAddress($rta['address']);
            $guardian->setEmail($rta['email']);
            $guardian->setPassword($rta['pass']);
            $guardian->setSizeCare($this->GetSize($rta['id_size_care']));
            $guardian->setCost($rta['cost']);
            
            return $guardian;

    }
}



?>