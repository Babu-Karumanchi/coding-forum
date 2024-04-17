<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include("partials/_header.php"); ?>
    <?php include("partials/_dbconnect.php"); ?>

    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4 fw-bold">User Rules</h1>
            <a href="/forumForm/_loginModal.php" class="btn btn-primary">Login as User</a>
            <a href="/forumForm/_signupModal.php" class="btn btn-danger">SignUp as User</a>


            <hr class="my-4">
            <b>
                <u>
                    When participating in a forum, follow these rules: <br>
                </u>
            </b>
            <br><br>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            &nbsp;&nbsp;&nbsp;&nbsp; &#x2022; Be Respectful Treat others kindly.
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis accusamus praesentium aut doloremque voluptas eaque hic ad nisi, esse in voluptates, nam voluptatum accusantium consequuntur possimus iure odio ipsa sequi amet recusandae.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            &nbsp;&nbsp;&nbsp;&nbsp; &#x2022; Stay On Topic Keep discussions relevant.
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis accusamus praesentium aut doloremque voluptas eaque hic ad nisi, esse in voluptates, nam voluptatum accusantium consequuntur possimus iure odio ipsa sequi amet recusandae.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            &nbsp;&nbsp;&nbsp;&nbsp; &#x2022; Descriptive Titles Use clear thread titles.
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis accusamus praesentium aut doloremque voluptas eaque hic ad nisi, esse in voluptates, nam voluptatum accusantium consequuntur possimus iure odio ipsa sequi amet recusandae.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            &nbsp;&nbsp;&nbsp;&nbsp; &#x2022; Search First Avoid duplicate threads.
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis accusamus praesentium aut doloremque voluptas eaque hic ad nisi, esse in voluptates, nam voluptatum accusantium consequuntur possimus iure odio ipsa sequi amet recusandae.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            &nbsp;&nbsp;&nbsp;&nbsp; &#x2022; No Self-Promotion or Spam Be mindful.
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis accusamus praesentium aut doloremque voluptas eaque hic ad nisi, esse in voluptates, nam voluptatum accusantium consequuntur possimus iure odio ipsa sequi amet recusandae.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                            &nbsp;&nbsp;&nbsp;&nbsp; &#x2022; No External Links relevant.
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis accusamus praesentium aut doloremque voluptas eaque hic ad nisi, esse in voluptates, nam voluptatum accusantium consequuntur possimus iure odio ipsa sequi amet recusandae.</div>
                    </div>
                </div>

            </div>
            <br>
            <a href="https://stackoverflow.com/legal/terms-of-service/public" target="_blank" class="link-offset-2 link-underline link-underline-opacity-0">Terms & Conditions</a>
            <br><br>

            <a class="btn btn-success btn-lg" href="https://static.fortra.com/insite/1_17/help/ptns/content/user_rules-green_screen.htm" target="_blank" role="button">Learn more</a>
        </div>
    </div>

    <!-- <div class="container modal-footer">
        <p class="text-center my-3"><i>Don't have an Account ?</i> <a href="/forumForm/_loginModal.php" class="link-offset-2 link-underline link-underline-opacity-0">Login as User</a></p>
    </div>
    <div class="container modal-footer">
        <p class="text-center my-3"><i>Already Have an Account ?</i> <a href="/forumForm/_signupModal.php" class="link-offset-2 link-underline link-underline-opacity-0">SignUp as User</a></p>

    </div> -->
    <br><br><br>


    <?php include("partials/_footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>