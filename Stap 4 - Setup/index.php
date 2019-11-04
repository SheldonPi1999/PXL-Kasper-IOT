<!DOCTYPE html>
<html>
    <head>
        <title>UNDER DEVELOPMENT</title>
        <style>table,th,td {border : 1px solid black; padding: 5px;}</style>
    </head>

    <body>
        <h1>SensorData Form: </h1>
        <div id="formsection_01">
            <form action="requesthandler_01.php" method="get">
                Sensor: <input type="text" name="Sensor"><br>
                Value: <input type="value" name="Value"><br>
                Timestamp: <input type="text" name="TimeStamp"><br>
                <input type="submit">
            </form>
        </div>

        <br><br><br>

        <h1>Devices Form: </h1>
        <div id="formsection_02">
            <form action="requesthandler_02.php" method="get">
                Sensor: <input type="text" name="Sensor"><br>
                LastValue: <input type="value" name="LastValue"><br>
                LastTimestamp: <input type="text" name="LastTimeStamp"><br>
                IP - Address: <input type="text" name="IP"><br>
                <input type="submit">
            </form>
        </div>

        <br><br><br>

        <h1>Live Data: </h1>
        <div id="tablesection_01">
            <?php
                include("connection.php");
                // Attempt select query execution
                $sql = "SELECT * FROM SensorData";
                //$sql_get_spec = "SELECT * FROM SensorData WHERE sensorID = $row['SensorID']"
                
                $JSON_array = array();
                
                $result = mysqli_query($connection, $sql);

                $i = 0;      
                while($row = mysqli_fetch_assoc($result))
                {
                    $JSON_array[] = $row;
                    $i++;
                }
                
                mysqli_close($connection);

                echo "<table>";
                    echo "<thead>";
                        echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Sensor</th>";
                                echo "<th>Value</th>";
                                echo "<th>TimeStamp</th>";
                        echo "</tr>";
                    echo "</thead>";

                    echo "<tbody>";
                        for($j = 0 ; $j < $i ; $j++)
                        {
                            echo "<tr>";
                                echo "<td>" . $JSON_array[$j]['ID'] . "</td>";
                                echo "<td>" . $JSON_array[$j]['Sensor'] . "</td>";
                                echo "<td>" . $JSON_array[$j]['Value'] . "</td>";
                                echo "<td>" . $JSON_array[$j]['TimeStamp'] . "</td>";
                            echo "</tr>";
                        }
                    echo "</tbody>";
                echo "</table>";
                
                // Free result set
                mysqli_free_result($result);
            ?>
        </div>

        <br><br><br>
             
        <input type="text" id="myInput_01" onkeyup="InputFilter(1)" placeholder="Search for Device name...">
        <input type="text" id="myInput_02" onkeyup="InputFilter(2)" placeholder="Search for Specific YEAR...">
        <h1>Known Devices: </h1>
        <div id="tablesection_02">
            <?php
                    include("connection.php");
                    // Attempt select query execution
                    $sql = "SELECT * FROM Devices";
                    //$sql_get_spec = "SELECT * FROM SensorData WHERE sensorID = $row['SensorID']"
                    
                    $JSON_array = array();
                    
                    $result = mysqli_query($connection, $sql);

                    $i = 0;      
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $JSON_array[] = $row;
                        $i++;
                    }
                    
                    mysqli_close($connection);

                    echo "<table>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Sensor</th>";
                                echo "<th>LastValue</th>";
                                echo "<th>LastTimeStamp</th>";
                                echo "<th>IP</th>";
                            echo "</tr>";
                        echo "</thead>";

                        echo "<tbody>";
                            for($j = 0 ; $j < $i ; $j++)
                            {
                                echo "<tr>";
                                    echo "<td>" . $JSON_array[$j]['ID'] . "</td>";
                                    echo "<td>" . $JSON_array[$j]['Sensor'] . "</td>";
                                    echo "<td>" . $JSON_array[$j]['LastValue'] . "</td>";
                                    echo "<td>" . $JSON_array[$j]['LastTimeStamp'] . "</td>";
                                    echo "<td>" . $JSON_array[$j]['IP'] . "</td>";
                                echo "</tr>";
                            }
                        echo "</tbody>";
                    echo "</table>";
                    
                    // Free result set
                    mysqli_free_result($result);
            ?>
        </div>

        <script> //Ajax
            function InputFilter(a) 
            {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue, b;
                if(a == 1)
                {
                    input = document.getElementById("myInput_01");
                    b = 1;
                }

                else if(a == 2)
                {
                    input = document.getElementById("myInput_02");
                    b = 3;
                }
                
                filter = input.value.toUpperCase();
                table = document.getElementById("tablesection_02");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) 
                {
                    td = tr[i].getElementsByTagName("td")[b];
                    
                    if (td) 
                    {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) 
                        {
                            tr[i].style.display = "";
                        } 
                        
                        else 
                        {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>

        <br><br><br>
    
    </body>

    <?php  
        include("connection.php");
        if(!$connection == 1){echo "No connection.";}       
        else {echo "Connection succesfull!";}
    ?>

</html>

