<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- Calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <!-- Date Search -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
    <style type="text/css">
    .navbar-nav li:hover > ul.dropdown-menu {
    display: block;
    }
    .dropdown-submenu {
    position:relative;
    }
    .dropdown-submenu>.dropdown-menu {
    top:0;
    left:100%;
    margin-top:-6px;
    }
    /* rotate caret on hover */
    .dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
    }
    .dropdown-menu>.active>a:hover,
    .dropdown-menu>.active>a:focus,
    .dropdown-menu> li> a:hover,
    .dropdown-menu> li> a:focus,
    .navbar-default .navbar-nav .open .dropdown-menu> li> a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu> li> a:focus,
    .navbar-default .navbar-nav .current-menu-ancestor a.dropdown-toggle {
    color: #000000;
    background-color: #D3D3D3;
    }
    .dropdown-menu>.active>a {
    color: #262626;
    background-color: #FFF;
    }
    .nav-link {
    color: black !important;
    }
    </style>
  </head>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color:#5dad22">
      <a class="navbar-brand" href="index.php">Test</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-files-o"></i> Reports</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="index.php"><i class="fa fa-file"></i> Summary Report</a></li>
            </ul>
          </li>  </ul>
          <ul class="nav navbar-nav navbar-right">

            <li class="nav-item">
              <a class = "nav-link" href="#">
                <?php
                if(!isset($_SESSION['username']))
                {
                echo "<a class = 'nav-link' href='login.php'>Log In Here</a>";
                }
                else
                {
                  echo "<span class='badge badge-warning'>Hello! <span>" . $_SESSION['user_fullname'];
                    }
                    ?>
                  </a>
                </li>
                  <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fa fa-lock"></i> Logout</a>
            </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </html>