<?php

    /* //if you are a valid user then you can access to this page else redirect to login
    session_start();

    if( isset($_SESSION['validUser']) && $_SESSION['validUser'] ){
        //allow access
    }
    else{
        //deny access, return to login page/home page
        header('Location: login.php');
    } */

    /* 
        if(form is submitted){
            process form data
            do database stuff
        }
        else{
            display form
        }
    
    */

    if(isset($_POST['submit'])){
        echo "Form Submitted!";

        $eventClass = $_POST['events_class'];
        $eventDesc = $_POST['events_description'];
        $eventPresenter = $_POST['events_presenter'];


        //echo $eventName;
        //echo $eventDesc;
        //echo $eventPresenter;

        //connect to database
        try{

            require '../dbConnect.php';

            //create SQL Statement
            $sql = "INSERT INTO wdv341_events (events_class, events_description, events_presenter) 
            VALUES (:eventClass, :eventDesc, :eventPresenter)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':eventClass',$eventClass);  
            $stmt->bindParam(':eventDesc',$eventDesc); 
            $stmt->bindParam(':eventPresenter',$eventPresenter); 
            $stmt->execute();
            

            echo "Working so far";          //basic confirnmation message - NEED IMPROVED!

            //send to a 'response page' to display to customer that everything workded
            header('Location: eventResponsePage.php?eventId=1');


        }
        catch(PDOException $e)
		{
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
				error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
			
				//Clean up any variables or connections that have been left hanging by this error.		
			
				//header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
		}
        //-connect to database
        //-create SQL Statement
        //-prepare the SQL Statement
        //-bind parameters into the prepared statement
        //-execute the prepared statement
        //display a confirmation message







    }
    else{
        echo "Form Not Submitted!";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events input Form</title>
</head>
<body>
    <h1>WDV341 Intro PHP Yo</h1>
    <h2>11-1 Input Event Form</h2>
    <form method="post" action="inputEvent.php">

        <p>
            <label for="events_class">Event Class:</label>
            <input type="text" name="events_class" id="events_class">
        </p>

        <p>
            <label for="events_description">Event Description:</label>
            <input type="text" name="events_description" id="events_description">
        </p>

        <p>
            <label for="events_presenter">Event Presenter:</label>
            <input type="text" name="events_presenter" id="events_presenter">
        </p>

        <p>
            <input type="submit" value="Submit" name="submit" id="submit">
            <input type="reset" value="Try Again">
        </p>





    </form>
</body>
</html>
<?php
    }
?>