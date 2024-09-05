<?php
include "layout/header.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit;
}
?>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mx-auto border shadow p-4">
            <h2 class="text-center mb-4">Profile</h2>
            <hr />
            <div class="row mb-3">
                <div class="col-sm-4">First Name</div>
                <div class="col-sm-8"><?= isset($_SESSION["first_name"]) ? htmlspecialchars($_SESSION["first_name"]) : 'N/A' ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Last Name</div>
                <div class="col-sm-8"><?= isset($_SESSION["last_name"]) ? htmlspecialchars($_SESSION["last_name"]) : 'N/A' ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Email</div>
                <div class="col-sm-8"><?= isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : 'N/A' ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Phone</div>
                <div class="col-sm-8"><?= isset($_SESSION["phone"]) ? htmlspecialchars($_SESSION["phone"]) : 'Not Provided' ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Address</div>
                <div class="col-sm-8"><?= isset($_SESSION["address"]) ? htmlspecialchars($_SESSION["address"]) : 'Not Provided' ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Registered At</div>
                <div class="col-sm-8"><?= isset($_SESSION["created_at"]) ? htmlspecialchars($_SESSION["created_at"]) : 'N/A' ?></div>
            </div>
        </div>
    </div>
</div>

<?php
include "layout/footer.php";
?>




