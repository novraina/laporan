<?php
    //MySQL connection
    include '../config.php';
    //define session start
    //session_start();
    //login checking action
    //include('actions/login-session.php');
?>

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
    </li>
    <li class="nav-item nav-category">Users</li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
        <i class="menu-icon mdi mdi-account-circle-outline"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i> 
    </a>
    <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
        <?php
            $query=mysqli_query($conn, "SELECT * FROM roles");
            while($result=mysqli_fetch_array($query)){
        ?>
            <li class="nav-item"> <a class="nav-link" href="users.php?id=<?php echo $result['id']?>"><?php echo $result['name']?></a></li>
        <?php } ?> 
        </ul>
    </div>
    </li>
    <li class="nav-item nav-category">Forms and Datas</li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#jobs" aria-expanded="false" aria-controls="jobs">
        <i class="menu-icon mdi mdi-table"></i>
        <span class="menu-title">Jobs</span>
        <i class="menu-arrow"></i> 
    </a>
    <div class="collapse" id="jobs">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="jobs.php">Jobs</a></li>
        <li class="nav-item"> <a class="nav-link" href="job-categories.php">Categories</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#careers" aria-expanded="false" aria-controls="careers">
        <i class="menu-icon mdi mdi-floor-plan"></i>
        <span class="menu-title">Careers</span>
        <i class="menu-arrow"></i> 
    </a>
    <div class="collapse" id="careers">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="careers.php">Careers</a></li>
        <li class="nav-item"> <a class="nav-link" href="career-categories.php">Categories</a></li>
        </ul>
    </div>
    </li><li class="nav-item nav-category">Applications</li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#applications" aria-expanded="false" aria-controls="applications">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
        <span class="menu-title">Applications</span>
        <i class="menu-arrow"></i> 
    </a>
    <div class="collapse" id="applications">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="applications.php">Applications</a></li>
        </ul>
    </div>
    </li>



    <li class="nav-item nav-category">UI Elements</li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-floor-plan"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i> 
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item nav-category">Forms and Datas</li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
        <span class="menu-title">Form elements</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="menu-icon mdi mdi-table"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="menu-icon mdi mdi-layers-outline"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item nav-category">pages</li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon mdi mdi-account-circle-outline"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item nav-category">help</li>
    <li class="nav-item">
    <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
        <i class="menu-icon mdi mdi-file-document"></i>
        <span class="menu-title">Documentation</span>
    </a>
    </li>
</ul>
</nav>
<!-- partial -->