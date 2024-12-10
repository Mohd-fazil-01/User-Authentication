<?php 
$db = new mysqli('localhost', 'root', '', 'demo');


if ($db->connect_error) {
    echo "Connection is not established";
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

       
        $check = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $response = $db->query($check);

        
        if ($response) {
            if ($response->num_rows == 1) {
                echo "Login successful";
                echo "Login successful";
                header("Location: https://www.google.com");
                exit();

            } else {
                echo "Login failed - Incorrect email or password.";
            }
        } else {
            echo "Query failed: " . $db->error;
        }
    } else {
        echo "USER UNAUTHORIZED";
    }
}
?>
