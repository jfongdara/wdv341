<?php

    //access the GET parameter from the name/value pair eventId=?
    echo $_GET['eventId'];

    $deleteId = $_GET['eventId'];

    //-connect to database
    //-create SQL Statement
    //-prepare the SQL Statement
    //-bind parameters (if any)
    //-execute the prepared statement
    //confirm/error check...

    try{

        require 'dbConnect.php';

        $sql = "DELETE FROM wdv341_events WHERE events_id=:eventId";
        $stmt = $conn->prepare($sql);                   //prepare statment
        $stmt->bindParam(':eventId', $deleteId);
        $stmt->execute();

        echo "<h1>Numbers of Rows: " . $stmt->rowCount() . "</h1>";      //how many rows were affected by the previous SQL 

        $numDeletes = $stmt->rowCount();


        //if rowCoun is > 0 assume successful delete of record.
        //Display confirmation page



    }
    catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        //display Error message, Ask user to try again!
        $numDeletes = -1;   //Switch/Flag that tells us what happend. We have an error, so display the ERROR MESSAGE!!
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>15-1 Delete Event Page</h1> 
    <p><a href="selectEventsDelete.php">back</a></p>
    <?php
        //if good delete display confirmation and provide a link to return back to login?
        if($numDeletes > 0){
            //display confirmation it WORKED!!
        }
        else{
            //else display Error message, provide back to selectEvents to try again.  

        }




    ?>
</body>
</html>