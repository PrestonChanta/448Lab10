<?php
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "p556c035", "Lai9eija", "p556c035");
    /* check connection */
    if ($mysqli->connect_error) 
        {
            die("Connect failed: %s\n". $mysqli->connect_error);
        }

    $user = $_POST["user"];

    if (!strlen(trim($user)))
    {
        echo "<p>User is empty. User was not stored.</p>";
    }
    else
    {
        $query = "SELECT COUNT(1) FROM Users WHERE user_id='$user'";
        $userQuery = mysqli_query($mysqli,$query);
        $userInTable = mysqli_fetch_row($userQuery);
        if ($userInTable[0] == 1)
        {
            echo "<p>User exists. User was not sted. Choose a different name.</p>";   
        }
        else
        {
            $query = "INSERT INTO Users (user_id) VALUES ('$user')";
            if ($mysqli->query($query) === TRUE) 
            {
                echo "<p>User successfully stored.<p>";
            }
            else
            {
                echo "Error: " . $query . "<br>" . $mysqli->error;
            }
        }
        
    }
    
    /* close connection */
    $mysqli->close();
?>
