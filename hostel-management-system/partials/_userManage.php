<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removeUser'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `userregistration` WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['createUser'])) {
        $regno = $_POST["registration"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $gender = $_POST["gender"];
        
        $sql = "INSERT INTO `userregistration` ( `registration_no`, `first_name`, `last_name`, `emailid`, `contact_no`, `gender`) VALUES ('$regno', '$firstName', '$lastName', '$email', '$phone', '$gender')";   
        $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('Registration Successfull.');
                            window.location=document.referrer;
                        </script>";
                }else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            }
            
    if(isset($_POST['editUser'])) {
        $id = $_POST["userId"];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `userregistration` SET `first_name`='$firstname', `last_name`='$lastname', `emailid`='$email', `contact_no`='$phone', `gender`='$gender' WHERE `id`='$id'";   
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
    
    if(isset($_POST['updateProfilePhoto'])) {
        $id = $_POST["userId"];
        $check = getimagesize($_FILES["userimage"]["tmp_name"]);
        if($check !== false) {
            $newfilename = "person-".$id.".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/hostel-management-system/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['userimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
    
    if(isset($_POST['removeProfilePhoto'])) {
        $id = $_POST["userId"];
        $filename = $_SERVER['DOCUMENT_ROOT']."/hostel-management-system/img/person-".$id.".jpg";
        if (file_exists($filename)) {
            unlink($filename);
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('no photo available.');
                window.location=document.referrer;
            </script>";
        }
    }
}
?>