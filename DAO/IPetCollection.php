<?php
namespace DAO;
require_once ("../Config/Autoload.php");
use Models\Pet as Pet;
interface IPetCollection
{
    function add(Pet $pet);
    function getAll();
}
?>