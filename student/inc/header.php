
<?php
include '../config.php';
$q=mysqli_query($con,"select * from student where matno='".$_SESSION['user_id']."'");
$qr=mysqli_fetch_array($q);

?>

<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="../user/dashboard.php">
                <!-- Logo icon -->
                <b><img src="../images/logo.jpg" alt="" class="img img-responsive" style="width: 50%;" /></b>
                <!--End Logo icon -->
                <span><img src="" alt="" class="dark-logo" /></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">

               
                        
                        
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/avatar-a.jpg" alt="user image" class="profile-pic" /></a>

                         Hello Student, <?php echo $qr['sname'].' '.$qr['mname'].' '.$qr['fname'];  ?>   
                         <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="../student/profile.php"><i class="ti-user"></i> Profile</a></li>
                                
                                <li><a href="logout.php?id=<?php echo $_SESSION['user_id'];?>" onClick="return confirm('Are you sure you want to logout ?')"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
