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

    //access the GET parameter from the name/value pair eventId=?
    echo $_GET['productId'];

    $deleteId = $_GET['productId'];

    //-connect to database
    //-create SQL Statement
    //-prepare the SQL Statement
    //-bind parameters (if any)
    //-execute the prepared statement
    //confirm/error check...

    try{

        require '../dbConnect.php';

        $sql = "DELETE FROM vortex_product WHERE product_id=:productId";
        $stmt = $conn->prepare($sql);                   //prepare statment
        $stmt->bindParam(':productId', $deleteId);
        $stmt->execute();

        echo "<h1>Numbers of Rows: " . $stmt->rowCount() . "</h1>";      //how many rows were affected by the previous SQL 

        $numDeletes = $stmt->rowCount();


        //if rowCoun is > 0 assume successful delete of record.
        //Display confirmation page



    }
    catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        //display Error message, Ask user to try again!
        $numDeletes = -1;   //Switch/Flag that tells us what happend. We have an error, so display the ERROR MESSAGE!!
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
                        <li><a href="./furniture.html" class="nav-link me-5">Furniture</a></li>
                        <li><a href="./about.html" class="nav-link me-5">About Us</a></li>
                        <li><a href="./contact.html" class="nav-link me-5">Contact</a></li>
                        <li><a href="./login.php" class="nav-link me-5">Login</a></li>
                    </ul>
                </div>
        </div><!-- End Nav -->
        
        <div class="bg-image d-flex flex-column justify-content-center align-items-center headImage">
            <h1>Vortex Furniture Product Deleted</h1>    
        </div>

        <hr>

        <?php
        //if good delete display confirmation and provide a link to return back to login?
        if($numDeletes > 0){
            //display confirmation it WORKED!!
        }
        else{
            //else display Error message, provide back to selectEvents to try again.  

        }
        ?>

        <hr>
          <!-- Footer  -->
          <div class="footer d-flex justify-content-around">
              <div class="footerNav">
                <h2>Navigation</h2>
                    <ul class="navbar-nav ms-auto me-5">
                        <li><a href="./index.html" class="nav-link me-5">Home</a></li>
                        <li><a href="./furniture.html" class="nav-link me-5">Furniture</a></li>
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