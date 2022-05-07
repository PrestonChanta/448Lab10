<?php
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "p556c035", "Lai9eija", "p556c035");
    /* check connection */
    if ($mysqli->connect_error) 
        {
            die("Connect failed: %s\n". $mysqli->connect_error);
        }

    if(!empty($_POST['posts']))
    {
        echo "<h3>Posts Deleted (post_id):</h3><ul>";
        foreach($_POST['posts'] as $posts)
        {
            $query = "DELETE FROM Posts WHERE post_id=$posts";
            mysqli_query($mysqli,$query);
            echo "<li>" . $posts . "</li>";
        }
        echo "</ul>";
    }
    else
    {
        echo "<p>Nothing checked. Nothing was deleted.</p>";
    }
    $mysqli->close();
?>