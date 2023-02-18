<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .wrap{
            width:100%;
            max-width:400px;
            margin:40px auto;
        }
        </style>
</head>
<body class="text-center">
    <div class="wrap">
            <?php if(isset($_GET['incorrect'])) :?>
                <div class="alert alert-warning">
                    incorrect Email or password.
                </div>
                <?php endif?>
                <?php if(isset($_GET["register"])) :?>
                    <div class="alert alert-success">
                        Register Success.
                    </div>
                    <?php endif?>
                <?php if(isset($_GET["suspended"])) :?>
                    <div class="alert alert-danger">
                        Your Account is suspended.
                    </div>
                <?php endif?>
                <form action="_actions/login.php" method="post">
                    <input 
                        type="email" name="email" 
                        class="form-control mb-4"
                        placeholder="Email">
                    <input 
                        type="password"
                        name="password"
                        class="form-control mb-4"
                        placeholder="Password" require>
                    <button type="submit" 
                        class="btn w-100 btn-lg btn-primary">Login</button>
            </form>
            <br>
            <a href="register.php" >Register</a>        
    </div>
</body>
</html>