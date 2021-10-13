<?php

//#1
function outputdate() {
    // #1
    $date = date_create();      //create current DateTime object

    $outputDate = date_format($date, "m/d/Y");

    echo $outputDate;
}

//#2
function outputdate2() {
    
    $date2 = date_create();      //create current DateTime object

    $outputDate2 = date_format($date2, "d/m/Y");

    echo $outputDate2;
}

//#3
function stringInput() {
    //string variable stored in $str
    $str = "DMACC West Campus is nice";
    echo($str);
        //Display the number of characters in the string
        echo("<br>" . "Number of characters: ");
            echo(strlen($str));
        //Trim any leading or trailing whitespace
        echo("<br>" . "Trim: ");
            echo(trim($str));
        //Display the string as all lowercase characters
        echo("<br>" . "Lowercase: ");
            echo(strtolower($str));
        //Will display whether or not the string contains "DMACC" either upper or lowercase
        
        echo("<br>" . "Does string contain DMACC: ");
            if(strpos($str, "DMACC") !== false){
                echo "DMACC Found!";
            } else{
                echo "DMACC Not Found!";
            }
        
}

//#4
function formattedPhone($number){
    //only digits no characters allowed
    $number = preg_replace("/[^\d]/","",$number);

    //get number length
    $length = strlen($number);

    //checking to see if phone number is 10 digits
    if($length == 10) {
        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
    }
    return $number;
}

//#5
  function formatUSD($numberUSD) {
    echo "I have &dollar;" , number_format($numberUSD, 2, '.', ',');
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4-1 PHP Functions</title>
</head>
<body>
    <h1>4-1 PHP Functions</h1>
    <h2>1. Create a function that will accept a timestamp and format it into mm/dd/yyyy format.</h2>
    <?php echo outputdate() ?>
    <h2>2. Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.</h2>
    <?php echo outputdate2() ?>
    <h2>3. Create a function that will accept a string input.  It will do the following things to the string:</h2>
        <ul>
            <li>Display the number of characters in the string</li>
            <li>Trim any leading or trailing whitespace</li>
            <li>Display the string as all lowercase characters</li>
            <li>Will display whether or not the string contains "DMACC" either upper or lowercase</li>
        </ul>
    <?php echo stringInput() ?>
    <h2>4. Create a function that will accept a number and display it as a formatted phone number.   Use 1234567890 for your testing.</h2>
    <?php echo formattedPhone(1234567890) ?>
    <h2>5. Create a function that will accept a number and display it as US currency with a dollar sign.  Use 123456 for your testing.</h2>
    <?php formatUSD(123456) ?>
</body>
</html>