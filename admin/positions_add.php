<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $description = $_POST['description'];
    $max_vote = $_POST['max_vote'];
    $start_date = $_POST['start_date']; // Ambil nilai start_date dari form
    $end_date = $_POST['end_date']; // Ambil nilai end_date dari form

    $sql = "SELECT * FROM positions ORDER BY priority DESC LIMIT 1";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    $priority = $row['priority'] + 1;

    $sql = "INSERT INTO positions (description, max_vote, priority, start_date, end_date) VALUES ('$description', '$max_vote', '$priority', '$start_date', '$end_date')";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Position added successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: positions.php');
?>
