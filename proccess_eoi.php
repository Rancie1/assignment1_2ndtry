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
    function sanitize_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    require_once "settings.php";


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $err_msg = "";

            if (isset($_POST['jobref']) && !empty($_POST['jobref'])) {
                $jobReference = sanitize_input($_POST['jobref']);
            }
            if ($jobReference == ""){
                $err_msg .= "<p>Job Reference is required.</p>";
            } 
            else if (!preg_match("/^[a-zA-Z0-9]{5}$/", $jobReference)) {
                $err_msg .= "<p>Job Reference must be 5 characters long.</p>";
            }



            if (isset($_POST['fname']) && !empty($_POST['fname'])) {
                $firstName= sanitize_input($_POST['fname']);
            } 
            if ($firstName == ""){
                $err_msg .= "<p>First name is required.</p>";
            } 
            else if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstName)) {
                $err_msg .= "<p>First name must be 1-20 characters long.</p>";
            }



            if (isset($_POST['lname']) && !empty($_POST['lname'])) {
                $lastName = sanitize_input($_POST['lname']);
            }
            if ($lastName == ""){
                $err_msg .= "<p>Last name is required.</p>";
            } 
            else if (!preg_match("/^[a-zA-Z]{1,20}$/", $lastName)) {
                $err_msg .= "<p>Last name must be 1-20 characters long.</p>";
            }



            if (isset($_POST['dob']) && !empty($_POST['dob'])) {
                $dob = sanitize_input($_POST['dob']);
            } 
            if ($dob == ""){
                $err_msg .= "<p>Date of birth is required.</p>";
            } 
            else if (!preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $dob)) {
                $err_msg .= "<p>Date of birth must be in the format YYYY-MM-DD.</p>";
            }



            if (isset($_POST['Gender']) && !empty($_POST['Gender'])){
                $gender = $_POST['Gender'];
            }

            if ($gender == ""){
                $err_msg .= "<pGender is required.</p>";
            } 




            if (isset($_POST['street']) && !empty($_POST['street'])) {
                $streetAddress = sanitize_input($_POST['street']);
            } 
            if ($streetAddress == ""){
                $err_msg .= "<p>Street Address is required.</p>";
            } 
            else if (!preg_match("/^[a-zA-Z0-9\s]{1,40}$/", $streetAddress)) {
                $err_msg .= "<p>Street Address must be 1-40 characters long.</p>";
            }


  
            if (isset($_POST['suburb']) && !empty($_POST['suburb'])) {
                $suburb = sanitize_input($_POST['suburb']);
            } 
            if ($suburb == ""){
                $err_msg .= "<p>Suburb is required.</p>";
            } 
            else if (!preg_match("/^[a-zA-Z\s]{1,40}$/", $suburb)) {
                $err_msg .= "<p>Suburb must be 1-40 characters long.</p>";
            }


            $states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
            
            if (isset($_POST['state']) && !empty($_POST['state'])) {
                $state = $_POST['state'];
            }
            if ($state == ""){
                $err_msg .= "<p>State is required.</p>";
            } 
            else if (!in_array($state, $states)) {
                $err_msg .= "<p>State must be one of VIC, NSW, QLD, NT, WA, SA, TAS, ACT.</p>";
            }




            if (isset($_POST['postcode']) && !empty($_POST['postcode'])) {
                $postcode = sanitize_input($_POST['postcode']);
            } 
            if ($postcode == ""){
                $err_msg .= "<p>Postcode is required.</p>";
            } 
            else if (!preg_match("/^\d{4}$/", $postcode)) {
                $err_msg .= "<p>Postcode must be 4 digits long.</p>";
            }




            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = sanitize_input($_POST['email']);
            } 
            if ($email == ""){
                $err_msg .= "<p>Email is required.</p>";
            } 
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err_msg .= "<p>Invalid email format.</p>";
            }



            if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                $phone = sanitize_input($_POST['phone']);
            } 
            if ($phone == ""){
                $err_msg .= "<p>Phone number is required.</p>";
            } 
            else if (!preg_match("/^[\d\s]{8,12}$/", $phone)) {
                $err_msg .= "<p>Phone number must be 8 to 12 digits long.</p>";
            }

            
            $html = $_POST['html'];
            $css = $_POST['css'];
            $js = $_POST['js'];
            $php = $_POST['php'];
            $mysql = $_POST['mysql'];
            $otherSkill = $_POST['otherskills'];
            $otherSkillDesc = sanitize_input($_POST['skilldescription']);

            if (isset($otherSkill) && empty($otherSkillDesc)){
                $err_msg .= "<p>Other Skills Description is required when selecting Other Skill.</p>";
                
            }

            if (!empty($err_msg)){
                echo $err_msg;
                echo "<p>Go back to <a href='apply.html'>Application Form</a></p>";
        
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo '<pre>';
                print_r($_POST); // Output the contents of the $_POST array for debugging
                echo '</pre>';
            }
            echo "<h1>Thank you for your application $firstName</h1>";
        
            if (isset($gender)){
                echo "<p>youre gender is $gender</p>";
            }
            
        } else {
            echo "<p>Form data is missing.!!!</p>";
        }
    
?>
</body>