<?php 
require_once('confic.php');

if(isset($_POST["login_from"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($username)){
        $error = "User Name Required!";
    }
    elseif(isset($password)){
        $error = "Password Required!";
    }
    else{
        $error = "Login Successfully!";
    }
}
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>User Varification</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.php"><h2>User Varification</h2></a>
                                <?php if(isset($error)) :?>
                                <div class="alert alert-danger">
                                    <?php echo $error; ?>
                                </div>
                                <?php endif; ?>
                                <?php if(isset($success)) :?>
                                <div class="alert alert-success">
                                    <?php echo $success; ?>
                                </div>
                                <?php endif; ?>
                                <form method="POST" action="" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" name="login_from" class="btn login-form__btn submit w-100">login</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="registration.php" class="text-primary">Registration</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>




