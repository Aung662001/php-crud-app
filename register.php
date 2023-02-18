<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
    <style>
        .wrap{
            width:100%;
            max-width:400px;
            margin:90px auto;
        }
    </style>
</head>
<body class="text-center">
    <div class="wrap">
        <h2 class="mb3"> Register Page</h2>
        <?php if(isset($_GET['error'])):?>
            <div class="alert alert-warning">
                Cannot create account. Please try again.
            </div>
        <?php endif?>
        <form action="_actions/create.php" method="post">
        <input 
            type="text" 
            name="name" 
            class="name form-control mb-3" 
            placeholder="Enter Your name" >
        </input>
            <input type="email" name="email" class="email form-control mb-3" placeholder="Enter Your email"></input>
            <input type="number" name= "phone" class="phone form-control mb-3" placeholder="Enter Your Phone"></input>
            <textarea name="address" class="address form-control mb-3" placeholder="Enter Your address"></textarea>
            <input type="password" name="password" class="password form-control mb-3" placeholder="Create password" required></input> 
            <button type="submit" class="w-100 btn btn-lg btn-primary">Register</button>
        </form><br>
        <a href="_actions/login.php">Login</a>
    </div>
    
</body>
</html>