<?php
require 'partials/_dbconnect.php';
if(!empty($_POST['room'])){
$roomNo = $_POST['room'];
	$roomsql = "SELECT seater FROM `roomsdetails` where room_no='$roomNo'";
	$roomResult = mysqli_query($conn, $roomsql);
	$seaterdata = mysqli_fetch_assoc($roomResult);
    echo $seater = $seaterdata['seater'];
}

if(!empty($_POST['roomid'])){
$roomNo = $_POST['roomid'];
	$roomsql = "SELECT fees FROM `roomsdetails` where room_no='$roomNo'";
	$roomResult = mysqli_query($conn, $roomsql);
	$feesdata = mysqli_fetch_assoc($roomResult);
    echo $seater = $feesdata['fees'];
}

if(!empty($_POST['roomsno'])){
$roomsNo = $_POST['roomsno'];

	$roomssql = "SELECT count(*) as roomno, seater FROM `hostelbookings` where roomno='$roomsNo'";
	$roomsResult = mysqli_query($conn, $roomssql);
	$availabledata = mysqli_fetch_assoc($roomsResult);
    $totalseat = $availabledata['roomno'];
    $seater = $availabledata['seater'];
    $finalseat = $seater-$totalseat;
    if($totalseat>0){
    if($finalseat==0)
    {
    	echo json_encode(array("success"=>0, "msg"=>'<span style="color:red">Seats already full.</span>'));		
    }
    else 
    {
        echo json_encode(array("success"=>1, "msg"=>'<span style="color:green">'.$finalseat.' Seats are Available.</span>'));
    }
}
else
{
	echo json_encode(array("success"=>1, "msg"=>'<span style="color:green">All Seats are Available.</span>'));
}

}


if(!empty($_POST['regNo'])){
$regno = $_POST['regNo'];
	$usersql = "SELECT * FROM `userregistration` where registration_no='$regno'";
	$userResult = mysqli_query($conn, $usersql);
	$userdata = mysqli_fetch_assoc($userResult);

	$result = json_encode($userdata);
    echo $result;
}
?>