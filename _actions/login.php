<?php
   session_start();
   include ("../vendor/autoload.php");
   use Libs\Database\MySql;
   use Libs\Database\UsersTable;
   use Helpers\HTTP;

    $email = $_POST['email'];
    $password = md5($_POST['password']);//changed md5

    $table = new UsersTable(new MySql());
    print_r ($table);
    $user = $table->findEmailAndPassword($email,$password);
     print_r ($user);
    if($user){
        // if($table->suspended($user->id)){
        //     HTTP::redirect("/index.php","suspended=1");
        // }
            $_SESSION['user'] = $user;
            HTTP:: redirect("/profile.php");
    }else{
        HTTP::redirect("/index.php","incorrect=1");
    }