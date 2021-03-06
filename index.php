<!DOCTYPE html>
<html>
  <head>
    <title><%=title%></title>
    <link rel="stylesheet" type="text/css" href="stylesheets/default.css">
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
    Hack-it-Together
  </p>

  <?php
  error_reporting(-1); ini_set('display_errors', '1');
  
  if (!isset($_POST["name"]) || !isset($_POST["cont"]) || !isset($_POST["pass"])) {
	echo '<form class="loginForm" action="index.php" method="POST" >
			<input name="name" type="text" class="input" placeholder="Name"/>
			<br><br>    
			<input name="cont" type="text" class="input" placeholder="Email/Cell Phone"/>
			<br><br>
			<input name="pass" type="password" class="input" placeholder="Password"/>
			<br><br>
			<input type="submit" class="button" value="Sign Up"/>
		  </form>';   
  }
  else {
	$m = new MongoClient();
	$db = $m->hack;
	$collection = $db->users;
	$collection->insert(array( "username" => $_POST["cont"], "password" => $_POST["pass"], "name" => $_POST["name"]));
	unset($_POST["name"]);
	echo '<p class="formLabel">Thanks! Now log in</p>';
  }
  
  if (!isset($_POST["user"]) || !isset($_POST["password"])) {
	echo '<form class="loginForm" action="index.php" method="POST" id="login"> 
			<input name="user" type="text" class="input" placeholder="Email/Cell Phone"/>
			<br><br>
			<input name="password" type="password" class="input" placeholder="Password"/>
			<br><br>
			<input type="submit" class="button" value="Login"/>
		</form>';
  }
  else {
	$m = new MongoClient();
	$db = $m->hack;
	$collection = $db->users;
	$userQ = array('username' => $_POST["user"]);
	$cursor = iterator_to_array($collection->find($userQ, array('_id' => 0, 'password' => true)));
	if (count($cursor) && $cursor[0]['password'] == $_POST["password"]) {
		$collection = $db->tokens;
		$token = uniqid();
		setcookie('token', $token, time()+3600, '/', 'ec2-54-224-122-252.compute-1.amazonaws.com');
		$collection->insert(array( "value" => $token, "user" => $_POST["user"]));
		header( 'Location: events.php');
	}
	else {
		echo 'Password is incorrect. Try again <br/>
		<form class="loginForm" action="index.php" method="POST" id="login">  
			<input name="user" type="text" class="input" placeholder="Email/Cell Phone"/>
			<br><br>
			<input name="password" type="password" class="input" placeholder="Password"/>
			<br><br>
			<input type="submit" class="button" value="Login"/>
		</form>';
	}
  }

  ?>
  
</body>

</html>