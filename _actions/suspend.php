<?php
     require ('../vendor/autoload.php');
     use Helpers\Auth;
     use Helpers\HTTP;
     use Libs\Database\MySql;
     use Libs\Database\UsersTable;
    
     $auth = Auth::check();
     $table = new UsersTable(new MySql());

     $id = $_GET['id'];

     $table->suspend($id);
     HTTP::redirect('/admin.php');