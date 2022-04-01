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
        var BST = new BinarySearchTree();
        var points = [new Point(300, 100), new Point(150, 200), new Point(450, 200), new Point(100, 300),
            new Point(200, 300), new Point(400, 300), new Point(500, 300)];
        var havenum = [false, false, false, false, false, false, false]
        var num = [-1, -1, -1, -1, -1, -1, -1]
        var path = [-1, new Path.Line(points[0], points[1]), new Path.Line(points[0], points[2]), new Path.Line(points[1], points[3]), new Path.Line(points[1], points[4]), new Path.Line(points[2], points[5]), new Path.Line(points[2], points[6])]
        var circles = [];

        function addnode() {
            if (havenum[0] && havenum[1] && havenum[2] && havenum[3] && havenum[4] && havenum[5] && havenum[6]) {
                return null
            }
            var randomnum = window.prompt("A number between 0 and 99")
            if (randomnum <= 99 && randomnum >= 0) {
                BST.insert(randomnum);
                console.log(num[0].content)
                if (havenum[0] == false) {
                    createnum(0, randomnum)
                } else if (parseInt(num[0].content) >= randomnum) {
                    if (havenum[1]) {
                        if (parseInt(num[1].content) >= randomnum) {
                            if (havenum[3]) {
                                addnode()
                            } else {
                                createnum(3, randomnum)
                            }
                        } else if (parseInt(num[1].content) < randomnum) {
                            if (havenum[4]) {
                                addnode()
                            } else {
                                createnum(4, randomnum)
                            }
                        } else {
                            addnode()
                        }
                    } else {
                        createnum(1, randomnum)
                    }
                } else if (parseInt(num[0].content) < randomnum) {
                    if (havenum[2]) {
                        if (parseInt(num[2].content) >= randomnum) {
                            if (havenum[5]) {
                                addnode()
                            } else {
                                createnum(5, randomnum)
                            }
                        } else if (parseInt(num[2].content) < randomnum) {
                            if (havenum[6]) {
                                addnode()
                            } else {
                                createnum(6, randomnum)
                            }
                        } else {
                            addnode()
                        }
                    } else {
                        createnum(2, randomnum)
                    }
                } else {
                    addnode()
                }
            }
        }

        function createnum(n, randomnum) {
            var number = new paper.PointText(new Point(points[n].x - 7, points[n].y + 4));
            number.content = randomnum;
            number.strokeColor = "white"
            circles[n].fillColor = "black"
            circles[n].strokeColor = "black"
            path[n].strokeColor = "black"
            path[n].strokeWidth = 10
            num[n] = number
            havenum[n] = true
        }

        function treegrapggen(points) {
            for (p = 0; p < points.length; p++) {
                var myCircle = new Path.Circle(points[p], 30);
                circles.push(myCircle)
            }
        }

        globals.nodeadd = function () {
            setTimeout(addnode, 1000)
        }
        treegrapggen(points)
    </script>
    <script type="text/javascript">
        window.globals = {}
        window.onload = function () {
            document.getElementById('addnode').onclick = function () {
                window.globals.nodeadd();
            }
            document.getElementById('bfs').onclick = function () {
            }
        }

        class Node {
            constructor(data) {
                this.data = data;
                this.left = null;
                this.right = null;
            }
        }

        class BinarySearchTree {
            constructor() {
                this.root = null;
            }

            insert(data) {
                var newNode = new Node(data);

                if (this.root === null)
                    this.root = newNode;
                else

                    this.insertNode(this.root, newNode);
            }

            insertNode(node, newNode) {
                if (newNode.data < node.data) {
                    if (node.left === null)
                        node.left = newNode;
                    else

                        this.insertNode(node.left, newNode);
                } else {
                    if (node.right === null)
                        node.right = newNode;
                    else

                        this.insertNode(node.right, newNode);
                }
            }

            remove(data) {
                this.root = this.removeNode(this.root, data);
            }

            removeNode(node, key) {

                if (node === null)
                    return null;

                else if (key < node.data) {
                    node.left = this.removeNode(node.left, key);
                    return node;
                } else if (key > node.data) {
                    node.right = this.removeNode(node.right, key);
                    return node;
                } else {
                    if (node.left === null && node.right === null) {
                        node = null;
                        return node;
                    }

                    if (node.left === null) {
                        node = node.right;
                        return node;
                    } else if (node.right === null) {
                        node = node.left;
                        return node;
                    }

                    var aux = this.findMinNode(node.right);
                    node.data = aux.data;

                    node.right = this.removeNode(node.right, aux.data);
                    return node;
                }

            }

            inorder(node) {
                if (node !== null) {
                    this.inorder(node.left);
                    console.log(node.data);
                    this.inorder(node.right);
                }
            }

            preorder(node) {
                if (node !== null) {
                    console.log(node.data);
                    this.preorder(node.left);
                    this.preorder(node.right);
                }
            }

            findMinNode(node) {
                if (node.left === null)
                    return node;
                else
                    return this.findMinNode(node.left);
            }

            getRootNode() {
                return this.root;
            }

            search(node, data) {
                // if trees is empty return null
                if (node === null)
                    return null;

                    // if data is less than node's data
                // move left
                else if (data < node.data)
                    return this.search(node.left, data);

                    // if data is less than node's data
                // move left
                else if (data > node.data)
                    return this.search(node.right, data);

                    // if data is equal to the node data
                // return node
                else
                    return node;
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
<canvas class="form" height=800 id="myCanvas" style="background-color: white" width=800></canvas>
<button class="btn btn-outline-primary my-2 my-sm-0" id="addnode" onclick="" style="position: absolute;
  left: 10em; top: 710px;">addnode
</button>
<button class="btn btn-outline-primary my-2 my-sm-0" id="refresh" onclick="window.location.reload();" style="position: absolute;
  left: 18em; top: 710px;">refresh
</button>
<!-- <img src="white.jpg" class="form2">  -->
<div class="form-group">
        <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1"
                  rows="10">Each node has a key, and every node's key is larger than all keys in its left subtree and smaller than its right subtree</textarea>
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