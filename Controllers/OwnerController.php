<?php
namespace Controllers;

use Models\Owner as Owner;
use DAO\OwnerDAO as OwnerDAO;


class OwnerController 
{
    public function HomeOwner()
    {    
        $owner_DAO = new OwnerDAO();

        $user = $owner_DAO->GetById($_SESSION["id"]);

        require_once (VIEWS_PATH . "mainOwner.php");          
    }
    public function profile()
    {    
        if (isset($_SESSION['id']))
        {        
            $owner_DAO = new OwnerDAO();

            $owner = $owner_DAO->GetById($_SESSION["id"]);

            
        }
        else
        {
           require_once (VIEWS_PATH . "LogIn.php");
        }  
    }






}








?>