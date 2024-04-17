<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="./assets/js/color-modes.js"></script>
</head>

<body>
    <?php
    include("partials/_dbconnect.php");
    include("partials/_header.php");
    ?>
    <div class="container py-4 mt-4 mb-2 ">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3">
                    <h2 class="m-auto my-4">How can we improve?</h2>

                    <form action="/forumForm/partials/_handleFeed.php" method="post" id="myForm">
                        <div class="mb-3 " id="fName">
                            <label for="fName" class="form-label ">Name</label>
                            <input type="text" class="form-control w-75" id="fName" name="fName" required>
                        </div>

                        <div class="mb-3" id="fEmail">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control w-75" id="fEmail" aria-describedby="emailHelp" name="fEmail" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3" id="fSubject">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="fSubject" class="form-control w-75" required>
                        </div>

                        <div class="mb-3" id="fmessage">
                            <label for="message" class="form-label">Your message</label>
                            <textarea type="text" id="fmessage" name="fmessage" rows="2" class="form-control w-75" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary w-75">Send</button>

                    </form>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h2 class="m-auto my-4">Top Feedback</h2>
                    <br>
                    <?php
                    $sql = "SELECT * FROM `contactus` LIMIT 6";
                    $result = mysqli_query($conn, $sql);
                    $feedbackNo = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subject = $row['cSubject'];
                        $desc = $row['cMessage'];
                        echo '<div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $feedbackNo . '" aria-expanded="false" aria-controls="collapse' . $feedbackNo . '">
                                        ' . $subject . '
                                    </button>
                                    </h2>
                                    <div id="collapse' . $feedbackNo . '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">' . $desc . '</div>
                                    </div>
                                </div>
                                </div>';
                        $feedbackNo++;
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("partials/_footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>