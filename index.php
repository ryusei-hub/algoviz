<?php
// Begin a new session to store name data across pages
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AlgoViz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <link href="stylesheets/visuals.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="bg-image" style="background-image: url('assets/two.jpg'); ">
    <div class="content">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1><b>ALGOVIZ</b></h1>
                <p class="parag">
                    <b>Algorithm visualizer</b>
                </p>
                <button class="buttn" onclick="document.getElementById('id01').style.display='block'">Login</button>
                <button class="buttn" onclick="document.getElementById('id02').style.display='block'">Sign Up</button>
                <div class="modal" id="id01">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="modal-content animate"
                          method="post">
                        <?php
                        require_once 'scripts/connect.php';

                        function LogIn()
                        {

                            $conn = Connect();

                            $uname = trim($_POST["uname1"]);
                            $password = trim($_POST["psw1"]);
                            $err_str = "<span style='color: #f44336'>Something went wrong - %s</span><script>document.getElementById('id01').style.display='block'</script>";

                            $stmt = $conn->query("SELECT name, password FROM users");
                            $stmt->setFetchMode(PDO::FETCH_NUM);

                            foreach ($stmt as $row) {
                                $curr_username = $row[0];
                                $curr_password = $row[1];

                                if ($curr_username == $uname and password_verify($password, $curr_password)) {
                                    $_SESSION["logged_in"] = true;
                                    $_SESSION["name"] = $uname;
                                    header('location: home.php');
                                    return;
                                }
                            }
                            echo sprintf($err_str, "Incorrect login details, try again.");
                            $conn = null;
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!empty($_POST["uname1"])) {
                                LogIn();
                            }
                        }

                        ?>
                        <div class="title">
                            <span class="close" onclick="document.getElementById('id01').style.display='none'"
                                  title="Close">&times;</span>
                            <h1 style="font-size: 4em; margin: auto;"><span><b>ALGOVIZ</b></span></h1>
                        </div>
                        <br>

                        <div class="container">
                            <label for="uname1"><b>Username</b></label>
                            <input name="uname1" placeholder="Enter Username" required type="text">
                            <br>
                            <br>
                            <label for="psw1"><b>Password</b></label>
                            <input name="psw1" placeholder="Enter Password" required type="password">
                            <br>
                            <br>
                            <br>
                            <button class="buttns" type="submit">Login</button>
                            <br>
                            <br>
                            <label>
                                <input checked="checked" name="remember" type="checkbox"> Remember me
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal" id="id02">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="modal-content animate"
                          method="post">
                        <?php
                        require_once 'scripts/connect.php';

                        function SignUp()
                        {

                            $conn = Connect();

                            $param_email = trim($_POST["email"]);
                            $param_uname = trim($_POST["uname"]);
                            $param_password = trim($_POST["psw"]);
                            $confirm_password = trim($_POST["re_psw"]);
                            $err_str = "<span style='color: #f44336'>Something went wrong - %s</span><script>document.getElementById('id02').style.display='block'</script>";

                            if (!empty($param_uname)) {
                                $sql = "SELECT name FROM users WHERE name = :name";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":name", $param_uname, PDO::PARAM_STR);
                                $stmt->execute();

                                if ($stmt->rowCount() == 1) {
                                    echo sprintf($err_str, "Username already taken");
                                    return;
                                }
                                unset($stmt);
                            }

                            if (empty($param_password) or empty($confirm_password) or !($param_password == $confirm_password)) {
                                echo sprintf($err_str, "You entered your passwords incorrectly");
                                return;
                            }

                            $sql = "INSERT INTO users (name, password, email) VALUES (:name, :password, :email)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":name", $param_uname, PDO::PARAM_STR);
                            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

                            $param_password = password_hash($param_password, PASSWORD_DEFAULT);

                            $stmt->execute();
                            $_SESSION["logged_in"] = true;
                            $_SESSION["name"] = $param_uname;
                            header('location: home.php');

                            unset($stmt);

                            $conn = null;
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!empty($_POST["uname"])) {
                                SignUp();
                            }
                        }
                        ?>
                        <div class="title">
                            <span class="close" onclick="document.getElementById('id02').style.display='none'"
                                  title="Close">&times;</span>
                            <h1 style="font-size: 4em; margin: auto;"><span><b>ALGOVIZ</b></span></h1>
                        </div>

                        <label for="email"><b>Email</b></label>
                        <input name="email" placeholder="Enter Email Address" type="text">

                        <label for="uname"><b>Username</b></label>
                        <input name="uname" placeholder="Enter Username" required type="text">

                        <label for="psw"><b>Password</b></label>
                        <input name="psw" placeholder="Enter Password" required type="password">

                        <label for="re_psw"><b>Re-Enter Password</b></label>
                        <input name="re_psw" placeholder="Re-enter Password" required type="password">

                        <button class="buttns" type="submit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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