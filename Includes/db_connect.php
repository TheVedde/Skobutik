<?php
function db_connect(){
    $mysqli = new mysqli("localhost", "mvez02.skp-dp", "42q32yy2", "mvez02_skp_dp_sde_dk");
    if($mysqli->connect_error) {
        die("Connection Failed: " .$mysqli->connect_error);
    }
    return $mysqli;
}
// $mysqli = db_connect();

