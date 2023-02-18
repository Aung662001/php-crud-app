<?php 
    include ("../vendor/autoload.php");
    use Helpers\Auth;
    use Helpers\HTTP;
    use Libs\Database\MySql;
    use Libs\Database\UsersTable;

    $table = new UsersTable(new MySql());
    $auth = Auth::check();

    $error = $_FILES['photo']['error'];
    $name = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $type = $_FILES['photo']['type'];


if($error){
    header('location: ../profile.php?error=file');
    exit();
}
if($type === "image/jpeg" or $type === "image/png" or $type ==='image/jpg' or $type ==="image/jpeg"){
    $table->updatePhoto($auth->id,$name);
    move_uploaded_file($tmp,"photos/$name");
    $auth->photo = $name;
    HTTP::redirect('/profile.php');
}else{
    HTTP::redirect('/profile.php?error=type');
}