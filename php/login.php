<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}

function loginUser($email, $password){
    $filename= '../storage/users.csv';
   

    $GLOBALS['found'] = false;

    if (($file = fopen($filename, "r")) !== FALSE) {
        while (($line = fgetcsv($file)) !== FALSE) {
            // print_r($line);
            
            if(($line[1] == $email) && ($line[2] == $password)) {
                $GLOBALS['found'] =  true;
                $_SESSION['username'] = $line[0];
                header("Location: /userAuth/dashboard.php");
              
                break;
            }
         }
    }

if($GLOBALS['found'] == false){
    header("Location: /userAuth/forms/login.html");
}
 
    
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
}

//echo "HANDLE THIS PAGE";

