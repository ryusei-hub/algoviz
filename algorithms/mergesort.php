<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>AlgoViz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="../stylesheets/index.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <script src="../scripts/paper.js" type="text/javascript"></script>
    <script canvas="myCanvas" type="text/paperscript">
        var blocks = []
        var nums = []
        var statusarray = []
        var statusarray1 = []
        var y = 0
        var time = 0

        function generatebar() {
            for (x = 0; x < 20; x++) {
                var randomnum = Math.floor(Math.random() * 200) + 1;
                var bar = Path.Rectangle(x * 30, 495, 24, -randomnum)
                bar.strokeColor = "black"
                blocks.push(bar)
                nums.push(randomnum)
            }
        }

        function merge(left, right) {
            var arr = []
            // Break out of loop if any one of the array gets empty
            while (left.length && right.length) {
                // Pick the smaller among the smallest element of left and right sub arrays
                if (left[0] < right[0]) {
                    arr.push(left.shift())
                } else {
                    arr.push(right.shift())
                }
            }
            arr = arr.concat(left).concat(right)
            if (arr.length == 5) {
                statusarray = statusarray.concat(arr)
            }
            if (arr.length == 10) {
                statusarray1 = statusarray1.concat(arr)
            }
            // Concatenating the leftover elements
            // (in case we didn't go through the entire left or right array)
            return arr
        }

        function updatebar(statusarray2) {
            document.getElementById("stepsort").disabled = true;
            document.getElementById("sort").disabled = true;
            setTimeout(function () {
                blocks[y].strokeColor = "white"
                var bar = Path.Rectangle(y * 30, 495, 24, -statusarray2[y])
                bar.strokeColor = "black"
                blocks[y] = bar
                if (y < 19) {
                    y++
                    updatebar(statusarray2)
                } else {
                    document.getElementById("stepsort").disabled = false;
                }
            }, 100)
        }

        function mergeSort(array) {
            var half = array.length / 2

            // Base case or terminating case
            if (array.length < 2) {
                return array
            }

            var left = array.splice(0, half)
            return merge(mergeSort(left), mergeSort(array))
        }

        generatebar()
        var sorted = mergeSort(nums)
        globals.nodeadd = function () {
            if (time == 0) {
                setTimeout(function () {
                    y = 0
                    updatebar(statusarray)
                    time++
                }, 1000)
            } else if (time == 1) {
                setTimeout(function () {
                    y = 0
                    updatebar(statusarray1)
                    time++
                }, 1000)
            } else if (time == 2) {
                setTimeout(function () {
                    y = 0
                    updatebar(sorted)
                }, 1000)
            } else {
                document.getElementById("sort").disabled = true;
            }
        }
        globals.totalsort = function () {
            setTimeout(function () {
                y = 0
                updatebar(statusarray)
                time++
            }, 1000)
            setTimeout(function () {
                y = 0
                updatebar(statusarray1)
                time++
            }, 4000)
            setTimeout(function () {
                y = 0
                updatebar(sorted)
            }, 8000)
        }
    </script>
    <script type="text/javascript">
        window.globals = {}
        window.onload = function () {
            document.getElementById('stepsort').onclick = function () {
                window.globals.nodeadd();
            }
            document.getElementById('sort').onclick = function () {
                window.globals.totalsort();
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
                       href="#"
                       id="navbarDropdown" role="button" style="font-size: 20px; font-family:Helvetica;">
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
<!--  <img src="assets/white.jpg" class="form">-->
<canvas class="form" height=400 id="myCanvas" style="background-color: white" width=800></canvas>
<button class="btn btn-outline-primary my-2 my-sm-0" id="stepsort" onclick="gen()" style="position: absolute;
  left: 10em; top: 710px;">sort
</button>
<button class="btn btn-outline-primary my-2 my-sm-0" id="sort" onclick="gen()" style="position: absolute;
  left: 14em; top: 710px;">totalsort
</button>

<button class="btn btn-outline-primary my-2 my-sm-0" id="refresh" onclick="window.location.reload();" style="position: absolute;
  left: 20em; top: 710px;">refresh
</button>
<!-- <img src="white.jpg" class="form2">  -->
<div class="form-group">
    <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1"
              rows="10">A list is repeatedly divided into two until all the elements are separated individually. Pairs of elements are then compared, placed into order, and combined. The process is then repeated until the list is recompiled as a whole.</textarea>
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