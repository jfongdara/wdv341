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
        echo "Form Has Been Submitted"; 
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

            //How do we know that we have a valid user?
/*             $count = $stmt->fetchColumn();

            if($count == ""){
                echo "invalid username/password. Display error and form.";
            }
            else{
                echo "Welcome Back $count";
            } */

            //echo "Found $count rows in event_user table";

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

            echo "Working so far";          //basic confirnmation message - NEED IMPROVED!


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
    <title>Unit 12 Login</title>
</head>
<body>
    <h1>My Company Sign On Page</h1>

<?php

        /* 
            If you have a valid user display block 1
            else display block 2
        */

        if($validUser){

?>
    <div><!-- BLOCK 1 Display this to a valid user AFTER signing on  -->

        <h3>Welcome to the Admind Area for Valid Users</h3>
        <p>You have the following options avaiable as an administrator for</p>

        <ol>
            <li><a href="../unit-11-login/inputEvent.php">Input new products</a></li>
            <li>Delete products from the database</li>
            <li>Select products to update</li>
            <li><a href="./logout.php">log off of admin system</a></li>
        </ol>

    </div>
<?php
        }//end BLOCK 1
        else{
            echo "<h3>$errMsg</h3>";
?>
    <div><!-- BLOCK 2 Display this block when you link ot this page -->
        <form method="post" action="login.php">
            <div>
                <label for="loginName">Username:</label>
                <input type="text" name="loginName" id="loginName" >
            </div>
            <div>
                <label for="loginPassword">Password:</label>
                <input type="password" name="loginPassword" id="loginPassword" >
            </div>
            <div>
                <input type="submit" name="submit" value="Sign On">
                <input type="reset">
            </div>
        </form>        
    </div>
<?php
        }//end BLOCK 2
?>





</body>
</html>