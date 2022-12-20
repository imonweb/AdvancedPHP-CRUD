<?php

include_once('class/config.php');
include_once('class/database.php');

$objDB = new DB();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];

if($_POST['submit'] == "submit"){
  if(isset($id) && !empty($id)){
    //update
    $insertQuery = "UPDATE users"
        . " SET"
        . " first_name = '" . $first_name . "', "
        . " last_name = '" . $last_name . "', "
        . " email = '" . $email . "', "
        . " phone = '" . $phone . "' WHERE id = ' ".$id."'";  
    $objDB->setQuery($insertQuery);  
    $objDB->execute();
    $_SESSION['success_msg'] = 'Data has been updated!';
  } else {
  //  $insertQuery = "INSERT INTO users SET first_name = 'Johnny', last_name = 'BeGood', email = 'johnny@gmail.com', phone = '888-9999-000'";
    // VALUES('Johnny','BeGood','johnny@gmail.com', '888-9999-000')";
  // $insertQuery = "INSERT INTO users"
  //       . " SET"
  //       . " first_name = '" . $first_name . " ', "
  //       . " last_name = ' " . $last_name . " ', "
  //       . " email = ' " . $email . " ', "
  //       . " phone = ' " . $phone . " '";  
  // $objDB->setQuery($insertQuery);
  $objDB->setQuery("INSERT INTO users (first_name, last_name, email, phone) VALUES('Johnny','BeGood','johnny@gmail.com','888-9999-000')");
  // echo $insertQuery; die();
  $objDB->execute();
  $_SESSION['success_msg'] = 'Data has been saved successfully!';
  } // save
  header("location: index.php");
}

if($_GET['action'] == "delete" && !empty($_GET['id'])){
  $deleteValue = $_GET['id'];
  $deleteQuery = "DELETE FROM users WHERE id = '" . $deleteValue . "' ";  
  $objDB->setQuery($deleteQuery);  
  $objDB->execute();
  $_SESSION['success_msg'] = 'Data has been deleted successfully!';
  header("location: index.php");
}
