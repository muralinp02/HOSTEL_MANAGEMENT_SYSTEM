<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
							<?php 
							$fetch_query = mysqli_query($conn, "select count(*) from userregistration");
							$emp = mysqli_fetch_row($fetch_query);
							?>
							<div class="dash-widget-info text-right">
								<h3><?php echo $emp[0]; ?></h3>
								<span class="widget-title1">Registered Students <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-building"></i></span>
                            <?php 
							$fetch_query = mysqli_query($conn, "select count(*) from roomsdetails");
							$room = mysqli_fetch_row($fetch_query);
							?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $room[0]; ?></h3>
                                <span class="widget-title2">Total Rooms <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <?php 
							$fetch_query = mysqli_query($conn, "select count(*) from hostelbookings");
							$bookroom = mysqli_fetch_row($fetch_query);
							?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $bookroom[0]; ?></h3>
                                <span class="widget-title3">Booked Rooms <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                       <div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title d-inline-block">Registered Students </h5> <a href="index.php?page=userManage" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
											<?php 
											$fetch_query = mysqli_query($conn, "select * from userregistration limit 5");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        { ?>
											<tr>
												
												<td><?php echo $row['registration_no']; ?></td>
												<td>	
													<?php echo $row['first_name']." ".$row['last_name']; ?>
												</td>
												<td><?php echo $row['emailid']; ?></td>
												
                                               </tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					  <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h5 class="card-title mb-0">Hostel Students</h5>
							</div>
                            <div class="card-body">
                                <div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										
                                	<?php 
                                	$fetch_query = mysqli_query($conn, "select * from hostelbookings limit 5");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        {
                                        ?>
                                        <thead>
											<th>Registration No.</th>
											<th>Room No.</th>
										</thead>
										<tbody>
                                         <tr>
												
												<td><?php echo $row['regno']; ?></td>
												
												<td><?php echo $row['roomno']; ?></td>
												
                                               </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="index.php?page=hostelstuManage" class="text-muted">View all</a>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
          </div>