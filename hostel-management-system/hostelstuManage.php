<div class="container-fluid" style="margin-top:98px">
	<div class="col-lg-12">
        <div class="row">
        <div class="col-md-12">
		<div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);">
                            Hostel Students
                        </div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Registration No.</th>
                            <th>Student's Name</th>
                            <th>Room No.</th>
                            <th>Seater</th>
                            <th>Staying From</th>
                            <th>Contact No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM hostelbookings"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $reg_no = $row['regno'];
                                $student_first_name = $row['firstName'];
                                $student_last_name = $row['lastName'];
                                $room_no = $row['roomno'];
                                $seater = $row['seater'];
                                $staying = $row['stayfrom'];
                                $contact = $row['contactno'];
                                echo '<tr>
                                    <td>' .$reg_no. '</td>
                                    <td>' .$student_first_name. ' '.$student_last_name.'</td>
                                    <td>' .$room_no. '</td>
                                    <td>' .$seater. '</td>
                                    <td>' .$staying. '</td>
                                    <td>' .$contact. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:118px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewdetails' .$Id. '" type="button">View</button>';
                                            
                                                echo '<form action="partials/_hostelstuManage.php" method="POST">
                                                        <button name="removestudetails" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="Id" value="'.$Id. '">
                                                    </form>';
                                            
                                    echo '</div>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
		        </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
	
<?php 
    $usersql = "SELECT * FROM `hostelbookings`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $roomno = $userRow["roomno"];
        $stayfrom = $userRow["stayfrom"];
        $seater = $userRow["seater"];
        $duration = $userRow["duration"];
        $foodstatus = $userRow["foodstatus"];
        $fees = $userRow["feespm"];
        $total_ammount = $userRow["total_amount"];
        $reg_no = $userRow["regno"];
        $first_name = $userRow["firstName"];
        $last_name = $userRow["lastName"];
        $emailid = $userRow["emailid"];
        $gender = $userRow["gender"];
        $phone = $userRow["contactno"];
        $emg_no = $userRow["egycontactno"];
        $course = $userRow["course"];
        $guardian_name = $userRow["guardian_name"];
        $relation = $userRow["guardian_relation"];
        $guardian_contact = $userRow["guardian_contact"];
        $state = $userRow["state"];
        $address = $userRow["address"];
        $city = $userRow["city"];
        $postal_code = $userRow["pin_code"];
        $datetime = $userRow["entry_date"];
?>
<!-- viewdetails Modal -->
<div class="modal fade" id="viewdetails<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="viewdetails<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:1000px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="viewdetails<?php echo $Id; ?>">View all Details </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                                  <table id="zctb" class="table table-striped table-bordered no-wrap"><tbody>
                                  <tr>
                                              <td colspan="3"><b>Date & Time of Registration : <?php echo $datetime;?></b></td>
                                              
                                          </tr>

                                          <tr>
                                          <td><b>Registration Number :</b></td>
                                          <td><?php echo $reg_no;?></td>
                                          <td><b>Full Name :</b></td>
                                          <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                          <td><b>Email Address:</b></td>
                                          <td><?php echo $emailid;?></td>
                                          </tr>


                                          <tr>
                                          <td><b>Contact Number :</b></td>
                                          <td><?php echo $phone;?></td>
                                          <td><b>Gender :</b></td>
                                          <td><?php echo $gender;?></td>
                                          <td><b>Selected Course :</b></td>
                                          <td><?php echo $course;?></td>
                                          </tr>


                                          <tr>
                                          <td><b>Emergency Contact No. :</b></td>
                                          <td><?php echo $emg_no;?></td>
                                          <td><b>Guardian Name :</b></td>
                                          <td><?php echo $guardian_name;?></td>
                                          <td><b>Guardian Relation :</b></td>
                                          <td><?php echo $relation;?></td>
                                          </tr>

                                          <tr>
                                          <td><b>Guardian Contact No. :</b></td>
                                          <td colspan="6"><?php echo $guardian_contact;?></td>
                                          </tr>

                                          <tr>
                                          <td><b>Address:</b></td>
                                          <td colspan="2">
                                          <?php echo $address;?><br />
                                          <?php echo $city;?>, <?php echo $postal_code;?>, <?php echo $state;?>
                                        </td>
                                          
                                          </tr>

                                          <tr>

                                          <td><b>Room no :</b></td>
                                          <td><?php echo $roomno;?></td>

                                          <td><b>Starting Date :</b></td>
                                          <td><?php echo $stayfrom;?></td>

                                          <td><b>Seater :</b></td>
                                          <td><?php echo $seater;?></td>


                                          </tr>

                                          <tr>

                                          <td><b>Duration:</b></td>
                                          <td><?php echo $duration;?> Months</td>

                                          <td><b>Food Status:</b></td>
                                          <td>
                                          <?php if($foodstatus==0){
                                          echo "Not Required";
                                          } else {
                                          echo "Required";
                                          }
                                          ;?> </td>

                                          <td><b>Fees Per Month :</b></td>
                                          <td>Rs. <?php echo $fees;?></td>

                                          

                                          </tr>

                                          <tr>
                                          <td colspan="6"><b>Total Fees (<?php echo $duration .' months'?>) : 
                                          <?php 
                                          echo 'Rs. '.$total_ammount;
                                          
                                          ?></b></td>
                                          </tr>


                                      </tbody>
                                  </table>
                                 </div>
                              </div>
              <center> <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a></center>
              </div>
    </div>
  </div>
</div>
<?php
 }
?>