<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>My account</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="stylesheets/account.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand " href="home.php" style="font-weight: bold;font-size:25px; color: #3271a8;">ALGOVIZ</a>
    <a href="account.php">
        <img alt="user icon" class="user-icon" src="assets/icon.png">
    </a>
    <a class="navbar-brand " href="account.php" style="font-weight: bold;font-size:25px; color: #3271a8;"
       id="username"></a>
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
                        <a class="dropdown-item" href="algorithms/rbt.php">Red Black Tree</a>
                        <a class="dropdown-item" href="algorithms/bst.php">Binary Search Tree</a>
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
                        <a class="dropdown-item" href="algorithms/mergesort.php">Merge sort</a>
                        <a class="dropdown-item" href="algorithms/quicksort.php">Quick sort</a>
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
                        <a class="dropdown-item" href="algorithms/bst.php">Breadth First Search</a>
                        <a class="dropdown-item" href="algorithms/dfs.php">Depth First Search</a>
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
                        <a class="dropdown-item" href="algorithms/prim.php">Prim</a>
                        <a class="dropdown-item" href="algorithms/kmp.php">KMP</a>
                        <a class="dropdown-item" href="leealgorithm.php">Lee Algorithm</a>

                        <!-- <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>


<div class="jumbotron jumbotron-fluid"
     style="background: linear-gradient(to top,rgba(1, 1, 14, 0.8)60%,rgba(2, 2, 14, 0.8)60%);">
    <div class="container" style="transform: translateY(-3em);">
        <div class="form">
            <div>
                <img src="assets/profpic.jpg" style="height: 7em; border-radius: 100%;">
                <h1 style="color: #3271a8; font-family: serif; text-align: center;">
                    My Account
                </h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="content" style="transform: translateY(-1.5em);">
                        <label>
                            <input name="uname" id="username1" class="txtbx" readonly style="text-align: center;"
                                   type="text" value="Your username">
                        </label>
                        <label>
                            <input name="fname" id="firstname" class="txtbx" placeholder="First Name" type="text">
                        </label>
                        <label>
                            <input name="sname" id="surname" class="txtbx" placeholder="Surname" type="text">
                        </label>
                        <span>Date of Birth</span>
                        <label>
                            <input name="dob" id="dob" class="txtbx" placeholder="Date of birth" type="date">
                        </label>
                        <br>
                        <br>
                        <h2 style="font-family: Trebuchet, serif; color: #3271a8;">Contact info</h2>

                        <label>
                            <input name="email" id="email" class="txtbx" placeholder="E-mail" type="text">
                        </label>
                        <label>
                            <input name="phone" id="phone" placeholder="Phone number" type="number">
                        </label>
                        <?php
                        require_once 'scripts/connect.php';

                        function UpdateNav()
                        {
                            echo sprintf("<script>document.getElementById('username').innerHTML = '%s'</script>", $_SESSION["name"]);
                        }

                        function CheckDetails()
                        {
                            $name = $_SESSION["name"];
                            echo sprintf("<script>document.getElementById('username1').value = '%s'</script>", $_SESSION["name"]);

                            $conn = Connect();
                            $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name");
                            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                            $stmt->execute();

                            if ($stmt->rowCount() == 0) {
                                $conn = null;
                                return;
                            }

                            foreach ($stmt as $row) {
                                $firstname = $row[2];
                                $surname = $row[3];
                                $email = $row[4];
                                $dob = $row[5];
                                $phone = $row[6];

                                if (!is_null($firstname)) {
                                    echo sprintf("<script>document.getElementById('firstname').value = '%s'</script>", $firstname);
                                }
                                if (!is_null($surname)) {
                                    echo sprintf("<script>document.getElementById('surname').value = '%s'</script>", $surname);
                                }
                                if (!is_null($email)) {
                                    echo sprintf("<script>document.getElementById('email').value = '%s'</script>", $email);
                                }
                                if (!is_null($dob)) {
                                    echo sprintf("<script>document.getElementById('dob').value = '%s'</script>", $dob);
                                }
                                if (!is_null($phone)) {
                                    echo sprintf("<script>document.getElementById('phone').value = '%s'</script>", $phone);
                                }
                            }
                        }

                        CheckDetails();

                        function UpdateAccount()
                        {
                            $conn = Connect();

                            $param_name = $_SESSION["name"];
                            $param_email = $_POST["email"];
                            $param_fname = $_POST["fname"];
                            $param_sname = $_POST["sname"];
                            $param_dob = !empty($_POST["dob"]) ? $_POST["dob"] : null;
                            $param_phone = strval($_POST["phone"]);

                            $sql = "UPDATE users SET firstname = :fname, surname = :sname, email = :email, dob = :dob, phone = :phone WHERE name = :name";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
                            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                            $stmt->bindParam(":fname", $param_fname, PDO::PARAM_STR);
                            $stmt->bindParam(":sname", $param_sname, PDO::PARAM_STR);
                            $stmt->bindParam(":dob", $param_dob, PDO::PARAM_STR);
                            $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
                            $stmt->execute();

                            $conn = null;
                            CheckDetails();
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            UpdateAccount();
                        }
                        UpdateNav();

                        ?>
                    </div>
                    <div style="transform: translateY(-8em);">
                        <a class="buttn" style="padding-top: 1.85em; padding-bottom: 1.85em; padding-left: 0.5em; padding-right: 0.5em;" href="home.php">
                            Return to Home
                        </a>
                        <button class="buttn" type="submit">Save Changes</button>
                        <a class="buttn" style="padding-top: 1.85em; padding-bottom: 1.85em; padding-left: 0.5em; padding-right: 0.5em;" href="index.php">Log Out</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
s
</body>
</html>