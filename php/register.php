
<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $filename= '../storage/users.csv';

    $file = fopen($filename, 'a');

    if($file == false) {
        echo 'error opening the file '.$filename;

    }

    fputcsv($file, [$username, $email, $password]);

    fclose($file);

 
    // echo "OKAY";
   echo 'User Successfully registered';
}
//echo "HANDLE THIS PAGE";


