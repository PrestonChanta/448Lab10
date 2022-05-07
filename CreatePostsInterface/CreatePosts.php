<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "p556c035", "Lai9eija", "p556c035");
    /* check connection */
    if ($mysqli->connect_errno) 
        {
            echo"Connect failed: %s\n", $mysqli->connect_error;
            exit(); 
        }

    $post = $_POST["post"];
    $user = $_POST["user"];
    if (!strlen(trim($post)))
    {
        echo "<p>Post is empty. Post was not saved.</p>";
    }
    else if (!strlen(trim($user)))
    {
        echo "<p>User left empty. Post was not saved.</p<";
    }
    else
    {
        $query = "SELECT COUNT(1) FROM Users WHERE user_id='$user'";
        $userQuery = mysqli_query($mysqli,$query);
        $userInTable = mysqli_fetch_row($userQuery);
        
        if ($userInTable[0] == 1)
        {

            $query = "INSERT INTO Posts (`content`, `author_id`) VALUES ('$post','$user')";
            if ($mysqli->query($query) === TRUE) 
            {
                echo "<p>Post successfully saved.<p>";
            }
            else
            {
                echo "Error: " . $query . "<br>" . $mysqli->error;
            }  
        }
        else
        {
            echo "<p>User does not exist. Create a user to post.</p>";
        }
        
    }
    /* close connection */
    $mysqli->close();
?>
