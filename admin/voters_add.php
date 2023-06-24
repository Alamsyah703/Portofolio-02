<?php
include 'includes/session.php';

if(isset($_POST['add'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $filename = $_FILES['photo']['name'];
  if(!empty($filename)){
    move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename); 
  }
  $voters_id = $_POST['voters_id'];
  $sql = "INSERT INTO voters (voters_id, password, firstname, lastname, email, photo) VALUES ('$voters_id', '$password', '$firstname', '$lastname', '$email', '$filename')";
  if($conn->query($sql)){
    $_SESSION['success'] = 'Voter added successfully';
  }
  else{
    $_SESSION['error'] = $conn->error;
  }
}
else{
  $_SESSION['error'] = 'Fill up add form first';
}

header('location: voters.php');
?>
