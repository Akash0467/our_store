<?php
require_once('../confic.php');
get_header();

$user_id = $_SESSION['user']['id'];

if(isset($_POST['add_new_form'])){
    $target_directory = "../uploads/products/";

    $product_name = $_POST['product_name'];
    $porduct_cat = $_POST['porduct_cat'];
    $description = $_POST['description'];
    $photo = $_FILES['photo'];
    // $photo = $_POST['stock'];

    $target_file = $target_directory . basename($_FILES["photo"]["name"]);
    $photoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    if(empty($product_name)){
        $error = "Product Name is Required!";
    }
    else if(empty($porduct_cat)){
        $error = "Category is Required!";
    }
    else if(empty($photo['name'])){
        $error = "Photo is Required!";
    }
    else if($photoFileType != "jpg" && $photoFileType != "png" && $photoFileType != "jpeg" ){
        $error = "Photo must be jpg,png and jpeg!";
    }
    else{
        $new_photo_name = $user_id."-".rand(1111,9999)."-".time().'.'.$photoFileType;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_directory.$new_photo_name);

        $now = date('Y-m-d H:i:s');
        $stm=$connection->prepare("INSERT INTO products(user_id,product_name,category_id,description,photo,created_at) VALUES(?,?,?,?,?,?)");
        $stm->execute(array($user_id,$product_name,$porduct_cat,$description,$new_photo_name,$now));

        $success = "Product Create Successfully!";
    }

}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Products</h4>
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
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product_name">Product Name:</label>
                                <input type="text" name="product_name" id="product_name" class="form-control input-default" placeholder="Product Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="porduct_cat">Select Category:</label>
                                <select name="porduct_cat" id="porduct_cat" class="form-control">
                                    <?php 
                                    $products = GetTableData('categories');
                                    foreach($products as $product) :
                                    ?>
                                    <option value="<?php echo $product['id'] ?>"><?php echo $product['categorie_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control summernote" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo:</label>
                                <input type="file" name="photo" id="photo" class="form-control input-default">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="add_new_form" class="btn btn-success" value="Create Product">
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