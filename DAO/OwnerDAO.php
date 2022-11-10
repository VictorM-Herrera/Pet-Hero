<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;    
    use DAO\Connection as Connection;

    class OwnerDAO implements OwnerDAO
    {
        private $connection;
        private $tableName = "owners";

        public function Add(Owner $owner)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (recordId, firstName, lastName) VALUES (:recordId, :firstName, :lastName);";
                
                $parameters["recordId"] = $student->getRecordId();
                $parameters["firstName"] = $student->getFirstName();
                $parameters["lastName"] = $student->getLastName();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $studentList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $student = new Student();
                    $student->setRecordId($row["recordId"]);
                    $student->setFirstName($row["firstName"]);
                    $student->setLastName($row["lastName"]);

                    array_push($studentList, $student);
                }

                return $studentList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>