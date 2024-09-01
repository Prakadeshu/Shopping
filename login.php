<?php
include "layout/header.php";

// Check if the user is already logged in
if (isset($_SESSION["email"])) {
    header("location: /index.php");
    exit;
}

$email = '';
$error = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate form data
    if (empty($email) || empty($password)) {
        $error = "Email and Password are Required!";
    } else {
        include "tools/db.php";
        $dbConnection = getDatabaseConnection();
        $statement = $dbConnection->prepare(
            "SELECT id, first_name, last_name, phone, address, password, created_at FROM users WHERE email = ?"
        );

        // Bind variables to the prepared statement as parameters
        $statement->bind_param('s', $email);

        // Execute statement 
        $statement->execute();

        // Bind result variables
        $statement->bind_result($id, $first_name, $last_name, $phone, $address, $stored_password, $created_at);

        // Fetch values
        if ($statement->fetch()) {
            // Verify the password
            if (password_verify($password, $stored_password)) {

                var_dump($phone);
                // Password is correct
                // Store data in session variables
                $_SESSION["id"] = $id;
                $_SESSION["first_name"] = $first_name;
                $_SESSION["last_name"] = $last_name;
                $_SESSION["email"] = $email;
                $_SESSION["phone"] = $phone;
                $_SESSION["address"] = $address;
                $_SESSION["created_at"] = $created_at;

                // Redirect user to the home page
                header("location: /index.php");
                exit;
            }
        }

        // Close the statement
        $statement->close();

        // Set error message if login failed
        $error = "Email or Password is invalid";
    }
}
?>

<div class="container py-5">
    <div class="mx-auto border shadow p-4" style="width: 400px">
        <h2 class="text-center mb-4">Login</h2>
        <hr />

        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= htmlspecialchars($error) ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" value="<?= htmlspecialchars($email) ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="row mb-3">
                <div class="col d-grid">
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
                <div class="col d-grid">
                    <a href="/index.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<br><br><br><br><br><br><br><br><br>

<?php include "layout/footer.php"; ?>
