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

    $errors=[];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $jobReference = sanitize_input($_POST['jobref']);
            $firstName= sanitize_input($_POST['fname']);
            $lastName = sanitize_input($_POST['lname']);
            $dob = $_POST['dob'];
            $gender = $_POST['Gender'];
            $streetAddress = sanitize_input($_POST['street']);
            $suburb = sanitize_input($_POST['suburb']);
            $state = $_POST['state'];
            $postcode = sanitize_input($_POST['postcode']);
            $email = sanitize_input($_POST['email']);
            $phone = sanitize_input($_POST['phone']);
            $html = $_POST['html'];
            $css = $_POST['css'];
            $js = $_POST['js'];
            $php = $_POST['php'];
            $mysql = $_POST['mysql'];
            $otherSkill = $_POST['otherskills'];
            $otherSkillDesc = sanitize_input($_POST['skilldescription']);

        

           
            if (empty($jobReference)){
                $errors[] = "Job Reference is required.<br>";
            } 
            else if (!preg_match('/^\d{5}$/', $jobReference)) {
                $errors[] = "Job Reference must be 5 digit number.<br>";
            }



            
            if (empty($firstName)){
                $errors[] = "First name is required.<br>";
            } 
            else if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstName)) {
                $errors[] = "First name must be 1-20 characters long.<br>";
            }



           
            if (empty($lastName)){
                $errors[] = "Last name is required.<br>";
            } 
            else if (!preg_match("/^[a-zA-Z]{1,20}$/", $lastName)) {
                $errors[] = "Last name must be 1-20 characters long.<br>";
            }



         
            if (empty($dob)){
                $errors[] = "Date of birth is required.<br>";
            } 
            else if (!preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $dob)) {
                $errors[] = "Date of birth must be in the format YYYY-MM-DD.<br>";
            }



           

            if (empty($gender)){
                $errors[] = "Gender is required.<br>";
            } 




            if (empty($streetAddress)){
                $errors[] = "Street Address is required.<br>";
            } 
            else if (!preg_match("/^[a-zA-Z0-9\s]{1,40}$/", $streetAddress)) {
                $errors[] = "Street Address must be 1-40 characters long.<br>";
            }


  
          
            if (empty($suburb)){
                $errors[] = "Suburb is required.<br>";
            } 
            else if (!preg_match("/^[a-zA-Z\s]{1,40}$/", $suburb)) {
                $errors[] = "Suburb must be 1-40 characters long.<br>";
            }


            $states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
            
           
            if (empty($state)){
                $errors[] = "State is required.<br>";
            } 
            else if (!in_array($state, $states)) {
                $errors[] = "State must be one of VIC, NSW, QLD, NT, WA, SA, TAS, ACT.<br>";
            }




            
            if (empty($postcode)){
                $errors[] = "Postcode is required.<br>";
            } 
            else if (!preg_match("/^\d{4}$/", $postcode)) {
                $errors[] = "Postcode must be 4 digits long.<br>";
            }




          
            if (empty($email)){
                $errors[] = "Email is required.<br>";
            } 
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email.<br>";
            }



           
            if (empty($phone)){
                $errors[] = "Phone number is required.<br>";
            } 
            else if (!preg_match("/^[\d\s]{8,12}$/", $phone)) {
                $errors[] = "Phone number must be 8 to 12 digits long.<br>";
            }

           
     

            if (isset($otherSkill) && empty($otherSkillDesc)){
                $errors[] = "Other Skills Description is required when selecting Other Skill.<br>";
                
            }



            if(!empty($errors)){
                echo "<h1>Errors</h1>";

                echo "<ul>";
                foreach ($errors as $error){
                    echo "<li>$error</li>";
                }
                echo "</ul>";


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