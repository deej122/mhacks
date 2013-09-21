<!DOCTYPE html>
<html>
  <head>
    <title><%=title%></title>
    <link rel="stylesheet" type="text/css" href="stylesheets/homePage.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/modals.css">
    <script src="scripts/modals.js"></script>  

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        overflow: auto;
      }

    </style>
  </head>

<body style="margin:0;min-width: 1100px;">

  <p id="head">
    Site Name
  </p>

  <?php
  
  error_reporting(-1); ini_set('display_errors', '1');
  
  //if !isset($_POST["name"]) {
  
  echo '<form class="loginForm" action="index.php" method="POST" >
    <p class="formLabel">Sign Up to find teammates</p>  
    <input id="name" type="text" class="input" placeholder="Name"/>
    <br><br>    
    <input id="cont" type="text" class="input" placeholder="Email/Cell Phone"/>
    <br><br>
    <input id="pass" type="password" class="input" placeholder="Password"/>
    <br><br>
    <input type="submit" class="button" value="Sign Up"/>
  </form>';   

  //}
  //else {
	echo 'Thanks! Now log in';
  //}
  
  echo '<form class="loginForm" action="index.php" method="POST" id="login">
    <p class="formLabel">Login to find teammates</p>  
    <input type="text" class="input" placeholder="Email/Cell Phone"/>
    <br><br>
    <input type="password" class="input" placeholder="Password"/>
    <br><br>
    <input type="submit" class="button" value="Login"/>
  </form>';

  ?>
  
</body>

</html>