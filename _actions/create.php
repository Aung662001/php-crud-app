<?php
include("../vendor/autoload.php");
 use Helpers\HTTP;
 use Libs\Database\MySql;
 use Libs\Database\UsersTable;

 $data = [
    "name" => $_POST['name']?? "unknown",
    "email" => $_POST['email']?? "unknown",
    "phone"=> $_POST['phone']?? "unknown",
    "address"=> $_POST['address']?? "unknown",
    "password" =>md5($_POST['password']),//changed md5
    "role_id"=> 1,
 ];

 $table = new UsersTable(new MySql());
  if($table){
    $table->insert($data);
    HTTP::redirect("/index.php","register=true");
  }else{
    HTTP::redirect("/register.php","error=true");
  }
