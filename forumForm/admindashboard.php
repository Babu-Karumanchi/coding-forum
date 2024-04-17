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
    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/_adminHeader.php"); ?>
    <div class="container p-4 m-4">
        <h1>Administrator Dashboard </h1>
    </div>
    <hr>

        <div class="container p-4">
            <div class="row grid gap-4">
                <div class="card mb-3 " style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="container m-4">

                                    <h5 class=" card-title">User list</h5>
                                    <?php
                                    $sql = "SELECT * FROM `users`";
                                    $result = mysqli_query($conn, $sql);

                                    $accountNo = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $accountNo++;
                                    }
                                    echo '<p class="card-text">User Account : <span class="badge text-bg-secondary">' . $accountNo . '</span></p>';
                                    ?>
                                    <a href="/forumForm/adminUserlist.php" class="btn btn-primary">Go </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="img/dashUser1.jpg" class="img-fluid rounded-start py-2" alt="pic1">
                        </div>
                    </div>
                </div>

                <div class="card mb-3 " style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="container m-4">

                                    <h5 class="card-title">Category List</h5>
                                    <?php
                                    $sql = "SELECT * FROM `categories`";
                                    $result = mysqli_query($conn, $sql);

                                    $catNo = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $catNo++;
                                    }
                                    echo '<p class="card-text"> Catagories : <span class="badge text-bg-secondary">' . $catNo . '</span></p>';
                                    ?>
                                    <a href="/forumForm/adminCatlist.php" class="btn btn-primary">Go </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="img/dashCat1.jpg" class="img-fluid rounded-start py-2" alt="pic2">
                            <!-- <img src="https://source.unsplash.com/1400x1500/?code,catlog" class="img-fluid rounded-start py-2" alt="pic2"> -->

                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row grid gap-4">
                <div class="card mb-3 " style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="container m-4">
                                    <h5 class="card-title">Feedback list</h5>
                                    <?php
                                    $sql = "SELECT * FROM `contactus`";
                                    $result = mysqli_query($conn, $sql);

                                    $feedbackNo = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $feedbackNo++;
                                    }
                                    echo '<p class="card-text">Feedback : <span class="badge text-bg-secondary">' . $feedbackNo . '</span></p>';
                                    ?>
                                    <a href="/forumForm/adminFeedbacklist.php" class="btn btn-primary">Go </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="img/dashFeed1.jpg" class="img-fluid rounded-start py-2" alt="pic3">
                        </div>
                    </div>
                </div>

                <div class="card mb-3 " style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="container m-4">

                                    <h5 class="card-title">Question/Answer List</h5>
                                    <?php
                                    $sql = "SELECT * FROM `threads`";
                                    $result = mysqli_query($conn, $sql);

                                    $catNo = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $catNo++;
                                    }
                                    $sql2 = "SELECT * FROM `comments`";
                                    $result2 = mysqli_query($conn, $sql2);

                                    $ansNo = 0;
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                        $ansNo++;
                                    }


                                    echo '<p class="card-text"> Questions : <span class="badge text-bg-secondary">' . $catNo . '</span></p>';
                                    echo '<p class="card-text"> Answers : <span class="badge text-bg-secondary">' . $ansNo . '</span></p>';
                                    ?>
                                    <a href="/forumForm/adminQuestionAnswerList.php" class="btn btn-primary">Go </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="img/dashQuestion.jpg" class="img-fluid rounded-start py-2" alt="pic2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
<br><br><br><br>

    <?php include("partials/_adminfooter.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>