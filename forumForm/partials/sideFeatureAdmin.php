<?php
 include("partials/logoutModal.php");
echo '<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-bs-theme="dark">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasRightLabel">' . $_SESSION['admin_username'] . '</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
        <div class="offcanvas-body list-group list-group-flush">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active" aria-current="page" href="/forumForm/admindashboard.php">Dashboard</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active" aria-current="page" href="/forumForm/adminUserlist.php">User List</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active" aria-current="page" href="/forumForm/adminCatlist.php">Category List</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active" aria-current="page" href="/forumForm/adminFeedbacklist.php">Feedback List</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active" aria-current="page" href="/forumForm/adminQuestionAnswerList.php">Question/Answer List</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active" aria-current="page" href="/forumForm/adminprofile.php">My Profile</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                    <a class="nav-link active text-danger fw-bold" aria-current="page" data-bs-toggle="modal" data-bs-target="#logoutModal" >LogOut</a>
                </li>
            </ul>
        </div>
    </div>';


?>
<!-- <a class="nav-link active text-danger " aria-current="page" href="partials/_logout.php">LogOut</a> -->