<!doctype html>
<html lang="en">
  <head>
    <title>AlgoViz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheets/visuals.css">
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
            <div id="id01" class="modal">
  
              <form class="modal-content animate" action="home.html" method="post">
                <div class="title">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  <h1 style="font-size: 4em; margin: auto;"><span><b>ALGOVIZ</b></span></h1>
                </div>
                <br>
                
                <div class="container">
                  <label for="uname"><b>Username</b></label>
                  <input type="text" placeholder="Enter Username" name="uname" required>
                  <br>
                  <br>
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>
                  <br>
                  <br>
                  <br> 
                  <button class="buttns" type="submit">Login</button>
                  <br>                  
                  <br>
                  <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                  </label>
                </div>
                <div class="container" >
                  <span class="signup">Don't have a account? <a href="index.html"> Sign up!</a></span>
                </div>
              </form>
            </div>
            <div id="id02" class="modal">
              
              <form class="modal-content animate" action="home.html" method="post">
                  <div class="title">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <h1 style="font-size: 4em; margin: auto;"><span><b>ALGOVIZ</b></span></h1>
                  </div>
              
                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email Address" name="email" required>
                                    
                  <label for="uname"><b>Username</b></label>
                  <input type="text" placeholder="Enter Username" name="uname" required>
                                    
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>
                                    
                  <label for="psw"><b>Re-Enter Password</b></label>
                  <input type="password" placeholder="Re-enter Password" name="psw" required>
            
                  <button class="buttns" type="submit">Sign Up</button>
                  
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

  </body>
</html>