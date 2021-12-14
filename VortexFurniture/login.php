<?php

    session_start();            //allows access to the application session

    /* 
        if(form is submitted){
            process form data
            do database stuff
        }
        else{
            display form
        }
    
    */

    $validUser = false;     //assume invalid user until signed on
    $errMsg = "";

    if(isset($_POST['submit'])){
        //echo "Form Has Been Submitted"; 
        //PROCESS THE LOGIN INFORMATION AGAINST THE DATABASE

        $loginName = $_POST['loginName'];
        $loginPassword = $_POST['loginPassword'];

        //-connect to database
        //-create SQL Statement
        //-prepare the SQL Statement
        //-bind parameters into the prepared statement
        //-execute the prepared statement
            //How do we tell that we have a valid user
                //if the SELECT Returns at Least one record assume a valid user
                //if the SELECT Returns 0 records then assume an invalid user

            //if you have a valid username/password then display admin info
            //else display Invalid user/password and dispaly the form again!
        

        try{
            require '../dbConnect.php';
            
            $sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name=:userName AND event_user_password=:userPW";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':userName',$loginName);
            $stmt->bindParam(':userPW',$loginPassword);
            $stmt->execute();


            //How do we know that we have a valid user? - fetchAll() technique
            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numRows = count($resultArray);
            //echo "Number of rows found: $numRows";

            if($numRows == 1){
                //Valid user
                //Display admin options
                //set session variable for this user
                $_SESSION['validUser'] = true;
                $validUser = true;
            }
            else{
                //Invalid user $validUser = false; here
                //Display Form and Error Message "Invalid username/password"
                $errMsg = "Invalid username/password. Please try again!";
            }

            //echo "Working so far";          //basic confirnmation message - NEED IMPROVED!


        }
        catch(PDOException $e)
		{
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
				error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
			
				//Clean up any variables or connections that have been left hanging by this error.		
			
				//header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
		}
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
                        <li><a href="./furniture.php" class="nav-link me-5">Furniture</a></li>
                        <li><a href="./about.html" class="nav-link me-5">About Us</a></li>
                        <li><a href="./contact.html" class="nav-link me-5">Contact</a></li>
                        <li><a href="./login.php" class="nav-link me-5">Login</a></li>
                    </ul>
                </div>
        </div><!-- End Nav -->
        
        <div class="bg-image d-flex flex-column justify-content-center align-items-center headImage">
            <h1>Vortex Furniture Login</h1>    
        </div>

        <hr>

        <?php
            if($validUser){ //block 1
        ?>

        <div class="d-flex flex-column justify-content-center align-items-center"><!-- BLOCK 1 Display this to a valid user AFTER signing on  -->

            <h3>Welcome to the Admin Area for Vortex Furniture Admins</h3>
            <p>You have the following options avaiable as an administrator for</p>
    
            <ol>
                <li><a href="inputProduct.php">Input new products</a></li>
                <li><a href="furnitureAdmin.php">Delete products from the database</a></li>
                <li><a href="furnitureAdmin.php">Select products to update</a></li>
                <li><a href="logout.php">log off of admin system</a></li>
            </ol>
    
        </div>
          

        <?php
            }//end BLOCK 1
        else{
            
        ?>
        <div class="login d-flex flex-column justify-content-center align-items-center"><!-- BLOCK 2 Display this block when you link ot this page -->
            <form action="login.php" method="post">
                <h1>Login Admin</h1>

                <p id="errMsg">
                    <?php echo "<h3>$errMsg</h3>"; ?>
                </p>

                <p>
                    <input type="text" id="loginName" name="loginName" placeholder="User Name">                    
                </p>


                <p>
                    <input type="password" id="loginPassword" name="loginPassword" placeholder="Password">                    
                </p>


                <input type="submit" name="submit" value="Submit" id="submit">
                <input type="reset" id="reset" value="Reset" name="reset" onclick="clearErrMsg()">
            </form>
        </div>
        <?php
                }//end BLOCK 2
        ?>
        


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