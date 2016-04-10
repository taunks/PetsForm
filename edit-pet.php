<?php include 'include/mysqli-connect.php' ?>
<?php include "include/header.html" ?>
<?php
    $id = $_GET['id'];
    $result = $con->query(
        "select * from dogs where dog_id = $id");
    if (!$result) {
        echo "<p class\"error\">$con->error</p>";
    } else {
        $pet = $result->fetch_object();
    }
?>
<main>
    <h1>Canine Database</h1>
    <?php include 'include/submit-form.php' ?>
    <?php include 'include/pet-form.php' ?>
    <?php include 'include/get-pets.php' ?>
</main>
<?php include "include/footer.html" ?>
