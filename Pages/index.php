<?php

include_once '../Includes/db_connect.php';
include_once '../Includes/header.php';

$mysql = db_connect();


echo "Hello";

?>
<div class="container" style="max-width: 400px;">
    
    <form action="/Handlers/shoeFormHandler.php" method="POST">
      <div class="form-group">
        <label for="name">Navn</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="navn" required>
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" id="email" placeholder="email" required>
      </div>
        <div class="form-group">
        <label for="shoesize">skostørrelse</label>
        <input type="number" class="form-control" id="shoesize" placeholder="skostørrelse" required>
      </div>
        <div class="form-group">
        <label for="age">Alder</label>
        <input type="text" class="form-control" id="age" placeholder="Alder" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include_once '../Includes/footer.php';

?>