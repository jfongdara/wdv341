<?php
require 'dbConnect.php';
require 'jsonEvent.php';


try {
    $sql = "SELECT * FROM wdv341_events WHERE events_id=2";
    $stmt = $conn->prepare($sql);           //prepare the statement
    $stmt->execute();                       //the result Object is still in database format

    
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $outputObj = new Event();

            $outputObj->setEventId($row['events_id']);
            $outputObj->setEventClass($row['events_class']);
            $outputObj->setEventDescription($row['events_description']);
            $outputObj->setEventPresenter($row['events_presenter']);

        }

        //echo json_encode($eventsArray);         //converts array of all outputObj to JSON


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
    <title>Unit 9 JSON Event Object</title>
</head>
<body>
    <h1>Unit 9 JSON Event Object</h1>
    <?php echo json_encode($outputObj); ?>
</body>
</html>