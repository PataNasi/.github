<?php
// Include the config.php file to establish database connection
include_once "../config.php";

// Start PHP session
session_start();

// Check if user is not logged in, redirect to login page or display message
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page or display message
    header("Location: ../Login.php"); // Change 'login.php' to your actual login page
    exit();
}

// Retrieve username and user_id from the session
$user_id = $_SESSION['UserID'];

// Fetch user's information from the database based on user_id
$sql = "SELECT * FROM Users WHERE UserID = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $firstname = $user['FirstName'];
    // You can fetch other user details here if needed
}
//var_dump($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggleable Sidebar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Static/patients.css">
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.js"></script>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <style>
        /* Sidebar */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #FF595A;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            z-index: 999;
        }
        /* Sidebar links */
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 20px;
            color: #212529;
            display: block;
            transition: 0.3s;
        }
        /* Close button */
        .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        /* Close button on hover */
        .closebtn:hover {
            color: #aaa;
            cursor: pointer;
        }
        /* Divider */
        .divider {
            padding: 10px 15px;
            font-weight: bold;
            color: black;
            background-color: #FF595A;
        }
        /* Page content */
        .content {
            margin-left: 250px;
            transition: margin-left 0.5s;
            padding: 20px;
            width: calc(100% - 500px); /* Adjusted width */
            z-index: 1;
        }
        #date{
            margin-top: -60px;
        }
        a:hover{
            background-color: linen;
            border-radius: 10px;
        }
        /* Right sidebar */
        .right-sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f8f9fa;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
      
      
                /* Flexible divs when sidebar is open */
        .flexible-div {
            transition: margin-left 0.5s;
        }
        /* Cards */
        .card {
            width: 100%; /* Adjusted width */
            margin-bottom: 20px;
        }
    </style>
</head>
<body id="patientbody">

<!-- Menu icon -->
<span style="font-size:30px;cursor:pointer; z-index: 1000;" onclick="toggleSidebar()">&#9776;</span>

<!-- Sidebar -->
<div id="mySidebar" class="sidebar">
    <!-- Divider with user's name and date -->
    <div class="divider"  id="date">
        <span><?php echo $firstname; ?></span><br>
        <span>Date: <?php echo date("Y-m-d"); ?></span>
    </div>
    <!-- Close button -->
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">&times;</a>
    <!-- Sidebar links -->
    <a href="" id="Homebtn">Home</a>
    <!-- Divider -->
    <div class="divider">____________</div>
    <a href="#" id="Report">Report Lost Card</a>
    <a href="ReportHistory.php" id="Report">Reports History</a>
    <a href="#" id="Report">Payments</a>

    <div class="divider">_________________</div>

    <!-- Logout -->
    <a href="../logout.php">Logout</a>
</div>
<!-- Page content -->
<div class="container mt-5 content flexible-div" style="width: 700px;" id="maincont">
<div id="message">
    <style>
        #message{
    width: 400px;
    margin-bottom: 65px;
}

    </style>
    <?php
    session_start();

    // Display success message if set
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']); // Remove the success message from session
    }

    // Display error message if set
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']); // Remove the error message from session
    }
    ?>
</div>


    <!-- Welcome Message Card -->
    <div class="row" id="mains">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    Welcome <?php echo $firstname; ?>!
                </div>
                <div class="card-body">
                    <p class="card-text">Welcome to your Personalized dashboard.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lostcardform -->

    <div class="card">
  <div class="card-body">
    <?php
    require_once "LostCard.php"
    ?>
  </div>
</div>

    <!-- Lostcardform -->

    <div class="card">
  <div class="card-body">
    <?php
    require_once "ReportHistory.php"
    ?>
  </div>
</div>



 


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    function toggleSidebar() {
        const sidebar = document.getElementById("mySidebar");
        const content = document.getElementsByClassName("content")[0];
        if (sidebar.style.width === "250px") {
            sidebar.style.width = "0";
            content.style.marginLeft = "150px";
        } else {
            sidebar.style.width = "250px";
            content.style.marginLeft = "250px";
        }
    }
</script>

</body>
</html>