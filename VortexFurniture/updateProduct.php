<?php

//if you are a valid user then you can access to this page else redirect to login
session_start();

if( isset($_SESSION['validUser']) && $_SESSION['validUser'] ){
   //allow access
}
else{
   //deny access, return to login page/home page
   header('Location: login.php');
}

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

$newProductId = $_GET['productId'];

if(isset($_POST['submit'])){
   echo "Form Submitted!";

   $productName = $_POST['product_name'];
   $productDesc = $_POST['product_description'];
   $productPrice = $_POST['product_price'];
   $productImage = $_POST['product_image'];


   //connect to database
   try{

       require '../dbConnect.php';

       //need to do an UPDATE

       //create SQL Statement
/*        $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date) 
       VALUES (:eventName, :eventDesc, :eventPresenter, :eventDate)";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':eventName',$eventName);  
       $stmt->bindParam(':eventDesc',$eventDesc); 
       $stmt->bindParam(':eventPresenter',$eventPresenter); 
       $stmt->bindParam(':eventDate',$eventDate); 
       $stmt->execute(); */

       $sql = "UPDATE vortex_product SET product_name=:productName, product_description=:productDesc, product_price=:productPrice, product_image=:productImage WHERE product_id=:newProductId";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':productName',$productName);
       $stmt->bindParam(':productDesc',$productDesc);
       $stmt->bindParam(':productPrice',$productPrice);
       $stmt->bindParam(':productImage',$productImage);
       $stmt->bindParam(':newProductId', $newProductId);
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

    require '../dbConnect.php';

    $sql = "SELECT * FROM vortex_product WHERE product_id=:productId";
    $stmt = $conn->prepare($sql);           //prepare the statement
    $stmt->bindParam(':productId',$newProductId);      //bind new
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="/js/index.js"></script>
    <script>
        function clearErrMsg() {
            document.querySelector('#errMsg').innerHTML = " ";
        }
    </script>
    <style>
                .updateForm {
            background-color: #415A77;
            color: #E0E1DD;
            padding: 35px;
        }


    </style>
    <title>Vortex Furniture | Acdemic Project | Office Furniture Store</title>
</head>
<body> <!-- Hides functions hideOptions() onload page -->
    <div class="container-fluid myContainer">

        <div class="navbar navbar-expand-md navbar-light sticky-top" id="myNavBar">
            <a class="navbar-brand myBrand" href="index.html">
                <img src="./img/vortex-logo-white.png" width="100" height="100" alt="vortex-logo">
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Togge navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="toggleMobileMenu">
                    <ul class="navbar-nav ms-5">
                        <li><a href="./index.html" class="nav-link me-5">Home</a></li>
                        <li><a href="./furniture.php" class="nav-link me-5">Furniture</a></li>
                        <li><a href="./about.html" class="nav-link me-5">About Us</a></li>
                        <li><a href="./contact.html" class="nav-link me-5">Contact</a></li>
                        <li><a href="./login.php" class="nav-link me-5">Login</a></li>
                    </ul>
                </div>
        </div><!-- End Nav -->
        
        <div class="bg-image d-flex flex-column justify-content-center align-items-center headImage">
            <h1>Updating <?php echo $result['product_name']; ?> Furniture</h1>    
        </div>

        <hr>

        <div class="d-flex justify-content-center">
            <form method="post" action="updateProduct.php?productId=<?php echo $newProductId; ?>" class="updateForm">


            <p>
                <h3>Updating <?php echo $result['product_name']; ?> Furniture</h3>
            </p>

            <p>
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" id="product_name" value="<?php echo $result['product_name']; ?>">
            </p>

            <p>
                <label for="product_description">Product Description:</label>
                <input type="text" name="product_description" id="product_description" value="<?php echo $result['product_description']; ?>">
            </p>

            <p>
                <label for="product_price">Product Price:</label>
                <input type="text" name="product_price" id="product_price" value="<?php echo $result['product_price']; ?>">
            </p>

            <p>
                <label for="product_image">Product Image Name:</label>
                <input type="text" name="product_image" id="product_image" value="<?php echo $result['product_image']; ?>">
            </p>

            <p>
                <input type="submit" value="Submit" name="submit" id="submit">
                <input type="reset" value="Reset">
            </p>

            <p>
                <button><a href="furnitureAdmin.php">Back</a></button>
            </p>
            
            </form>
        </div>


        <hr>
          <!-- Footer  -->
          <div class="footer d-flex justify-content-around">
              <div class="footerNav">
                <h2>Navigation</h2>
                    <ul class="navbar-nav ms-auto me-5">
                        <li><a href="./index.html" class="nav-link me-5">Home</a></li>
                        <li><a href="./furniture.php" class="nav-link me-5">Furniture</a></li>
                        <li><a href="./about.html" class="nav-link me-5">About Us</a></li>
                        <li><a href="./contact.html" class="nav-link me-5">Contact</a></li>
                        <li><a href="./login.php" class="nav-link me-5">Login</a></li>
                    </ul>
              </div>
              <div class="footerNav">
                <h2>Furniture</h2>
                    <ul class="navbar-nav ms-auto me-5">
                        <li><a href="#" class="nav-link me-5">Desk</a></li>
                        <li><a href="#" class="nav-link me-5">Chairs</a></li>
                        <li><a href="#" class="nav-link me-5">Tables</a></li>
                        <li><a href="#" class="nav-link me-5">Cabinets</a></li>
                    </ul>
              </div>
              <div class="footerNav">
                  <h2>Help</h2>
                  <ul class="navbar-nav ms-auto me-5">
                      <li><a href="#" class="nav-link me-5">Customer Service</a></li>
                      <li><a href="#" class="nav-link me-5">FAQ</a></li>
                      <p>5959 Grand Ave, West Des Moines, IA 50266</p>
                      <p>Hours: Mon-Fri 9:00am-8:00pm</p>
                      <p>© Copyright 2021. Vortex Furniture</p>
                  </ul>
              </div>
          </div>

    </div>
    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>