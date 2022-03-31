<!doctype html>
<html lang="en">
    <head>
        <title>AlgoViz</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body style="background:linear-gradient(to top, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(../assets/two.jpg);">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand " href="../home.php" style="font-weight: bold;font-size:25px; color: #3271a8;">ALGOVIZ</a>
            <a href="../account.html">
                <img class="user-icon" src="../assets/icon.png" alt="user icon">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav navbar-center">
                        <!-- <li class="nav-item active">
                                    <a class="nav-link" href="#" style="font-size: 20px; font-family:Helvetica;">Home <span class="sr-only">(current)</span></a>
                                    </li> -->
                        <!-- DROP DOWN START ........../ -->
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                                Trees
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../algorithms/rbt.html">red black tree</a>
                                <a class="dropdown-item" href="../algorithms/bst.html">binary search tree</a>
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                                Sorts
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../algorithms/mergesort.html">Merge sort</a>
                                <a class="dropdown-item" href="../algorithms/quicksort.html">Quick sort</a>
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                                Searching
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../algorithms/bst.html">breadth first search</a>
                                <a class="dropdown-item" href="../algorithms/dfs.html">depth first search</a>
                            </div>
                        </li>
                        <!-- LAST DROP DOWN /////////////////// -->
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                                Others
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../algorithms/prim.html">Prim</a>
                                <a class="dropdown-item" href="../algorithms/kmp.html">KMP</a>
                                <a class="dropdown-item" href="../algorithms/leealgorithm.html">Lee Algorithm</a>

                                <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a> -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Searching barrrrr............. -->
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div id="mobile" class="content">
            <div class="container">
                <div class="form">
                    <label for="inputTopic"></label>
                    <p style="color:white" id="Title" class="title"><strong></strong>
                        <label>
                    <p name="name_topic" class="form-control" id="inputTopic" aria-describedby="inputHelp">Topic goes here</p>
                    <p name="post_text" class="form-control" value="text" aria-describedby="inputHelp" rows=8 cols=97
                       wrap=virtual>Description goes here</p>
                    </label> <small id="inputHelp" class="form-text text-muted"></small>
                    <form method="post">
                        <br><br><input id="postReply" name="replyText" class="form-control" aria-describedby="inputHelp"
                                       placeholder="Add an entry"></input><br>
                        <button id="replyButton" class="btn btn-outline-primary my-2 my-sm-0" onclick="moveDown()" type="submit"
                                name="reply" value="insert">Reply
                        </button>
                        <br><br>
                    </form>
                    <?php
                    if (isset($_POST['reply'])) {
                        $input = $_POST['replyText'];
                        echo '<p name="new-post" class="form-control"  id="inputTopic" aria-describedby="inputHelp">';
                        echo $input;
                        echo '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
        </script>
        <script>
            function moveDown() {
                document.getElementById("mobile").style.marginLeft = "-330px"
            }
        </script>
    </body>

</html>

