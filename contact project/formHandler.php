<?php

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailFrom = $_POST['email'];
        $contact = $_POST['contact'];
        $comments = $_POST['comments']; 

        $to = "jfongdara@dmacc.edu";
        $subject = $contact;
        $message = "From: " . $firstname . " " . $lastname . " " . $emailFrom . " " . "Message is: " . $comments ;
        $headers =  "From: contact@justinfongdara.com" . "\r\n";
    
        //mail($to,$subject,$message,$headers);
        if(mail($to,$subject,$message,$headers) ) {
            //echo "Email Sent on";
        }
        else{
            //echo "Email failed";
        }  
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="./img/JF-Favicon.png">
    <title>Justin Website</title>
    <style>
        #contactSubmission {
            background-color: #333;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 100px;
            margin-left: 10%;
            margin-right: 10%;
            padding: 50px;
        }

        div:nth-child(2) h1 {
            color: #359bcb;
            font-size: 40px;
            text-shadow: 5px 7px 5px black;
        }

        p {
            color: white;
            padding-top: 15px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <nav id="navbar">
                <div class="container">
                    <h1 class="logo"><a href="/index.html">JSTN</a></h1>
                    <ul>
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="homwork.html">Homework</a></li>
                        <li><a class="current" href="contact.html">Contact</a></li>
                        <!--
                        <li><a href="../wdv205/wdv205.html">WDV205</a></li>
                        <li><a href="../wdv221/wdv221.html">WDV221</a></li>
                        <li><a href="../wdv151/wdv151.html">WDV151</a></li>
                        <li><a href="../wdv240/wdv240.html">WDV240</a></li>
                        -->
                    </ul>  
                </div>
            </nav>
        </header>

        <div id="contactSubmission">
            <div>
                <h1>Contact Submitted</h1>
                <p>Thank you <?php  echo $_POST['firstname'] . " " . $_POST['lastname'];  ?></p>
                <p>For contacting me about your reason of: <?php echo $_POST['contact'] ?></p>
                <p>Ive received your message about <?php echo $_POST['comments'] ?>, and will get back to you asap!</p>    
            </div>
        </div>

    </div>
</body>
</html>