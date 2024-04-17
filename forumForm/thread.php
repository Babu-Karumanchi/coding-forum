<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <script src="./assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
        color: orange;
        }
        .unchecked {
        color: black;
        }
</style>
</head>

<body>
    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/_header.php"); ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id =$id;";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of the person posted
        $sql3 = "SELECT user_username FROM `users` WHERE sno='$thread_user_id'";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $posted_by  = $row3['user_username'];
    }


    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        // Insert into comment  db

        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $sno_ = $_SESSION['sno'];

        $sql = " INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment','$id','$sno_' ,current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if ($showAlert) {
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>  Your answer has been added! 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    ?>

    <!-- category container starts here  -->
    <div class="container my-3">
        <div class="jumbotron ">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a perr to peer forum for sharing knowledge with each other . <br>
                Don't post anything that a reasonable person would consider offensive, abusive, or hate speech.<br>
                Keep it clean. Don't post anything obscene or sexually explicit.<br>
                Respect each other.<br>
                Respect our forum.<br>
            </p>
            <p>Posted by:<em> <?php echo $posted_by; ?></em></p>
        </div>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo'<div class="container">
                <h1 class="py-2">Post a comment</h1>
                <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                    <div>
                        <label for="comment">Type your comment</label>
                        <br>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Comment</button>
                </form>
            </div>';

    } else {
        echo'<div class="container">
                <h1 class="py-2">Post a Comment</h1> 
                <p class="lead">You are not logged in. Please login to be able to post comments.</p>
            </div>';
    }
    ?>

    <div class="container">
        <h1 class="py-2">Discussions</h1>

        <?php include("partials/_dbconnect.php"); ?>

        <?php
        $id = $_GET['threadid'];
        $sql = " SELECT * FROM `comments` WHERE thread_id =$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $comment_rating = $row['comment_rating'];
            $comment_by = $row['comment_by'];

            $sql2 = "SELECT * FROM `users` WHERE sno='$comment_by'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_name = $row2['user_username'];
            $pfp = $row2['user_img'];

            echo'<div class="media my-0 py-2">
                    <div class="media-body">
                        <span> <img src="image/'.$pfp.'" width="5%" class="mr-3 rounded-circle mb-3" alt="..."></span>
                        <span class="text-danger my-0 font-weight-bold"> Solution by: '  . $user_name . ' &nbsp; at &nbsp;</span>
                        <span class="badge bg-secondary">' . $comment_time  . ' </span>
                        <span class="">
                            <span class="font-weight-bold"> &nbsp;  &nbsp; <a href="/forumForm/ratingDetails.php" class="link-info">Rating </a> - </span> ';
                            if ($comment_rating>=2) { 
                                    for ($ii=1; $ii <=$comment_rating; $ii++) { 
                                        echo' <span class="fa fa-star checked"></span>';
                                    }
                                    $uncheck = 5-$comment_rating;
                                    for ($iii=1; $iii <= $uncheck ; $iii++) { 
                                            echo' <span class="fa fa-star unchecked"></span>';
                                    }
                            }else{
                                echo' <span class="fa fa-star checked"></span>';
                                for ($i=1; $i <=4 ; $i++) { 
                                    echo' <span class="fa fa-star unchecked"></span>';
                                }
                            }
                            
                    echo'</span>
                        <p>' .  $content . '</p>
                    </div>
                </div>';

            echo '<br><br>';
        }

        if ($noResult) {
            echo'<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No comments found</p>
                        <p class="lead">Be the first person to comment</p>
                    </div>
                </div>';
        }
        ?>
    </div>


    <?php include("partials/_footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>