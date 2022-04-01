<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <title>AlgoViz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/LeeAlgorithm.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background:linear-gradient(to top, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(../assets/two.jpg);">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand " href="../home.php" style="font-weight: bold;font-size:25px; color: #3271a8;">ALGOVIZ</a>
    <a href="../account.php">
        <img alt="user icon" class="user-icon" src="../assets/icon.png">
    </a>
    <a class="navbar-brand " href="../account.php" style="font-weight: bold;font-size:25px; color: #3271a8;"
       id="username"></a>
    <?php echo sprintf("<script>document.getElementById('username').innerHTML = '%s'</script>", $_SESSION["name"]) ?>
    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
            data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
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
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
                        Trees
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="rbt.html">red black tree</a>
                        <a class="dropdown-item" href="bst.html">binary search tree</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
                        Sorts
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="mergesort.html">Merge sort</a>
                        <a class="dropdown-item" href="quicksort.html">Quick sort</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
                        Searching
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="bfs.html">breadth first search</a>
                        <a class="dropdown-item" href="dfs.html">depth first search</a>
                    </div>
                </li>
                <!-- LAST DROP DOWN /////////////////// -->
                <li class="nav-item active dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
                        Others
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="prim.html">Prim</a>
                        <a class="dropdown-item" href="kmp.html">KMP</a>
                        <a class="dropdown-item" href="leealgorithm.html">Lee Algorithm</a>
                        <!-- <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
                <li class="nav-item active">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link" href="../forum/forum.php"
                       style="font-size: 20px; font-family:Helvetica;">Forum</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="gridContainer" class="form-group">
    <div class="right" id="grid">
        <div class="gridContainer"></div>
    </div>
    <div class="page" style="color: #cccccc">
        <h3>Lee Algorithm</h3>
        <label for="quantity">Type A Value For Grid Size(2-26):</label>
        <input type="number" id="quantity" name="quantity" />
        <!-- <button id="continue" onclick="continueSearch()">Continue</button> -->
    </div>
    <div class="form-group">
        <textarea style="resize: none; position: absolute; top: 10em; left: -10em" class="form-control" rows="10">The algorithm is a breadth-first based algorithm that uses queues to store the steps. It usually uses the following steps: Choose a starting point and add it to the queue. Add the valid neighboring cells to the queue. Remove the position you are on from the queue and continue to the next element. Repeat steps 2 and 3 until the queue is empty.</textarea>
    </div>
</div>

<script src="../scripts/LeeAlgorithm.js"></script>
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
