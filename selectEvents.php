<?php

    include 'dbConnect.php';

    try {
        $sql = "SELECT * FROM wdv341_events";
            $stmt = $conn->prepare($sql);           //prepare the statement
            $stmt->execute();                       //the result Object is still in database format

        
           //$result = $stmt->fetch(PDO::FETCH_ASSOC);
            //echo $result['events_id'];
            //echo $result['events_name'];
            


        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            echo '<p>';
            echo $row['events_id'];
            echo '</p>';
            echo $row['events_name'];
            echo '<br>';
            echo $row['events_description'];
            echo '<br>';
            echo $row['events_presenter'];
        }


    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>6-1 Create a connection file</h1>
    <h2>All events from the events table</h2>
</body>
</html>