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

// Retrieve all cards submitted by the logged-in user
$sql = "SELECT * FROM Cards WHERE PostedBy = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Submitted Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="width: fit-content;">
        <h1 class="mt-5">User's Submitted Cards</h1>
        <?php if ($result->num_rows > 0): ?>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Card ID</th>
                        <th>Location Found</th>
                        <th>Date Found</th>
                        <th>Institution</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["IDnumber"]; ?></td>
                            <td><?php echo $row["LocationFound"]; ?></td>
                            <td><?php echo $row["DateFound"]; ?></td>
                            <td><?php echo $row["Institution"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mt-3">No cards found.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
