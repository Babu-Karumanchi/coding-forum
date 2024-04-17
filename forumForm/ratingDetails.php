<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="./assets/js/color-modes.js"></script>
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
    <?php
    include("partials/_dbconnect.php");
    include("partials/_header.php");
    ?>
    <div class="container py-4 mt-4 mb-2 ">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-4">About Rating</p>
                <p class="lead">Star ratings are a type of rating scale using a star glyph or similar typographical symbol. It is used by reviewers for ranking things such as films, TV shows, restaurants, and hotels. For example, a system of one to five stars is commonly used in hotel ratings, with five stars being the highest rating.</p>
            </div>
            <hr>
            <br><br><br>
            <?php
            echo ' <span class="fa fa-star checked"></span>';
            for ($i = 1; $i <= 4; $i++) {
                echo ' <span class="fa fa-star unchecked"></span>';
            }
            echo ' <span class="lead" > &nbsp;  &nbsp;  -  &nbsp;  &nbsp; 1 star rating means <span class="fw-bold"> Avoid</span></span>';
            ?>
            <br><br>
            <hr>
            <?php
            echo ' <span class="fa fa-star checked"></span>';
            echo ' <span class="fa fa-star checked"></span>';
            for ($i = 1; $i <= 3; $i++) {
                echo ' <span class="fa fa-star unchecked"></span>';
            }
            echo ' <span class="lead" >&nbsp;  &nbsp;  -  &nbsp;  &nbsp;  2 star rating means  <span class="fw-bold">Not so Good</span></span>';
            ?>
            <br><br>
            <hr>
            <?php
            for ($i = 1; $i <= 3; $i++) {
                echo ' <span class="fa fa-star checked"></span>';
            }
            echo ' <span class="fa fa-star unchecked"></span>';
            echo ' <span class="fa fa-star unchecked"></span>';
            echo ' <span class="lead" >&nbsp;  &nbsp;  -  &nbsp;  &nbsp; 3 star rating means <span class="fw-bold"> Acceptable</span></span>';
            ?>
            <br><br>
            <hr>
            <?php
            for ($i = 1; $i <= 4; $i++) {
                echo ' <span class="fa fa-star checked"></span>';
            }
            echo ' <span class="fa fa-star unchecked"></span>';
            echo ' <span class="lead" >&nbsp;  &nbsp;  -  &nbsp;  &nbsp; 4 star rating means <span class="fw-bold"> Good</span></span>';
            ?>
            <br><br>
            <hr>
            <?php
            for ($i = 1; $i <= 5; $i++) {
                echo ' <span class="fa fa-star checked"></span>';
            }
            echo ' <span class="lead" >&nbsp;  &nbsp;  -  &nbsp;  &nbsp; 5 star rating means  <span class="fw-bold"> Excellent</span></span>';
            ?>
            <br><br>
            <hr>
        </div>
    </div>

    <?php include("partials/_footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>