<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>AlgoViz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="../stylesheets/index.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!-- Load the Paper.js library -->
    <script src="../scripts/paper.js" type="text/javascript"></script>

    <!-- Define inlined PaperScript associate it with myCanvas -->
    <script canvas="myCanvas" type="text/paperscript">
        var points = [];
        var circles = [];
        var dirpath = [[], [], [], [], [], [], [], [], [], []];
        var marked = [false, false, false, false, false, false, false, false, false, false];
        var count = 0;
        var edgeTo = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var path = []
        var pathedgeTo = [];
        var pathe = [];
        var pathindex = 0

        function graphgen() {
            for (i = 0; i < 10; i++) {
                var myPoint = new Point(550, 480) * Point.random();
                var myCircle = new Path.Circle(myPoint, 10);
                var overlap = false;
                for (x = 0; x < i; x++) {
                    if (myCircle.intersects(circles[x]) == true) {
                        overlap = true;
                        break
                    }
                }
                if (overlap != true) {
                    myCircle.strokeColor = 'black';
                    myCircle.fillColor = 'black';
                    var number = new paper.PointText(new Point(myPoint.x - 4, myPoint.y + 4));
                    number.content = i;
                    number.strokeColor = "white";
                    points.push(myPoint);
                    circles.push(myCircle);
                } else {
                    i--;
                }
            }

        }

        graphgen()

        function depthfirstsearch(g, s, v) {
            marked = [false, false, false, false, false, false, false, false, false, false]
            edgeTo = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            pathedgeTo = ["", "", "", "", "", "", "", "", "", ""];
            dfs(g, s)
            if (marked[v] == true) {
                for (x = v; x != s; x = edgeTo[x]) {
                    path.push(x);
                    pathe.push(pathedgeTo[x])
                }
                path.push(s);
            }
            if (path.length != 0) {
                pathindex = pathe.length - 1
                pathcoloring()
            }
        }

        function pathcoloring() {
            setTimeout(function () {
                pathe[pathindex].strokeColor = "red";
                pathe[pathindex].strokeWidth = 4
                pathindex--
                if (pathindex >= 0) {
                    pathcoloring()
                }
            }, 500)
        }

        function dfs(g, v) {
            marked[v] = true;
            for (var f = 0; f < g[v].length; f++) {
                w = g[v][f][1]
                if (marked[w] == false) {
                    g[v][f][0].strokeColor = "green"
                    edgeTo[w] = v
                    pathedgeTo[w] = g[v][f][0]
                    dfs(g, w)
                }
            }
        }

        function connectiongen(index) {
            var same = false;
            var pointcho = points;
            pointchose = pointcho;
            var targetindex = Math.floor(Math.random() * pointchose.length);
            var target = pointchose[targetindex];
            var pathline = new Path.Line({
                from: points[index],
                to: target,
            });
            overlape = false;
            for (x = 0; x < dirpath.length; x++) {
                for (a = 0; a < dirpath[x].length; a++) {
                    if ((pathline.getCrossings(dirpath[x][a][0])).length >= 1) {
                        overlape = true;
                    }
                }
            }
            for (y = 0; y < circles.length; y++) {
                if ((pathline.getCrossings(circles[y])).length >= 2) {
                    overlape = true;
                }
            }
            if (overlape == false && targetindex != index) {
                if (dirpath[index].length == 0) {
                    pathline.strokeColor = 'black';
                    dirpath[index].push([pathline, targetindex]);
                    dirpath[targetindex].push([pathline, index])
                }
                for (d = 0; d < dirpath[index].length; d++) {
                    if (dirpath[index][d][1] == targetindex) {
                        same = true
                    } else {
                    }
                }
                for (g = 0; g < dirpath[targetindex].length; g++) {
                    if (dirpath[targetindex][g][1] == index) {
                        same = true
                    } else {
                    }
                }
                if (same == false) {
                    pathline.strokeColor = 'black';
                    dirpath[index].push([pathline, targetindex]);
                    dirpath[targetindex].push([pathline, index])
                }
            } else {
                // pathline.strokeColor = 'blue';
            }
            circles[0].fillColor = "red";
            circles[9].fillColor = "blue";
        }

        globals.connectiongenonclick = function () {
            for (i = 0; i < 10; i++) {
                for (k = 0; k < Math.floor(Math.random() * 20); k++) {
                    connectiongen(i)
                }
            }
        }
        globals.dfsearch = function () {
            depthfirstsearch(dirpath, 0, 9)
        }
    </script>
    <script type="text/javascript">
        window.globals = {}
        window.onload = function () {
            document.getElementById('linegen').onclick = function () {
                window.globals.connectiongenonclick();
            }
            document.getElementById('dfs').onclick = function () {
                window.globals.dfsearch();
            }
        }
    </script>
</head>

<body style="background:linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(../assets/two.jpg);">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand " href="../home.php" style="font-weight: bold;font-size:25px; color: #3271a8;">ALGOVIZ</a>
    <a href="../account.php">
        <img alt="user icon" class="user-icon" src="../assets/icon.png">
    </a>
    <a class="navbar-brand " href="../account.php" style="font-weight: bold;font-size:25px; color: #3271a8;"
       id="username"></a>
    <?php echo sprintf("<script>document.getElementById('username').innerHTML = '%s'</script>", $_SESSION["name"]) ?>
    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler"
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
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       id="navbarDropdown" role="button" style="font-size: 20px; font-family:Helvetica;">
                        Trees
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="rbt.php">red black tree</a>
                        <a class="dropdown-item" href="bst.php">binary search tree</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       id="navbarDropdown" role="button" style="font-size: 20px; font-family:Helvetica;">
                        Sorts
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="mergesort.php">Merge sort</a>
                        <a class="dropdown-item" href="quicksort.php">Quick sort</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       id="navbarDropdown" role="button" style="font-size: 20px; font-family:Helvetica;">
                        Searching
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="bfs.php">breadth first search</a>
                        <a class="dropdown-item" href="dfs.php">depth first search</a>
                    </div>
                </li>
                <!-- LAST DROP DOWN /////////////////// -->
                <li class="nav-item active dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="../forum/forum.php" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
                        Others
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <a class="dropdown-item" href="prim.php">Prim</a>
                        <a class="dropdown-item" href="kmp.php">KMP</a>
                        <a class="dropdown-item" href="leealgorithm.php">Lee Algorithm</a>

                        <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
<canvas class="form" height=800 id="myCanvas" style="background-color: white" width=800></canvas>
<button class="btn btn-outline-primary my-2 my-sm-0" id="linegen" onclick="gen()" style="position: absolute;
  left: 10em; top: 710px;">connectiongen
</button>
<button class="btn btn-outline-primary my-2 my-sm-0" id="dfs" onclick="" style="position: absolute;
  left: 18em; top: 710px;">depthfirst
</button>
<button class="btn btn-outline-primary my-2 my-sm-0" id="refresh" onclick="window.location.reload();" style="position: absolute;
  left: 24em; top: 710px;">refresh
</button>

<!-- <img src="white.jpg" class="form2">  -->
<div class="form-group">
    <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1"
              rows="10">Start at the root node of a tree and go as far as possible down a given branch, then backtrack until it an unexplored path is found, and then explore it. Repeat until the entire graph has been explored.</textarea>
</div>


<script crossorigin="anonymous"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script crossorigin="anonymous"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script crossorigin="anonymous"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>