<?php
include "layout/header.php";

if (isset($_SESSION["email"])) {
    header("location:/index.php");
    exit;
}

$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$address = "";

$first_name_error = "";
$last_name_error = "";
$email_error = "";
$phone_error = "";
$address_error = "";
$password_error = "";
$confirm_password_error = "";

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if (empty($first_name)){
        $first_name_error = "First name is Required";
        $error = true;
    }

    if (empty($last_name)){
        $last_name_error = "Last name is Required";
        $error = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error = "Email format is not valid";
        $error = true;
    }

    include "tools/db.php";
    $dbConnection = getDatabaseConnection();

    $statement = $dbConnection->prepare("SELECT id FROM users WHERE email = ?");
    $statement->bind_param("s", $email);
    $statement->execute();
    $statement->store_result();
    if ($statement->num_rows > 0) {
        $email_error = "Email is already used";
        $error = true;
    }
    $statement->close();

    if (!preg_match("/^(\+|00\d{1,3})?[-]?\d{7,12}$/", $phone)) {
        $phone_error = "Phone format is not valid";
        $error = true;
    }

    if (strlen($password) < 6) {
        $password_error = "Password must have at least 6 characters";
        $error = true;
    }

    if ($confirm_password != $password) {
        $confirm_password_error = "Password and Confirm Password do not match";
        $error = true;
    }

    if (!$error) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $created_at = date('Y-m-d H:i:s');

        $statement = $dbConnection->prepare(
            "INSERT INTO users (first_name, last_name, email, phone, address, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $statement->bind_param('sssssss', $first_name, $last_name, $email, $phone, $address, $password, $created_at);
        $statement->execute();
        $insert_id = $statement->insert_id;
        $statement->close();

        // Save session data
        $_SESSION["id"] = $insert_id;
        $_SESSION["first_name"] = $first_name;
        $_SESSION["last_name"] = $last_name;
        $_SESSION["email"] = $email;
        $_SESSION["phone"] = $phone;
        $_SESSION["address"] = $address;
        $_SESSION["created_at"] = $created_at;

        // Redirect user to the home page
        header("location: index.php");
        exit;
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Register</h2>
                </div>
                <div class="card-body">
                    <form id="registrationForm" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name*</label>
                            <br>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" value="<?= $first_name ?>" />
                            <small class="error text-danger"><?= $first_name_error ?></small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="lastName">Last Name*</label>
                            <br>
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" value="<?= $last_name ?>" />
                            <small class="error text-danger"><?= $last_name_error ?></small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <br>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= $email ?>" />
                            <small class="error text-danger"><?= $email_error ?></small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone">Phone*</label>
                            <br>
                            <input type="text" class="form-control" id="phone" name="phone" maxlength="10" placeholder="Enter phone number" value="<?= $phone ?>" />
                            <small class="error text-danger"><?= $phone_error ?></small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <br>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter address"><?= $address ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Password*</label>
                            <br>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" maxlength="20" placeholder="Enter password" />
                            </div>
                            <small class="error text-danger"><?= $password_error ?></small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password*</label>
                            <br>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm password" />
                            </div>
                            <small class="error text-danger"><?= $confirm_password_error ?></small>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        <a href="index.php">
                            <button type="button" class="btn btn-secondary btn-block">Cancel</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<?php
include "layout/footer.php";
?>
