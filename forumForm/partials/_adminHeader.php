<?php
include("partials/_dbconnect.php");
session_start();
echo ' <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forumForm/admindashboard.php">cD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="btn btn-dark mx-4 mt-2 d-flex p-2 navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="navbar-toggler-icon"></span></button> 
    </div>
</nav>';

include("partials/sideFeatureAdmin.php");

// delete account 
if (isset($_GET['deleteSuccess']) && $_GET['deleteSuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> User account has been deleted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// delete feedback 
if (isset($_GET['deleteSuccessFeedback']) && $_GET['deleteSuccessFeedback'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Feedback has been deleted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// delete question
if (isset($_GET['deleteSuccessQuestion']) && $_GET['deleteSuccessQuestion'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Question has been deleted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// delete answer
if (isset($_GET['AnsDeleteSuccess']) && $_GET['AnsDeleteSuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Answer has been deleted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// Category has been deleted
if (isset($_GET['deleteCatSuccess']) && $_GET['deleteCatSuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Category has been deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if (isset($_GET['deleteSuccess']) && $_GET['deleteSuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

//  Category has been created 

if (isset($_GET['create']) && $_GET['create'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Category has been created <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['create']) && $_GET['create'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

//  Category has been edited

if (isset($_GET['edit']) && $_GET['edit'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Category has been edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['edit']) && $_GET['edit'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}


// admin edit 

if (isset($_GET['adminEditSuccess']) && $_GET['adminEditSuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
             <strong>Success!</strong> Your account details has been updated <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if (isset($_GET['adminEditSuccess']) && $_GET['adminEditSuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

//  Category has been edited

if (isset($_GET['ansEdit']) && $_GET['ansEdit'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Answer has been edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['ansEdit']) && $_GET['ansEdit'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error !</strong> try again <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
