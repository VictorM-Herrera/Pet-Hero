<?php
namespace DAO;
require_once "Models/Pet.php";
interface IPetCollection
{
    function add(Pet $pet);
    function getAll();
}
?>