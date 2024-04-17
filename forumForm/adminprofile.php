<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>

    <?php include("partials/_adminHeader.php"); ?>
    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/logoutModal.php");?>


    <?php
    $User = $_SESSION['admin_username'];
    $sql = "SELECT * FROM `adminrequest` WHERE `adminUsername`  = '$User'";
    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        $adminNo = $row['adminNo'];
        $adminName = $row['adminName'];
        $adminType = $row['adminType'];
        $adminLanguage = $row['adminLanguage'];
        $adminExprience = $row['adminExprience'];
        $adminFrom = $row['adminFrom'];
        $adminAbout = $row['adminAbout'];
        $adminEmail = $row['adminEmail'];
        $adminTime = $row['adminTime'];
        $adminUsername = $row['adminUsername'];
        $adminPfp = $row['adminPfp'];


        echo '<div class="container p-5">
                <div class=" d-flex justify-content-center align-items-center h-100">
                    <div class="">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="gradient-custom text-center text-black p-3 my-3"  >
                                    <img src="/forumForm/image/' . $adminPfp . '" alt="Avatar" class="rounded img-fluid  " style="width: 300px;"  />
                                </div>
                                <div class="">
                                    <div class="card-body p-4">
                                        <h6>Information</h6>
                                        <hr class="mt-0 mb-4">
                                        
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Name</h6>
                                                <p class="text-muted">' . $adminName . '</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted">' . $adminEmail . '</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Username</h6>
                                                <p class="text-muted">' . $adminUsername . '</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Country</h6>
                                                <p class="text-muted">' . $adminFrom . '</p>
                                            </div>   
                                            <div class="col-6 mb-3">
                                                <h6>Admin Type</h6>
                                                <p class="text-muted">' . $adminType . '</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Language</h6>
                                                <p class="text-muted">' . $adminLanguage . '</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Experience</h6>
                                                <p class="text-muted">' . $adminExprience . '</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>About</h6>
                                                <p class="text-muted">' . $adminAbout . '</p>
                                            </div>
                                                <h6>Account created</h6>
                                                <p class="text-muted">' . $adminTime . '</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-evenly m-4">
                                        
                                        <button class="btn bg-success text-light ms-1" data-bs-toggle="modal" data-bs-target="#adminEditModal">Edit Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="modal fade modal-xl" id="adminEditModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditModalLabel">Edit Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/forumForm/partials/_adminhandleEdit.php" method="post" >
                            <div class="modal-body">
                                <div class="mb-3 " >
                                    <label for="adminEditName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="adminEditName" name="adminEditName" value="' . $row['adminName'] . '" >
                                </div>

                                <div class="mb-3">
                                    <label for="adminEditEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="adminEditEmail" aria-describedby="emailHelp" name="adminEditEmail" value="' . $row['adminEmail'] . '" >
                                </div>

                                <div class="mb-3">
                                    <label for="adminEditAbout" class="form-label">About</label>
                                    <textarea class="form-control" id="adminEditAbout" name="adminEditAbout" rows="3">' . $row['adminAbout'] . '</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="adminEditLang" class="form-label">Language</label>
                                    <input type="text" class="form-control" id="adminEditLang" name="adminEditLang" value="' . $row['adminLanguage'] . '"> 
                                </div>

                                <div class="mb-3">
                                    <label for="adminEditCountry" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="adminEditCountry" name="adminEditCountry" value="' . $row['adminFrom'] . '">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="adminEditSave" value = "' . $row['adminNo'] . '" class="btn btn-outline-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
    }
    ?>

<!-- <a class="btn bg-danger text-light " aria-current="page" data-bs-toggle="modal" data-bs-target="#logoutModal" >LogOut</a> -->

    <?php include("partials/_adminfooter.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>