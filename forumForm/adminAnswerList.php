<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>
    <?php include("partials/_dbconnect.php"); ?>
    <?php include("partials/_adminHeader.php"); ?>
    <div class="container p-4 m-4">
    </div>
    <div class="shadow-lg p-3 mb-5 bg-white rounded container p-4">
        <h3>List of Answer </h3>
        Rating (1-5)
        <hr>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id =$id;";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];

            // Query the users table to find out the name of the person posted
            $sql3 = "SELECT user_username FROM `users` WHERE sno='$thread_user_id'";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $posted_by  = $row3['user_username'];
        }
        ?>
        <div class="container my-3">
            <div class="jumbotron ">
                <h1>Question - </h1>
                <h3 class="display-6"><?php echo $title; ?></h3>
                <p class="lead"><?php echo $desc; ?></p>
                <p>Posted by:<em> <?php echo $posted_by; ?></em></p>
            </div>
        </div>
        <hr>
        <div class="container my-4">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope=" col">Sno</th>
                        <th scope="col">Username</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = $_GET['threadid'];
                    $sql = " SELECT * FROM `comments` WHERE thread_id =$id";
                    $result = mysqli_query($conn, $sql);
                    $noResult = true;
                    $sno = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $noResult = false;
                        $id = $row['comment_id'];
                        $content = $row['comment_content'];
                        $rating = $row['comment_rating'];
                        $comment_by = $row['comment_by'];

                        $sql2 = "SELECT * FROM `users` WHERE sno='$comment_by'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $user_name = $row2['user_username'];

                        echo '<tr>
                                <td scope="row">' . $sno . '</td>
                                <td>' . $user_name . '</td>
                                <td>'  .  $content . '</td>
                                <td>' . $rating  . '</td>
                                <td> 
                                <a class="edit btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#editModal"  id="' . $row['comment_id'] . '">Edit</a>
                                <a class=" btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#DelExampleModal" data-id="' . $row['comment_id'] . '">Delete</a>
                                </td>
                            </tr>';
                        $sno = $sno + 1;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    // delete 
    echo ' <div class="modal fade" id="DelExampleModal" tabindex="-1" aria-labelledby="DelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="DelModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/forumForm/partials/_deleteHandleAnswerAdmin.php" method="post">
                        <div class="modal-body">
                            <h4>Are you sure ?</h4>
                        </div>
                    
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button name="userAnsDelete" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';

    // Edit Modal
    echo '<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/forumForm/partials/_adminEditAnsHandle.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="hidden" name="snoEdit" id="snoEdit">
                                    <label for="answer" class="form-label">Answer</label>
                                    <textarea class="form-control" id="answer" name="answer"  rows="6"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating</label>
                                    <input type="text" class="form-control" id="rating" name="rating" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="eSave" value="" class="btn btn-outline-success">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> ';

    ?>

    <?php include("partials/_adminfooter.php"); ?>

    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- data tables  -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });


        // Delete 
        $(document).ready(function() {
            $('a.delete').click(function(e) {
                e.preventDefault();
                var link = this;
                var deleteModal = $("#DelExampleModal");
                // store the ID inside the modal's form
                deleteModal.find('input[name=id]').val(link.dataset.id);
                // open modal
                deleteModal.modal();
            });
        });
    </script>
    <script>
        // Edit
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit");
                tr = e.target.parentNode.parentNode;
                gotAnswer = tr.getElementsByTagName("td")[2].innerText;
                gotRating = tr.getElementsByTagName("td")[3].innerText;
                console.log(gotAnswer, gotRating);
                //  edit answer
                answer.value = gotAnswer;
                // Edit rating
                rating.value = gotRating;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
    </script>
</body>

</html>