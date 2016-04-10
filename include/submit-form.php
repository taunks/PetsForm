<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dog_name = $_POST['name'];
    $age = $_POST['age'];
	$breed_id = $_POST['breeds'];
	$is_fixed = $_POST['fixed'];
	$is_vaccinated = $_POST['vax'];
    try {
        if (empty($dog_name) || empty($age)) {
            throw new Exception(
                "All fields required.");
        }

        if (isset($pet)) {
            $id = $pet->dog_id;

            $q = "update dogs 
						set 
							dog_name = '$dog_name',
							age = $age,
							breed_id = $breed_id,
							is_fixed = '$is_fixed',
							is_vaccinated = '$is_vaccinated'
						where dog_id = $id";
        } else {

            $q = "insert dogs (dog_name, age, breed_id, is_fixed, is_vaccinated)
                values ('$dog_name', $age, $breed_id, '$is_fixed', '$is_vaccinated')";
        }

        $result = $con->query($q);
        if (!$result) {
            throw new Exception($con->error);
        }
        header('Location: index.php'); 
    } catch(Exception $e) {
        echo '<p class="error">Error: ' .
        $e->getMessage() . '</p>';
    }
}
?>
