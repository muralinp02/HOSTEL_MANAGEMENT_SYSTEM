<div class="container-fluid" style="margin-top:98px">
	<div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newroom"><i class="fa fa-plus"></i> New Room</button>
        </div>
	</div>
	    <br>
	<div class="col-lg-12">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);">
                            Manage Rooms
                        </div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Room No.</th>
                            <th>Seater</th>
                            <th>Fees per Month</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM roomsdetails"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $roomno = $row['room_no'];
                                
                                $seater = $row['seater'];
                                $fees = $row['fees'];
                                echo '<tr>
                                    <td>' .$roomno. '</td>
                                    <td>' .$seater. '</td>
                                    <td>' .$fees. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editroom' .$Id. '" type="button">Edit</button>';
                                            
                                                echo '<form action="partials/_roomManage.php" method="POST">
                                                        <button name="removeRoom" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
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

<!-- newroom Modal -->
<div class="modal fade" id="newroom" tabindex="-1" role="dialog" aria-labelledby="newroom" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newroom">Add New Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_roomManage.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="roomno">Room Number:</label></b>
                  <input type="text" class="form-control" id="roomno" name="roomno" placeholder="Enter Room Number" required>
                </div>
                <div class="form-group col-md-6 my-0">
                        <b><label for="seater">Seater:</label></b>
                        <select name="seater" id="seater" class="custom-select browser-default" required>
                        <option value="">Select Seater</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                    </div>
                <div class="form-group col-md-6">
                  <b><label for="fees">Fees:</label></b>
                  <input type="text" class="form-control" id="fees" name="fees" placeholder="Enter Total Fees" required>
                </div>
              </div>
              <button type="submit" name="createRoom" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `roomsdetails`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $seater = $userRow['seater'];
        $room_no = $userRow['room_no'];
        $fees = $userRow['fees'];
                
?>
<!-- editroom Modal -->
<div class="modal fade" id="editroom<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editroom<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editroom<?php echo $Id; ?>">Edit Room Details </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="partials/_roomManage.php" method="post">
                <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="roomno">Room Number:</label></b>
                  <input type="text" class="form-control" id="roomno" name="roomno" placeholder="Enter Room Number" value="<?php echo $room_no; ?>" required>
                </div>
                <div class="form-group col-md-6 my-0">
                        <b><label for="seater">Seater:</label></b>
                        <select name="seater" id="seater" class="custom-select browser-default" required>
                        <?php 
                        for($i=1; $i<=5; $i++){
                        ?>
                        <option value="<?php echo $i; ?>"<?php if($seater == $i) { echo "selected"; }?>><?php echo $i; ?></option>
                        <?php
                             } ?>
                        </select>
                    </div>
                <div class="form-group col-md-6">
                  <b><label for="fees">Fees:</label></b>
                  <input type="text" class="form-control" id="fees" name="fees" placeholder="Enter Total Fees" value="<?php echo $fees; ?>" required>
                </div>
              </div>
                <input type="hidden" id="roomId" name="roomId" value="<?php echo $Id; ?>">
                <button type="submit" name="editRoom" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>
<?php
}
?>