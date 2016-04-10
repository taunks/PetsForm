<?php
$q = 'select * from dogs d
    left join breeds b on d.breed_id = b.breed_id';

$result = $con->query($q);

echo '<table>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Breed</th>
			<th>Neutered?</th>
			<th>Vaccinated?</th>
			<th>Modify</th>
		</tr>';
		
while ($row = $result->fetch_object()) {
    echo '<tr>';
    echo '<td>' . $row->dog_name . '</td>';
    echo '<td>' . $row->age . '</td>';
	echo '<td>' . $row->breed_name . '</td>';
	echo('<td>' . (($row->is_fixed==1) ? 'yes' : 'no').'</td>');
	echo('<td>' . (($row->is_vaccinated==1) ? 'yes' : 'no').'</td>');	
	echo '<td><a href="delete-pet.php?id=' . $row->dog_id .
        '">DELETE</a>&nbsp;<a href="edit-pet.php?id=' . $row->dog_id .
            '">EDIT</a></td>';
    echo '</tr>';
}
echo "</table>";

?>
