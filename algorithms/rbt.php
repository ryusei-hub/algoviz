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
        var rbt = new Tree()
        var points = [new Point(300, 100), new Point(150, 200), new Point(450, 200), new Point(100, 300),
            new Point(200, 300), new Point(400, 300), new Point(500, 300)];
        var havenum = [false, false, false, false, false, false, false]
        var num = [-1, -1, -1, -1, -1, -1, -1]
        var path = [-1, new Path.Line(points[0], points[1]), new Path.Line(points[0], points[2]), new Path.Line(points[1], points[3]), new Path.Line(points[1], points[4]), new Path.Line(points[2], points[5]), new Path.Line(points[2], points[6])]
        var circles = [];

        function addnode() {
            var randomnum = window.prompt("A number between 0 and 99")
            if (randomnum <= 99 && randomnum >= 0) {
                rbt.insert({key: randomnum})
                updategraph(0, rbt.root)
            } else {
                addnode()
            }
        }

        function updategraph(x, node) {
            if (num[x] != -1) {
                num[x].strokeColor = "black"
            }
            createnum(x, node.key, node.color)
            var l = node.left
            var r = node.right
            if (l.key != 0) {
                num[x + 1].strokeColor = "black"
                updategraph(x + 1, l)
            }
            if (r.key != 0) {
                num[x + 2].strokeColor = "black"
                updategraph(x + 2, r)
            }
        }

        function createnum(n, randomnum, color) {
            var number = new paper.PointText(new Point(points[n].x - 7, points[n].y + 4));
            number.content = randomnum;
            number.strokeColor = "white"
            circles[n].fillColor = "black"
            circles[n].strokeColor = "black"
            path[n].strokeColor = color
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

        const CONSTANTS = {
            RED: 'red',
            BLACK: 'black',
        };

        class Node {
            constructor(param) {
                this.key = param.key || 0;
                this.color = param.color || CONSTANTS.RED;
                this.left = param.left || undefined;
                this.right = param.right || undefined;
                this.parent = param.parent || undefined;
            }
        }

        class Tree {
            constructor() {
                this.leaf = new Node({key: 0, color: CONSTANTS.BLACK});
                this.root = this.leaf;
            }

            printTree() {
                const stack = [
                    {node: this.root, str: ''},
                ];

                while (stack.length) {
                    // Take last item from stack
                    const item = stack.pop();
                    // Don't print empty leaf
                    if (item.node == this.leaf) {
                        continue;
                    }
                    // Get position of node - left or right
                    let position = '';
                    if (item.node.parent) {
                        position = item.node === item.node.parent.left ? 'L----' : 'R----';
                    } else {
                        position = 'ROOT-';
                    }
                    // Print info about node
                    console.log(`${item.str}${position} ${item.node.key} (${item.node.color})`);

                    // Add node children into stack
                    stack.push({node: item.node.right, str: item.str + '     '});
                    stack.push({node: item.node.left, str: item.str + ' |   '});
                }
            }

            rotateLeft(node) {
                const vertex = node.right;

                // set new right child for node
                node.right = vertex.left;
                if (vertex.left != this.leaf) {
                    vertex.left.parent = node;
                }

                // replace node by new vertex
                vertex.parent = node.parent;
                // if node is root, set new root
                if (!node.parent) {
                    this.root = vertex;
                }
                // replace node for parent
                else if (node === node.parent.left) {
                    node.parent.left = vertex;
                } else {
                    node.parent.right = vertex;
                }

                // set left child for vertex - node
                vertex.left = node;
                node.parent = vertex;
            }

            rotateRight(node) {
                // left child is new vertex
                const vertex = node.left;

                // node lose left child, we replace it with right child from new vertex
                node.left = vertex.right;
                if (vertex.right != this.leaf) {
                    vertex.right.parent = node;
                }

                // new vertex replaces old node
                vertex.parent = node.parent;
                if (!node.parent) {
                    this.root = vertex;
                } else if (node == node.parent.right) {
                    node.parent.right = vertex;
                } else {
                    node.parent.left = vertex;
                }

                // attach right child for new vertex - it is old node
                vertex.right = node;
                node.parent = vertex;
            }

            insert({key}) {
                const node = new Node({
                    key,
                    left: this.leaf,
                    right: this.leaf,
                });

                let parent;
                let tmp = this.root;

                // Search of parent for new node
                // we check all nodes while not get an empty leaf
                while (tmp !== this.leaf) {
                    parent = tmp;
                    // key less that key of current node, we should search in left subtree
                    if (node.key < tmp.key) {
                        tmp = tmp.left;
                    }
                    // key bigger that key of current node, we should search in right subtree
                    else {
                        tmp = tmp.right;
                    }
                }

                node.parent = parent;

                // insert node in left or right subtree
                if (!parent) {
                    this.root = node;
                } else if (node.key < parent.key) {
                    parent.left = node;
                } else {
                    parent.right = node;
                }

                // tree has no vertex, node will be root
                if (!node.parent) {
                    node.color = CONSTANTS.BLACK;
                    return;
                }
                // node has no grandparent, so we have no to balance the tree
                if (!node.parent.parent) {
                    return;
                }

                // balancing of tree
                this.balanceInsert(node);
            }

            balanceInsert(node) {
                // while parent is red
                while (node.parent.color === CONSTANTS.RED) {
                    // node parent is left child of grandparent
                    if (node.parent === node.parent.parent.left) {
                        const uncle = node.parent.parent.right;
                        // if uncle and parent are red, need make these black and grandparent red
                        if (uncle.color === CONSTANTS.RED) {
                            uncle.color = CONSTANTS.BLACK;
                            node.parent.color = CONSTANTS.BLACK;
                            node.parent.parent.color = CONSTANTS.RED;
                            node = node.parent.parent;
                        }
                        // if parent is red and uncle is black
                        else {
                            // if node is right child
                            if (node === node.parent.right) {
                                node = node.parent;
                                this.rotateLeft(node);
                            }
                            node.parent.color = CONSTANTS.BLACK;
                            node.parent.parent.color = CONSTANTS.RED;
                            this.rotateRight(node.parent.parent);
                        }
                    } else {
                        const uncle = node.parent.parent.left;
                        if (uncle.color === CONSTANTS.RED) {
                            uncle.color = CONSTANTS.BLACK;
                            node.parent.color = CONSTANTS.BLACK;
                            node.parent.parent.color = CONSTANTS.RED;
                            node = node.parent.parent;
                        } else {
                            if (node == node.parent.left) {
                                node = node.parent;
                                this.rotateRight(node);
                            }
                            node.parent.color = CONSTANTS.BLACK;
                            node.parent.parent.color = CONSTANTS.RED;
                            this.rotateLeft(node.parent.parent);
                        }
                    }

                    if (node == this.root) {
                        break;
                    }
                }

                this.root.color = CONSTANTS.BLACK;
            }

            minimum(node) {
                while (node.left != this.leaf) {
                    node = node.left;
                }
                return node;
            }

            replace(oldNode, newNode) {
                if (!oldNode.parent) {
                    this.root = newNode;
                } else if (oldNode == oldNode.parent.left) {
                    oldNode.parent.left = newNode;
                } else {
                    oldNode.parent.right = newNode;
                }
                newNode.parent = oldNode.parent;
            }

            deleteNode(key) {
                let forRemove = this.leaf;
                let tmp = this.root;

                // searching the node for removing
                while (tmp != this.leaf) {
                    if (tmp.key === key) {
                        forRemove = tmp;
                        break;
                    }

                    if (tmp.key > key) {
                        tmp = tmp.left;
                    } else {
                        tmp = tmp.right;
                    }
                }

                // node is not found
                if (forRemove == this.leaf) {
                    console.log('node not found');
                    return;
                }

                let minRight = forRemove;
                let minRightColor = minRight.color;
                let newMinRight;

                /*
                if the node for removing has no left child,
                we replace this by its right child
                */
                if (forRemove.left == this.leaf) {
                    newMinRight = forRemove.right;
                    this.replace(forRemove, forRemove.right);
                }
                /*
                if the node for removing has no right child,
                we replace this by its left child
                */
                else if (forRemove.right == this.leaf) {
                    newMinRight = forRemove.left;
                    this.replace(forRemove, forRemove.left);
                }
                // if the node for removing have both children
                else {
                    minRight = this.minimum(forRemove.right);
                    minRightColor = minRight.color;
                    newMinRight = minRight.right;

                    if (minRight.parent === forRemove) {
                        newMinRight.parent = minRight;
                    }
                    /*
                    replace minimum of the right subtree by its right child,
                    attach right children from node for removing into the minimum of right subtree
                    */
                    else {
                        this.replace(minRight, minRight.right);
                        minRight.right = forRemove.right;
                        minRight.right.parent = minRight;
                    }

                    // attach left children from node for removing into the minimum of right subtree
                    this.replace(forRemove, minRight);
                    minRight.left = forRemove.left;
                    minRight.left.parent = minRight;
                    minRight.color = forRemove.color;
                }

                if (minRightColor === CONSTANTS.BLACK) {
                    this.balanceDelete(newMinRight);
                }
            }

            balanceDelete(node) {
                while (node != this.root && node.color == CONSTANTS.BLACK) {
                    if (node == node.parent.left) {
                        let brother = node.parent.right;

                        if (brother.color == CONSTANTS.RED) {
                            brother.color = CONSTANTS.BLACK;
                            node.parent.color = CONSTANTS.RED;
                            this.rotateLeft(node.parent);
                            brother = node.parent.right;
                        }

                        if (
                            brother.left.color == CONSTANTS.BLACK &&
                            brother.right.color == CONSTANTS.BLACK
                        ) {
                            brother.color = CONSTANTS.RED;
                            node = node.parent;
                        } else {
                            if (brother.right.color == CONSTANTS.BLACK) {
                                brother.left.color = CONSTANTS.BLACK;
                                brother.color = CONSTANTS.RED;
                                this.rotateRight(brother);
                                brother = node.parent.right;
                            }

                            brother.color = node.parent.color;
                            node.parent.color = CONSTANTS.BLACK;
                            brother.right.color = CONSTANTS.BLACK;
                            this.rotateLeft(node.parent);
                            node = this.root;
                        }
                    } else {
                        let brother = node.parent.left
                        if (brother.color == CONSTANTS.RED) {
                            brother.color = CONSTANTS.BLACK;
                            node.parent.color = CONSTANTS.RED;
                            this.rotateRight(node.parent);
                            brother = node.parent.left;
                        }

                        if (
                            brother.left.color == CONSTANTS.BLACK &&
                            brother.right.color == CONSTANTS.BLACK
                        ) {
                            brother.color = CONSTANTS.RED;
                            node = node.parent;
                        } else {
                            if (brother.left.color == CONSTANTS.BLACK) {
                                brother.right.color = CONSTANTS.BLACK;
                                brother.color = CONSTANTS.RED;
                                this.rotateLeft(brother);
                                brother = node.parent.left;
                            }

                            brother.color = node.parent.color;
                            node.parent.color = CONSTANTS.BLACK;
                            brother.left.color = CONSTANTS.BLACK;
                            this.rotateRight(node.parent);
                            node = this.root;
                        }
                    }
                }

                node.color = CONSTANTS.BLACK;
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
                  rows="10">No node has two red links connected to it. Every path from root to null link has the same number of black links, red links lean left</textarea>
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