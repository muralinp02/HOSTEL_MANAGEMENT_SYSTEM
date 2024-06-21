<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createHostal'])) {
        $roomNo = $_POST["roomNo"];
        $startdate = $_POST["startdate"];
        $seater = $_POST["seater"];
        $duration = $_POST["duration"];
        $foodstatus = $_POST["foodstatus"];
        $fees = $_POST["fees"];
        $total_ammount = $_POST["total_ammount"];
        $reg_no = $_POST["reg_no"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $emailid = $_POST["emailid"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $emg_no = $_POST["emg_no"];
        $course = $_POST["course"];
        $guardian_name = $_POST["guardian_name"];
        $relation = $_POST["relation"];
        $contact_number = $_POST["contact_number"];
        $state = $_POST['state'];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postal_code = $_POST["postal_code"];
        
        $sql = "INSERT INTO `hostelbookings`(`roomno`, `seater`, `feespm`, `total_amount`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardian_name`, `guardian_relation`, `guardian_contact`, `address`, `city`, `pin_code`, `state`) VALUES ('$roomNo','$seater','$fees','$total_ammount','$foodstatus','$startdate','$duration','$course','$reg_no','$first_name','$last_name','$gender','$phone','$emailid','$emg_no','$guardian_name','$relation','$contact_number','$address','$city','$postal_code', '$state')";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('Hostel Booked Successfuly.');
                            window.location=document.referrer;
                        </script>";
                }else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            }
            
    }
?>