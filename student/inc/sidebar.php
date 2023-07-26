 <div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                    
                </li>
                


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-money text-dark"></i><span class="hide-menu">Payment </span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="validate.php">Validate Payment </a></li>
                        <li><a href="history.php">History Payment</a></li>
                        
                    </ul>
                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list text-online"></i><span class="hide-menu">Syllabus </span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="view-syllabus.php">View Syllabus </a></li>
                        
                    </ul>
                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book text-info"></i><span class="hide-menu">Learning Content </span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="view-content.php">View Learning Content </a></li>
                        
                    </ul>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list text-success"></i><span class="hide-menu">Upcoming Events</span></a>
                
                <ul aria-expanded="false" class="collapse">
                    <li><a href="view-upcoming-event-department.php">View Department Upcoming Events</a></li>
                     <li><a href="view-upcoming-event-general.php">View General Upcoming Events</a></li>
                    
                </ul>

            </li>

            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book text-info"></i><span class="hide-menu">Exams </span></a>
                <ul aria-expanded="false" class="collapse">
                   <li><a href="write-exam.php">Write Exams </a></li>
                   <li><a href="view-exam.php">View Exams </a></li>
                   
               </ul>
           </li>


            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book text-danger"></i><span class="hide-menu">Result</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="view-result.php">View Result </a></li>
               </ul>
           </li>


                
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-comment text-warning"></i><span class="hide-menu">Feedback</span></a>
                    
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-fed.php">Send Feedback </a></li>
                        
                        
                    </ul>

                </li>

                
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user text-primary"></i><span class="hide-menu">Profile</span></a>
                    
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="profile.php">View Profile </a></li>
                        
                    </ul>

                </li>

                
                <li> <a href="logout.php?id=<?php echo $_SESSION['user_id'];?>" aria-expanded="false" onClick="return confirm('Are you sure you want to logout ?')"><i class="fa fa-sign-out text-danger"></i><span class="hide-menu">Logout</span></a>
                    
                </li>
                
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</div>