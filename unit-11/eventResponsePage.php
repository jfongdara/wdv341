<?php

    /* 
        Get the id of the record we just entered. We are going to a GET paramters
        Access the database to get the record we just entered
        Use that information on this page to personalize the confirmation message
    
    */

    $eventId = $_GET['eventId'];        //get the parameters from the URL Get name value pair
    


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
    <h1>WDV341 Events Input Response Page</h1>
    <h3>Your Event Has Been Submitted!</h3>
    <h3>Data has been submitted into the database.</h3>
</body>
</html>