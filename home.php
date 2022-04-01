<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>AlgoViz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="stylesheets/account.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand " href="home.php" style="font-weight: bold;font-size:25px; color: #3271a8;">ALGOVIZ</a>
    <a href="account.html">
        <img class="user-icon" src="assets/icon.png" alt="user icon">
    </a>
    <a class="navbar-brand " href="account.php" style="font-weight: bold;font-size:25px; color: #3271a8;"
       id="username"></a>
    <?php echo sprintf("<script>document.getElementById('username').innerHTML = '%s'</script>", $_SESSION["name"]) ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav navbar-center">

                <!-- DROP DOWN START ........../ -->
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                        Trees
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="algorithms/rbt.php">Red Black Tree</a>
                        <a class="dropdown-item" href="algorithms/bst.php">Binary Search Tree</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                        Sorts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="algorithms/mergesort.php">Merge sort</a>
                        <a class="dropdown-item" href="algorithms/quicksort.php">Quick sort</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                        Searching
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="algorithms/bst.php">Breadth First Search</a>
                        <a class="dropdown-item" href="algorithms/dfs.php">Depth First Search</a>
                    </div>
                </li>
                <!-- LAST DROP DOWN -->
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                        Others
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="algorithms/prim.php">Prim</a>
                        <a class="dropdown-item" href="algorithms/kmp.php">KMP</a>
                        <a class="dropdown-item" href="algorithms/leealgorithm.php">Lee Algorithm</a>
                    </div>
                </li>
                <!-- //FORUM BUTTON -->
                <li class="nav-item active">
                    <a class="nav-link" href="forum/forum.php" aria-haspopup="true" aria-expanded="false"
                       style="font-size: 20px; font-family:Helvetica;">Forum</a>
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

<!--<div id = "slider" class="carousel">-->
<!--    -->
<!--</div>-->


<div id="Slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="assets/Tree.png" alt="First slide">
            <!--            <div class="container">-->
            <!--                <div class="carousel-caption">-->
            <!--                    <h1 style="color: black;">Merge Sort</h1>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="assets/Quick%20Sort.png" alt="Second slide">
            <!--            <div class="container">-->
            <!--                <div class="carousel-caption">-->
            <!--                    <h1 style="color: black;">Binary Search Tree </h1>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="assets/Tree2.png" alt="Third slide" style="width: 30%">
            <!--            <div class="container">-->
            <!--                <div class="carousel-caption">-->
            <!--                    <h1 style="color: black;">Binary Search Tree </h1>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>

    <a class="carousel-control-prev" href="#Slider" role="button" data-slide="prev" style="bottom: -12.5rem; left: 5%;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#Slider" role="button" data-slide="next"
       style="bottom: -12.5rem; left: 45%;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>

<div class="form" style="top: 50%; left: 10%;">
    <p><b>Trees</b> that we offer visualisations for:</p>
    <a href="algorithms/rbt.php">Red Black Tree</a> :
    <p>No node has two red links connected to it. Every path from root to null link has the same number of black links,
        red links lean left.</p>
    <a href="algorithms/bst.php">Binary Search Tree</a> :
    <p>Each node has a key, and every node's key is larger than all keys in its left subtree and smaller than its right
        subtree.</p>
</div>

<div class="form" style="top: 50%; left: 40%;">
    <p><b>Sorts</b> that we offer visualisations for:</p>
    <a href="algorithms/mergesort.php">Merge Sort</a> :
    <p>Divides array into two halves. Recursively sort each half, merge two halves.</p>
    <a href="algorithms/quicksort.php">Quick Sort</a> :
    <p>Continuously divides the list into two parts and moves the lower items to one side and the
        higher items to the other, chooses one item as the pivot point.</p>
</div>

<div class="form" style="top: 50%; left: 70%;">
    <p><b>Searches</b> that we offer visualisations for:</p>
    <a href="algorithms/bfs.php">Breadth First Search</a> :
    <p>Repeat until queue is empty. Remove vertex v from queue, add to queue all unmarked vertices adjacent to v and
        mark them.</p>
    <a href="algorithms/dfs.php">Depth First Search</a> :
    <p>Using recursion. Mark each visited vertex and keep track of edge taken to visit it. Return when no unvisited
        options</p>
</div>

<div class="form" style="top: 12.5%; left: 3.5%; height: 15rem;">
    <p><b>Other</b> algorithms</p>
    <a href="algorithms/prim.php">Prim</a> :
    <p>Start with vertex 0 and greedily grow tree T. Add to T the min weight edge with exactly one endpoint in T.
        Repeat until V-1 edges</p>
</div>
<div class="form" style="top: 12.5%; left: 77.5%; height: 15rem;">
    <p><b>Other</b> algorithms</p>
    <a href="algorithms/kmp.php">KMP</a> :
    <p>Construct a DFA using the search string. For each state j, if match then go to the next state if not match then
        calculate the state should be in and go back.</p>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>