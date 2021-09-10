<?php

    //Line comment

    /*
        block comment
    */

    //define some PHP variables

    $firstName = "Justin";
    $lastName = "Fongdara";

    $totalSales = 123.45;

    echo "<h1>$firstName</h1>";     //pay attention to the variable within the quotes

    function processSales(){
        //code goes here
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
    <h1>WDV341 Intro PHP</h1>
    <h2>PHP Syntax Examples</h2>

    <h3>Salesperson: <?php echo $firstName. " " .$lastName ?> </h3>
    <p>Total sales from today: <?php echo $totalSales; ?></p>
</body>
</html>