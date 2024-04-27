
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'config.php'; // Include the database configuration file

// Signup user
if (isset($_POST['register'])) { // Changed 'signup' to 'register'
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $idNumber = $_POST["idNumber"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password


    $sql = "INSERT INTO Users (FirstName, MiddleName, LastName, IDNumber, Email, Phone, Password)
            VALUES ('$firstName', '$middleName', '$lastName', '$idNumber', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./Static/main.css">
	<link rel="stylesheet" type="text/css" href="./Static/util.css">
<!--===============================================================================================-->
</head>
<body>
	
<!--Signup-->	
<div class="limiter" id="Signupform">
  
  </style>
  <div class="container-login100">
      <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
              <img src="images/img-01.png" alt="IMG">
          </div>

          <form class="login100-form validate-form" action="Signup.php" method="POST">
              <span class="login100-form-title">
                  Sign Up
              </span>

              <div class="wrap-input100 validate-input" data-validate="First name is required">
                  <input class="input100" type="text" name="firstName" placeholder="First Name">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-user" aria-hidden="true"></i>
                  </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Middle name is required">
                  <input class="input100" type="text" name="middleName" placeholder="Middle Name">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-user" aria-hidden="true"></i>
                  </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Last name is required">
                  <input class="input100" type="text" name="lastName" placeholder="Last Name">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-user" aria-hidden="true"></i>
                  </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="ID number is required">
                  <input class="input100" type="text" name="idNumber" placeholder="ID Number">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-id-card" aria-hidden="true"></i>
                  </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                  <input class="input100" type="email" name="email" placeholder="Email">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                  </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Phone number is required">
                  <input class="input100" type="text" name="phone" placeholder="Phone">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                  </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Password is required">
                  <input class="input100" type="password" name="password" placeholder="Password">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
              </div>
              <div class="wrap-input100 validate-input" data-validate="User type is required"></div>
              <div class="container-login100-form-btn">
                  <button class="login100-form-btn" name="register">
                      Sign Up
                  </button>
              </div>
              
          </form>
      </div>
  </div>
</div>
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="./Static/main.js"></script>

</body>
</html>
