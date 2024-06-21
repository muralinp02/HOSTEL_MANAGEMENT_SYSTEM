<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removestudetails'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `hostelbookings` WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
            window.location=document.referrer;
            </script>";
    }
    
   }
?>