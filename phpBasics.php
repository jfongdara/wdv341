<?php

    
    $yourName = "Justin";

    $asignmentName = "PHP Basics";

    $number1 = 10;

    $number2 = 5;

    $total = 15;

    $languages = array('PHP', 'HTML', 'Javascript');

    $jsLanguages = "";
    foreach ($languages as $value) {
        $jsLanguages .= "'" . $value . "', ";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
    <script>
        <?php
            echo "let languages = [$jsLanguages];";
        ?>
    </script>
</head>
<body>
    <?php echo "<h1>$asignmentName</h1>" ?>
    <h2><?php echo $yourName ?></h2>
    <p><?php echo $number1 . "+" . $number2 . "=" . $total ?></p>
    <p><?php echo $jsLanguages ?></p>
</body>
</html>