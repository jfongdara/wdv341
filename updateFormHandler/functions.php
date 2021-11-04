<?php 
function write_log($log, $location = 'debug.log') {
    error_log(print_r($log, true)."\n\r", 3, $location);
}

/**
 * Validate array by making sure that the data we're working with is in fact an array
 * and that the key we're searching for exists
 */
function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

        //check if form was sent - honeypot
        if($_POST){

            $to = 'some@email.com';
            $subject = 'Testing HoneyPot';
            $header = "From: $name <$name>";

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            //honey pot field
            $honeypot = $_POST['firstname'];

            //check if the honeypot field is filled out. If not, send a mail.
            if( ! empty( $honeypot ) ){
                return; //you may add code here to echo an error etc.
            }else{
                mail( $to, $subject, $message, $header );
            }
        }//end honeypot
?>