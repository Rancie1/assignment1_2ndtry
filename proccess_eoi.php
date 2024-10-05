<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rohirrim Booking</title>
	<meta charset="utf-8">
	<meta name="description" content="PHP" >
	<meta name="keywords"    content="PHP" >
	<meta name="author"      content="Nathan Rancie" />
    

</head>

<body>
<?php
    
    
    
    require_once "settings.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['jobref']) && isset($_POST['fname']) && isset($_POST['lname'])) {
            $jobReference = $_POST['jobref'];
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $streetAddress = $_POST['street'];
            $suburb = $_POST['suburb']; 
            $state = $_POST['state'];
            $postcode = $_POST['postcode'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $html = $_POST['html'];
            $css = $_POST['css'];
            $js = $_POST['js'];
            $php = $_POST['php'];
            $mysql = $_POST['mysql'];
            $otherSkill = $_POST['otherSkill'];
    
            echo "<h1>Thank you for your application, $firstName</h1>";
        } else {
            echo "<p>Form data is missing.</p>";
        }
    } else {
        echo "<p>No form submission detected.</p>";
    }
    
?>
</body>