<?php
    require 'conn.php';

    session_start();

    if(isset($_POST['login'])) {
        // var_dump($_POST);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $check_email = mysqli_query($conn, "SELECT * FROM `user_details` WHERE email = '$email'");

        if(mysqli_num_rows($check_email) > 0) {
            $row = mysqli_fetch_assoc($check_email);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['profile_pic'] = $row['profile_pic'];
            header("Location: welcome.php");
        } else {
            echo " <div class='row'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Login details is incorrect. Please try again...</strong>.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
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
    <title>Login Form</title>
    <?php require 'main-links/links.php'?>
</head>
<body>
    
    <section>
        <main>
            <div class="container m-5">
                <div class="main_div p-3 mx-auto" style="width: 600px; background:#fff; box-shadow:
                    0 0  0 2px rgb(255,255,255),
                    0.3em 0.3em 1em rgba(0,0,0,0.3);">
                <h1 class="text-center text-info fst-italic">Login Form</h1>
                    <form method="post" action="">
                        <div class="row g-3 fst-italic needs-validation">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Username or Email</label>
                                <input type="text" class="form-control" name="email" id="" value="" required>
                            </div><!--col-12-->
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="" value="" required>
                            </div><!--col-12-->
                            <div class="captcha mb-2">
                                <p>Please check the box below to proceed.</p>
                                <div class="g-recaptcha" data-sitekey="6Lf3YRQeAAAAAJymhp2AXO-UGI6m3CrqCvANxmQd"></div><!--g-recaptcha-->
                            </div><!--captcha-->
                            <div class="col-12 text-center">
                                <p>
                                    Don't Have an account 
                                    <a href="register.php" class="text-danger text-decoration-none">Register</a>
                                </p>
                                <button class="btn btn-primary w-50" name="login">Login</button>
                            </div><!--col-12-->
                        </div><!--row-->
                    </form>
                </div><!--main_div-->
                <div>
                <div class="row fst-italic">
                        <div class="col-md-6 mx-auto">
                            <table class="w-100 text-center table-bordered table-hover">
                                <thead>
                                    <tr><h5 class="text-center bg-info mt-5 p-2 text-white fst-italic">‿︵‿︵ʚɞ Use These Emails  ʚɞ‿︵‿︵</h5></tr> 
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <?php
                                    $sql = "SELECT * FROM `user_details`";
                                    $query = mysqli_query($conn, $sql) or die("Query Failed" . mysqli_connect_error());

                                    if(mysqli_num_rows($query) > 0) {
                                        while($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="p-1"> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['email']; ?> </td>
                                        <td> <?php echo $row['password']; ?> </td>
                                    </tr>
                                </tbody>
                                <?php
                                        }
                                    }
                                ?>
                            </table>
                        </div><!--col-md-6-->
                    </div><!--row-->
                </div>
            </div><!--container-->
        </main>
    </section>

</body>
</html>