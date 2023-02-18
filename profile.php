<?php
include ("vendor/autoload.php");
use Helpers\Auth;
$auth = Auth::check();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body style="background-color:lightgrey; max-width:400px; margin:auto" >
        <div class="container mt-5 text-center">
            <h1 class="mt-5 mb-5">
                <span class=" text-uppercase"><?= $auth->name ?></span>
                <span class="fw-normal text-muted">
                    <?= "( $auth->role )"?>
                </span>
            </h1>   
            <?php if(isset($_GET['error'])) :?>
            <div class="alert alert-warning">
                Cannot upload file
            </div>
            <?php endif ?>
            <?php if($auth -> photo): ?>
                <img 
                    class="img-thumbnail mb-3"
                    src = "_actions/photos/<?= $auth -> photo ?>"
                    alt = "profilePhoto" width="200">
                </img>
            <?php endif?>

           
            <form action="_actions/upload.php" method="post"
                enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="file" name="photo" class="form-control">
                    <button class="btn btn-primary">Upload</button>     
                </div>
           
            <ul class="list-group">
                <li class="list-group-item">
                    <b>Email:</b><?= $auth -> email ?></li>
                <li class="list-group-item"><b>Phone:</b><?= $auth -> phone?> </li>
                <li class="list-group-item"> <b>Address:</b><?= $auth -> address ?></li>

            </ul><br>
            <a href="admin.php">Manage users</a><br>
            <a href='_actions/logout.php'>Logout</a>
        </div>
    </body>
    </html>
<!-- 
   #check user session is exist 
   #check ,error from upload.php , if error show warnning
   #check photo is exist or not and create Profile photo 
   #make a form with method post
     -->