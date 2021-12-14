<?php

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailFrom = $_POST['email'];
        $contact = $_POST['contact'];
        $comments = $_POST['comments']; 

        $to = "jfongdara@yahoo.com";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="/js/index.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Vortex Furniture | Acdemic Project | Office Furniture Store</title>
    <script>
        function recaptcha_callback() {
            let submit = document.querySelector("#submit");
            submit.removeAttribute('disabled');
            submit.style.cursor = "pointer";
        }
    </script>
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
                        <div class="viewCart">
                            <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHBwYJKoZIhvcNAQcEoIIG+DCCBvQCAQExggE6MIIBNgIBADCBnjCBmDELMAkGA1UEBhMCVVMxEzARBgNVBAgTCkNhbGlmb3JuaWExETAPBgNVBAcTCFNhbiBKb3NlMRUwEwYDVQQKEwxQYXlQYWwsIEluYy4xFjAUBgNVBAsUDXNhbmRib3hfY2VydHMxFDASBgNVBAMUC3NhbmRib3hfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMA0GCSqGSIb3DQEBAQUABIGAE2SP77s6J9qGIo8YJ948OGJksZ/ifdc3OPjG1QIQIZOcAWpC0bMRd7NIF8eWXbgGSmdCcf6QXI6szUvVmXYIwPn4lp80aJFYFhxyY28R5iCHUudX4GMOJJkcOckHF+u9QGuSYApL/lbyzonrY2LPezbE9gZVY8uHrCHHv/Lz+FcxCzAJBgUrDgMCGgUAMFMGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIDpEOqTeIVKiAMJqZgcmiQakyzE8R2I6dWT9glNwMzUr5N/G3V8mfL+FmySsE51yawVThiBEep3Ja6qCCA6UwggOhMIIDCqADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGYMQswCQYDVQQGEwJVUzETMBEGA1UECBMKQ2FsaWZvcm5pYTERMA8GA1UEBxMIU2FuIEpvc2UxFTATBgNVBAoTDFBheVBhbCwgSW5jLjEWMBQGA1UECxQNc2FuZGJveF9jZXJ0czEUMBIGA1UEAxQLc2FuZGJveF9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwNDE5MDcwMjU0WhcNMzUwNDE5MDcwMjU0WjCBmDELMAkGA1UEBhMCVVMxEzARBgNVBAgTCkNhbGlmb3JuaWExETAPBgNVBAcTCFNhbiBKb3NlMRUwEwYDVQQKEwxQYXlQYWwsIEluYy4xFjAUBgNVBAsUDXNhbmRib3hfY2VydHMxFDASBgNVBAMUC3NhbmRib3hfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC3luO//Q3So3dOIEv7X4v8SOk7WN6o9okLV8OL5wLq3q1NtDnk53imhPzGNLM0flLjyId1mHQLsSp8TUw8JzZygmoJKkOrGY6s771BeyMdYCfHqxvp+gcemw+btaBDJSYOw3BNZPc4ZHf3wRGYHPNygvmjB/fMFKlE/Q2VNaic8wIDAQABo4H4MIH1MB0GA1UdDgQWBBSDLiLZqyqILWunkyzzUPHyd9Wp0jCBxQYDVR0jBIG9MIG6gBSDLiLZqyqILWunkyzzUPHyd9Wp0qGBnqSBmzCBmDELMAkGA1UEBhMCVVMxEzARBgNVBAgTCkNhbGlmb3JuaWExETAPBgNVBAcTCFNhbiBKb3NlMRUwEwYDVQQKEwxQYXlQYWwsIEluYy4xFjAUBgNVBAsUDXNhbmRib3hfY2VydHMxFDASBgNVBAMUC3NhbmRib3hfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAVzbzwNgZf4Zfb5Y/93B1fB+Jx/6uUb7RX0YE8llgpklDTr1b9lGRS5YVD46l3bKE+md4Z7ObDdpTbbYIat0qE6sElFFymg7cWMceZdaSqBtCoNZ0btL7+XyfVB8M+n6OlQs6tycYRRjjUiaNklPKVslDVvk8EGMaI/Q+krjxx0UxggGkMIIBoAIBATCBnjCBmDELMAkGA1UEBhMCVVMxEzARBgNVBAgTCkNhbGlmb3JuaWExETAPBgNVBAcTCFNhbiBKb3NlMRUwEwYDVQQKEwxQYXlQYWwsIEluYy4xFjAUBgNVBAsUDXNhbmRib3hfY2VydHMxFDASBgNVBAMUC3NhbmRib3hfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0yMTEwMTgyMTA0MDFaMCMGCSqGSIb3DQEJBDEWBBQgQyHobrQuKBzqQQwJUKv22IAFYDANBgkqhkiG9w0BAQEFAASBgBajH9Bf/Q+R7U/wuHl0auqbyg/JupPVWYzk94FqvPP1F6GYpAVxS7qQg2Hh/C89UEpyy7jsFX9xRYsgzzX/VR+f0NnBkX/5vu2wXmml6c6OMtf6oYpNxAl4gSprWREe71OUdwSYRCAremfdADFCoQ1HdsQ1buLzwxZrsINQTPjQ-----END PKCS7-----">
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </div>
                    </ul>
                </div>
        </div><!-- End Nav -->
        
        <div class="bg-image d-flex flex-column justify-content-center align-items-center headImage">
            <h1>Welcome To Vortex Furniture</h1>    
        </div>

          <hr>

            <div id="contactSubmission">
                <div>
                    <h1>Contact Submitted</h1>
                    <p>Thank you <?php  echo $_POST['firstname'] . " " . $_POST['lastname'];  ?></p>
                    <p>For contacting Vortex Furniture about your reason of: <?php echo $_POST['contact'] ?></p>
                    <p>We've received your message about <?php echo $_POST['comments'] ?>, and will get back to you asap!</p>    
                </div>
            </div>


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