<?php 
    require ('vendor/autoload.php');

    use Libs\Database\MySql;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $table = new UsersTable(new MySql());
    $all = $table->getAll();
    $auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div style="float:right">
            <a href="profile.php">Profile</a>
            <a href="_actions/logout.php" class="bg-danger">Logout</a>
        </div>
        <h1 class="mb-5 mt-5 fw-lg">
            Manage Users
            <span class="badge bg-danger" ><?= count($all) ?></span>
        </h1>
        <table class="table-striped table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php foreach($all as $user) :?>
                <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->phone ?></td>
                <td><?php if($user->role_id === 1) :?>
                    <span class="bg-secondary badge"><?= $user->role ?></span>
                    <?php elseif($user->role_id === 2 OR $user->role_id === 6) :?>
                    <span class="bg-primary badge"><?= $user->role ?></span>
                    <?php else: ?>
                    <span class="bg-success badge"><?= $user->role ?></span>
                    <?php endif ?>
                </td>
                <td>
                    <?php if($auth->value > "1")  :?>
                        <div class="bth-group dropdown">
                            <a href="#" class="btn btn-sm btn-outline-primary
                             dropdown-toggle" data-bs-toggle="dropdown">Change Role
                            </a>

                            <div class="dropdown-menu dropdown-menu-dark">
                                <a href="_actions/role.php?id=<?= $user->id ?>&role=1" 
                                    class="dropdown-item">User
                                </a>
                                <a href="_actions/role.php?id=<?= $user->id ?>&role=2" 
                                     class="dropdown-item">Manager
                                </a> 
                                <a href="_actions/role.php?id=<?= $user->id ?>&role=3" 
                                    class="dropdown-item">Admin
                                </a>
                            </div>
                            <?php if($user->suspended) :?>
                                <a href="_actions/unsuspend.php?id=<?= $user->id ?>" 
                                class="btn btn-sm btn-danger">Suspended</a>
                            <?php else: ?>
                                <a href="_actions/suspend.php?id= <?= $user->id ?>"
                                class="btn btn-sm btn-success">Active</a>
                            <?php endif ?>
                            <?php if($user->id != $auth->id) :?>
                                <a href="_actions/delete.php?id= <?= $user->id ?>" 
                                class="btn btn-outline-danger">Delete</a>
                            <?php endif ?>
                        </div>
                    <?php else :?>
                        ###
                    <?php endif ?>
                </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

