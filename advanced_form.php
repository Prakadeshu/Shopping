<?php
          include "layout/header.php";
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Membership Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                <h2>Advanced Membership Form</h2>
                </div>
                <div class="card-body">
  
    <!-- Form action points to the correct process file -->
    <form action="advanced_process.php" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="invalid-feedback">Please enter your name.</div>
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
            <div class="invalid-feedback">Please enter your phone number.</div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
            <div class="invalid-feedback">Please enter your address.</div>
        </div>
        <div class="mb-3">
            <label for="UPI_id" class="form-label">UPI ID</label>
            <input type="text" class="form-control" id="UPI_id" name="UPI_id" maxlength="12" required>
            <div class="invalid-feedback">Please enter a valid UPI ID.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" onclick="location.href='pricing.php'">Cancel</button>
    </form>
</div>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Bootstrap form validation script
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
</script>

<?php
// Toast message display after form submission
if (isset($_SESSION['message'])) {
    echo "<script>
            var toastHTML = '<div class=\"toast align-items-center text-white bg-success\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\"><div class=\"d-flex\"><div class=\"toast-body\">{$_SESSION['message']}</div><button type=\"button\" class=\"btn-close btn-close-white me-2 m-auto\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button></div></div>';
            document.body.insertAdjacentHTML('afterbegin', toastHTML);
            var toastElement = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
          </script>";
    unset($_SESSION['message']); // Clear the session message after displaying the toast
}
?>
</body>
</html>

<?php
          include "layout/footer.php";
          ?>