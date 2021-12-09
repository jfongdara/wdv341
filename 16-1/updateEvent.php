<?php

//if you are a valid user then you can access to this page else redirect to login
session_start();

/* if( isset($_SESSION['validUser']) && $_SESSION['validUser'] ){
   //allow access
}
else{
   //deny access, return to login page/home page
   header('Location: login.php');
} */

/* 
   if(form is submitted){
       process form data
       do database Update stuff
   }
   else{
       display form
       populate the field
   }

*/

   /* 
       Update Algorithm -

           Display available information to update
               use the selecEvents.php page - DONE
           Make a way to select a specific item to be updated - attach a record id
               create an updated link with the record id passed as GET parameter - DONE
           Display the information of the selected item on the update form - same as add/input form
               if(form has been submitted){
                   process form data
                   do database UPDATE stuff
               }
               else{
                   get the selected record from the database
                   populate the fields
                   display the form to the user so they can make changes
               }
           Allow the user to make changes 
           Update the database with information when the user clicks save/update

*/
$newEventId = $_GET['eventId'];

if(isset($_POST['submit'])){
   echo "Form Submitted!";

   $eventClass = $_POST['events_class'];
   $eventDesc = $_POST['events_description'];
   $eventPresenter = $_POST['events_presenter'];
   $eventDate = $_POST['events_date'];


   //connect to database
   try{

       require 'dbConnect.php';

       //need to do an UPDATE

       //create SQL Statement
/*        $sql = "INSERT INTO wdv341_events (events_class, events_description, events_presenter, events_date) 
       VALUES (:eventClass, :eventDesc, :eventPresenter, :eventDate)";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':eventClass',$eventClass);  
       $stmt->bindParam(':eventDesc',$eventDesc); 
       $stmt->bindParam(':eventPresenter',$eventPresenter); 
       $stmt->bindParam(':eventDate',$eventDate); 
       $stmt->execute(); */

       $sql = "UPDATE wdv341_events SET events_class=:eventClass, events_description=:eventDesc, events_presenter=:eventPresenter WHERE events_id=:newEventId";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':eventClass',$eventClass);
       $stmt->bindParam(':eventDesc',$eventDesc);
       $stmt->bindParam(':eventPresenter',$eventPresenter);
       $stmt->bindParam(':newEventId', $newEventId);
       $stmt->execute();
       

  /*      echo "Working so far";          //basic confirnmation message - NEED IMPROVED!
       
       $newEventId = $conn->lastInsertId();

       //send to a 'response page' to display to customer that everything workded
       header('Location: eventResponsePage.php?eventId=1'); */


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

   try{
    require 'dbConnect.php';

    $sql = "SELECT * FROM wdv341_events WHERE events_id=:eventId";
    $stmt = $conn->prepare($sql);           //prepare the statement
    $stmt->bindParam(':eventId',$newEventId);      //bind new
    $stmt->execute();                       //the result Object is still in database format
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //check for success i should have at least 1 row. if no rows i have an error.

}
catch(PDOException $e)
{
        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

        error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
        error_log(var_dump(debug_backtrace()));
    
        //Clean up any variables or connections that have been left hanging by this error.		
    
        //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>Events input Form</title>
<script>
        function recaptcha_callback() {
            let submit = document.querySelector("#submit");
            submit.removeAttribute('disabled');
            submit.style.cursor = "pointer";
        }
    </script>
</head>
<body>
<h1>WDV341 Intro PHP Yo</h1>
<h2>11-1 Input Event Form</h2>
<form method="post" action="updateEvent.php?eventId=<?php echo $newEventId; ?>">

   <p>
       <label for="events_class">Event Name:</label>
       <input type="text" name="events_class" id="events_class" value="<?php echo $result['events_class']; ?>">
   </p>

   <p>
       <label for="events_description">Event Description:</label>
       <input type="text" name="events_description" id="events_description" value="<?php echo $result['events_description']; ?>">
   </p>

   <p>
       <label for="events_presenter">Event Presenter:</label>
       <input type="text" name="events_presenter" id="events_presenter" value="<?php echo $result['events_presenter']; ?>">
   </p>

   <p>
       <label for="events_date">Event Date:</label>
       <input type="date" name="events_date" id="events_date" value="<?php echo $result['events_date']; ?>">
   </p>

   <div class="g-recaptcha" data-sitekey="6Lfj7WsdAAAAAKrsGgGP5M2aDMJO8LygUjlAU1Xm" data-callback="recaptcha_callback"></div>

   <p>
       <input type="submit" value="Submit" name="submit" id="submit" disabled>
       <input type="reset" value="Try Again">
   </p>





</form>
</body>
</html>
<?php
}
?>