<?php 


session_start();
require_once('../confic.php');

DeleteTableData('products',$_REQUEST['id']);

$url = GET_APP_URL().'/products?success=Delete Successfully!';
 
header("location:$url");


?>