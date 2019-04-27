<?php

$required = array('name', 'email', 'phone', 'adultsNo', 'children', 'city', 'activity', 'date');

$error = false;
foreach($required as $field) {
if (!isset($_POST[$field])) {
       $error = true; 
    }
    }

if(!$error){
   if(!(is_numeric($_POST['phone']) && is_numeric($_POST['adultsNo']) && is_numeric($_POST[
   'children']))){
       $error=true;
       echo "Numeric entries are required for Phone Number, No.of Adults, and No.of Children<br>";
   }
}

if(!$error){
    if(!validateEmail($_POST['email']))
    {
        $error=true;
        echo "Not a valid Email Address. Please try again.<br>";
    }
 }

if(!$error){
   if(!validateDate($_POST['traveldate'])){
           $error=true;
       echo "Not a valid date. Please try again.<br>";
   }
}

if (!$error) {
echo "All fields are required.</br>";
} else {
    echo "Hello, a client has submitted their information for you to review! <br>";
    
    echo "<br>Name: ".$_POST['name']."
    <br></br>
    Email: ".$_POST['email']."
    <br></br>
    Phone Number: ".$_POST['phone']."
    <br></br>
    No. of Adults: ".$_POST['adultsNo']."
    <br></br>
    No. of Children: ".$_POST['children']."
    <br></br>
    City: ".$_POST['city']."
    <br></br>
    Activity: ".$_POST['activity']."
    <br></br>
    Date: ".$_POST['traveldate'];
    }
    
    function validateEmail($email) {
        // Validate email
       if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           return 1;
       } else {
           return 0;
       }
    }
    
    function validateDate($traveldate, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $traveldate);
        return $d && $d->format($format) === $traveldate;
    }
    
?>
