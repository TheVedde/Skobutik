<?php
include '../Includes/db_connect.php';
include '../Includes/header.php';

$mysql = db_connect();

$query = "SELECT * FROM Skobutik_contributers";

$result = $mysql->query($query);

?>
<table class="table table-bordered mx-auto" style="max-width: 700px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Shoesize</th>
    </tr>
  </thead>
  <tbody>

<?php 


if($result->num_rows == 0) {
    
}
else {
   
while($table = $result->fetch_assoc()){

$name = $table['name'];
$age = $table['age'];
$email = $table['email'];
$size = $table['shoeSize'];
 
echo "
    <tr>
  <td>$name</td>
  <td>$email</td>
  <td>$age</td>
  <td>$size</td>
    </tr>";
    }
}
?>
  </tbody>
</table>

<?php
include '../Includes/footer.php';

