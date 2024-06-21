    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Hostel Management</span>
                </a>

                <div class="nav__list">
                    <a href="index.php" class="nav__link nav-home">
                      <i class='bx bx-grid-alt nav__icon' ></i>
                      <span class="nav__name">Home</span>
                    </a>
                    <a href="index.php?page=userManage" class="nav-orderManage nav__link ">
                      <i class='bx bx-user nav__icon' ></i>
                      <span class="nav__name">Student Registration</span>
                    </a>
                    <a href="index.php?page=hostelManage" class="nav__link nav-categoryManage">
                      <i class='fa fa-hotel' ></i>
                      <span class="nav__name">Book Hostel</span>
                    </a>
                    <a href="index.php?page=hostelstuManage" class="nav__link nav-categoryManage">
                      <i class='fa fa-users' ></i>
                      <span class="nav__name">Hostel Students</span>
                    </a>
                    <a href="index.php?page=roomManage" class="nav__link nav-menuManage">
                      <i class='fa fa-bed' ></i>
                      <span class="nav__name">Manage Rooms</span>
                    </a>
                    <a href="index.php?page=courseManage" class="nav__link nav-contactManage">
                      <i class="fa fa-tasks"></i>
                      <span class="nav__name">Manage Courses</span>
                    </a>
                </div>
            </div>
            <a href="partials/_logout.php" class="nav__link">
              <i class='bx bx-log-out nav__icon' ></i>
              <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>  
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
	  $('.nav-<?php echo $page; ?>').addClass('active')
</script>
   