<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removeRoom'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `roomsdetails` WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['createRoom'])) {
        $roomno = $_POST["roomno"];
        $seater = $_POST["seater"];
        $fees = $_POST["fees"];
        $sql = "INSERT INTO `roomsdetails` ( `seater`, `room_no`, `fees`) VALUES ('$seater', '$roomno', '$fees')";   
                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('New Room Added Successfuly.');
                            window.location=document.referrer;
                        </script>";
                }else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            }
            
    if(isset($_POST['editRoom'])) {
        $id = $_POST["roomId"];
        $seater = $_POST['seater'];
        $room_no = $_POST['roomno'];
        $fees = $_POST['fees'];

        $sql = "UPDATE `roomsdetails` SET `seater`='$seater', `room_no`='$room_no', `fees`='$fees' WHERE `id`='$id'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update successfully');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }   
}
?>