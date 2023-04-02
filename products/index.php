<?php 
    require_once('../confic.php'); 
    get_header(); 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <h4 class="card-title">All Products</h4>
                    <?php if(isset($_REQUEST['success'])):?>
                    <div class="alert alert-success">
                        <?php echo $_REQUEST['success'];  ?>
                    </div> 
                    <?php endif; ?>
                    <div class="table-responsive">
                        
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>product Name</th>
                                    <th>Category</th>
                                    <th>photo</th>
                                    <th>Date</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $products = GetTableData('products');
                                $a=1;
                                foreach($products as $product):
                                ?>
                                <tr>
                                    <td><?php  echo $a;$a++; ?></td>
                                    <td><?php  echo $product['product_name']; ?></td>
                                    <td><?php  echo getProductCategoryName('categorie_name',$product['category_id']); ?></td>
                                    <td> <img width="100" height="100" src="../uploads/products/<?php  echo $product['photo']; ?>" alt=""></td>
                                    <td><?php  echo date('d-m-Y',strtotime($product['created_at'])); ?></td> 
                                    <td>
                                        <a href="prodluct-edit.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
                                        
                                        <a onclick="return confirm('Are you Sure?');" href="product_delete.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
</div>
<?php  get_footer(); ?>

