<?php 
require_once('../confic.php');
// session_start();
get_header();
// $id = $_REQUEST['id'];
$id = $_SESSION['user']['id'];

if(isset($_POST['profile_update_from'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $business_name=$_POST['businessname'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $date_of_birth=$_POST['date_of_birth'];

    $usernameCount = inputCount('username',$username);

    if(empty($name)){
        $error = "Name is required!";
    }
    elseif(empty($username)){
        $error = "Username is required!";
    }
    elseif($usernameCount !=0){
        $error = "Username olready used!";
    }
    elseif(empty($business_name)){
        $error = "Business Name is required!";
    }
    elseif(empty($address)){
        $error = "Address is required!";
    }
    elseif(empty($date_of_birth)){
        $error = "Date Of birth is required!";
    }
    else{
        $now = date('Y-m-d H:i:s');
        $created_at = date('Y-m-d H:i:s');
        $stm = $connection->prepare("UPDATE users SET name=?,username=?,buisnessname=?,address=?,gender=?,date_of_birth=?,created_at=? WHERE id=?");
        $stm->execute(array($name,$username,$business_name,$address,$gender,$date_of_birth,$created_at,$id));

        $success = "Profile Update Successfully!"; 

        // if($insert == true){
        //     $success = "User Registration Success!";

        //     // Sent Email For Verification
        //     $message = "Your Verification Code is: ".$email_code;
        //     mail($email,"Email Verification",$message);

        //     $_SESSION['user_email'] = $email;
        //     $_SESSION['user_mobile'] = $mobile;

        //     header('location:varification.php');

        // }
        // else{
        //     $error ="Registration Failed!";
        // }
    }
}

?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Our Store Registration</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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

    



    <div class="login-form-bg h-100 pt-3 pb-5">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-9">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                <a class="text-center" href="index.php"> <h2>Profile Update</h2></a>
                                <?php if(isset($error)) :?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <?php if(isset($success)) :?>
                                <div class="alert alert-success"><?php echo $success; ?></div>
                                <?php endif; ?>
                                <form method="POST" action="" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"  placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"  placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="businessname" class="form-control"  placeholder="Businame Name">
                                    </div>
                                    <div class="form-group">
                                          <textarea class="form-control" name="address" placeholder="Address" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label> &nbsp;
                                        <label><input type="radio" value="male" name="gender" checked> Male</label>&nbsp;&nbsp;
                                        <label><input type="radio" value="female" name="gender"> Female</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="date_of_birth" class="form-control"  placeholder="Date Of Birth">
                                    </div>
                                    <button type="submit" name="profile_update_from" class="btn login-form__btn submit w-100">Update</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Have account <a href="login.php" class="text-primary">Login</a> now</p>
                                    </p>
                                </div>
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
<?php get_footer();?>





