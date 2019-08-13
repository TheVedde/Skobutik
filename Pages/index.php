<?php

include_once '../Includes/db_connect.php';
include_once '../Includes/header.php';

$mysql = db_connect();

$response = '';
$alert_type = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
    switch ($status) {
        case 1:
            $response = ' Thank you for your participation';
            $alert_type = 'success';
            break;
        case 2:
            $response = ' There seems to be a problem. Please try again later';
            $alert_type = 'warning';
            break;
        case 3:
            $response = 'You have already participated.';
            $alert_type = 'secondary';
            break;
    }  
}
?>

<?php if (!empty($response)): ?>
<div class="alert alert-<?php echo $alert_type; ?> alert-dismissible fade show" role="alert">
  <strong>Hey</strong> <?php echo $response; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
<div class="card mx-auto" style="max-width: 400px; margin-top: 30px;">
    <div class="card-body">
         <h5 class="card-title text-center">Registrer din skostørrelse</h5>
        <form action="../Handlers/shoeFormHandler.php" method="POST">
          <div class="form-group">
            <label for="name">Navn</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="navn" required>
          </div>
          <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
          </div>
            <div class="form-group">
            <label for="shoesize">skostørrelse</label>
            <input type="number" class="form-control" id="shoesize" name="shoesize" placeholder="skostørrelse" required min="5" max="60">
          </div>
            <div class="form-group">
            <label for="age">Alder</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Alder" required min="10" max="100">
          </div>      
    </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

<?php
include_once '../Includes/footer.php';

?>