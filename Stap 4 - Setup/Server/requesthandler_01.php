<?php
    include("connection.php");

    $sql_insert_01 = "INSERT INTO SensorData (ID, Sensor, Value, TimeStamp) VALUES ('".$_GET["ID"]."', '".$_GET["Sensor"]."', '".$_GET["Value"]."', '".$_GET["TimeStamp"]."')";
   
    if(mysqli_query($connection , $sql_insert_01))
    {
        echo "Done";
        mysqli_close($connection);
    } 
    
    else 
    {
        echo "Error is " . mysqli_error($connection);
    }

    echo '<br><br><br>';
    echo '<form action="index.php" method="get">';
    echo '<input type="submit">';
    echo '</form>';
?>