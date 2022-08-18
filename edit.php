<?php
    require 'conn.php';
    
    $sql = "SELECT * FROM `user_details`";
    $query = mysqli_query($conn, $sql) or die("Query Failed" . mysqli_connect_error());

    if(isset($_POST['update'])) {
        $id = $_GET['id'] ;
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

        if(strlen($password) > 3 && strlen($password) < 20) {
            if($password === $cpassword) {
                $sql = "UPDATE `user_details` SET `profile_pic`='$profile',
                    `first_name`='$first_name',`last_name`='$last_name',`email`='$email',
                    `password`='$password',`dob`='$dob',`gender`='$gender',
                    `mobile`='$mobile',`contact`='$contact',`address`='$address',
                    `city`='$city',`state`='$state',`zip`='$zip' WHERE id = $id";
                mysqli_query($conn, $sql) or die("Query Failed" . mysqli_connect_error($sql));
                
                header('location: admin.php');
            } else {
                echo " <div class='row'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Password does't match...</strong>.
                        <button type='button' class='btn-close mx-2' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>";
            }
        } else {
            echo " <div class='row'>
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Password must be between 8 characters and 20 characters...</strong>.
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
    <title>Edit Form</title>
    <?php require 'main-links/links.php'?>
</head>
<body>
    
    <section>
        <main>
            <div class="container m-5 d-flex justify-content-center">
                <div class="main_div p-3" style="width: 600px; background:#fff; box-shadow:
                    0 0  0 2px rgb(255,255,255),
                    0.3em 0.3em 1em rgba(0,0,0,0.3);">
                    <h1 class="text-center text-info fst-italic">Edit Form</h1>
                    <?php
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <form action="" method="post">
                        <div class="row g-3 fst-italic needs-validation">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First name <b>:</b></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text fst-normal" id="inputGroupPrepend">👤</span>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $row['first_name']; ?>" aria-describedby="inputGroupPrepend">
                                </div>
                            </div><!--col-12-->
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last name <b>:</b></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text fst-normal" id="inputGroupPrepend">👤</span>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $row['last_name']; ?>" aria-describedby="inputGroupPrepend">
                                </div>
                            </div><!--col-12-->
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email <b>:</b></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" aria-describedby="inputGroupPrepend">
                                </div>
                            </div><!--col-12-->
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password <b>:</b></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text fst-normal" id="inputGroupPrepend">🔒</span>
                                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $row['password']; ?>" aria-describedby="inputGroupPrepend">
                                </div>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="cpassword" class="form-label">Confirm Password <b>:</b></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text fst-normal" id="inputGroupPrepend">🔒</span>
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" value="<?php echo $row['password']; ?>" aria-describedby="inputGroupPrepend">
                                </div>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="dob" class="form-label">DOB <b>:</b></label>
                                <input type="date" class="form-control" name="dob" id="" value="<?php echo $row['dob']; ?>">
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <h6 class="form-label m-0 p-0">Gender <b>:</b></h6><br>
                                <input type="radio" name="gender" value="<?php echo $row['gender']; ?>">
                                <label>Male</label>
                                <input type="radio" name="gender" value="<?php echo $row['gender']; ?>">
                                <label>Female</label>
                                <input type="radio" name="gender" value="<?php echo $row['gender']; ?>">
                                <label>Others</label>
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile Number <b>:</b></label>
                                <input type="text" class="form-control" name="mobile" id="" value="<?php echo $row['mobile']; ?>">
                            </div><!--col-6-->
                            <div class="col-md-6">
                                <label for="contact" class="form-label">Contact Number <b>:</b></label>
                                <input type="text" class="form-control" name="contact" id="" value="<?php echo $row['contact']; ?>">
                            </div><!--col-6-->
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address <b>:</b></label>
                                <input type="text" class="form-control" name="address" id="" value="<?php echo $row['address']; ?>">
                            </div><!--col-12-->
                            <div class="col-md-4">
                                <label for="city" class="form-label">City <b>:</b></label>
                                <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>">
                            </div><!--col-6-->
                            <div class="col-md-4">
                                <label for="state" class="form-label">State <b>:</b></label>
                                <select class="form-select" name="state" value="<?php echo $row['state']; ?>">
                                    <option selected disabled value="">Choose...</option>
                                    <option name="punjab">Punjab</option>
                                    <option name="sindh">Sindh</option>
                                    <option name="balochistan">Balochistan</option>
                                    <option name="kpk">Khyber Pakhtunkhwa</option>
                                </select>
                            </div><!--col-6-->
                            <div class="col-md-4">
                                <label for="zip" class="form-label">Zip <b>:</b></label>
                                <input type="text" name="zip" class="form-control" value="<?php echo $row['zip']; ?>">
                            </div><!--col-3-->
                            <div class="col-12">
                                <label class="form-check-label" for="profile_pic">Choose your profile picture <b>:</b></label>
                                <input type="file" name="profile_pic" value="<?php echo $row['profile_pic']; ?>">
                            </div><!--col-12-->
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50" type="submit" name="update">Update</button>
                            </div><!--col-12-->
                        </div><!--row-->
                    </form>
                    <?php
                            }
                        }
                    ?>
                </div><!--main_div-->
            </div><!--container-->
        </main>
    </section>

</body>
</html>