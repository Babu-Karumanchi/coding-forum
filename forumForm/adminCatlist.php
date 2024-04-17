<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php include("partials/_adminHeader.php"); ?>
    <?php include("partials/_dbconnect.php"); ?>

    <!--TODO   Edit insert  -->


    <div class="container p-4">
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white rounded container p-4">
        <h3>List of Categories</h3>
        <hr>
        <div class="container">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] != false) {
                echo '<div class="modal-footer">
                <button class="btn bg-success text-light ms-1" data-bs-toggle="modal" data-bs-target="#createModal">Create category</button>
            </div>';
            }


            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] != false) {
                echo '<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="CModalLabel">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/forumForm/partials/_adminCreateCatHandle.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="cName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="cName" name="cName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Description</label>
                                    <textarea class="form-control" id="edesc"     name="edesc" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="CSave" value="" class="btn btn-outline-primary">Create </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> ';
            }
            ?>

        </div>

        <div class="container my-4">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope=" col">Sno</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                    $sno = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $catName = $row['category_name'];
                        $catDesc = $row['category_discreption'];
                        echo '<tr>
                            <th scope="row">' . $sno . '</th>
                            <td>' . $catName . '</td>
                            <td>' .$catDesc. '..</td>
                            <td> 
                                <a class="edit btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#editModal"  id="' . $row['category_id'] . '">Edit</a>
                                <a class=" btn btn-danger delete m-2" data-bs-toggle="modal" data-bs-target="#DelExampleModal" data-id="' . $row['category_id'] . '">Delete</a>
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
    // Delete  Modal
    echo ' <div class="modal fade" id="DelExampleModal" tabindex="-1" aria-labelledby="DelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DelModalLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/forumForm/partials/_deleteHandleCatAdmin.php" method="post">
                    <div class="modal-body">
                        <h4>Are you sure ?</h4>
                    </div>
                
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button name="userDelete" type="submit" class="btn btn-danger">Yes</button>
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
                        <form action="/forumForm/partials/_adminEditCatHandle.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="hidden" name="snoEdit" id="snoEdit">
                                    <label for="eName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="eName" name="eName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="eDesc" class="form-label">Description</label>
                                    <textarea class="form-control" id="eDesc" name="eDesc"  rows="3"></textarea>
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

    <br><br>

    <?php include("partials/_adminfooter.php"); ?>


    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
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
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                name = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(name, description);
                //  edit Name
                eName.value = name;
                // description Edit
                eDesc.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
    </script>

</body>

</html>