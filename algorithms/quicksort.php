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
        var blocks = []
                var nums = []
                var statusarray = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
                var statusarray1 = []
                var y = 0
                var time = 1
                var quickstatus = []
                var a = 0
                var item2 = 0
                var leftright = [0]

                function generatebar() {
                    for (x = 0; x < 20; x++) {
                        var randomnum = Math.floor(Math.random() * 200) + 1;
                        var bar = Path.Rectangle(x * 30, 495, 24, -randomnum)
                        bar.strokeColor = "black"
                        blocks.push(bar)
                        nums.push(randomnum)
                    }
                }

                generatebar()

                function swap(items, leftIndex, rightIndex) {
                    var temp = items[leftIndex];
                    items[leftIndex] = items[rightIndex];
                    items[rightIndex] = temp;
                }

                function partition(items, left, right) {

                    var pivot = items[Math.floor((right + left) / 2)], //middle element
                        i = left, //left pointer
                        j = right; //right pointer
                    while (i <= j) {
                        while (items[i] < pivot) {
                            i++;
                        }
                        while (items[j] > pivot) {
                            j--;
                        }
                        if (i <= j) {
                            swap(items, i, j); //sawpping two elements
                            i++;
                            j--;
                        }
                    }
                    return i;
                }

                function quickSort(items, left, right) {
                    item2 = items;
                    leftright.push([blocks[left],blocks[right]])
                    quickstatus.push([item2[0], item2[1], item2[2], item2[3], item2[4], item2[5], item2[6], item2[7], item2[8], item2[9], item2[10], item2[11], item2[12], item2[13], item2[14], item2[15], item2[16], item2[17], item2[18], item2[19]])
                    var index;
                    if (items.length > 1) {
                        index = partition(items, left, right); //index returned from partition
                        if (left < index - 1) { //more elements on the left side of the pivot
                            quickSort(items, left, index - 1);

                        }
                        if (index < right) { //more elements on the right side of the pivot
                            quickSort(items, index, right);
                        }
                    }
                    return items;
                }



                function updatebar(statusarray2,color) {
                    setTimeout(function () {
                        document.getElementById("stepsort").disabled=true;
                        document.getElementById("sort").disabled=true;
                        console.log(statusarray2)
                        blocks[y].strokeColor = "white"
                        var bar = Path.Rectangle(y * 30, 495, 24, -statusarray2[y])
                        bar.strokeColor = "black"
                        statusarray[y] = bar
                        color[0].fillColor ="black"
                        color[1].fillColor ="black"
                        color[0].strokeColor = "black"
                        color[1].strokeColor = "black"
                        if (y < 19) {
                            y++
                            updatebar(statusarray2, color)
                        } else {
                            color[0].fillColor ="white"
                            color[1].fillColor ="white"
                            color[0].strokeColor = "white"
                            color[1].strokeColor = "white"
                            blocks = statusarray
                            document.getElementById("stepsort").disabled=false;
                        }
                    }, 50)
                }
                function updat(){
                    if (time < 19) {
                        console.log(time)
                        console.log(leftright)
                        y = 0
                        updatebar(quickstatus[time],leftright[time])
                        time++
                    }else if(time == 19){
                        console.log(time)
                        console.log(leftright)
                        y = 0
                        updatebar(result,leftright[time])
                    }
                }
                function updat1(){
                    if (time <= 18) {
                        console.log(time)
                        console.log(leftright)
                        y = 0
                        updatebar(quickstatus[time],leftright[time])
                        time++
                    }else if(time == 19){
                        console.log(time)
                        console.log(leftright)
                        y = 0
                        updatebar(result,leftright[time])
                        document.getElementById("stepsort").disabled=true;
                    }
                }
                globals.updategraph = function () {
                    updat1()
                }
                globals.totalsort = function () {
                    setTimeout(updat,1000)
                    setTimeout(updat,3000)
                    setTimeout(updat,5000)
                    setTimeout(updat,7000)
                    setTimeout(updat,9000)
                    setTimeout(updat,11000)
                    setTimeout(updat,13000)
                    setTimeout(updat,15000)
                    setTimeout(updat,17000)
                    setTimeout(updat,19000)
                    setTimeout(updat,21000)
                    setTimeout(updat,23000)
                    setTimeout(updat,25000)
                    setTimeout(updat,27000)
                    setTimeout(updat,29000)
                    setTimeout(updat,31000)
                    setTimeout(updat,33000)
                    setTimeout(updat,35000)
                    setTimeout(updat,37000)

                }
                var result = quickSort(nums, 0, nums.length - 1)
                console.log(result)
                console.log(quickstatus)
    </script>
    <script type="text/javascript">
        window.globals = {}
        window.onload = function () {
            document.getElementById('stepsort').onclick = function () {
                window.globals.updategraph();
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
<canvas class="form" height=800 id="myCanvas" style="background-color: white" width=800></canvas>
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
    <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1" rows="10">•random shuffle the array
• partition so that, for some j
--- entry a[j] is in place
--- no large entry to the left of j
--- no smaller entry to the right of j
• sort each piece recursively
• optimize running time for insertion sort of small arrays</textarea>
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