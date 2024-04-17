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
            Registration
        </h1>

        <form action="/forumForm/partials/_handleSignup.php" method="post" id="myForm" onsubmit="return validateForm()" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3 " id="UName">
                <label for="signupName" class="form-label">Name</label>
                <input type="text" class="form-control" id="signupName" name="signupName" required>
                <p class="formerror text-danger" id="validationName">
                    <?php
                    // global $TrueName;
                    // if ($TrueName) {
                    //     echo 'Only alphabets and whitespace are allowed.';
                    // }
                    ?>
                </p>

            </div>
            <div class="mb-3" id="UUser">
                <label for="signupUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="signupUsername" name="signupUsername" required>
                <!-- <p class="formerror"> -->
                <?php
                // global $TrueUserName;
                // if ($TrueUserName) {
                //     echo 'Only alphabets and Numbers are allowed.';
                // } 
                ?>
                <!-- </p> -->
                <p class="formerror text-danger" id="validationUsername"></p>
            </div>

            <div class="mb-3" id="UEmail">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp" name="signupEmail" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <p class="formerror text-danger" id="validationEmail"></p>
            </div>
            <div class="mb-3" id="UImg">
                <label for="uploadfile" class="form-label">Profile</label>
                <input class="form-control" type="file" name="uploadfile" value="" required accept=".jpg, .jpeg, .png" />
                <p class="formerror text-danger" id="validationImage"></p>
            </div>
            <div class="mb-3" id="UPass">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
                <p class="formerror text-danger" id="validationPassword"></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="signupCPassword" name="signupCPassword" required>
                <p class="formerror text-danger" id="validationConfirmPassword"></p>
            </div>
            <button type="submit" class="btn btn-outline-secondary" name="signUp">Sign up</button>

            <div class="modal-footer">
                <p class="text-center my-3"><i>Already Have an Account?</i> <a href="_loginModal.php" class="link-offset-2 link-underline link-underline-opacity-0">Login as User</a></p>
                <br>

            </div>
        </form>
    </div>

    <br><br>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nameInput = document.getElementById("signupName");
            const usernameInput = document.getElementById("signupUsername");
            const emailInput = document.getElementById("signupEmail");
            const imageInput = document.getElementById("uploadfile");
            const passwordInput = document.getElementById("signupPassword");
            const confirmPasswordInput = document.getElementById("signupCPassword");

            const nameValidation = document.getElementById("validationName");
            const usernameValidation = document.getElementById("validationUsername");
            const emailValidation = document.getElementById("validationEmail");
            const imageValidation = document.getElementById("validationImage");
            const passwordValidation = document.getElementById("validationPassword");
            const confirmPasswordValidation = document.getElementById("validationConfirmPassword");

            nameInput.addEventListener("input", function() {
                validateName(this.value, nameValidation);
            });

            usernameInput.addEventListener("input", function() {
                validateUsername(this.value, usernameValidation);
            });

            emailInput.addEventListener("input", function() {
                validateEmail(this.value, emailValidation);
            });

            imageInput.addEventListener("change", function() {
                validateImage(this, imageValidation);
            });

            passwordInput.addEventListener("input", function() {
                validatePassword(this.value, passwordValidation);
            });

            confirmPasswordInput.addEventListener("input", function() {
                validateConfirmPassword(passwordInput.value, this.value, confirmPasswordValidation);
            });
        });

        function validateName(name, validationElement) {
            if (name.trim().length < 3) {
                showValidationMessage(validationElement, "Name should be at least 3 characters long. ");
            } else if (!/^[a-zA-Z]+$/.test(name)) {
                showValidationMessage(validationElement, "Name should contain only alphabets ");
            } else if (name.trim() === "") {
                showValidationMessage(validationElement, "Please enter a name.");
            } else {
                showValidationMessage(validationElement, "");
            }

        }

        function validateUsername(username, validationElement) {
            if (username.trim().length < 4) {
                showValidationMessage(validationElement, "Name should be at least 4 characters long. ");
            } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
                showValidationMessage(validationElement, "Username should contain only letters and numbers.");
            } else if (username.trim() === "") {
                showValidationMessage(validationElement, "Please enter a username.");
            } else {
                showValidationMessage(validationElement, "");
            }
        }

        function validateEmail(email, validationElement) {
            if (!/\S+@\S+\.\S+/.test(email)) {
                showValidationMessage(validationElement, "Please enter a valid email address.");
            } else if (email.trim() === "") {
                showValidationMessage(validationElement, "Please enter a email.");
            } else {
                showValidationMessage(validationElement, "");
            }
        }

        function validateImage(imageInput, validationElement) {
            const allowedExtensions = ["jpg", "jpeg", "png"];
            const fileExtension = imageInput.value.split(".").pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                showValidationMessage(validationElement, "Please upload an image with jpg, jpeg, or png format.");
            } else {
                showValidationMessage(validationElement, "");
            }
        }

        function validatePassword(password, validationElement) {
            if (password.trim().length < 8) {
                showValidationMessage(validationElement, "Password must be at least 8 characters long.");
            } else if (password.trim() === "") {
                showValidationMessage(validationElement, "Please enter a password.");
            } else {
                showValidationMessage(validationElement, "");
            }
        }


        function validateConfirmPassword(password, confirmPassword, validationElement) {
            if (password !== confirmPassword) {
                showValidationMessage(validationElement, "Passwords do not match.");
            } else {
                showValidationMessage(validationElement, "");
            }
        }



        function showValidationMessage(element, message) {
            element.textContent = message;
        }
    </script>
    <?php include("partials/_footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>