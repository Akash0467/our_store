<?php
require_once('../confic.php');
get_header();

$user_id = $_SESSION['user']['id'];

if(isset($_POST['add_new_form'])){
    $manufactue_name = $_POST['manu_name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $mobilecount = GetColumnCount('manufactures','mobile',$mobile);

    if(empty($manufactue_name)){
        $error = "Manufacture Name is Required!";
    }
    else if(empty($address)){
        $error = "Address is Required!";
    }
    else if(empty($mobile)){
        $error = "Mobile Number is Required!";
    }    
    else if(!is_numeric($mobile)){
        $error = "Mobile Number must be Number!";
    }    
    else if(strlen($mobile) != 11){
        $error = "Mobile Number must be 11 Digits!";
    }    
    elseif($mobilecount !=0){
        $error = "Mobile Number olready used!";
    }
    else{
        $now = date('Y-m-d H:i:s');
        $stm=$connection->prepare("INSERT INTO manufactures(user_id,manu_name,address,mobile, created_at) VALUES(?,?,?,?,?)");
        $stm->execute(array($user_id,$manufactue_name,$address,$mobile,$now));

        $success = "Manufacture Create Successfully!";
    }

}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Manufacture</h4>
                    <hr> 
                    <?php if(isset($error)):?>
                    <div class="alert alert-danger">
                        <?php echo $error;  ?>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($success)):?>
                    <div class="alert alert-success">
                        <?php echo $success;  ?>
                    </div> 
                    <?php endif; ?>

                    <div class="basic-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="manu_name">Manufacture Name:</label>
                                <input type="text" name="manu_name" id="manu_name" class="form-control input-default" placeholder="Manufacture Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-control input-default" placeholder="Enter Your Address Number">
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile Number:</label>
                                <input type="number" name="mobile" id="mobile" class="form-control input-default" placeholder="Enter Your Mobile Number">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="add_new_form" class="btn btn-success" value="Create Manufacture">
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
            
    </div>
</div>
<?php  get_footer(); ?>

?>