<?php 
session_start();
require_once('../confic.php');
DeleteTableData('manufactures',$_REQUEST['id']);

header('location:'.GET_APP_URL().'/manufactures?success=Delete Succfully!');


?>