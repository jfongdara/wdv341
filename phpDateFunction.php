<?php

    //PHP processing area

    $currentDate;   //define a new variable

    //MM-DD-YYYY format we want

    $date = date_create();      //create current DateTime object

    $outputDate = date_format($date, "m-d-Y");

    $midTermDate = date_create("2021-10-20");       //midterm DateTime object

    $outputMidTermDate = date_format($midTermDate, "M D jS Y");     //didnt need another variable, could put in all one line

    /* 
    
        algorithm for the date handling/displaying
        1. what date do you need to use?
        2. what format will you need to use or display?
        3. where will you display it?
        4. create the date object       - date_create()
        5. format the date object       - date_format()
        6. display where needed           - echo ?
    
    */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Unit-4 Functions and Dates</h2>
    <p>Today is <?php echo $outputDate; ?></p>
    <p>Your Midterm exam will be <?php echo $outputMidTermDate; ?>.</p>
</body>
</html>