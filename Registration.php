<?php 

$db = new mysqli("localhost", "root", "", "demo");


if($db->connect_error){
    die("Connection not established: " . $db->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
  
    $full_name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    
    $check_user = "SELECT email FROM user WHERE email = '$email'";
    $response = $db->query($check_user);

    if($response->num_rows == 1) {
        echo "User already exists";
    } else {
        
        $insert_query = "INSERT INTO user (full_name, email, password) VALUES ('$full_name', '$email', '$password')";
        if($db->query($insert_query) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $db->error;
        }
    }
} else {
    echo "User unauthorized";
}
?>
