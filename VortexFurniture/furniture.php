<?php
    include '../dbConnect.php';

    try{
        $sql = "SELECT product_name, product_description, product_price, product_image FROM vortex_product;";
        $stmt = $conn->prepare($sql);       //prepare statement
        $stmt->execute();                    //the result Object is still in database format
        
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);       //$result is an ARRAY

        //echo "<h1>" . $result['product_name'] . "</h1>";
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
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

        <div class="bg-image d-flex flex-column justify-content-center align-items-center headFurnitureImage">
            <h1>Our Office Furnitures</h1>    
        </div>
        

          <hr>

          <h1>Furnitures</h1>

        <?php 
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){
        ?>

        <div class="row d-flex justify-content-center flex-row home-card">
            <div class="col-md-4 furniture-card-outer">
                <div class="card text-center furniture-card">
                  <img src="./img/Furniture/<?php echo $result['product_image']; ?>" alt="standup-desk">
                  <div class="card-body">
                      <h2><?php echo $result['product_name']; ?></h2>
                      <p><?php echo $result['product_description']; ?></p>
                      <p>Price: $<?php echo $result['product_price']; ?></p>
                  </div>
                </div>
            </div>
        </div> 

        <?php
            }//end of foreach()
        ?>

<!--           <div class="row home-card">
            <a href="./desk.html" class="col-md-3">
            <div>
                <div class="card text-center">
                  <img src="./img/Furniture/stairway-modular-desk-with-drawers-black.jpeg" alt="office-desk">
                  <div class="card-body display-card">
                      <p>Desk</p>
                  </div>
                </div>
            </div>                
            </a>

            <a href="./chair.html" class="col-md-3">
            <div>
                <div class="card text-center">
                  <img src="./img/Furniture/2020_xchair_x1_grey_flex_headrest_nohmt_02_front_right_r1_3500px.jpeg" alt="office-chair">
                  <div class="card-body display-card">
                      <p>Chair</p>
                  </div>
                </div>
            </div>                
            </a>

            <a href="./tables.html" class="col-md-3">
            <div>
                <div class="card text-center">
                  <img src="./img/Furniture/Table.jpeg" alt="office-table">
                  <div class="card-body display-card">
                      <p>Tables</p>
                  </div>
                </div>
            </div>                
            </a>

            <a href="./cabinets.html" class="col-md-3">
                <div>
                    <div class="card text-center">
                      <img src="./img/Furniture/19f09025-24fa-4742-9550-9c33784cb92f_1.3df3c49d82691181952ebb7c3b89486c.jpeg" alt="cabinets">
                      <div class="card-body display-card">
                          <p>Cabinets</p>
                      </div>
                    </div>
                </div>                
            </a> -->
            
           
<!--             <a href="./digital.html" class="col-md-4 offset-md-4">
                <div>
                    <div class="card text-center">
                    <img src="./img/Furniture/pexels-pixabay-221185.jpg" alt="digital-products">
                        <div class="card-body display-card">
                            <p>Digital Products</p>
                        </div>
                    </div>
                </div>                
            </a>   --> 
            

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