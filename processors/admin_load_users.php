<?php
include '../connection.php';

$result = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '2'");

for ($i=0; $i < $result->num_rows; $i++) {
    $data = $result->fetch_assoc();
?>
<tr>
    <th scope="row"><?php echo $data["user_id"] ?></th>
    <td><?php echo $data["fname"] ?></td>
    <td><?php echo $data["lname"] ?></td>
    <td><?php echo $data["email"] ?></td>
    <td><?php echo $data["mobile"] ?></td>
    <td><?php 
        if($data["status"] == 1){
            echo "Active";
        } else {
            echo "Inactive";
        }
    ?></td>
</tr>
<?php
}
?>
