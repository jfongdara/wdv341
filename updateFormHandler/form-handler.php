<?php


        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $subscription = $_POST['subscription'];
        $specialOffers = $_POST['offers'];
        $findUs = $_POST['findUs'];
        $emailFrom = $_POST['email'];






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submitted</title>
    <style>
        #formSubmitted {
            background-color: coral;
            border-radius: 20px;
            border: 7px solid #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 100px;
            margin-left: 10%;
            margin-right: 10%;
            padding: 40px;
        }
        p {
            font-size: 20px;
        }
        h1 {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div id="formSubmitted">
        <h1>Form Submitted!</h1>
        <p>Thank you <?php echo $firstname . " " . $lastname ?></p>
        <p>You Subscription Type: <?php echo $subscription ?></p>
        <p>Recieve Special Offers: <?php echo $specialOffers ?></p>
        <p>How You Found Us: <?php echo $findUs ?></p>
        <p>A signup confirmation has been sent to <?php echo $emailFrom ?>. Thank you for your support! </p>
    </div>

</body>
</html>