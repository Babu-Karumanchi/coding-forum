<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <script src="./assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>
    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/_header.php"); ?>

    <?php
    $id = $_GET['catid'];
    $sql = " SELECT * FROM `categories` WHERE category_id =$id";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_discreption'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        // Insert into thread databasse

        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno_ = $_SESSION['sno'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $sql = "  INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timeStamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno_', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if ($showAlert) {
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>  Your Question has been added! Please wait for community to respond.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    ?>

    <!-- category container starts here  -->
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a perr to peer forum for sharing knowledge with each other . <br>
                Don't post anything that a reasonable person would consider offensive, abusive, or hate speech.<br>
                Keep it clean. Don't post anything obscene or sexually explicit.<br>
                Respect each other.<br>
                Respect our forum.<br>
            </p>
        </div>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo'<div class="container">
                <h1 class="py-2">Start a discussion</h1>
                <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                    <div class="form-group">
                        <label for="title">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" namaria-describedby="emailHelp" placeholder="Enter title" required>
                        <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as possible</small>
                    </div>
                    <br>
                    <div>
                        <label for="desc">Elaborate Your Problem</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3" ></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>';
    } else {
        echo'<div class="container">
                <h1 class="py-2">WELCOME!</h1> 
                <p class="lead">By registering with us, you will be able to discuss and share  with other members of our community</p>
                <a href="/forumForm/_signupModal.php" type="button" class="btn btn-outline-success mx-3 ">  Signup Now  </a>
            </div>';
    }

    ?>

    <div class="container">
        <h1 class="py-2">Browse Questions</h1>

        <?php include("partials/_dbconnect.php"); ?>

        <?php
        $id = $_GET['catid'];
        $sql = " SELECT * FROM `threads` WHERE thread_cat_id =$id";

        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];
            $thread_time = $row['timeStamp'];
            $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            // echo var_dump($row2);

            $user_name = $row2['user_username'];
            $pfp = $row2['user_img'];

            //     echo '<div class="media py-3">
            //     <img src="img/userdafault.jpg" width="34px" class="mr-3" alt="...">
            //     <div class="media-body">
            //         <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
            //         <p>' . $desc . '</p>
            //         <div class="fs-6 my-0"> Asked by: ' . $user_name . ' at ' . $thread_time . '</div>
            //         </div>
            // </div>';

            echo'<div class="media my-0 py-2">
                    <div class="media-body">
                        <span> <img src="image/'.$pfp.'" width="34px" class="mr-3 rounded-circle mb-3" alt="..."></span>
                        <span class="text-danger my-0 font-weight-bold">' . $user_name . ' &nbsp;&nbsp;&nbsp;</span>
                        <span class="badge bg-secondary">' . $thread_time . '</span>
                        <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                        <p>' . $desc . '</p>
                    </div>
                </div>';
        }

        // echo var_dump($noResult) ;

        if ($noResult) {
            echo'<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Question Found!</p>
                        <p class="lead">Be the First user to ask the Question.</p>
                    </div>
                </div>';
        }
        ?>
    </div>


    <?php include("partials/_footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>