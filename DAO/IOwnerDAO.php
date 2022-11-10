<?php
    namespace DAO;

    use Models\Owner as Owner;
    use DAO\Connection as Connection;

    interface IOwnerDAO
    {
        function Add(Owner $owner);
        function GetAll();
    }
?>