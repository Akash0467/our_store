<?php 
    require_once('../confic.php'); 
    get_header(); 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <h4 class="card-title">All Categories</h4>
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
                                    <th>Category Name</th>
                                    <th>Category Slug</th>
                                    <th>Date</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $catgories = GetTableData('categories');
                                $a=1;
                                foreach($catgories as $category):
                                ?>
                                <tr>
                                    <td><?php  echo $a;$a++; ?></td>
                                    <td><?php  echo $category['categorie_name']; ?></td>
                                    <td><?php  echo $category['categorie_slug']; ?></td>
                                    <td><?php  echo date('d-m-Y',strtotime($category['created_at'])); ?></td> 
                                    <td>
                                        <a href="categorie-edit.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
                                        
                                        <a onclick="return confirm('Are you Sure?');" href="categorie-delete.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

