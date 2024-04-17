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
            Signup to Codies as Admin
        </h1>

        <form action="/forumForm/partials/_adminhandleSignup.php" method="post" id="myForm" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3 " id="UName">
                <label for="adminSignupName" class="form-label">Name</label>
                <input type="text" class="form-control" id="adminSignupName" name="adminSignupName" required>
                <p class="formerror" id="validationName">
                </p>
            </div>

            <div class="mb-3 " id="AuserName">
                <label for="adminSignupUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="adminSignupUsername" name="adminSignupUsername" required>
                <p class="formerror" id="validationName">
                </p>
            </div>

            <div class="mb-3 " id="AEmail">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="adminSignupEmail" aria-describedby="emailHelp" name="adminSignupEmail" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <p class="formerror" id="validationEmail"></p>
            </div>

            <div class="mb-3" id="UImg">
                <label for="uploadfile" class="form-label">Profile</label>
                <input class="form-control" type="file" name="uploadfile" value="" required accept=".jpg, .jpeg, .png" />
                <p class="formerror" id="validationImage"></p>
            </div>

            <div class="mb-3 " id="AType">
                <label for="adminTypeSignup" class="form-label">Type</label>
                <input type="text" class="form-control" id="adminTypeSignup" name="adminTypeSignup" required>
                <p class="formerror" id="validationType">
                </p>
            </div>

            <div class="mb-3 " id="ALang">
                <label for="adminLangSignup" class="form-label">Coding Language</label>
                <input type="text" class="form-control" id="adminLangSignup" name="adminLangSignup" required>
                <p class="formerror" id="validationLang">
                </p>
            </div>

            <div class="mb-3 " id="Aexp">
                <label for="adminExpSignup" class="form-label">Coding Experience </label>
                <input type="text" class="form-control" id="adminExpSignup" name="adminExpSignup" required>
                <p class="formerror" id="validationExp">
                </p>
            </div>

            <div class="mb-3 " id="AFrom">
                <label for="adminFromSignup" class="form-label">Country</label>
                <input type="text" class="form-control" id="adminFromSignup" name="adminFromSignup" required>
                <p class="formerror" id="validationCountry">
                </p>
            </div>
            <div class="mb-3">
                <label for="adminAbout" class="form-label">About you</label>
                <textarea class="form-control" id="adminAbout" rows="3" name="adminAbout"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-secondary" name="signUp">Sign up</button>


        </form>
        <div class="modal-footer">
            <p class="text-center my-3"><i>Already Have an Account?</i> <a href="_adminLogin.php" class="link-offset-2 link-underline link-underline-opacity-0">Login as Admin</a></p>

        </div>

    </div>

    <br><br>
    <?php include("partials/_footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>