<?php
    include 'include/mysqli-connect.php';
    $id = $_GET['id'];
    $q = "delete from dogs where dog_id = $id";
    $result = $con->query($q);

    if (!$result) {
        echo "Error: " . $con->error;
    } else {
        header('Location: index.php');
    }
?>
