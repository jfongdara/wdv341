<?php
session_start();
     
                    //Logout
    
        // Clear any session variables related to this user

        session_unset();

        session_destroy();
        


        // Close any connections for this user
       // Redirect back to the site home page
    
    
  

    //$conn->close();     //close a database conncetion

    header('Location: login.php');




?>