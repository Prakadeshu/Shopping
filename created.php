<?php
include "layout/header.php";
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "clientdata";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required.";
            break;
        }

        // Check if the email already exists in the database
        $checkEmail = "SELECT * FROM clients WHERE email='$email'";
        $emailResult = $connection->query($checkEmail);

        if ($emailResult->num_rows > 0) {
            $errorMessage = "This email is already registered.";
            break;
        }

        // If email does not exist, insert the new client
        $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "Client added successfully.";
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            let valid = true;
            let name = document.forms["clientForm"]["name"].value;
            let email = document.forms["clientForm"]["email"].value;
            let phone = document.forms["clientForm"]["phone"].value;
            let address = document.forms["clientForm"]["address"].value;

            // Name validation: Alphabetical only
            const namePattern = /^[A-Za-z\s]+$/;
            if (!namePattern.test(name)) {
                document.getElementById("nameError").innerHTML = "Name must contain only letters.";
                valid = false;
            } else {
                document.getElementById("nameError").innerHTML = "";
            }

            // Phone validation: Numeric and max 10 digits
            const phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById("phoneError").innerHTML = "Phone number must be exactly 10 digits.";
                valid = false;
            } else {
                document.getElementById("phoneError").innerHTML = "";
            }

            // Email validation: Built-in HTML validation should handle this
            if (email == "") {
                document.getElementById("emailError").innerHTML = "Email is required.";
                valid = false;
            } else {
                document.getElementById("emailError").innerHTML = "";
            }

            // Address validation
            if (address == "") {
                document.getElementById("addressError").innerHTML = "Address is required.";
                valid = false;
            } else {
                document.getElementById("addressError").innerHTML = "";
            }

            return valid;  // Prevent form submission if any validation fails
        }
    </script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form name="clientForm" onsubmit="return validateForm()" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    <span id="emailError" class="text-danger"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text"  maxlength="10" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    <span id="phoneError" class="text-danger"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                    <span id="addressError" class="text-danger"></span>
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="clientdata.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<br><br><br><br><br><br><br><br><br>
<?php
include "layout/footer.php";
?>