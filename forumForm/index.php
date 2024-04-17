<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="./assets/js/color-modes.js"></script>
    <!-- for images stack  -->
    <link rel="stylesheet" href="./assets/css/Imgstack.css">
    <!-- for links in ul  -->
    <link rel="stylesheet" href="./assets/css/ulLink.css">

    <!-- <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <style>
        .containerBox {
            max-width: 1000px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .cardBox {
            position: relative;
            margin: 20px 0;
            width: 300px;
            height: 400px;
            transform-style: preserve-3d;
            transform: perspective(2000px);
            transition: 1s;
            box-shadow: inset 100px 0 50px rgba(0, 0, 0, 0.5);
        }

        .cardBox:hover {
            z-index: 1111;
            transform: perspective(2000px) rotate(-10deg);
            box-shadow: inset 20px 0 50px rgba(0, 0, 0, 0.5);
        }

        .cardBox .img-container {
            position: relative;
            width: 100%;
            height: 100%;
            /* border:1px solid #000; */
            box-sizing: border-box;
            transform-origin: left;
            z-index: 1;
            transition: 1s;
        }

        .cardBox .img-container img {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .cardBox:hover .img-container {
            transform: rotateY(-135deg);
        }

        .cardBox .card-details {
            position: absolute;
            left: 0;
            top: 0;
            box-sizing: border-box;
            padding: 20px;
        }

        .cardBox .card-details h2 {
            margin: 0;
            padding: 0.5em 0;
            text-transform: uppercase;
            font-size: 2em;
        }

        .cardBox .card-details p {
            margin: 0;
            padding: 0;
            line-height: 25px;
            font-size: 1.1em;
        }

    </style>
</head>

<body>

    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/_header.php"); ?>
    <!-- slider starts here  -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <img src="https://source.unsplash.com/2400x500/?code,apple" class="d-block w-100" alt="pic1"> -->
                <img src="img/slider1.jpg" class="d-block w-100" alt="pic1">
            </div>
            <div class="carousel-item">
                <!-- <img src="https://source.unsplash.com/2400x500/?programmers,microsoft" class="d-block w-100" alt="pic2"> -->
                <img src="img/slider2.jpg" class="d-block w-100" alt="pic2">
            </div>
            <div class="carousel-item">
                <!-- <img src="https://source.unsplash.com/2400x500/?code,google" class="d-block w-100" alt="pic3"> -->
                <img src="img/slider3.jpg" class="d-block w-100" alt="pic3">
            </div>
        </div>
    </div>

    <div class="container marketing" id="bgV">
        <div class="container text-center m-4 py-4">
            <div class="row">
                <?php
                $sql = " SELECT * FROM `categories` LIMIT 3";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_id'];
                    $name = $row['category_name'];
                    $disc = $row['category_discreption'];
                    $created = $row['created'];

                    echo '<div class="col">
                            <img src="img/topic' . $no . '.jpg" class="rounded-circle mb-3" style="width: 150px;" alt="Topic" />
                            <h5 class="mb-2"><strong>' . $name . '</strong></h5>
                            <a href="threadlist.php?catid=' . $id . '" class="btn btn-outline-primary">Ask Question</a>
                        </div>';
                    $no++;
                }

                ?>
                <div class="col d-flex align-self-center">
                    <div class="mb-4 mt-4">
                        <a href="/forumForm/topic.php" class="btn btn-outline-primary">More ....</a>
                    </div>
                </div>
                <!-- <img src="https://source.unsplash.com/700x700/?code,'.$name.'" class="rounded-circle mb-3" style="width: 150px;" alt="Topic" /> -->
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Forum privacy</h2>
                <p class="lead">Forum privacy can be public, moderated, or private. Public forums are open to everyone, moderated forums have some control over content, and private forums require invitation or specific credentials. To maintain privacy, use a non-identifying username, avoid sharing personal information, respect forum rules, and report any privacy breaches.
                </p>
            </div>
            <div class="col-md-5">
                <!-- <img src="https://source.unsplash.com/500x500/?programmers" class="img-fluid rounded-start" alt="..."> -->
                <!-- <img src="img/index1.jpg" class="img-fluid rounded-start" alt="..."> -->
                <div class="containerBox">
                    <div class="cardBox">
                        <div class="img-container">
                            <img src="img/index1.jpg" alt=".." />
                        </div>
                        <div class="card-details">
                            <h2>Iron Man</h2>
                            <p>Iron Man is a fictional superhero appearing in American comic books published by Marvel Comics. The character was co-created by writer and editor Stan Lee, developed by scripter Larry Lieber, and designed by artists Don Heck and Jack Kirby. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">User-friendly experience</h2>
                <p class="lead">To create a user-friendly experience in online forums, focus on clear navigation, responsive design, search functionality, an intuitive interface, personalization, accessibility, informative onboarding, active moderation, regular updates, and user feedback. This will help engage users, promote positive interactions, and maintain a welcoming environment.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <!-- <img src="https://source.unsplash.com/500x500/?microsoft" class="img-fluid rounded-start" alt="..."> -->
                <!-- <img src="img/index2.jpg" class="img-fluid rounded-start" alt="..."> -->
                <div class="containerBox">
                    <div class="cardBox">
                        <div class="img-container">
                            <img src="img/index2.jpg" alt=".." />
                        </div>
                        <div class="card-details">
                            <h2>Iron Man</h2>
                            <p>Iron Man is a fictional superhero appearing in American comic books published by Marvel Comics. The character was co-created by writer and editor Stan Lee, developed by scripter Larry Lieber, and designed by artists Don Heck and Jack Kirby. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="container">

            <ul class="ulImg">
                <li class="boxImg boxImg-1"></li>
                <li class="boxImg boxImg-2"></li>
                <li class="boxImg boxImg-3"></li>
                <li class="boxImg boxImg-4"></li>
                <li class="boxImg boxImg-5"></li>
                <li class="boxImg boxImg-6"></li>
            </ul>

        </div>
        <br><br><br>
        <br><br><br>
        <hr class="featurette-divider">
        <div class="container">
            <ul class="ulLink">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-white" href="/forumForm/index.php">
                    <li class="liLink">
                        Back to top
                    </li>
                </a>
            </ul>
        </div>
    </div>


    <br>
    <br>


    <?php include("partials/_footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".boxImg").mouseenter(function() {
            $(this).addClass("animatedImg");
        });
        $(".boxImg").mouseleave(function() {
            $(this).removeClass("animatedImg");
        });
    </script>
</body>

</html>