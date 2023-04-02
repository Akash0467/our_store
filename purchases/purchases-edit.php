<?php
require_once('../confic.php');
get_header();

$id = $_REQUEST['id'];


$user_id = $_SESSION['user']['id'];

if(isset($_POST['update_form'])){
    $namufacture_name = $_POST['manu_name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $mobileCount = GetColumnCount('manufactures','mobile',$mobile);

    $stm = $connection->prepare("SELECT mobile FROM manufactures WHERE mobile=? And id=?");
    $stm->execute(array($mobile,$id));
    $onemobilecount=$stm->rowCount(); 


    if(empty($namufacture_name)){
        $error = "Manufacture Name is Required!";
    }
    else if(empty($address)){
        $error = "Address is Required!";
    }
    else if($mobileCount != 0 AND $onemobilecount !=1){
        $error = "Mobile Number Already Exists!";
    } 
    else{
        $now = date('Y-m-d H:i:s');
        $stm=$connection->prepare("UPDATE manufactures SET manu_name=?,address=?,mobile=? WHERE user_id=? AND id=?");
        $stm->execute(array($namufacture_name,$address,$mobile,$user_id,$id));

        $success = "Manufacture Update Successfully!";
    }

}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Manufactures</h4>
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
                            <?php 
                            $manu_data = GetSingleData('manufactures',$id);

                            ?>
                            <div class="form-group">
                                <label for="manu_name">Manufacture Name:</label>
                                <input type="text" name="manu_name" id="manu_name" class="form-control input-default" value="<?php echo $manu_data['manu_name'];?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Addres:</label>
                                <input type="text" name="address" id="address" class="form-control input-default" value="<?php echo $manu_data['address'];?>">
                            </div>

                            <div class="form-group">
                                <label for="mobile">Addres:</label>
                                <input type="text" name="mobile" id="mobile" class="form-control input-default" value="<?php echo $manu_data['mobile'];?>">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="update_form" class="btn btn-success" value="Update">
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