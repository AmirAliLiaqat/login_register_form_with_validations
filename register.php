<?php
    require 'conn.php';
    require 'main-links/messages.php';

    if(isset($_POST['register'])) {
        // var_dump($_POST);
        $profile = $_POST['profile_pic'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $checkEmail = "SELECT * FROM `user_details` WHERE email = '$email'";
        $result = mysqli_query($conn, $checkEmail) or die("Query Failed");

        if(!mysqli_num_rows($result) > 0) {
            if(strlen($first_name) >= 3 && strlen($first_name) < 20 && strlen($last_name) >= 3 && strlen($last_name) < 20) {
                if(strlen($password) > 8 && strlen($password) < 20) {
                    if($password === $cpassword) {
                        $sql = "INSERT INTO `user_details`(`first_name`, `last_name`, `email`, `password`, `dob`, `gender`, `mobile`, `contact`, `address`, `city`, `state`, `zip`) 
                        VALUES ('$first_name','$last_name','$email','$password','$dob','$gender','$mobile','$contact','$address','$city','$state','$zip')";
                        mysqli_query($conn, $sql) or die("Query Failed");
                        
                        echo " <div class='row'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Data Inserted Successfully...</strong>.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>";
                    } else {
                        echo " <div class='row'>
                            <div div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Password does't match...</strong>.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>";
                    }
                } else {
                    echo " <div class='row'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Password must be between 8 characters and 20 characters...</strong>.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>";
                }
            } else {
                echo " <div class='row'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Name must be between 3 characters and 20 characters...</strong>.
                        <button type='button' class='btn-close mx-2' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>";
            }
        } else {
            echo " <div class='row'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email already exists in our database...</strong>.
                    <button type='button' class='btn-close mx-2' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <?php require 'main-links/links.php'?>
</head>
<body>
    
    <section>
        <main>
            <div class="container m-5 d-flex justify-content-center">
                <div class="main_div p-3" style="width: 600px; background:#fff; box-shadow:
                    0 0  0 2px rgb(255,255,255),
                    0.3em 0.3em 1em rgba(0,0,0,0.3);">
                    <h1 class="text-center text-info fst-italic">Register Form</h1>
                    <form action="" method="post">
                        <div class="row g-3 fst-italic needs-validation">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First name <b>:</b></label>
                                <div class="input-group has-validation text-dark">
                                    <span class="input-group-text text-dark fst-normal" id="inputGroupPrepend">👤</span>
                                    <input type="text" class="form-control" name="fname" value="" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div><!--col-12-->
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last name <b>:</b></label>
                                <div class="input-group has-validation text-dark">
                                    <span class="input-group-text text-dark fst-normal" id="inputGroupPrepend">👤</span>
                                    <input type="text" class="form-control" name="lname" value="" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div><!--col-12-->
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email <b>:</b></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div><!--col-12-->
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password <b>:</b></label>
                                <div class="input-group has-validation text-dark">
                                    <span class="input-group-text text-dark fst-normal" id="inputGroupPrepend">🔒</span>
                                    <input type="password" class="form-control" name="password" id="password" value="" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="cpassword" class="form-label">Confirm Password <b>:</b></label>
                                <div class="input-group has-validation text-dark">
                                    <span class="input-group-text text-dark fst-normal" id="inputGroupPrepend">🔒</span>
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" value="" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="dob" class="form-label">DOB <b>:</b></label>
                                <input type="date" class="form-control" name="dob" id="" value="" required>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <h6 class="form-label m-0 p-0">Gender <b>:</b></h6><br>
                                <input type="radio" name="gender" value="male">
                                <label>Male</label>
                                <input type="radio" name="gender" value="female">
                                <label>Female</label>
                                <input type="radio" name="gender" value="others">
                                <label>Others</label>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile Number <b>:</b></label>
                                <input type="text" class="form-control" name="mobile" id="" value="" required>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="contact" class="form-label">Contact Number <b>:</b></label>
                                <input type="text" class="form-control" name="contact" id="" value="" required>
                            </div><!--col-6-->
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address <b>:</b></label>
                                <input type="text" class="form-control" name="address" id="" value="" required>
                            </div><!--col-12-->
                            <div class="col-md-4">
                                <label for="city" class="form-label">City <b>:</b></label>
                                <input type="text" class="form-control" name="city" id="" required>
                            </div><!--col-6-->
                            <div class="col-md-4">
                                <label for="state" class="form-label">State <b>:</b></label>
                                <select class="form-select" name="state" id="" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option name="punjab">Punjab</option>
                                    <option name="sindh">Sindh</option>
                                    <option name="balochistan">Balochistan</option>
                                    <option name="kpk">Khyber Pakhtunkhwa</option>
                                </select>
                            </div><!--col-6-->
                            <div class="col-md-4">
                                <label for="zip" class="form-label">Zip <b>:</b></label>
                                <input type="text" name="zip" class="form-control" id="" required>
                            </div><!--col-3-->
                            <div class="col-12">
                                <label class="form-check-label" for="profile_pic">Choose your profile picture <b>:</b></label>
                                <input type="file" name="profile_pic" value="" id="profile_pic" required>
                            </div><!--col-12-->
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="check" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="check">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div><!--col-12-->
                            <div class="col-12 text-center">
                                <p>
                                    Already Have an account 
                                    <a href="login.php" class="text-danger text-decoration-none">Login</a>
                                </p>
                                <button class="btn btn-primary w-50" type="submit" name="register">Register</button>
                            </div><!--col-12-->
                        </div><!--row-->
                    </form>
                </div><!--main_div-->
            </div><!--container-->
        </main>
    </section>

</body>
</html>