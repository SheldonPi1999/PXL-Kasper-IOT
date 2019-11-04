<?php
    include("connection.php");

    $sql_insert_02 = "INSERT INTO Devices (ID, Sensor, LastValue, LastTimeStamp, IP) VALUES ('".$_GET["ID"]."', '".$_GET["Sensor"]."', '".$_GET["LastValue"]."', '".$_GET["LastTimeStamp"]."', '".$_GET["IP"]."')";
   
    if(mysqli_query($connection , $sql_insert_02))
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