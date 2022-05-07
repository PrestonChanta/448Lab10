<?php
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "p556c035", "Lai9eija", "p556c035");
    /* check connection */
    if ($mysqli->connect_error) 
        {
            die("Connect failed: %s\n". $mysqli->connect_error);
        }

        $query = "SELECT * FROM Users";
        $result = mysqli_query($mysqli,$query);

        echo "<style>
        table, th
        {
            border:1px solid black;
        }
        .center 
        {
            margin-left: auto;
            margin-right: auto;
        }
          </style>";
        
        echo "<table class='center'><tr><th>Usernames</th></tr>";
        while($row = mysqli_fetch_array($result)){ 
            echo "<tr><td>" . $row['user_id'] . "</td><tr>"; 
            }
            
            echo "</table>";
    
    /* close connection */
    $mysqli->close();
?>
