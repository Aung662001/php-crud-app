<?php
     require ('../vendor/autoload.php');
     use Helpers\Auth;
     use Helpers\HTTP;
     use Libs\Database\MySql;
     use Libs\Database\UsersTable;
    
     $auth = Auth::check();
     $table = new UsersTable(new MySql());

     $id = $_GET['id'];
     $role = $_GET['role'];

     $table->changeRole($id,$role);
     HTTP::redirect('/admin.php');