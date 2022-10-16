<?php
    require_once("roam-array.php");
    require_once("../Config/Autoload.php");
    use Repository\OwnerRepository as OwnerRepository;
    use Repository\WatcherRepository as WatcherRepository;
    use Models\Owner as Owner;
    use Models\Watcher as Watcher;

    if($_POST)
    {
        $watcherRepo= new WatcherRepository();
        $ownerRepo = new OwnerRepository();
        $email = $_POST["email"];
        $pass = $_POST["password"];
        if(call_user_func_array("searchRepository", array($watcherRepo->getAll(), $email, $pass)) == true)//si encuentra al usuario entre los guardianes
        {
            session_start();
            $loggedUser = new Watcher();
            $loggedUser->setEmail($email);
            $loggedUser->setPassword($pass);
            $_SESSION["loggedUser"] = $loggedUser;

            header("location: ../Visual/main.php");
        }
        if(call_user_func_array("searchRepository", array($ownerRepo->getAll(), $email, $pass)) == true)//si encuentra al usuario entre los cuidadores
        {
            session_start();
            $loggedUser= new Owner();
            $loggedUser->setEmail($email);
            $loggedUser->setPassword($pass);
            $_SESSION["loggedUser"] = $loggedUser;

            header("location: ../Visual/main.php");

        }
        if(call_user_func_array("searchRepository", array($ownerRepo->getAll(), $email, $pass)) != true && call_user_func_array("searchRepository", array($watcherRepo->getAll(), $email, $pass)) != true)
        {
            header("location: ../index.php");
        }
        
    }
    ?>