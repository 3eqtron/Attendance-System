<?php
 
$servername = "localhost";
 
// for testing the user name is root.
$username = "root";
 
// the password for testing is "blank"
$password = "";
 
// below is the name for our
// database which we have added.
$dbname = "pointage";
  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 // an array to display response
 $response = array();
 // on below line we are checking if the body provided by user contains
 // this keys as course name,course description and course duration
 if($_POST['nom'] && $_POST['sex'] && $_POST['email'] && $_POST['mobile']){
     // if above three parameters are present then we are extravting values
     // from it and storing it in new variables.
     $nom = $_POST['nom'];
     $sex = $_POST['sex'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];
     // after that we are writing an sql query to
     // add this data to our database.
     // on below line make sure to add your table name
     // in previous article we have created our table name
     // as courseDb and add all column headers to it except our id.
     $stmt = $conn->prepare("UPDATE  `tag` (`nom`, `sex`, `email`,`mobile`) VALUES (?,?,?,?)");
     $stmt->bind_param("sss",$courseName,$courseDuration,$courseDescription);
   // on below line we are checking if our sql query is executed successfully.
   if($stmt->execute() == TRUE){
        // if the script is executed successfully we are
        // passing data to our response object
        // with a success message.
         $response['error'] = false;
         $response['message'] = "updated successfully!";
     } else{
         // if we get any error we are passing error to our object.
         $response['error'] = true;
         $response['message'] = "failed\n ".$conn->error;
     }
 } else{
     // this msethod is called when user
     // donot enter sufficient parameters.
     $response['error'] = true;
     $response['message'] = "Insufficient parameters";
 }
 // at last we are prinintg our response which we get.
 echo json_encode($response);
 ?>
























 