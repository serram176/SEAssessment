<?php

 if(isset($_POST['submit'])){
     
     
    function died($error) {
        // your error code can go here
        echo "Error(s) found within form";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        die();
    }
     
// validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['address1']) ||
        !isset($_POST['address2']) ||
        !isset($_POST['city']) ||
        !isset($_POST['state']) ||
        !isset($_POST['zip']) ||
        !isset($_POST['country'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $address1 = $_POST['address1']; // required
    $address2 = $_POST['address2']; // not required
    $city = $_POST['city']; // required
    $state = $_POST['state']; // not required
    $zip = $_POST['zip']; // not required
    $country = $_POST['country']; // not required
    $error_message = "";
   
    $string_exp = "/^[A-Za-z .'-]+$/";
    $string_zip = "^\\d{5}(-\\d{4})?$";
    $string_city = "^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$";
    $string_add1 = "\d+[ ](?:[A-Za-z0-9.-]+[ ]?)+(?:Avenue|Lane|Road|Boulevard|Drive|Street|Ave|Dr|Rd|Blvd|Ln|St)\.?";
    $string_add2 = "/^[a-zA-Z0-9\s,.'-]{3,}$/."; 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 if(!preg_match($string_add1,$address1)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 if(!preg_match($string_add2,$address2)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 if(!preg_match($string_city,$city)) {
    $error_message .= 'The City you entered does not appear to be valid.<br />';
  }
 if(!preg_match($string_exp,$state)) {
    $error_message .= 'The State you entered does not appear to be valid.<br />';
  }
 if(!preg_match($string_zip,$zip)) {
    $error_message .= 'The Zip Code you entered does not appear to be valid.<br />';
  }
 if(!preg_match($string_exp,$country)) {
    $error_message .= 'The Country you entered does not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
//echo "Your Registration Form was successfully submitted!";

$servername = "localhost";
$username = "serraassessment";
$password = "HelloWorld";
$dbname = "Assessment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Person (First_Name, Last_Name, Address_1,Address_2,City,State,Zip,Country)
VALUES ($first_name,$last_name,$address1,$address2,$city,$state,$zip,$country)";

if ($conn->query($sql) === TRUE) {
    echo "Registration Successfully Submitted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<?php
//}
die();
?>

 