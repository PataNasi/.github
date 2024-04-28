<?php
include_once "../config.php";
session_start();
// Check if user is not logged in, redirect to login page or display message
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page or display message
    header("Location: ../Login.php"); // Change 'login.php' to your actual login page
    exit();
}

// Retrieve username and user_id from the session
$user_id = $_SESSION['UserID'];

//var_dump($user_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $cardNumber = $_POST['card_number'];
    $whereFound = $_POST['reason'];
    $dateFound = date('Y-m-d', strtotime($_POST['date_found'])); // Format date to YYYY-MM-DD
    $institution = $_POST['institution'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO Cards (IDnumber, LocationFound, DateFound, Institution,PostedBy) VALUES ('$cardNumber', '$whereFound', '$dateFound', '$institution',$user_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Card submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container" style="width: fit-content;">
    <h1>Report a Missing Card</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="card_number" class="form-label">ID Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">Where Found</label>
            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="date_found" class="form-label">Date Found</label>
            <input type="date" class="form-control" id="date_found" name="date_found" required>
        </div>
        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <textarea class="form-control" id="institution" name="institution" rows="3" required></textarea>
        </div>
        <input type="hidden" name="posted_by" value="<?php echo $user_id; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
