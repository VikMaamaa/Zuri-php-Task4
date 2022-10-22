<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

if(isset($_POST['submit'])){
    $email =  $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    //if it does, replace the password
    $i = 0;
    $newdata = [];
    $filename= '../storage/users.csv';
    
    if (($file = fopen($filename, "r")) !== FALSE) {
        while (($line = fgetcsv($file)) !== FALSE) {
            // print_r($line);
          
            if(($line[1] == $email) ) {
                $newdata[$i]  = [$line[0], $email, $newpassword];
            }else {
                $newdata[$i]  = [$line[0], $line[1], $line[2]];
            }
            $i++; 
         }
        
    }

    $fp = fopen($filename, 'w');    
    foreach ($newdata as $rows) {
        fputcsv($fp, $rows);
    }    
    fclose($fp);
}
echo "Password Reset Succesfull";


