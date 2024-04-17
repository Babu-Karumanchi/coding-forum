<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codies</title>
    <script src="./assets/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>


.baseBlock {
	
	-moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	-o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.baseBlock:hover {
	-webkit-transform: translate(0, -8px);
	-moz-transform: translate(0, -8px);
	-ms-transform: translate(0, -8px);
	-o-transform: translate(0, -8px);
	transform: translate(0, -8px);
	box-shadow: 0 40px 40px rgba(0, 0, 0, 0.2);
}

</style>
</head>

<body>
    <?php include("partials/_header.php"); ?>
    <?php include("partials/_dbconnect.php"); ?>


    <!-- category container starts here  -->
    <!-- using a for loop to iterate through categories  -->
    <div class="container my-3">
        <div class="row my-4">
            <!-- fetch all the catergories  -->
            <?php
            $no=1;
            $limit = 2;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            $sql = " SELECT * FROM `categories` LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $sql);
            $NoResult = true;

            while ($row = mysqli_fetch_assoc($result)) {
                $NoResult = false;
                $id = $row['category_id'];
                $name = $row['category_name'];
                $disc = $row['category_discreption'];
                $created = $row['created'];
                
                echo'<div class="card mb-3 baseBlock" id="myCard">
                        <div class="card-body ">
                            <input type="hidden" name="idCat" id="idCat" value="'.$id.'">
                            <h5 class="card-title">' . $name . '</h5>
                            <p class="card-text">' . substr($disc, 0, 120) . '...</p>
                            <p class="card-text"><small class="text-body-secondary">Created ' . $created . ' ago</small></p>
                        <div class="card-body">
                            <img src="img/cat'.$no.'.jpg" class="card-img-top" alt="...">
                            </div>
                            <a href="threadlist.php?catid=' . $id . '" class="btn  btn-outline-primary">Ask Question</a>
                            </div>
                    </div>';
                    // <img src="https://source.unsplash.com/2400x700/?coding,' . $name . '" class="card-img-top" alt="...">
                $no++;
            }

            if ($NoResult) {
                echo '  <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <p class="display-4">No Cat found</p>
                                <p class="lead">Be the first person to make cat</p>
                            </div>
                        </div>';
            }
            $sql1 = " SELECT * FROM `categories`";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1)) {
                $total_records =  mysqli_num_rows($result1);
                $total_page = ceil($total_records / $limit);
                echo '<nav aria-label="Page navigation example">
                <ul class="pagination">';
                if ($page > 1) {

                    echo '<li class="page-item"><a class="page-link" href="topic.php?page=' . ($page - 1) . '">Previous</a></li>';
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }

                    echo  '
                         <li class="page-item"><a class="page-link ' . $active . '" href="topic.php?page=' . $i . '">' . $i . '</a></li>
                         ';
                }
                if ($total_page > $page) {
                    echo '<li class="page-item"><a class="page-link" href="topic.php?page=' . ($page + 1) . '">Next</a></li>';
                }
            }
            echo '</ul>
            </nav>';
           
            ?>
            <!-- <img src="https://source.unsplash.com/2400x700/?code,' . $name . '" class="card-img-top" alt="..."> -->





        </div>
    </div>

    <?php include("partials/_footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
    // Card
        // cards = document.getElementsByClassName('card');
        // Array.from(cards).forEach((element) => {
        //     element.addEventListener("click", (e) => {
        //         // console.log(this);
        //         div = e.target.parentNode;
        //         name = div.getElementsByTagName("div")[1].innerText;
        //         console.log(div);
        //         console.log(name);
        //     })
        // })
    </script>
</body>

</html>