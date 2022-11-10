<?php
    function searchRepository($array1, $email, $pass){
        $flag= false;
        foreach($array1 as $user)//recorro los watchers primero
        {
            if($user->getEmail() == $email && $user->getPassword() == $pass)
            {
                $flag=true;
            }
        }
        return $flag;
    }