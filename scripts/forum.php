<!doctype html>
<html lang="en">
    <head>
        <title>AlgoViz</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../index.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body style="background:linear-gradient(to top, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(../assets/two.jpg);">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand " href="../home.html" style="font-weight: bold;font-size:25px; color: #3271a8;">ALGOVIZ</a>
            <a href="../account1.html">
            <img class="user-icon" src="../assets/icon.png" alt="user icon">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                            Trees
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../rbt.html">red black tree</a>
                            <a class="dropdown-item" href="../bst.html">binary search tree</a>
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                            Sorts
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../mergesort.html">Merge sort</a>
                            <a class="dropdown-item" href="../quicksortv2.html">Quick sort</a>
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                            Searching
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../bst.html">breadth first search</a>
                            <a class="dropdown-item" href="../dfs.html">depth first search</a>
                            </div>
                        </li>
                        <!-- LAST DROP DOWN /////////////////// -->
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="font-size: 20px; font-family:Helvetica;">
                            Others
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../prim.html">Prim</a>
                            <a class="dropdown-item" href="../KMP.html">KMP</a>
                            <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a> -->
                            </div>
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

        <div class="content">
                <div class="container">
                    <form method="post" action="homeforum.php?">
                        <?php
                        include "connect.php";

                        $topic = $_POST["name_topic"];
                        $description = $_POST["post_text"];

                        $topic_sql = str_replace("'", "''", $topic);
                        $description_sql = str_replace("'", "''", $description);

                        $conn = Connect();
                        $sql = sprintf("INSERT INTO forum (userID, title, description) VALUES (1, '%s', '%s')", $topic_sql, $description_sql);
                        $conn->exec($sql);
                        $conn = null;

                        echo '<table style="width:30em; background:white; position:absolute; left:12em; top:13em;"  border="2em">
                                <tr>
                                <th style="color:dark-grey">Topic</th>
                                <th style="color:dark-grey">Description</th>
                                </tr>';

                            echo '<tr>';
                                echo '<td class="leftpart">';
                                    echo '<h3>';
                                    echo '<a href="../topic.php?data=<?=$topic?>">';
                                    echo $topic;
                                    echo '</a>';
                                    echo '</h3>';
                                echo '</td>';
                                echo '<td style="color:black">';
                                echo substr($description, 0, 30);
                                echo '</td>';
                            echo '</tr>';
                        ?><br>
                    </form>
                </div>
                <button id="buttonTopics" style="position:absolute; left:45em; top:20em;" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Add Topic</button><br>
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

<!-- 
  {
    if(mysql_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        //display category data
        while($row = mysql_fetch_assoc($result))
        {
            echo '<h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = " . mysql_real_escape_string($_GET['id']);
         
        $result = mysql_query($sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>'; 
                     
                while($row = mysql_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
  }
-->
