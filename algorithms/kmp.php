<?php session_start(); ?>
<!DOCTYPE html>
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
        var genes = ["A", "C", "G", "T"];
        var substring = "";
        var strinput = "";
        var dfa = [];
        var states = [];
        dfa["A"] = [0, 0, 0, 0, 0];
        dfa["C"] = [0, 0, 0, 0, 0];
        dfa["G"] = [0, 0, 0, 0, 0];
        dfa["T"] = [0, 0, 0, 0, 0];
        var characters = [];
        var charpath = [];
        var blackobj = 0
        var pointer = 0

        function stringgen() {
            for (i = 0; i < 5; i++) {
                substring = substring + genes[Math.floor(Math.random() * 4)];
            }
            for (y = 0; y < 40; y++) {
                strinput = strinput + genes[Math.floor(Math.random() * 4)];
            }
        }

        function dfaconstruct(pat) {
            dfa[pat[0]][0] = 1;
            for (x = 0, j = 1; j < 5; j++) {
                for (c = 0; c < 4; c++) {
                    dfa[genes[c]][j] = dfa[genes[c]][x];
                }
                dfa[pat[j]][j] = j + 1;
                x = dfa[pat[j]][x];
            }
        }

        function graphconstruct(dfa, substring, strinput) {
            for (a = 0; a < 6; a++) {
                var myPoint = new Point(50 + a * 100, 100);
                var myCircle = new Path.Circle(myPoint, 10);
                myCircle.strokeColor = 'black';
                myCircle.fillColor = 'black';
                var num = new paper.PointText(new Point(myPoint.x - 4, myPoint.y + 4));
                num.content = a;
                num.strokeColor = "white";
                states.push(myCircle)
                characters.push(myPoint);
            }
            var searchstring = new paper.PointText(new Point(0, 300));
            var targetstring = new paper.PointText(new Point(0, 270));
            targetstring.content = "searching: " + substring;
            targetstring.strokeColor = "black";
            searchstring.content = "from: " + strinput;
            searchstring.strokeColor = "black";
            for (b = 0; b < 5; b++) {
                //var content = ""
                var content = ["", "", "", "", "", ""]
                // var charac = []
                for (d = 0; d < 4; d++) {
                    if (dfa[genes[d]][b] < 6) {
                        if (Math.abs(dfa[genes[d]][b] - b) == 0) {
                            var pathpoint = new Point(characters[b].x - 10, characters[b].y - 10)
                            var path = new Path.Circle(pathpoint, 8);
                            var chara = new paper.PointText(new Point(pathpoint.x - 10, pathpoint.y - 10));
                            content[dfa[genes[d]][b]] = content[dfa[genes[d]][b]] + genes[d];
                        } else if (Math.abs(dfa[genes[d]][b] - b) == 1) {
                            if (dfa[genes[d]][b] < b) {
                                var thourgh = new Point(characters[b].x - 50, characters[b].y - 20);
                                var path = new Path.Arc(characters[b], thourgh, characters[dfa[genes[d]][b]]);
                                var chara = new paper.PointText(new Point(thourgh.x, thourgh.y + 10));
                                content[dfa[genes[d]][b]] = content[dfa[genes[d]][b]] + genes[d];
                            } else {
                                var path = new Path(characters[b], characters[dfa[genes[d]][b]])
                                var chara = new paper.PointText(new Point(characters[b].x + 50, characters[b].y + 15));
                                content[dfa[genes[d]][b]] = content[dfa[genes[d]][b]] + genes[d];
                            }
                        } else if (Math.abs(dfa[genes[d]][b] - b) == 2) {
                            var thourgh = new Point(characters[b - 1].x, characters[b].y - 40);
                            var path = new Path.Arc(characters[b], thourgh, characters[dfa[genes[d]][b]]);
                            var chara = new paper.PointText(thourgh);
                            content[dfa[genes[d]][b]] = content[dfa[genes[d]][b]] + genes[d];
                        } else if (Math.abs(dfa[genes[d]][b] - b) == 3) {
                            var thourgh = new Point(characters[b - 1].x - 50, characters[b].y + 30);
                            var path = new Path.Arc(characters[b], thourgh, characters[dfa[genes[d]][b]]);
                            var chara = new paper.PointText(thourgh);
                            content[dfa[genes[d]][b]] = content[dfa[genes[d]][b]] + genes[d];
                        } else {
                            var thourgh = new Point(characters[b - 2].x, characters[b].y + 45);
                            var path = new Path.Arc(characters[b], thourgh, characters[dfa[genes[d]][b]]);
                            var chara = new paper.PointText(thourgh);
                            content[dfa[genes[d]][b]] = content[dfa[genes[d]][b]] + genes[d];
                        }
                        chara.content = content[dfa[genes[d]][b]];
                        chara.strokeColor = "black";
                        path.strokeColor = 'black';
                        charpath.push(path);
                    }
                }
            }
        }

        function search(substring, dfa, strinput) {
            var N = strinput.length;
            var M = substring.length;
            setTimeout(function () {
                turnblack()
                blackobj = dfa[strinput[pointer]][blackobj]
                turnwhite()
                pointer++;
                if (blackobj == M) {
                    console.log("found")
                } else {
                    console.log("not found")
                }
                if (pointer < N && blackobj < M) {
                    search(substring, dfa, strinput);
                }
            }, 100)
            // for(i =0,j=0;i<N && j<M;i++){
            //     execute=setInterval(turnblack,1000);
            //     setInterval(j = dfa[strinput[i]][j],1000);
            //     execute1 =setInterval(turnwhite,1000);
            // }
            // if(j==M){
            //     console.log("found")
            // }else {
            //     console.log("not found")
            // }
        }

        function turnblack() {
            states[blackobj].fillColor = 'black'
        }

        function turnwhite() {
            states[blackobj].fillColor = 'white'
        }

        globals.anima = function () {
            stringgen();
            dfaconstruct(substring);
            graphconstruct(dfa, substring, strinput)
            search(substring, dfa, strinput)
        }
    </script>
    <script type="text/javascript">
        window.globals = {}
        window.onload = function () {
            document.getElementById('animation').onclick = function () {
                window.globals.anima();
            }
            document.getElementById('bfs').onclick = function () {
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
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
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
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
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
                       href="#" id="navbarDropdown" role="button"
                       style="font-size: 20px; font-family:Helvetica;">
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
                       href="#" id="navbarDropdown" role="button"
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
<canvas class="form" id="myCanvas" style="background-color: white"></canvas>
<button class="btn btn-outline-primary my-2 my-sm-0" id="animation" onclick="gen()" style="position: absolute;
  left: 10em; top: 710px;">animation
</button>
<button class="btn btn-outline-primary my-2 my-sm-0" id="refresh" onclick="window.location.reload();" style="position: absolute;
  left: 18em; top: 710px;">refresh
</button>
<!-- <img src="white.jpg" class="form2">  -->
<div class="form-group">
        <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1"
                  rows="10">Construct a DFA using the search string. For each state j, if it matches then go to the next state if it doesn't match then calculate the state it should be in and go back.</textarea>
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