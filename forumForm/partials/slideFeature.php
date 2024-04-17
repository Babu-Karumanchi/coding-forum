<?php
include("partials/logoutModal.php");
    echo '<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-bs-theme="dark">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasRightLabel">'. $_SESSION['user_username']. '</h3>
            
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
        <div class="offcanvas-body list-group list-group-flush">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item  list-group-item-action">
                  <a class="nav-link active" aria-current="page" href="/forumForm/index.php">Home</a>
                </li>
                <hr>
                <li class="nav-item  list-group-item-action">
                  <a href="https://stackoverflow.com/legal/terms-of-service/public" target="_blank" class="link-offset-2 link-underline link-underline-opacity-0 nav-link active" aria-current="page">Terms & Conditions</a>
                </li>
                <hr>
                <li class="nav-item  list-group-item-action">
                        <a class="nav-link active" aria-current="page" href="/forumForm/profile.php">My Profile</a>
                </li>
                <hr>
                <li class="nav-item list-group-item-action">
                  <a class="nav-link active text-danger fw-bold" aria-current="page" data-bs-toggle="modal" data-bs-target="#logoutModal" >LogOut</a>
                </li>
            </ul>
                <br>
        </div>
    </div>';

    ?>

