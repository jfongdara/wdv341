<?php

    include 'dbConnect.php';

    try {
        $sql = "SELECT * FROM wdv341_events";
            $stmt = $conn->prepare($sql);           //prepare the statement
            $stmt->execute();                       //the result Object is still in database format

        
           //$result = $stmt->fetch(PDO::FETCH_ASSOC);
            /* echo $result['events_id'];
            echo $result['events_class'];
            echo $result['events_description'];
            echo $result['events_presenter']; */
            


/*         foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            echo '<p>';
            echo $row['events_id'];
            echo '</p>';
            echo $row['events_name'];
            echo '<br>';
            echo $row['events_description'];
            echo '<br>';
            echo $row['events_presenter'];
        } */


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
    <title>7-1 SelectEvents</title>
    <style>
        table, th, td {
        border:2px solid black;
        background-color: rgb(30, 127, 184);
        color: white;
        padding: 10px;
        margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <h1>15-1 Delete functionality and 16-1 Update functionality</h1>
    <h2>All events from the events table</h2>
    
<?php 
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){
?>
    <table>
        <tr>
            <th>ID</th>
            <th>Class</th>
            <th>Description</th>
            <th>Presenter</th>
            <th>Update Event</th>
            <th>Delete Event</th>
        </tr>
        <tr>
        <td><?php echo $result['events_id']; ?></td>
          <td><?php echo $result['events_class']; ?></td>
          <td><?php echo $result['events_description']; ?></td>
          <td><?php echo $result['events_presenter']; ?></td>
          <td><?php echo "<p><a href='updateEvent.php?eventId=" .  $result['events_id'] . "'>Update Event</a></p>"; ?></td>
          <td><?php echo "<p><a href='deleteEvent.php?eventId=" .  $result['events_id'] . "'>Delete Event</a></p>"; ?></td>
        </tr>
      </table>
<?php
    }//end of foreach()
?>
</body>
</html>