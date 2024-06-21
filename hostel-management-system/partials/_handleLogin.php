<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = md5($_POST["password"]); 
    
    $sql = "Select * from users where username='$username' and password='$password'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminusername'] = $username;
                $_SESSION['adminuserId'] = $userId;
                header("location: /hostel-management-system/index.php?loginsuccess=true");
                exit();
            } 
            else{
                header("location: /hostel-management-system/login.php?loginsuccess=false");
            }
        }
?>