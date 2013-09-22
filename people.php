<!DOCTYPE html>
<html>
  <head>
    <title><%=title%></title>
	<link rel="stylesheet" type="text/css" href="stylesheets/default.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/people.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/modals.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>    
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

<?php
	$m = new MongoClient();
	$db = $m->hack;
	$collection = $db->tokens;
	
	$tokenQ = array('value' => $_COOKIE['token']);
	$cursor = iterator_to_array($collection->find($tokenQ, array('_id' => 0, 'user' => true)));
	
	if (!count($cursor)) {
		header( 'Location: index.php');
	}
	else {
		$user = $cursor[0]['user'];
	}

	$collection = $db->events;
	$eventQ = array('_id' => new MongoId($_GET['id']));
	$cursor = iterator_to_array($collection->find($eventQ));
	echo '<a href="" id="head">' . $cursor[$_GET['id']]['title'] . '</a>';
	echo '<a href="events.php" id="headr">Back to Events</a>';
?>

  
  <p id="listLabel">
    People at this event
  </p>
  <ul class="list">
  <?php
	$collection = $db->users;
	foreach ($cursor[$_GET['id']]['ids'] as $user) {
		$userQ = array('_id' => new MongoId($user));
		$ucursor = iterator_to_array($collection->find($userQ, array('_id' => 0, 'name' => true)));
		echo '<a data-toggle="modal" href="#userModal" id="modelink"><li class="eventItem">' .
		$ucursor[0]['name'] .
		'<br><i><span id="hacker">Skills: </span><span id="skillsList">' .
		$ucursor[0]['prog'] .
		'</span></i></li></a>';
	}
  ?>
  </ul> 
  <br>
  <div id="buttonDiv">
    <a data-toggle="modal" href="#myModal" class="button" style="text-decoration:none;">Create a Profile</a>
    <a data-toggle="modal" href="#myTeam" class="button" style="text-decoration:none;">My Team</a>
  </div>


  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">&times;</button>
          <p class="modal-title">Your Profile</p>
        </div>
        <div class="modal-body">
          <i><span style="font-size:30px;">Languages:</span></i>
          <br>
          <ul class="skills">
          <li><input type="checkbox">C++</li>
          <li><input type="checkbox">HTML</li>
          <li><input type="checkbox">JS</li>
          <li><input type="checkbox">CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px;">Operating Systems:</span></i>
          <br>
          <ul class="skills">
          <li><input type="checkbox">Windows</li>
          <li><input type="checkbox">Linux</li>
          <li><input type="checkbox">OSX</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px;">Devices:</span></i>
          <br>
          <ul class="skills">
          <li><input type="checkbox">iPhone</li>
          <li><input type="checkbox">Android</li>
          <li><input type="checkbox">Windows</li>
          </ul>                    
        </div>          
        <div class="modal-footer">
          <input type="button" class="button" value="Create" /> 
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->  

  <!-- Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">&times;</button>
          <p class="modal-title">Other Profile</p>
        </div>
        <div class="modal-body">
          <i><span style="font-size:30px;">Languages:</span></i>
          <br>
          <ul class="skills">
          <li>C++</li>
          <li>HTML</li>
          <li>JS</li>
          <li>CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px;">Operating Systems:</span></i>
          <br>
          <ul class="skills">
          <li>Windows</li>
          <li>Linux</li>
          <li>OSX</li>
          <li>CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px;">Devices:</span></i>
          <br>
          <ul class="skills">
          <li>iPhone</li>
          <li>Android</li>
          <li>Windows Phone</li>
          <li>CSS</li>
          </ul>                    
        </div>          
        <div class="modal-footer">
          <input type="button" class="button" value="Invite to Team" /> 
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->  

  <!-- Modal -->
  <div class="modal fade" id="myTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">&times;</button>
          <p class="modal-title">Team Members</p>
        </div>
        <div class="modal-body">
          <ul style="font-size:20px; list-style-type:none; ">
          <li>DJ Jag</li>
          <li>Steve Jobs</li>
          <li>Bill Gates</li>
          <li>Cool Kid</li>
          </ul>                   
        </div>          
        <div class="modal-footer">
          <button class="red" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->    
</body>

</html>