<?php 
session_start();
require_once('../confic.php');
DeleteTableData('categories',$_REQUEST['id']);

header('location:'.GET_APP_URL().'/categories?success=Delete Succfully!');


?>