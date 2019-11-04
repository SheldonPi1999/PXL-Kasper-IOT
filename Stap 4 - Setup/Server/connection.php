<?php
  $username = "pxleai1q_11800991";
  $password = "SglaPNHZEEtU";
  $DB_name  = "pxleai1q_11800991";
  $hostname = "localhost";

  // insert -- add data
  // delete -- data delete 
  // update -- last known value
  // select -- get all data or specific data

  $connection = mysqli_connect ( $hostname, $username, $password );
  $database   = mysqli_select_db ( $connection, $DB_name );
?>

