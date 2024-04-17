<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="./assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>

    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/_header.php"); ?>
    <?php include("partials/logoutModal.php"); ?>
    <?php
    $User = $_SESSION['user_username'];
    $sql = "SELECT * FROM `users` WHERE user_username = '$User'";
    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['sno'];
        $userEmail = $row['user_email'];
        $userUserName = $row['user_username'];
        $userName = $row['user_name'];
        $pfp = $row['user_img'];
        $accountCreated = $row['timestamp'];




        echo '<div class="container p-5">
                <div class=" d-flex justify-content-center align-items-center h-100">
                    <div class="">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="gradient-custom text-center text-black p-3 my-3"  >
                                    <img src="/forumForm/image/' . $pfp . '" alt="Avatar" class="rounded img-fluid  " style="width: 300px;"  />
                                </div>
                                <div class="">
                                    <div class="card-body p-4">
                                        <h6>Information</h6>
                                        <hr class="mt-0 mb-4">
                                        
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Name</h6>
                                                <p class="text-muted">' . $userName . '</p>

                                                <h6>Email</h6>
                                                <p class="text-muted">' . $userEmail . '</p>
                                            
                                                <h6>Username</h6>
                                                <p class="text-muted">' . $userUserName . '</p>
                                                
                                                <h6>Account created</h6>
                                                <p class="text-muted">' . $accountCreated . '</p>
                                            </div>
                                        </div>
                                        
                                        <button class="btn bg-danger text-light ms-1" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
                                        <button class="btn bg-success text-light ms-1" data-bs-toggle="modal" data-bs-target="#editModal">Edit Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>
                        Are you sure ?
                    </strong> you want to delete account
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="/forumForm/partials/_deleteHandle.php" method="post">
                        <button type="submit" name="userDelete" value = "' . $row['sno'] . '"class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditModalLabel">Edit Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/forumForm/partials/_editHandle.php" method="post" >
                        <div class="modal-body">
                            <div class="mb-3 " id="UName">
                                <label for="editName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editName" name="editName" value="' . $row['user_name'] . '" >
                            </div>

                            <div class="mb-3" id="UEmail">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="editEmail" aria-describedby="emailHelp" name="editEmail" value="' . $row['user_email'] . '" >
                            </div>

                            <div class="mb-3" id="UUser">
                                <label for="editUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="editUsername" name="editUsername" value="' . $row['user_username'] . '">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="editSave" value = "'.$row['sno'] .'" class="btn btn-outline-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';
    }
    ?>
    <!-- <a class="btn bg-danger text-light" aria-current="page" data-bs-toggle="modal" data-bs-target="#logoutModal" >LogOut</a> -->

    <?php include("partials/_footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>