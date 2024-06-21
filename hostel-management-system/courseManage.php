<div class="container-fluid" style="margin-top:98px">
	<div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newcourse"><i class="fa fa-plus"></i> New Course</button>
        </div>
	</div>
	    <br>
	<div class="col-lg-12">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);">
                            Manage Courses
                        </div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Course Code</th>
                            <th>Course</th>
                            <th>Course Full Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM courses"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $course_code = $row['course_code'];
                                $course_sn = $row['course_sn'];
                                $course_fn = $row['course_fn'];
                                echo '<tr>
                                    <td>' .$course_code. '</td>
                                    <td>' .$course_sn. '</td>
                                    <td>' .$course_fn. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editcourse' .$Id. '" type="button">Edit</button>';
                                            
                                                echo '<form action="partials/_courseManage.php" method="POST">
                                                        <button name="removecourse" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
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

<!-- newcourse Modal -->
<div class="modal fade" id="newcourse" tabindex="-1" role="dialog" aria-labelledby="newcourse" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newcourse">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_courseManage.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="course">Course Code:</label></b>
                  <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Enter Course Code" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="course">Course:</label></b>
                  <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course Name" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="fn">Course Full Name:</label></b>
                  <input type="text" class="form-control" id="course_fn" name="course_fn" placeholder="Enter Full Name" required>
                </div>
              </div>
              <button type="submit" name="createCourse" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `courses`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $course_code = $userRow['course_code'];
        $course_sn = $userRow['course_sn'];
        $course_fn = $userRow['course_fn'];
                
?>
<!-- editcourse Modal -->
<div class="modal fade" id="editcourse<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editcourse<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editcourse<?php echo $Id; ?>">Edit Course Details </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="partials/_courseManage.php" method="post">
                <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="course">Course Code:</label></b>
                  <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Enter Course Code" value="<?php echo $course_code; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="course">Course:</label></b>
                  <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course Name" value="<?php echo $course_sn; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="fn">Course Full Name:</label></b>
                  <input type="text" class="form-control" id="course_fn" name="course_fn" placeholder="Enter Full Name" value="<?php echo $course_fn; ?>" required>
                </div>
              </div>
                <input type="hidden" id="courseId" name="courseId" value="<?php echo $Id; ?>">
                <button type="submit" name="editCourse" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>
<?php
  }
?>