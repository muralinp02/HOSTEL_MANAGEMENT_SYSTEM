<div class="container-fluid" style="margin-top:98px">
	<div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newUser"><i class="fa fa-plus"></i> New user</button>
        </div>
	</div>
	    <br>
        <div class="col-lg-12">
	    <div class="row">
        <div class="col-md-12">
		<div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);">
                            Registered Users
                        </div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Registration No.</th>
                            <th style="width:7%">Photo</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Mobile</th>
                            <th>Emailid</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM userregistration"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $regNo = $row['registration_no'];
                                
                                $firstname = $row['first_name'];
                                $lastname = $row['last_name'];
                                $gender = $row['gender'];
                                $phone = $row['contact_no'];
                                $email = $row['emailid'];
                                echo '<tr>
                                    <td>' .$regNo. '</td>
                                    <td><img src="/hostel-management-system/img/person-' .$Id. '.jpg" alt="image for this user" onError="this.src =\'/hostel-management-system/img/profilePic.jpg\'" width="100px" height="100px"></td>
                                    <td>
                                        ' .$firstname. ' ' .$lastname. '
                                    </td>
                                    <td>' .$gender. '</td>
                                    <td>' .$phone. '</td>
                                    <td>' .$email. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUser' .$Id. '" type="button">Edit</button>';
                                            
                                                echo '<form action="partials/_userManage.php" method="POST">
                                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
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
$fetch_query = mysqli_query($conn, "select max(id) as id from userregistration");
      $row = mysqli_fetch_assoc($fetch_query);
      if($row['id']==0)
      {
        $user_id = 1;
      }
      else
      {
        $user_id = $row['id'] + 1;
      }
?>
<!-- newUser Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newUser">Create New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_userManage.php" method="post">
              <div class="form-group">
                  <b><label for="registration">Registration No:</label></b>
                  <input class="form-control" id="registration" name="registration" placeholder="Choose a unique Username" type="text" required value="REG-00<?php echo $user_id; ?>" readonly>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="firstName">First Name:</label></b>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="lastName">Last name:</label></b>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+91</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="gender">Gender:</label></b>
                        <select name="gender" id="gender" class="custom-select browser-default" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
              </div>
              <button type="submit" name="createUser" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>
<?php 
    $usersql = "SELECT * FROM `userregistration`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $regNo = $userRow['registration_no'];
        $firstname = $userRow['first_name'];
        $lastname = $userRow['last_name'];
        $email = $userRow['emailid'];
        $phone = $userRow['contact_no'];
        $gender = $userRow['gender'];
        
?>
<!-- editUser Modal -->
<div class="modal fade" id="editUser<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editUser<?php echo $Id; ?>">Registration No: <b><?php echo $regNo; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            
            <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                <div class="form-group col-md-8">
                    <form action="partials/_userManage.php" method="post" enctype="multipart/form-data">
                        <b><label for="image">Profile Picture</label></b>
                        <input type="file" name="userimage" id="userimage" accept=".jpg" class="form-control" required style="border:none;">
                        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn btn-success mt-3" name="updateProfilePhoto">Update Img</button>
                    </form>         
                </div>
                <div class="form-group col-md-4">
                    <img src="/hostel-management-system/img/person-<?php echo $Id; ?>.jpg" alt="Profile Photo" width="100" height="100" onError="this.src ='/hostel-management-system/img/profilePic.jpg'">
                    <form action="partials/_userManage.php" method="post">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn btn-success mt-2" name="removeProfilePhoto">Remove Img</button>
                    </form>
                </div>
            </div>
            
            <form action="partials/_userManage.php" method="post">
                
                <div class="form-row">
                <div class="form-group col-md-6">
                    <b><label for="firstName">First Name:</label></b>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstname; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <b><label for="lastName">Last name:</label></b>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastname; ?>" required>
                </div>
                </div>
                <div class="form-group">
                    <b><label for="email">Emailid:</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+91</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="gender">Gender:</label></b>
                        <select name="gender" id="gender" class="custom-select browser-default" required>
                        <?php 
                            if($gender == 'Male') {
                        ?>
                            <option value="Male" selected>Male</option>
                            <option value="Female" >Female</option>
                        <?php
                            } 
                            else {
                        ?>
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                        <?php
                            } 
                        ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" name="editUser" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>
<?php
}
?>