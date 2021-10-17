<?php

    include 'dbConnect.php';

    try {
        //$sql = "SELECT product_name, FROM wdv341_products;";
        //$sql = "SELECT * FROM wdv341_events";
        $sql = "SELECT events_id, events_class, events_description, events_presenter FROM wdv341_events";
            $stmt = $conn->prepare($sql);           //prepare the statement
            $stmt->execute();                       //the result Object is still in database format

        
           $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Document</title>
    <style>
        table, th, td {
        border:2px solid black;
        background-color: rgb(30, 127, 184);
        color: white;
        padding: 10px;
        }
    </style>
</head>
<body>
    <h1>7-1 Create selectEvents</h1>
    <h2>All events from the events table</h2>

    <table>
        <tr>
            <th>Class</th>
            <th>Description</th>
            <th>Presenter</th>
        </tr>
        <tr>
          <td><?php echo $result['events_class']; ?></td>
          <td><?php echo $result['events_description']; ?></td>
          <td><?php echo $result['events_presenter']; ?></td>
        </tr>
      </table>
</body>
</html>