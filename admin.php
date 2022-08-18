<?php
    require 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panal</title>
    <?php require 'main-links/links.php'?>
</head>
<body>
    
    <section>
        <main>
            <div class="container m-5 d-flex justify-content-center">
                <div class="main_div p-3" style="width: 1600px; background:#fff; box-shadow:
                    0 0  0 2px rgb(255,255,255),
                    0.3em 0.3em 1em rgba(0,0,0,0.3);">
                    <h1 class="text-center text-info fst-italic">Admin Panal</h1>
                    <div class="row">
                        <div class="col-md-12" style="overflow-x:auto;">
                            <table class="table-bordered table-hover table-stripped text-center w-100">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th class="p-2 w-50">Id</th>
                                        <th class="p-2 w-50">First Name</th>
                                        <th class="p-2 w-50">Last Name</th>
                                        <th class="p-2 w-50">Email</th>
                                        <th class="p-2 w-50">Password</th>
                                        <th class="p-2 w-50">Dob</th>
                                        <th class="p-2 w-50">Gender</th>
                                        <th class="p-2 w-50">Mobile</th>
                                        <th class="p-2 w-50">Contact</th>
                                        <!-- <th class="p-2 w-50">Address</th> -->
                                        <th class="p-2 w-50">City</th>
                                        <th class="p-2 w-50">State</th>
                                        <th class="p-2 w-50">Zip</th>
                                        <th class="p-2 w-50">Delete</th>
                                        <th class="p-2 w-50">Edit</th>
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
                                        <td class="p-2 w-50"> <?php echo $row['id']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['first_name']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['last_name']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['email']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['password']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['dob']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['gender']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['mobile']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['contact']; ?> </td>
                                        <!-- <td class="p-2 w-50"> <?php //echo $row['address']; ?> </td> -->
                                        <td class="p-2 w-50"> <?php echo $row['city']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['state']; ?> </td>
                                        <td class="p-2 w-50"> <?php echo $row['zip']; ?> </td>
                                        <td class="p-2 w-50">
                                            <button class="btn btn-danger m-2">
                                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-danger text-white text-decoration-none">Delete</a>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-info m-2">
                                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-danger text-white text-decoration-none">Edit</a>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                        }
                                    }
                                ?>
                            </table>
                        </div><!--col-md-12-->
                    </div><!--row-->
                </div><!--main_div-->
            </div><!--container-->
        </main>
    </section>

</body>
</html>