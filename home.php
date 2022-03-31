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
                        <a class="dropdown-item" href="algorithms/rbt.html">Red Black Tree</a>
                        <a class="dropdown-item" href="algorithms/bst.html">Binary Search Tree</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                        Sorts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="algorithms/mergesort.html">Merge sort</a>
                        <a class="dropdown-item" href="algorithms/quicksort.html">Quick sort</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                        Searching
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="algorithms/bst.html">Breadth First Search</a>
                        <a class="dropdown-item" href="algorithms/dfs.html">Depth First Search</a>
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
                        <a class="dropdown-item" href="algorithms/prim.html">Prim</a>
                        <a class="dropdown-item" href="algorithms/kmp.html">KMP</a>
                        <a class="dropdown-item" href="../algorithms/leealgorithm.html">Lee Algorithm</a>
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

</div>


<div id="Slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#Slider" data-slide-to="0" class="active"></li>
        <li data-target="#Slider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="assets/algo.PNG" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 style="color: black;">Merge Sort</h1>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="assets/algo5.PNG" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 style="color: black;">Binary Search Tree </h1>
                </div>
            </div>
        </div>
    </div>


    <a class="carousel-control-prev" href="#Slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">previous</span>
    </a>
    <a class="carousel-control-next" href="#Slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">next</span>
    </a>
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