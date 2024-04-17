<?php
include("partials/_dbconnect.php");

session_start();

// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){


echo '   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forumForm/topic.php">cD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forumForm/index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forumForm/topic.php">Topics</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu bg-dark text-light">';

$sql = "SELECT * FROM `categories` ";
$result = mysqli_query($conn, $sql);
$noResult = true;
while ($row = mysqli_fetch_assoc($result)) {
    $cat_name = $row['category_name'];
    $cat_id = $row['category_id'];
    echo '<li><a class="dropdown-item bg-dark text-light" href="/forumForm/threadlist.php?catid=' . $cat_id . '">' . $cat_name . '</a></li>';
}



echo    '</ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forumForm/feedback.php" >Feedback</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="/forumForm/about.php">About</a>
            </li>
        </ul>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // echo '<div class="mx-4 mt-2 d-flex p-2 bd-highlight  ">
    //         <form class="d-flex " role="search" action="/forumForm/search.php" >
    //            <input class="form-control me-2"  name="search" type="search"  placeholder="Search" aria-label="Search">
    //            <button class="btn btn-secondary" type="submit">Search</button>

    //            <p class="text-light my-0 mx-2 d-flex">' . $_SESSION['user_username'] . ' </p>
    //            <a href="partials/_logout.php" class="btn btn-outline-danger ml-2">Logout</a>
    //            </form>
    //         </div>';

    echo '      <div class="mx-4 mt-2 d-flex p-2 bd-highlight  ">
                    <form class="d-flex " role="search" action="/forumForm/search.php" >
                        <input class="form-control me-2"  name="search" type="search"  placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </form>
                </div>
                
                <button class="btn btn-dark mx-4 mt-2 d-flex p-2 navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="navbar-toggler-icon"></span></button>';
} else {
    echo '<div class="mx-2 mt-2 d-flex p-2 bd-highlight">
            <a class="btn btn-outline-secondary mx-1 font-weight-bolder text-light pr-3 mx-2 text-decoration-none border-right" href="/forumForm/_loginModal.php">Login</a>
            <a class="btn btn-outline-secondary mx-1 font-weight-bolder text-light pr-3 mx-2 text-decoration-none border-right" href="/forumForm/_signupModal.php">Register</a>
            <a class="btn btn-outline-secondary mx-1 font-weight-bolder text-light mx-2 text-decoration-none" href="/forumForm/_adminLogin.php">Admin Login</a>
        </div>';
}
//  <form class="d-flex" role="search" method="get" action="/forumForm/search.php">
//             <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
//             <button class="btn btn-secondary" type="submit">Search</button>
//         </form>

//  <a href="/forumForm/_user.php" class="btn btn-outline-secondary mx-3">User</a>
//  <a href="/forumForm/_admin.php" class="btn btn-outline-secondary mx-3">Admin</a>
echo ' </div>
    </div>
    </nav> ';


// signup user 

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
   <strong>Success!</strong> Your Account has been created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}



if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error !</strong> Try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

// feedback

if (isset($_GET['contactsuccess']) && $_GET['contactsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Your report has been submitted
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if (isset($_GET['contactsuccess']) && $_GET['contactsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

// delete account 
if (isset($_GET['deleteSuccess']) && $_GET['deleteSuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Your account has been deleted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['deleteSuccess']) && $_GET['deleteSuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}


// edit account 
if (isset($_GET['editSuccess']) && $_GET['editSuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Your account details has been updated login again with new details <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['editSuccess']) && $_GET['editSuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}



// admin login

if (isset($_GET['signupErrorUsername']) && $_GET['signupErrorUsername'] == "true") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error !</strong> try again username already exists <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if (isset($_GET['adminsignupsuccess']) && $_GET['adminsignupsuccess'] == "true") {
    echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
            <strong>Success !</strong> you can login after a review on details <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}


// login  error
if (isset($_GET['loginError']) && $_GET['loginError'] == "false") {
    $me = $_GET["error"];
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error !</strong> '.$me.' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    include("partials/slideFeature.php");
}
