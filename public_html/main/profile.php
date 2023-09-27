<!DOCTYPE html>
<html>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<head>
    <title>CCT OLIS</title>
    <style>
        /* Add your CSS styles here */
        
        .image-wrapper {
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
    }

    #profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
        body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full1 {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}



    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<?php
$host = "sg-nme-web604.main-hosting.eu";
$username = "u823561260_library";
$password = "Z@g8D1H]Ugu";
$database_name = "u823561260_library";

// Create a connection
$conn = new mysqli($host, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the database
$sql = "SELECT * FROM tbl_users WHERE id = 1";  // Replace "users" with your actual table name and adjust the WHERE condition as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output user information
    while ($row = $result->fetch_assoc()) {
        $fullname = $row["fullname"];
        $role = $row["role"];
        $username = $row["username"];
        $phone = $row["phone"];
        $email = $row["email"];
        $address = $row["address"];
        $contact = $row['contact'];
    $school = $row['school'];
    $address = $row['address'];
    $course = $row['course'];
        
        // HTML code to display the user information
        echo '
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full1">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <div class="image-wrapper">
                                        <img id="profile-image" src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <input type="file" id="profile-pic-input" style="display: none;">
                                </div>
                                <h6 class="f-w-600"><?php echo $fullname; ?></h6>
                                <p><?php echo $role; ?></p>
                                <label for="profile-pic-input" class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">ID Number</p>
                                        <h6 class="text-muted f-w-400"><?php echo $username; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $contact; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $email; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400"><?php echo $address; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Course</p>
                                        <h6 class="text-muted f-w-400"><?php echo $course; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">School</p>
                                        <h6 class="text-muted f-w-400"><?php echo $school; ?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button>Change Pass</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 ';
    }
} else {
    echo "No user found.";
}

// Close the connection
$conn->close();
?>

</html>
<script>
// Add this JavaScript code after the HTML code
$(document).ready(function() {
    $('#profile-pic-input').on('change', function(e) {
        var file = e.target.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
});

</script>

