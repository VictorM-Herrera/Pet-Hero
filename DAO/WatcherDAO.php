<?php
    namespace DAO;


    use Models\Watcher as Watcher;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class WatcherDAO
    {
        private $connection;

        public function Add(Watcher $watcher)
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