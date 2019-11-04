<?php header('Content-type: application/xml'); 
    include("connection.php"); 
?>

<?php 
    /*echo "<?xml version='1.0' 'encoding='UTF-8'?>";*/
    echo "<rss version='2.0'>\n";
    echo "<channel>\n";

    echo "<title>Sensor Data IOT</title>\n";
    echo "<link>http://www.11800991.pxl-ea-ict.be</link>\n";

    $sql_get = "SELECT * FROM SensorData";
    if($result = mysqli_query($connection, $sql_get))
    {
        if(mysqli_num_rows($result) > 0)
        {

            while($row = mysqli_fetch_array($result))
            {
                echo "<item>";
                    echo "<ID>" . $row['ID'] . "</ID>\n";
                    echo "<Sensor>" . $row['Sensor'] . "</Sensor>\n";
                    echo "<Value>" . $row['Value'] . "</Value>\n";
                    echo "<Timestamp>" . $row['TimeStamp'] . "</Timestamp>\n";
                echo "</item>\n";
            }
            // Free result set
            mysqli_free_result($result);
        } 
    }

    echo "</channel>\n";
    echo "</rss>\n";
?>