<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="./assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php include("partials/_header.php"); ?>
    <?php include("partials/_dbconnect.php"); ?>

    <div class="container">
        <h1 class="py-3">
            Login to Codies as Admin
        </h1>
        <form action="/forumForm/partials/_adminhandleLogin.php" method="post">

            <div class="mb-3">
                <label for="loginUsernameAdmin" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="loginUsernameAdmin" name="loginUsernameAdmin" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="loginPassAdmin" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassAdmin" name="loginPassAdmin" required>
            </div>
            <button type="submit" class="btn btn-outline-secondary">Log in</button>
        </form>
        <!-- <div class="modal-footer">
            <p class="text-center my-3"><i>Don't have an Account?</i> <a href="_adminSignup.php" class="link-offset-2 link-underline link-underline-opacity-0">SignUp as Admin</a></p>
            
        </div> -->
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br>
    <?php include("partials/_footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>