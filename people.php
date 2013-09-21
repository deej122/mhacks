<!DOCTYPE html>
<html>
  <head>
    <title><%=title%></title>
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
	$cursor = iterator_to_array($collection->find($tokenQ));
	
	if (!count($cursor)) {
		header( 'Location: index.php');
	}
	else {
		$user = $cursor[0]['user'];
		echo $user;
	}

	$collection = $db->events;
	$eventQ = array('_id' => $_GET['id']);
	$cursor = iterator_to_array($collection->find($eventQ));
	echo '<a href="" id="head">' . $cursor[0]['title'] . '</a>';
?>

  
  <p id="listLabel">
    People at this event
  </p>
  <ul class="list">
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    DJ Jagannathan
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    </li></a>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    John Smith
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    </li></a>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    Steve Jobs
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    Bill Gates
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    </li></a>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    DJ Jagannathan
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    </li></a>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    John Smith
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    </li></a>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    Steve Jobs
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    <a data-toggle="modal" href="#userModal" style="text-decoration:none;color:#000;"><li class="eventItem">
    Bill Gates
    <br>
    <i><span style="font-size:12px;color:rgba(0,0,0,.3);">Skills: </span><span id="skillsList" style="font-weight:italic;color:rgba(0,0,0,.3);font-size:12px;">C++, HTML, JS, CSS</span></i>
    </li></a>
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
          <p class="modal-title">Teammate's Name</p>
        </div>
        <div class="modal-body">
          <i><span style="font-size:30px; float:left;">Languages:</span></i>
          <br>
          <ul style="font-size:20px; list-style-type:none; ">
          <li style="float:left;"><input type="checkbox"> C++</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox"> HTML</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">JS</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px; float:left;">Operating Systems:</span></i>
          <br>
          <ul style="font-size:20px; list-style-type:none;">
          <li style="float:left"><input type="checkbox">Windows</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">Linux</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">OSX</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px; float:left;">Devices:</span></i>
          <br>
          <ul style="font-size:20px; list-style-type:none; ">
          <li style="float:left"><input type="checkbox">iPhone</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">Android</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">Windows Phone</li>
          <li class="skill" style="float:left;width:150px;text-align:left;"><input type="checkbox">CSS</li>
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
          <p class="modal-title">Teammate's Name</p>
        </div>
        <div class="modal-body">
          <i><span style="font-size:30px; float:left;">Languages:</span></i>
          <br>
          <ul style="font-size:20px; list-style-type:none; ">
          <li style="float:left">C++</li>
          <li class="skill" style="float:left;">HTML</li>
          <li class="skill" style="float:left">JS</li>
          <li class="skill" style="float:left">CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px; float:left;">Operating Systems:</span></i>
          <br>
          <ul style="font-size:20px; list-style-type:none;">
          <li style="float:left">Windows</li>
          <li class="skill" style="float:left">Linux</li>
          <li class="skill" style="float:left">OSX</li>
          <li class="skill" style="float:left">CSS</li>
          </ul>
          <br><br>
          <i><span style="font-size:30px; float:left;">Devices:</span></i>
          <br>
          <ul style="font-size:20px; list-style-type:none; ">
          <li style="float:left">iPhone</li>
          <li class="skill" style="float:left">Android</li>
          <li class="skill" style="float:left">Windows Phone</li>
          <li class="skill" style="float:left">CSS</li>
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
          <li style="float:left">DJ Jag</li>
          <li class="skill" style="float:left;">Steve Jobs</li>
          <li class="skill" style="float:left">Bill Gates</li>
          <li class="skill" style="float:left">Cool Kid</li>
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